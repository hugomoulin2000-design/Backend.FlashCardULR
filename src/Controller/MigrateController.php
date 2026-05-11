<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MigrateController extends AbstractController
{
    #[Route('/migrate', name: 'app_migrate')]
    public function migrate(): Response
    {
        // Exécuter la migration depuis le bon chemin
        $output = shell_exec('php /app/bin/console doctrine:migrations:migrate --no-interaction 2>&1');

        return new Response(nl2br($output));
    }

   #[Route('/debug-db-info')]
public function debugDbInfo(): Response
{
    $conn = $this->getDoctrine()->getConnection();

    $info = [
        'driver' => $conn->getDriver()->getName(),
        'database' => $conn->getDatabase(),
        'host' => $conn->getParams()['host'] ?? null,
        'port' => $conn->getParams()['port'] ?? null,
        'user' => $conn->getParams()['user'] ?? null,
        'schema' => $conn->getParams()['schema'] ?? null,
        'url' => $conn->getParams()['url'] ?? null,
    ];

    return new Response('<pre>' . print_r($info, true) . '</pre>');
}

    #[Route('/debug-user-query')]
public function debugUserQuery(): Response
{
    $conn = $this->getDoctrine()->getConnection();

    $sql = "SELECT column_name, data_type 
            FROM information_schema.columns 
            WHERE table_name = 'user'";

    $columns = $conn->fetchAllAssociative($sql);

    return new Response('<pre>' . print_r($columns, true) . '</pre>');
}


}
