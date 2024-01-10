<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Article;
use App\Form\ArticlesType;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article')]
    public function index(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    #[Route('/article/add', name:'articles_add')]
    public function annonces_add(ManagerRegistry $doctrine, Request $request)
    {
        $entityManager = $doctrine->getManager();
        
        $article = new Article();
        $article->setDatePub(new \DateTimeImmutable());

        $formArticle = $this->createForm(ArticlesType::class, $article);

        $formArticle->handleRequest($request);
        if($formArticle->isSubmitted() && $formArticle->isValid()){
            $entityManager->persist($article);
            $entityManager->flush();

            $this->addFlash('sucess', "L'article a bien ete ajoutee!");

            return $this->redirectToRoute('app_home');
        }

        return $this->render('article/form-add.html.twig', [
            'formArticle' => $formArticle->createView()
        ]);
    }
}
