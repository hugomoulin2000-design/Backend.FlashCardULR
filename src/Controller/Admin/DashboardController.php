<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // return $this->redirectToRoute('admin_user_index');

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirectToRoute('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
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
        yield MenuItem::linkTo(\App\Controller\Admin\DeckCrudController::class, 'Decks', 'fa fa-layer-group');
        yield MenuItem::linkTo(\App\Controller\Admin\FlashcardCrudController::class, 'Flashcards', 'fa fa-clone');
        yield MenuItem::linkTo(\App\Controller\Admin\TagCrudController::class, 'Tags', 'fa fa-tags');
        yield MenuItem::linkTo(\App\Controller\Admin\UserCrudController::class, 'Utilisateurs', 'fa fa-user');
        yield MenuItem::linkTo(\App\Controller\Admin\RevisionLogCrudController::class, 'Revisions', 'fa fa-layer-group');

        yield MenuItem::section('Compte');
        yield MenuItem::linkToLogout('Déconnexion', 'fa fa-sign-out');
    }
}
