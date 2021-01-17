<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Cadeau;
use App\Entity\Categorie;

class CadeauFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //catégories
        $categorie1 = new categorie();
        $categorie1->setNom('Jeux Vidéo');
        $manager->persist($categorie1);
        
        $categorie2 = new categorie();
        $categorie2->setNom('Jeux de société');
        $manager->persist($categorie2);
        
        $categorie3 = new categorie();
        $categorie3->setNom('Multimédia');
        $manager->persist($categorie3);
        
        $categorie4 = new categorie();
        $categorie4->setNom('Livre');
        $manager->persist($categorie4);
        
        $categorie5 = new categorie();
        $categorie5->setNom('Sport');
        $manager->persist($categorie5);

        //cadeaux
        $cadeau1 = new Cadeau();
        $cadeau1->setCategorie($categorie1);
        $cadeau1->setDesignation('PS4');
        $cadeau1->setAgeMinimum(3);
        $cadeau1->setPrix(500);
        $manager->persist($cadeau1);
        
        $cadeau2 = new Cadeau();
        $cadeau2->setCategorie($categorie2);
        $cadeau2->setDesignation('Monopoly');
        $cadeau2->setAgeMinimum(6);
        $cadeau2->setPrix(20);
        $manager->persist($cadeau2);

        $cadeau3 = new Cadeau();
        $cadeau3->setCategorie($categorie3);
        $cadeau3->setDesignation('Samsung S123');
        $cadeau3->setAgeMinimum(10);
        $cadeau3->setPrix(1500);
        $manager->persist($cadeau3);
        
        $cadeau4 = new Cadeau();
        $cadeau4->setCategorie($categorie4);
        $cadeau4->setDesignation('Petit ours brun');
        $cadeau4->setAgeMinimum(3);
        $cadeau4->setPrix(10);
        $manager->persist($cadeau4);
        
        $cadeau5 = new Cadeau();
        $cadeau5->setCategorie($categorie5);
        $cadeau5->setDesignation('Billard américain');
        $cadeau5->setAgeMinimum(5);
        $cadeau5->setPrix(800);
        $manager->persist($cadeau5);

        $manager->flush();
    }
}
