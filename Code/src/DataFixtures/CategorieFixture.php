<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\categorie;

class CategorieFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
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
        
        $manager->flush();
    }
}
