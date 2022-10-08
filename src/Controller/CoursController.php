<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CoursRepository;
use App\Entity\Cours;
use App\Entity\Type;
use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Twig\Extra\Markdown\MarkdownExtension;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityManager;
use Symfony\Contracts\Translation\TranslatorInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;
use Pagerfanta\Doctrine\ORM\QueryAdapter;
use Pagerfanta\Pagerfanta;
use Psr\Log\LoggerInterface;

class CoursController extends AbstractController
{
    #[Route('/cours', name: 'app_cours')]
    public function index(CoursRepository $coursRepository, TypeRepository $typeRepository, ManagerRegistry $doctrine): Response
    {
        $courss = $coursRepository->findAll();
        $types = $typeRepository->findAll();

        return $this->render('cours/index.html.twig', [
            'courss' => $courss,
            'types' => $types
        ]);
    }
    #[Route('/cours/{slugC}', name: 'cours_show')]
    public function show(Cours $cours, TypeRepository $typeRepository, Request $request, ManagerRegistry $doctrine): Response
    {
        $types = $cours->getType();
        return $this->render('cours/show.html.twig', [
            'cours' => $cours,
            'typeRepository' => $typeRepository,
        ]);
    }
}
