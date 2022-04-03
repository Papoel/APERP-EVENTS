<?php

namespace App\Controller\Admin\Events;

use App\Entity\Events;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EventsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Events::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name', 'Nom de l\'événement');

        yield SlugField::new('slug')
            ->setTargetFieldName('name');

        yield TextField::new('location', 'Lieu de l\'événement');

        yield TextEditorField::new('description', 'Description');

        yield DateTimeField::new('startsAt', 'Début de l\'événement');

        yield DateTimeField::new('finishAt', 'Fin de l\'événement');

        yield NumberField::new('price', 'Prix');

        yield IntegerField::new('capacity', 'Places disponibles');

    }

}
