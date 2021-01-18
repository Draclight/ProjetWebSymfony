<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Personne;
use App\Entity\Adresse;

class PersonneFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $adresse1 = new Adresse();
        $adresse1->setRue('Rue de Amiens');
        $adresse1->setNumero(54);
        $adresse1->setCodePostal(80000);
        $adresse1->setVille('Amiens');
        $manager->persist($adresse1);

        $adresse2 = new Adresse();
        $adresse2->setRue('Chez mere grand');
        $adresse2->setNumero(69);
        $adresse2->setCodePostal(69068);
        $adresse2->setVille('Bzmoa');
        $manager->persist($adresse2);

        $personne1 = new Personne();
        $personne1->setNomPrenom('Jean Mi');
        $personne1->setSexe('H');
        $personne1->setDateNaissance(new \DateTime(1998-12-10));
        $personne1->setAdresse($adresse1);
        $manager->persist($personne1);
        
        $personne2 = new Personne();
        $personne2->setNomPrenom('Jean Emile');
        $personne2->setSexe('Z');
        $personne2->setDateNaissance(new \DateTime(2010-05-20));
        $personne2->setAdresse($adresse2);
        $manager->persist($personne2);
        
        $manager->flush();
    }
}
