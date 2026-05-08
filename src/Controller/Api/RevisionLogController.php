<?php

namespace App\Controller\Api;

use App\Entity\RevisionLog;
use App\Entity\Deck;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RevisionLogController extends AbstractController
{
    #[Route('/api/revision-log', methods: ['POST'])]
    public function logRevision(
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $data = json_decode($request->getContent(), true);

        $user = $this->getUser();
        if (!$user) {
            return $this->json(['error' => 'Unauthorized'], 401);
        }

        $deck = $em->getRepository(Deck::class)->find($data['deck_id']);
        if (!$deck) {
            return $this->json(['error' => 'Deck not found'], 404);
        }

        $log = new RevisionLog();
        $log->setUser($user);
        $log->setDeck($deck);
        $log->setFlashcardsCount($data['flashcards_count']);
        $log->setDurationSeconds($data['duration_seconds'] ?? 0);

        $em->persist($log);
        $em->flush();

        return $this->json(['status' => 'ok']);
    }
}
