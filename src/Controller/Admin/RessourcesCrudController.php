<?php

namespace App\Controller\Admin;

use App\Entity\Ressources;
use App\Entity\Topic;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayCollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RessourcesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ressources::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titleRes', 'Title'),
            TextField::new('descriptionRes', 'Description'),
            TextField::new('linkRes', 'Link'),
            AssociationField::new('topic'),

        ];
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('titleRes')
            ;
    }
    
}
