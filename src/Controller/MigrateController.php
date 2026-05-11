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
}
