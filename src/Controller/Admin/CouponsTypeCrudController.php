<?php

namespace App\Controller\Admin;

use App\Entity\CouponsType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CouponsTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CouponsType::class;
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
