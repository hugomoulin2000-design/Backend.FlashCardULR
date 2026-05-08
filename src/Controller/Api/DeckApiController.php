<?php

namespace App\Controller\Api;

use App\Entity\Deck;
use App\Repository\DeckRepository;
use App\Repository\TagRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DeckApiController extends AbstractController
{
    #[Route('/api/decks', name: 'api_decks', methods: ['GET'])]
    public function index(DeckRepository $repo): Response
    {
        $decks = $repo->findAll();
        $data = [];

        foreach ($decks as $deck) {

            $tags = [];
            foreach ($deck->getTags() as $tag) {
                $tags[] = [
                    'id' => $tag->getId(),
                    'nom' => $tag->getNom(),
                ];
            }

            $data[] = [

                'id' => $deck->getId(),
                'titre' => $deck->getTitre(),
                'description' => $deck->getDescription(),
                'user_id' => $deck->getUser()?->getId(),
                'difficulte' => $deck->getDifficulte(),
                'tags' => $tags
            ];
        }

        return $this->json($data);
    }


    #[Route('/api/decks/{id}', name: 'api_deck_show', methods: ['GET'])]
    public function showDeck(int $id, DeckRepository $repo): Response
    {
        $deck = $repo->find($id);

        if (!$deck) {
            return $this->json(['error' => 'Deck not found'], 404);
        }

        $tags = [];
        foreach ($deck->getTags() as $tag) {
            $tags[] = [
                'id' => $tag->getId(),
                'nom' => $tag->getNom(),
            ];
        }

        return $this->json([
            'cree_le' => $deck->getCreeLe()?->format('Y-m-d H:i:s'),
            'id' => $deck->getId(),
            'titre' => $deck->getTitre(),
            'description' => $deck->getDescription(),
            'user_id' => $deck->getUser()?->getId(),
            'difficulte' => $deck->getDifficulte(),
            'flashcards_count' => count($deck->getFlashcards() ?? []),
            'tags' => $tags,
        ]);
    }

    #[Route('/api/decks/{id}/flashcards', name: 'api_deck_flashcards', methods: ['GET'])]
    public function getFlashcardsByDeck(int $id, DeckRepository $deckRepo): Response
    {
        $deck = $deckRepo->find($id);

        if (!$deck) {
            return $this->json(['error' => 'Deck not found'], 404);
        }

        $flashcards = $deck->getFlashcards();
        $data = [];

        foreach ($flashcards as $card) {
            $data[] = [
                'id' => $card->getId(),
                'question' => $card->getQuestion(),
                'answer' => $card->getAnswer(),
            ];
        }

        return $this->json($data);
    }

    #[Route('/api/my-decks', name: 'api_my_decks', methods: ['GET'])]
    public function myDecks(DeckRepository $repo): Response
    {
        $user = $this->getUser();
        $decks = $repo->findBy(['user' => $user]);

        $data = [];

        foreach ($decks as $deck) {

            $tags = [];
            foreach ($deck->getTags() as $tag) {
                $tags[] = [
                    'id' => $tag->getId(),
                    'nom' => $tag->getNom(),
                ];
            }

            $data[] = [
                'id' => $deck->getId(),
                'titre' => $deck->getTitre(),
                'description' => $deck->getDescription(),
                'user_id' => $deck->getUser()?->getId(),
                'difficulte' => $deck->getDifficulte(),
                'tags' => $tags
            ];
        }

        return $this->json($data);
    }

    #[Route('/api/decks', name: 'api_deck_create', methods: ['POST'])]
    public function createDeck(
        Request $request,
        EntityManagerInterface $em,
        TagRepository $tagRepo
    ): Response {
        $data = json_decode($request->getContent(), true);

        if (!$data || !isset($data['titre'], $data['description'], $data['difficulte'])) {
            return $this->json(['error' => 'Invalid data'], 400);
        }

        $deck = new Deck();
        $deck->setTitre($data['titre']);
        $deck->setDescription($data['description']);
        $deck->setDifficulte($data['difficulte']);
        $deck->setCreeLe(new \DateTimeImmutable());
        $deck->setUser($this->getUser());

        if (isset($data['tags']) && is_array($data['tags'])) {
            foreach ($data['tags'] as $tagId) {
                $tag = $tagRepo->find($tagId);
                if ($tag) {
                    $deck->addTag($tag);
                }
            }
        }

        $em->persist($deck);
        $em->flush();

        return $this->json([
            'message' => 'Deck created',
            'deck' => [
                'id' => $deck->getId(),
                'titre' => $deck->getTitre(),
                'description' => $deck->getDescription(),
                'difficulte' => $deck->getDifficulte(),
                'tags' => array_map(fn($t) => [
                    'id' => $t->getId(),
                    'nom' => $t->getNom()
                ], $deck->getTags()->toArray())
            ]
        ], 201);
    }

    #[Route('/api/decks/{id}', name: 'api_deck_delete', methods: ['DELETE'])]
    public function deleteDeck(int $id, DeckRepository $repo, EntityManagerInterface $em): Response
    {
        $deck = $repo->find($id);

        if (!$deck) {
            return $this->json(['error' => 'Deck not found'], 404);
        }

        if ($deck->getUser() !== $this->getUser()) {
            return $this->json(['error' => 'Forbidden'], 403);
        }

        $em->remove($deck);
        $em->flush();

        return $this->json(['message' => 'Deck deleted']);
    }

    #[Route('/api/decks/{id}', name: 'api_deck_update', methods: ['PATCH'])]
    public function update(
        int $id,
        Request $request,
        DeckRepository $repo,
        TagRepository $tagRepo,
        EntityManagerInterface $em
    ): Response {
        $deck = $repo->find($id);

        if (!$deck) {
            return $this->json(['error' => 'Deck not found'], 404);
        }

        if ($deck->getUser() !== $this->getUser()) {
            return $this->json(['error' => 'Forbidden'], 403);
        }

        $data = json_decode($request->getContent(), true);

        if (isset($data['titre'])) {
            $deck->setTitre($data['titre']);
        }

        if (isset($data['description'])) {
            $deck->setDescription($data['description']);
        }

        if (isset($data['difficulte'])) {
            $deck->setDifficulte($data['difficulte']);
        }

        if (isset($data['tags']) && is_array($data['tags'])) {
            $deck->getTags()->clear();
            foreach ($data['tags'] as $tagId) {
                $tag = $tagRepo->find($tagId);
                if ($tag) {
                    $deck->addTag($tag);
                }
            }
        }

        $em->flush();

        return $this->json(['message' => 'deck updated']);
    }
}
