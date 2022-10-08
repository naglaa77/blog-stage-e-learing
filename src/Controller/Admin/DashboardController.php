<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\ContactUs;
use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\Ressources;
use App\Entity\Topic;
use App\Entity\Type;
use App\Entity\Cours;
use App\Repository\UserRepository;
use App\Repository\ArticleRepository;
use App\Repository\ContactUsRepository;
use App\Repository\RessourcesRepository;
use App\Repository\CoursRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\UX\Chartjs\ChartjsBundle;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;
use App\Service\CsvExporter;


class DashboardController extends AbstractDashboardController
{
    public function configureAssets(): Assets
    {
        return parent::configureAssets()
            // ->addWebpackEncoreEntry('app')
            // ->addCssFile('bundle/app.css')
            ->addJsFile('build/app.js');
    }
    

    private ChartBuilderInterface $chartBuilder;

    public function __construct(ChartBuilderInterface $chartBuilder, CoursRepository $coursRepository, UserRepository $userRepository, ArticleRepository $articleRepository, ContactusRepository $contactUsRepository, RessourcesRepository $ressourcesRepository)
    {
        $this->chartBuilder = $chartBuilder;
        $this->userRepository = $userRepository;
        $this->articleRepository = $articleRepository;
        $this->contactUsRepository = $contactUsRepository;
        $this->ressourcesRepository = $ressourcesRepository;
        $this->coursRepository = $coursRepository;
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $latestUsers = $this->userRepository
        ->findLatest();
        $latestArticles = $this->articleRepository
        ->findLatest();
        $latestContactuss = $this->contactUsRepository
        ->findLatest();
        $latestRessourcess = $this->ressourcesRepository
        ->findLatest();
        $latestCourss = $this->coursRepository
        ->findLatest();
        
        return $this->render('admin/index.html.twig', [
            'chart' => $this->createChart(),
            'latestUsers' => $latestUsers,
            'latestArticles' => $latestArticles,
            'latestContactuss' => $latestContactuss,
            'latestRessourcess' => $latestRessourcess,
            'latestCourss' => $latestCourss,
        ]);
    }


    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('L Tech');
    }

    public function configureCrud(): Crud
    {
        return parent::configureCrud()
            ->setDefaultSort(
                ['id'=> 'DESC',]
                );
    }
    public function configureActions(): Actions
    {
        return parent::configureActions()
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-dashboard');
        yield MenuItem::linkToUrl('Accueil', 'fas fa-home', '/');


        yield MenuItem::section('Administrateurs', 'fas fa-users');
        yield MenuItem::subMenu('Users', 'fas fa-list-ul m-2')
            ->setSubItems([
                MenuItem::linkToCrud('Créer', 'fas fa-plus', User::class)
                    ->setController(UserCrudController::class)
                    ->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Afficher', 'fas fa-eye', User::class)
                    ->setController(UserCrudController::class),
                MenuItem::linkToCrud('En attente', 'fa fa-warning', User::class)
                    ->setController(EnattenteCrudController::class),
                MenuItem::linkToCrud('Approuvé', 'fas fa-thumbs-up', User::class)
                    ->setController(ApprouveCrudController::class)
                ]);
        yield MenuItem::section('Contact Us', 'fas fa-message');
        yield MenuItem::subMenu('Messages', 'fas fa-list-ul m-2')->setSubItems([
            MenuItem::linkToCrud('Créer', 'fas fa-plus ', ContactUs::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher', 'fas fa-eye', ContactUs::class)
        ]);

        yield MenuItem::section('Blogs', 'fas fa-newspaper');
        yield MenuItem::subMenu('Article', 'fas fa-list-ul m-2')->setSubItems([
            MenuItem::linkToCrud('Créer', 'fas fa-plus ', Article::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher', 'fas fa-eye', Article::class)
        ]);
        yield MenuItem::subMenu('Category', 'fas fa-list-ul m-2')->setSubItems([
            MenuItem::linkToCrud('Créer', 'fas fa-plus ', Category::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher', 'fas fa-eye', Category::class)
        ]);
        yield MenuItem::subMenu('Comment', 'fas fa-list-ul m-2')->setSubItems([
            MenuItem::linkToCrud('Créer', 'fas fa-plus ', Comment::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher', 'fas fa-eye', Comment::class)
        ]);
        yield MenuItem::section('Ressources', 'fas fa-file');
        yield MenuItem::subMenu('Ressources', 'fas fa-list-ul m-2')->setSubItems([
            MenuItem::linkToCrud('Créer', 'fas fa-plus ', Ressources::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher', 'fas fa-eye', Ressources::class)
        ]);
        yield MenuItem::subMenu('Topic', 'fas fa-list-ul m-2')->setSubItems([
            MenuItem::linkToCrud('Créer', 'fas fa-plus ', Topic::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher', 'fas fa-eye', Topic::class)
        ]);
        yield MenuItem::section('Cours', 'fas fa-file');
        yield MenuItem::subMenu('Cours', 'fas fa-list-ul m-2')->setSubItems([
            MenuItem::linkToCrud('Créer', 'fas fa-plus ', Cours::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher', 'fas fa-eye', Cours::class)
        ]);
        yield MenuItem::subMenu('Type', 'fas fa-list-ul m-2')->setSubItems([
            MenuItem::linkToCrud('Créer', 'fas fa-plus ', Type::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher', 'fas fa-eye', Type::class)
        ]);

    }

    #[Route('/admin/login')]
    public function adminLogin()
    {
        return new Response('Pretend admin login page, that should be public');
    }


    private function createChart(): Chart
    {
        $chart = $this->chartBuilder->createChart(Chart::TYPE_LINE);
        $chart->setData([
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'My First dataset',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [0, 10, 5, 2, 20, 30, 45],
                ],
            ],
        ]);
        $chart->setOptions([
            'scales' => [
                'y' => [
                   'suggestedMin' => 0,
                   'suggestedMax' => 100,
                ],
            ],
        ]);
        return $chart;
    }


}
