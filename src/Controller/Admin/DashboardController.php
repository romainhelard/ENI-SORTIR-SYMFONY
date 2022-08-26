<?php

namespace App\Controller\Admin;

use App\Entity\City;
use App\Entity\GoOut;
use App\Entity\Place;
use App\Entity\State;
use App\Entity\Campus;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
        
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
        ->setController(GoOutCrudController::class)
        ->generateUrl();
        
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ENI SORTIR.COM');
    }

    public function configureMenuItems(): iterable
    {
        // Création du Dashboard
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-dashboard');
        yield MenuItem::linkToRoute('Retour au site', 'fa fa-home', 'app_home');
        // Création des sections
        yield MenuItem::section('Evenements');
        yield MenuItem::linkToCrud('Ajouter un Evenement', 'fas fa-plus', GoOut::class)->setAction(Crud::PAGE_NEW);
        yield MenuItem::linkToCrud('Voir les Evenements', 'fas fa-calendar-check', GoOut::class);

        yield MenuItem::section('Campus');
        yield MenuItem::linkToCrud('Ajouter un Campus', 'fas fa-plus', Campus::class)->setAction(Crud::PAGE_NEW);
        yield MenuItem::linkToCrud('Voir les Campus', 'fas fa-school', Campus::class);

        yield MenuItem::section('Lieux');
        yield MenuItem::linkToCrud('Ajouter un Lieu', 'fas fa-plus', Place::class)->setAction(Crud::PAGE_NEW);
        yield MenuItem::linkToCrud('Voir les Lieux', 'fas fa-map-location-dot', Place::class);

        yield MenuItem::section('Ville');
        yield MenuItem::linkToCrud('Ajouter une Ville', 'fas fa-plus', City::class)->setAction(Crud::PAGE_NEW);
        yield MenuItem::linkToCrud('Voir les Villes', 'fas fa-city', City::class);

        yield MenuItem::section('Etat');
        yield MenuItem::linkToCrud('Ajouter un Etat', 'fas fa-plus', State::class)->setAction(Crud::PAGE_NEW);
        yield MenuItem::linkToCrud('Voir les Etats', 'fas fa-arrows-rotate', State::class);

        yield MenuItem::section('Utilisateur');
        yield MenuItem::linkToCrud('Ajouter un Utilisateur', 'fas fa-plus', User::class)->setAction(Crud::PAGE_NEW);
        yield MenuItem::linkToCrud('Voir les Utilisateurs', 'fas fa-user-group', User::class);


    }
}
