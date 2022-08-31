<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use phpDocumentor\Reflection\Types\Boolean;

class UserCrudController extends AbstractCrudController
{
    public const USERS_BASE_PATH = 'uploads/images/profil';
    public const USERS_UPLOAD_PATH = 'public/uploads/images/profil';

    public static function getEntityFqcn(): string
    {
        return User::class;
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            TextField::new('prenom'),
            TextField::new('telephone'),
            EmailField::new('email'),
            TextField::new('password'),
            ImageField::new('photoProfil')
                ->setBasePath(self::USERS_BASE_PATH)
                ->setUploadDir(self::USERS_UPLOAD_PATH)
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]')
                ->formatValue(static function ($value, User $user) {
                    return $user->getPhotoProfilUrl();
                }),
            BooleanField::new('isActivate', 'Actif')
        ];
    }
    
}
