<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;
use App\Entity\Article;
use App\Repository\CoursRepository;
use App\Entity\Cours;

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
