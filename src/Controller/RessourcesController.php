<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Ressources;
use App\Entity\Topic;
use App\Service\MarkdownHelper;
use Doctrine\ORM\EntityManagerInterface;
use Pagerfanta\Doctrine\ORM\QueryAdapter;
use Pagerfanta\Pagerfanta;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\RessourcesRepository;
use App\Repository\TopicRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Twig\Extra\Markdown\MarkdownExtension;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;

class RessourcesController extends AbstractController
{
    #[Route('/ressources', name: 'app_ressources')]
    public function index(RessourcesRepository $ressourcesRepository, TopicRepository $topicRepository, ManagerRegistry $doctrine): Response
    {
        $topics = $topicRepository->findAll();
        $ressourcess = $ressourcesRepository->findAll();

        return $this->render('ressources/index.html.twig', [
            'topics' => $topics,
            'ressourcess' => $ressourcess
        ]);

    }
}
