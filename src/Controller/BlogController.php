<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Entity\Categorie;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


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
    public function contact(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $contact = new \App\Entity\Contact();
        $form = $this->createForm(\App\Form\ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact->setCreatedAt(new \DateTime());
            $em->persist($contact);
            $em->flush();
            return $this->redirectToRoute('blog');
        }

        return $this->render('blog/contact.html.twig', [
            'myform' => $form->createView(),
        ]);
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
     * @Route("/blog/article/{id}/edit", name="editer")
     */
    public function creer(Request $request, Article $article = null) {
        $em = $this->getDoctrine()->getManager();

        if(!$article) {
            $article = new Article();
        }
        
        $form = $this->createFormBuilder($article)
                     ->add('titre')
                     ->add('corps')
                     ->add('categorie', EntityType::class, [
                         'class' => Categorie::class,
                         'choice_label' => 'libelle'
                     ])
                     ->add('auteur')
                     ->add('creer', SubmitType::class)
                     ->getForm();
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if (!$article->getId()) {
                $article->setCreeLe(new \DateTime());
            }
            $em->persist($article);
            $em->flush();
            return $this->redirectToRoute('blog');
        }

        return $this->render('blog/creer.html.twig', [
            'monFormulaire' => $form->createView(),
            'edition' => ($article->getId() !== null) ? true : false
        ]);
    }

    
}

