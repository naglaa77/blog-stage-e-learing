<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;
use App\Entity\Article;
use App\Entity\Comment;
use App\Entity\Category;
use App\Form\CommentType;
use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Twig\Extra\Markdown\MarkdownExtension;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityManager;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use App\Repository\CommentRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;




class BloguesController extends AbstractController
{
    #[Route('/blogues', name: 'app_blogues')]
    public function index(ArticleRepository $articleRepository, ManagerRegistry $doctrine): Response
    {
        $articles = $articleRepository->findAll();

        return $this->render('blogues/index.html.twig', [
            // 'controller_name' => 'BloguesController',
            'articles' => $articles
        ]);
    }

    #[Route('/blogues/{slug}', name: 'blogues_show')]
    public function show(Article $article, CategoryRepository $categoryRepository, Request $request, ManagerRegistry $doctrine)
    {
 
        $categorys = $article->getCategory();
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            // $comment->setCreatedatCom(new DateTime());
            $comment->setArticle($article);


            $entityManager = $doctrine->getManager();
            $entityManager->persist($comment);
            $entityManager->flush();

            $this->addFlash('success', 'Votre commentaire a été écrit!');
        }

        return $this->render('blogues/show.html.twig', [
            'article' => $article,
            'categoryRepository' => $categoryRepository,
            'commentForm' => $form->createView(),
  
        ]);
    }

}
