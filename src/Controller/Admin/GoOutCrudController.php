<?php

namespace App\Controller\Admin;

use App\Entity\GoOut;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GoOutCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return GoOut::class;
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
