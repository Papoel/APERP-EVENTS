<?php

namespace App\Controller\Admin\Students;

use App\Entity\Students;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class StudentsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Students::class;
    }


    public function configureFields(string $pageName): iterable
    {

        yield TextField::new('firstname', 'Prénom');

        yield TextField::new('lastname', 'Nom');

        yield IntegerField::new('age', 'Age');

        Yield BooleanField::new('isExterne', 'Extérieur ?');

        Yield AssociationField::new('users', 'Responsable légal');

    }

}
