<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Comment;
use App\Entity\Category;
use App\Form\CommentType;
use Doctrine\ORM\EntityManager;
use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Twig\Extra\Markdown\MarkdownExtension;
use Doctrine\Common\Collections\Collection;
use Knp\Component\Pager\PaginatorInterface;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;




class BloguesController extends AbstractController
{
    #[Route('/blogues', name: 'app_blogues')]
    public function index(ArticleRepository $articleRepository, ManagerRegistry $doctrine,PaginatorInterface $paginator,Request $request): Response
    {
        // $articles = $articleRepository->findAll();
        $articles= $paginator->paginate(
                $articleRepository->findAll(), /* query NOT result */
                $request->query->getInt('page', 1), /*page number*/
                3 /*limit per page*/
            );
        return $this->render('blogues/index.html.twig', [
            // 'controller_name' => 'BloguesController',
            'articles' => $articles
        ]);
    }

    #[Route('/blogues/{slug}', name: 'blogues_show')]
    public function show(Article $article, CategoryRepository $categoryRepository, Request $request, ManagerRegistry $doctrine)
    {
 
        $categorys = $article->getCategory();
        $comment = new Comment($article);
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
