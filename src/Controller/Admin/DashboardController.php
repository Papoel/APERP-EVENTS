<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Events\EventsCrudController;
use App\Entity\Events;
use App\Entity\Level;
use App\Entity\Students;
use App\Entity\Teacher;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
    }

    #[IsGranted('ROLE_ADMIN', message: "Cet espace est réservé aux administrateur de l'APE.", statusCode: 404)]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->setController(EventsCrudController::class)
            ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('APERP - Administration');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Site', 'far fa-eye', 'app_home')
            ->setCssClass('text-info');

        yield MenuItem::subMenu( 'Événements', "fas fa-calendar-alt")->setSubItems([
              MenuItem::linkToCrud('Tous les événements', 'fas fa-calendar-check', Events::class),
              MenuItem::linkToCrud('Ajouter un événement', 'fas fa-plus', Events::class)
                  ->setAction(Crud::PAGE_NEW),
        ]);

        yield MenuItem::subMenu( 'Classes', "fas fa-school")->setSubItems([
              MenuItem::linkToCrud('Toutes les classes', 'fas fa-folder-open', Level::class),
        ]);

        // Refus d'ajout => Relation
        yield MenuItem::subMenu( 'Elèves', "fas fa-baby")->setSubItems([
              MenuItem::linkToCrud('Tous les élèves', 'fas fa-graduation-cap', Students::class),
              MenuItem::linkToCrud('Ajouter un élève', 'fas fa-plus', Students::class)
                  ->setAction(Crud::PAGE_NEW),
        ]);

        yield MenuItem::subMenu( 'Professeurs', "fas fa-chalkboard-teacher")->setSubItems([
              MenuItem::linkToCrud('Tous les professeurs', 'fas fa-chalkboard-teacher', Teacher::class),
              MenuItem::linkToCrud('Ajouter un professeur', 'fas fa-plus', Teacher::class)
                  ->setAction(Crud::PAGE_NEW),
        ]);

        yield MenuItem::subMenu( 'Parents', "fas fa-users")->setSubItems([
              MenuItem::linkToCrud('Tous les parents', 'fas fa-user', User::class),
              MenuItem::linkToCrud('Ajouter un parent', 'fas fa-plus', User::class)
                  ->setAction(Crud::PAGE_NEW),
        ]);


    }
}
