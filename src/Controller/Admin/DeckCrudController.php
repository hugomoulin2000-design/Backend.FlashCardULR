<?php

namespace App\Controller\Admin;

use App\Entity\Deck;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class DeckCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Deck::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titre', 'Titre'),
            TextareaField::new('description', 'Description'),
            IntegerField::new('difficulte', 'Difficulté'),
            AssociationField::new('user', 'Utilisateur'),
            AssociationField::new('tags', 'Tags')->setFormTypeOption('by_reference', false),
            DateTimeField::new('creeLe', 'Créé le')->hideOnForm(),
        ];
    }
}