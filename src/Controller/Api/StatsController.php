<?php

namespace App\Controller\Api;

use App\Entity\RevisionLog;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatsController extends AbstractController
{
    #[Route('/api/stats/me', methods: ['GET'])]
    public function stats(EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['error' => 'Unauthorized'], 401);
        }

        $logs = $em->getRepository(RevisionLog::class)
            ->findBy(['user' => $user], ['created_at' => 'DESC']);

        if (!$logs) {
            return $this->json([
                'decks_revised' => 0,
                'flashcards_revised' => 0,
                'total_minutes' => 0,
                'streak' => 0,
                'last_activity' => null
            ]);
        }

        // total
        $decks = [];
        $flashcards = 0;
        $minutes = 0;

        foreach ($logs as $log) {
            $decks[$log->getDeck()->getId()] = true;
            $flashcards += $log->getFlashcardsCount();
            $minutes += intdiv($log->getDurationSeconds(), 60);
        }


        $streak = 1;

        // Streak de minuiit a minuit pour laisser de la marge
        $prev = (clone $logs[0]->getCreatedAt())->setTime(0, 0, 0);

        for ($i = 1; $i < count($logs); $i++) {
            $current = (clone $logs[$i]->getCreatedAt())->setTime(0, 0, 0);

            $diff = $prev->diff($current)->days;

            if ($diff === 1) {
                $streak++;
                $prev = $current;
            } elseif ($diff === 0) {
                continue;
            } else {
                break;
            }
        }

        return $this->json([
            'decks_revised' => count($decks),
            'flashcards_revised' => $flashcards,
            'total_minutes' => $minutes,
            'streak' => $streak,
            'last_activity' => $logs[0]->getCreatedAt()->format('c')
        ]);
    }
}
