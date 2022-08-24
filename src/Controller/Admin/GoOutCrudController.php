<?php

namespace App\Controller\Admin;

use App\Entity\GoOut;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GoOutCrudController extends AbstractCrudController
{
    public const EVENTS_BASE_PATH = 'uploads/images/events';
    public const EVENTS_UPLOAD_PATH = 'public/uploads/images/events';


    public static function getEntityFqcn(): string
    {
        return GoOut::class;
    }

    public function configureCrud(Crud $crud): Crud
        {
            return $crud
                ->setEntityLabelInSingular('Evenement')
                ->setEntityLabelInPlural('Vos Evenements')
            ;
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
            TimeField::new('duree', 'Durée de l\'Activité'),
            NumberField::new('nbInscriptionsMax'),
            ImageField::new('Affiche')
                ->setBasePath(self::EVENTS_BASE_PATH)
                ->setUploadDir(self::EVENTS_UPLOAD_PATH),
            TextEditorField::new('infosSortie'),
            AssociationField::new('state', 'Etat')
        ];
    }
    
}
