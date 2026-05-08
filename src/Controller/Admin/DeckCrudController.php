<?php

namespace App\Controller\Admin;

use App\Entity\Deck;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

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

            TextField::new('titre', 'Nom du deck'),

            TextField::new('description', 'Description du deck'),


            TextField::new('imageFile')
                ->setFormType(VichImageType::class)
                ->onlyOnForms(),

            ImageField::new('imageName')
                ->setBasePath('/uploads/decks')
                ->onlyOnIndex(),


            AssociationField::new('tags', 'Tags')
                ->setFormTypeOptions([
                    'by_reference' => false, // indispensable pour ManyToMany
                ])
                ->autocomplete(),
        ];
    }
}
