<?php

namespace App\Controller\Admin;

use App\Entity\Flashcard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class FlashcardCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Flashcard::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextareaField::new('question'),
            TextareaField::new('answer'),

            DateTimeField::new('creeLe')
                ->hideOnForm(),

            IntegerField::new('difficulte'),

            AssociationField::new('deck'),
        ];
    }
}
