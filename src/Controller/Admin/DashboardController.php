<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use App\Entity\Deck;
use App\Entity\Flashcard;
use App\Entity\Tag;
use App\Entity\User;
use App\Entity\RevisionLog;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Projetl2');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Gestion des données');
        yield MenuItem::linkToCrud('Decks', 'fa fa-layer-group', Deck::class);
        yield MenuItem::linkToCrud('Flashcards', 'fa fa-clone', Flashcard::class);
        yield MenuItem::linkToCrud('Tags', 'fa fa-tags', Tag::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fa fa-user', User::class);
        yield MenuItem::linkToCrud('Revisions', 'fa fa-history', RevisionLog::class);

        yield MenuItem::section('Compte');
        yield MenuItem::linkToLogout('Déconnexion', 'fa fa-sign-out');
    }
}
