<?php

namespace App\Controller\Admin;

use App\Entity\RevisionLog;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class RevisionLogCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RevisionLog::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('user', 'Utilisateur'),
            AssociationField::new('deck', 'Deck'),
            IntegerField::new('flashcards_count', 'Cartes révisées'),
            IntegerField::new('duration_seconds', 'Durée (secondes)'),
            DateTimeField::new('created_at', 'Date')->hideOnForm(),
        ];
    }
}