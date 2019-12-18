<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Article;
use App\Entity\Categorie;


class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $categories = ['sports', 'arts', 'musique', 'cuisine'];
        for($i=0;$i<count($categories);$i++) {
            $categorie = new Categorie();
            $categorie->setLibelle($categories[$i]);
            $manager->persist($categorie);

            for($j=1;$j<=\mt_rand(2,6);$j++) {
                $article = new Article();
                $article->setTitre("Article N°" . $j);
                $article->setCorps("bla bla bla");
                $article->setCreeLe(new \DateTime());
                $article->setAuteur("Laurent");
                $article->setCategorie($categorie);
                $manager->persist($article);
            }
        }

        $manager->flush();
    }
}
