<?php

namespace App\Controller\Admin\Classrooms;

use App\Entity\Classroom;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ClassroomCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Classroom::class;
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
