<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserProfilController extends AbstractController
{

    #[Route('/users', name:'app_profil')]
    public function profil() : Response
    {

        return $this->render('user_profil/profil.html.twig', [
            
        ]);
    }

}
