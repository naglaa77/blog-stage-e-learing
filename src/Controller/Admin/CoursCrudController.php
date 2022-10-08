<?php

namespace App\Controller\Admin;

use App\Entity\Cours;
use App\Entity\Type;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayCollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class CoursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cours::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titleC', 'Title'),
            TextField::new('descriptionC', 'Description'),
            TextField::new('slugC', 'Slug'),
            TextField::new('imageC', 'image'),
            TextEditorField::new('aboutC', 'About')->hideOnIndex(),
            BooleanField::new('publishedC', 'Published'),
            DateTimeField::new('createdatC', 'Created At'),
            TextField::new('link1C', 'Link 1')->hideOnIndex(),
            TextField::new('link2C', 'Link 2')->hideOnIndex(),
            TextField::new('modules1', 'Modules 1')->hideOnIndex(),
            TextField::new('modules2', 'Modules 2')->hideOnIndex(),
            TextField::new('modules3', 'Modules 3')->hideOnIndex(),
            TextField::new('modules4', 'Modules 4')->hideOnIndex(),
            IntegerField::new('modulesN', 'Modules Number')->hideOnIndex(),
            TextField::new('durationC', 'Duration')->hideOnIndex(),
            TextField::new('costC', 'Cost'),
            TextField::new('levelC', 'Level')->hideOnIndex(),
            TextField::new('certificateC', 'Certificate')->hideOnIndex(),
            AssociationField::new('type'),
        ];
    }
    
}
