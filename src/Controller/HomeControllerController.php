<?php

namespace App\Controller;

use App\Entity\GoOut;
use App\Repository\GoOutRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeControllerController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(GoOutRepository $gooutrepo): Response
    {
        // Recherche des evenement en BDD
        $events = $gooutrepo->findAll();

        // Affichage dans le template : events.nom
        return $this->render('home_controller/index.html.twig', [
            'controller_name' => 'HomeController',
            'events' => $events
        ]);
    }
}
