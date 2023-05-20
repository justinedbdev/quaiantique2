<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Entity\Horaire;
use App\Entity\Image;
use App\Entity\Menu;
use App\Entity\Plat;
use App\Entity\Reservation;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ) {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(ReservationCrudController::class)
            ->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Quai Antique');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Tableau de bord');

        yield MenuItem::linkToRoute('Homepage', 'fas fa-house', 'homepage');

        yield MenuItem::section('Réservation');

        yield MenuItem::subMenu('Reservation', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter une réservation', 'fas fa-plus', Reservation::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher les réservation', 'fas fa-eye', Reservation::class)
        ]);

        yield MenuItem::section('Carte du restaurant');

        yield MenuItem::subMenu('Plats', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter un plat', 'fas fa-plus', Plat::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher les plats', 'fas fa-eye', Plat::class)
        ]);

        yield MenuItem::subMenu('Categories', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter une categorie', 'fas fa-plus', Categorie::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher les categories', 'fas fa-eye', Categorie::class)
        ]);

        yield MenuItem::section('Menus du restaurant');

        yield MenuItem::subMenu('Menus', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter un menu', 'fas fa-plus', Menu::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher les menus', 'fas fa-eye', Menu::class)
        ]);

        yield MenuItem::section('Galerie photos');

        yield MenuItem::subMenu('Images', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter une images', 'fas fa-plus', Image::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher les images', 'fas fa-eye', Image::class)
        ]);

        yield MenuItem::section('Horaires du restaurant');

        yield MenuItem::subMenu('Horaires', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter un horaire', 'fas fa-plus', Horaire::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher les horaires', 'fas fa-eye', Horaire::class)
        ]);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);

    }
}
