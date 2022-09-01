<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MyEventsController extends AbstractController
{
    #[Route('/my/events', name: 'app_my_events')]
    public function index(): Response
    {
        
        return $this->render('my_events/index.html.twig', [
        ]);
    }
}
