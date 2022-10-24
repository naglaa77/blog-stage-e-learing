<?php

namespace App\Controller;

use App\Entity\Cours;
use App\Entity\Article;
use App\Repository\CoursRepository;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        $latestArticles = $this->articleRepository
        ->findLatest();
        $latestCourss = $this->coursRepository
        ->findLatest();

        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'latestArticles' => $latestArticles,
            'latestCourss' => $latestCourss,
        ]);
    }

    public function configureAssets(): Assets
    {
        return parent::configureAssets()
            ->addWebpackEncoreEntry('admin.css');
    }

    public function __construct(ArticleRepository $articleRepository, CoursRepository $coursRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->coursRepository = $coursRepository;

    }
}
