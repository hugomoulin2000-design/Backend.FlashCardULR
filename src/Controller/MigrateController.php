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
    public function debugDbInfo(Connection $conn): Response
    {
        $params = $conn->getParams();

        return new Response('<pre>' . print_r($params, true) . '</pre>');
    }

    #[Route('/debug-user-query')]
    public function debugUserQuery(Connection $conn): Response
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
