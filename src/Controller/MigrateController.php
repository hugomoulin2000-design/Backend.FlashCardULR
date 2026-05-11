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
public function debugDbInfo(\Doctrine\DBAL\Connection $conn): Response
{
    $params = $conn->getParams();

    $info = [
        'driver' => $conn->getDriver()->getName(),
        'dbname' => $params['dbname'] ?? null,
        'host' => $params['host'] ?? null,
        'port' => $params['port'] ?? null,
        'user' => $params['user'] ?? null,
        'schema' => $params['schema'] ?? null,
        'url' => $params['url'] ?? null,
    ];

    return new Response('<pre>' . print_r($info, true) . '</pre>');
}

   #[Route('/debug-user-query')]
public function debugUserQuery(\Doctrine\DBAL\Connection $conn): Response
{
    $sql = "
        SELECT column_name, data_type 
        FROM information_schema.columns 
        WHERE table_schema = 'public'
        AND table_name = 'user'
    ";

    $columns = $conn->fetchAllAssociative($sql);

    return new Response('<pre>' . print_r($columns, true) . '</pre>');
}



}
