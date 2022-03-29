<?php

namespace App\Controller\Admin\Childrens;

use App\Entity\Children;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ChildrenCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Children::class;
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
