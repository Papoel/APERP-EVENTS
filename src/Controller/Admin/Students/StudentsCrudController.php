<?php

namespace App\Controller\Admin\Students;

use App\Entity\Students;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class StudentsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Students::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
