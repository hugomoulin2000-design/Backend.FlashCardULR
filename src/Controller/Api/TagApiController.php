<?php

namespace App\Controller\Api;

use App\Entity\Tag;
use App\Repository\TagRepository;
use App\Repository\DeckRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TagApiController extends AbstractController
{
    #[Route('/api/tags', name: 'api_tags', methods: ['GET'])]
    public function index(TagRepository $repo): Response
    {
        $tags = $repo->findAll();
        $data = [];

        foreach ($tags as $tag) {
            $data[] = [
                'id' => $tag->getId(),
                'nom' => $tag->getNom(),
            ];
        }

        return $this->json($data);
    }


    #[Route('/api/tags/{id}', name: 'api_tag_show', methods: ['GET'])]
    public function show(Tag $tag): Response
    {
        return $this->json([
            'id' => $tag->getId(),
            'nom' => $tag->getNom(),
        ]);
    }


    #[Route('/api/tags/{id}/decks', name: 'api_tag_decks', methods: ['GET'])]
    public function decks(Tag $tag): Response
    {
        $decks = $tag->getDecks();
        $data = [];

        foreach ($decks as $deck) {
            $data[] = [
                'id' => $deck->getId(),
                'titre' => $deck->getTitre(),
                'description' => $deck->getDescription(),
                'flashcards_count' => $deck->getFlashcards()->count(),
            ];
        }

        return $this->json($data);
    }





    #[Route('/api/tags', name: 'api_tag_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $data = json_decode($request->getContent(), true);

        if (!$data || !isset($data['nom'])) {
            return $this->json(['error' => 'Invalid data'], 400);
        }

        $tag = new Tag();
        $tag->setNom($data['nom']);

        $em->persist($tag);
        $em->flush();

        return $this->json([
            'message' => 'Tag created',
            'tag' => [
                'id' => $tag->getId(),
                'nom' => $tag->getNom(),
            ]
        ], 201);
    }


    #[Route('/api/tags/{id}', name: 'api_tag_delete', methods: ['DELETE'])]
    public function delete(int $id, TagRepository $repo, EntityManagerInterface $em): Response
    {
        $tag = $repo->find($id);

        if (!$tag) {
            return $this->json(['error' => 'Tag not found'], 404);
        }

        $em->remove($tag);
        $em->flush();

        return $this->json(['message' => 'Tag deleted']);
    }


    #[Route('/api/tags/{id}', name: 'api_tag_update', methods: ['PATCH'])]
    public function update(
        int $id,
        Request $request,
        TagRepository $repo,
        EntityManagerInterface $em
    ): Response {
        $tag = $repo->find($id);

        if (!$tag) {
            return $this->json(['error' => 'Tag not found'], 404);
        }

        $data = json_decode($request->getContent(), true);

        if (isset($data['nom'])) {
            $tag->setNom($data['nom']);
        }

        $em->flush();

        return $this->json(['message' => 'Tag updated']);
    }
}
