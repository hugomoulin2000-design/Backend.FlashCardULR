<?php

namespace App\Controller\Api;

use App\Entity\Flashcard;
use App\Repository\DeckRepository;
use App\Repository\FlashcardRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FlashcardApiController extends AbstractController
{
    #[Route('/api/flashcards', name: 'api_flashcards', methods: ['GET'])]
    public function index(FlashcardRepository $repo): Response
    {
        $flashcards = $repo->findAll();
        $data = [];

        foreach ($flashcards as $card) {
            $data[] = [
                'id' => $card->getId(),
                'question' => $card->getQuestion(),
                'answer' => $card->getAnswer(),
                'deck_id' => $card->getDeck()?->getId(),
                'cree_le' => $card->getCreeLe(),
            ];
        }

        return $this->json($data);
    }

    #[Route('/api/flashcards/{id}', name: 'api_flashcard_show', methods: ['GET'])]
    public function show(Flashcard $card): Response
    {
        return $this->json([
            'id' => $card->getId(),
            'question' => $card->getQuestion(),
            'answer' => $card->getAnswer(),
            'deck_id' => $card->getDeck()?->getId(),
            'cree_le' => $card->getCreeLe(),
        ]);
    }


    #[Route('/api/decks/{id}/flashcards', name: 'api_flashcard_create', methods: ['POST'])]
    public function create(
        int $id,
        Request $request,
        EntityManagerInterface $em,
        DeckRepository $deckRepo
    ): Response {
        $deck = $deckRepo->find($id);

        if (!$deck) {
            return $this->json(['error' => 'Deck not found'], 404);
        }

        if ($deck->getUser() !== $this->getUser()) {
            return $this->json(['error' => 'Forbidden'], 403);
        }

        $data = json_decode($request->getContent(), true);

        if (!isset($data['question'], $data['answer'])) {
            return $this->json(['error' => 'Invalid data'], 400);
        }

        $card = new Flashcard();
        $card->setQuestion($data['question']);
        $card->setAnswer($data['answer']);
        $card->setDeck($deck);
        $card->setCreeLe(new \DateTimeImmutable());

        $em->persist($card);
        $em->flush();

        return $this->json([
            'id' => $card->getId(),
            'question' => $card->getQuestion(),
            'answer' => $card->getAnswer(),
            'creeLe' => $card->getCreeLe(),
            'deck_id' => $deck->getId()
        ], 201);
    }

    #[Route('/api/flashcards/{id}', name: 'api_flashcard_delete', methods: ['DELETE'])]
    public function delete(
        int $id,
        FlashcardRepository $repo,
        EntityManagerInterface $em
    ): Response {
        $card = $repo->find($id);

        if (!$card) {
            return $this->json(['error' => 'Flashcard not found'], 404);
        }

        if ($card->getDeck()->getUser() !== $this->getUser()) {
            return $this->json(['error' => 'Forbidden'], 403);
        }

        $em->remove($card);
        $em->flush();

        return $this->json(['message' => 'Flashcard deleted']);
    }


    #[Route('/api/flashcards/{id}', name: 'api_flashcard_update', methods: ['PATCH'])]
    public function update(
        int $id,
        Request $request,
        FlashcardRepository $repo,
        EntityManagerInterface $em
    ): Response {
        $card = $repo->find($id);

        if (!$card) {
            return $this->json(['error' => 'Flashcard not found'], 404);
        }


        if ($card->getDeck()->getUser() !== $this->getUser()) {
            return $this->json(['error' => 'Forbidden'], 403);
        }

        $data = json_decode($request->getContent(), true);

        if (isset($data['question'])) {
            $card->setQuestion($data['question']);
        }

        if (isset($data['answer'])) {
            $card->setAnswer($data['answer']);
        }

        $em->flush();

        return $this->json(['message' => 'Flashcard updated']);
    }
}
