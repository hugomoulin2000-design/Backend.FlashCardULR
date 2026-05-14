<?php

namespace App\Controller\Admin;

use App\Entity\Flashcard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class FlashcardCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Flashcard::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextareaField::new('question', 'Question'),
            TextareaField::new('answer', 'Réponse'),
            AssociationField::new('deck', 'Deck'),
            DateTimeField::new('creeLe', 'Créé le')->hideOnForm(),
        ];
    }
}