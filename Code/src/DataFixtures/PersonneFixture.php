<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Personne;

class PersonneFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //adresse
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

        //personne
        $personne1 = new Personne();
        $personne1->setNomPrenom('Denis Bordeleau');
        $personne1->setDateNaissance('2000-01-01');
        $personne1->setSexe('H');
        $personne1->setAdresse($adresse1);
        $manager->persist($personne1);

        $personne2 = new Personne();
        $personne2->setNomPrenom('Courtland Tanguay');
        $personne2->setDateNaissance('2000-02-02');
        $personne2->setSexe('H');
        $personne2->setAdresse($adresse2);
        $manager->persist($personne2);

        $personne3 = new Personne();
        $personne3->setNomPrenom('Caroline Roussel');
        $personne3->setDateNaissance('2000-03-03');
        $personne3->setSexe('F');
        $personne3->setAdresse($adresse3);
        $manager->persist($personne3);
        
        $personne4 = new Personne();
        $personne4->setNomPrenom('Alain de Chateaubrian');
        $personne4->setDateNaissance('2000-04-04');
        $personne4->setSexe('H');
        $personne4->setAdresse($adresse4);
        $manager->persist($personne4);

        $personne5 = new Personne();
        $personne5->setNomPrenom('Roxanne Doiron');
        $personne5->setDateNaissance('2000-05-05');
        $personne5->setSexe('F');
        $personne5->setAdresse($adresse5);
        $manager->persist($personne5);

        $manager->flush();
    }
}
