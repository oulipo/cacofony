<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Article;


class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        for($i=1;$i<=10;$i++) {
            $article = new Article();
            $article->setTitre("Article N°" . $i);
            $article->setCorps("bla bla bla");
            $article->setCreeLe(new \DateTime());
            $article->setAuteur("Laurent");
            $manager->persist($article);
        }

        $manager->flush();
    }
}
