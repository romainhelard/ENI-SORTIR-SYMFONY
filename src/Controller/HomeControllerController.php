<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\GoOut;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Mime\Email;
use App\Repository\UserRepository;
use App\Repository\GoOutRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeControllerController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(GoOutRepository $gooutrepo, UserRepository $users, MailerInterface $mailer): Response
    {
        // Recherche des evenement en BDD
        $events = $gooutrepo->findAll();
        
        $email = (new Email())
        ->from('hello@example.com')
        ->to('you@example.com')
        ->subject('Time for Symfony Mailer!')
        ->text('Sending emails is fun again!')
        ->html('<p>See Twig integration for better HTML integration!</p>');
    $mailer->send($email);
        
    // Affichage dans le template : events.nom
        return $this->render('home_controller/index.html.twig', [
            'controller_name' => 'HomeController',
            'events' => $events,
            'users' => $users
        ]);
    }

    #[Route('/events/{id}', name:'app_details')]
    public function detail(GoOut $events) : Response
    {
        $participants = $events->getUsers();
        
        return $this->render('home_controller/detail.html.twig', [
            'events' => $events,
            'participants' => $participants
        ]);
    }     

    #[Route('/{id}', name:'app_addParticipants')]
    public function addParticipants(GoOut $events, EntityManagerInterface $em) : Response
    {
        
        $events->addUser($this->getUser());
        $em->persist($events);
        $em->flush();
        
        return $this->redirectToRoute('app_details', ['id' => $events->getId()]);
    }     

}

