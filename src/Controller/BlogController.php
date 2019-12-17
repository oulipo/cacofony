<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(ArticleRepository $repo)
    {
        $articles = $repo->findAll();
        return $this->render('blog/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/blog/contact", name="contact")
     */
    public function contact() {
        return $this->render('blog/contact.html.twig');
    }

    /**
     * @Route("/blog/article/{id}", name="detail")
     */
    public function detail(Article $article) {

        return $this->render('blog/detail.html.twig', [
            'article' => $article,
        ]);
    }

    /**
     * @Route("/blog/creer", name="creer")
     */
    public function creer(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $article = new Article();
        $form = $this->createFormBuilder($article)
                     ->add('titre')
                     ->add('corps')
                     ->add('auteur')
                     ->add('creer', SubmitType::class)
                     ->getForm();

        return $this->render('blog/creer.html.twig', [
            'monFormulaire' => $form->createView()
        ]);
    }
}

