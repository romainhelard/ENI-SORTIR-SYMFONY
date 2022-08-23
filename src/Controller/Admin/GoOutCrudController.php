<?php

namespace App\Controller\Admin;

use App\Entity\GoOut;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class GoOutCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return GoOut::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            AssociationField::new('campus', 'Campus'),
            AssociationField::new('place', 'Lieux'),
            DateField::new('dateHeureDebut'),
            DateField::new('dateLimiteInscription'),
            NumberField::new('nbInscriptionsMax'),
            TextEditorField::new('infosSortie'),
            AssociationField::new('state', 'Etat')
        ];
    }
    
}
