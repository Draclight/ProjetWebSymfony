<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Adresse;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {//rue	numero	code_postal	ville
        $adresse1 = new Adresse();
        $adresse1->setRue('Rue de Amiens');
        $adresse1->setNumero(1);
        $adresse1->setCodePostal(80000);
        $adresse1->setVille('Amiens');
        $manager->persist($adresse1);

        $adresse2 = new Adresse();
        $adresse2->setRue('Rue de Paris');
        $adresse2->setNumero(2);
        $adresse2->setCodePostal(80000);
        $adresse2->setVille('Amiens');
        $manager->persist($adresse2);

        $adresse3 = new Adresse();
        $adresse3->setRue('Route de Rouen');
        $adresse3->setNumero(3);
        $adresse3->setCodePostal(80000);
        $adresse3->setVille('Amiens');
        $manager->persist($adresse3);        

        $adresse4 = new Adresse();
        $adresse4->setRue('Place du Casino');
        $adresse4->setNumero(0);
        $adresse4->setCodePostal(98000);
        $adresse4->setVille('Monaco');
        $manager->persist($adresse4);

        $adresse5 = new Adresse();
        $adresse5->setRue('Grace King Pl');
        $adresse5->setNumero(4100 );
        $adresse5->setCodePostal(70002);
        $adresse5->setVille('Nouvelle-Orleans');
        $manager->persist($adresse5);

        $manager->flush();
    }
}
