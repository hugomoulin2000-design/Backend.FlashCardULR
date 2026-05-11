<?php

namespace App\Controller\Api;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ClassementApiController extends AbstractController
{
    #[Route('/api/classement', methods: ['GET'])]
    public function rankingAll(EntityManagerInterface $em): Response
    {
        $conn = $em->getConnection();

        // requete pour toute les stats
        $sql = "
            SELECT u.id, u.username, u.image_name,
                   COUNT(DISTINCT r.deck_id) AS decks_revised,
                   SUM(r.flashcards_count) AS flashcards_revised,
                   SUM(r.duration_seconds) AS total_seconds,
                   MAX(r.created_at) AS last_activity
            FROM user u
            LEFT JOIN revision_log r ON r.user_id = u.id
            GROUP BY u.id
        ";

        $rows = $conn->executeQuery($sql)->fetchAllAssociative();

        // copie de toute les données
        $ranking = [
            'flashcards' => $rows,
            'decks'      => $rows,
            'time'       => $rows,
        ];

        // tri par flashcards révisees
        usort($ranking['flashcards'], fn($a, $b) =>
            ($b['flashcards_revised'] ?? 0) <=> ($a['flashcards_revised'] ?? 0)
        );

        // tri par decks révisés
        usort($ranking['decks'], fn($a, $b) =>
            ($b['decks_revised'] ?? 0) <=> ($a['decks_revised'] ?? 0)
        );

        // yri par temps de revision
        usort($ranking['time'], fn($a, $b) =>
            ($b['total_seconds'] ?? 0) <=> ($a['total_seconds'] ?? 0)
        );

        return $this->json($ranking);
    }
}
