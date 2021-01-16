<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Personne;

class PersonneFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $personne1 = new Personne();
        $personne1->setNomPrenom('Denis Bordeleau');
        $personne1->setDateNaissance('2000-01-01');
        $personne1->setSexe('H');
        $personne1->setAdresse(1);
        $manager->persist($personne1);

        $personne2 = new Personne();
        $personne2->setNomPrenom('Courtland Tanguay');
        $personne2->setDateNaissance('2000-02-02');
        $personne2->setSexe('H');
        $personne2->setAdresse(2);
        $manager->persist($personne2);

        $personne3 = new Personne();
        $personne3->setNomPrenom('Caroline Roussel');
        $personne3->setDateNaissance('2000-03-03');
        $personne3->setSexe('F');
        $personne3->setAdresse(3);
        $manager->persist($personne3);
        
        $personne4 = new Personne();
        $personne4->setNomPrenom('Alain de Chateaubrian');
        $personne4->setDateNaissance('2000-04-04');
        $personne4->setSexe(4);
        $personne4->setAdresse('H');
        $manager->persist($personne4);

        $personne5 = new Personne();
        $personne5->setNomPrenom('Roxanne Doiron');
        $personne5->setDateNaissance('2000-05-05');
        $personne5->setSexe('F');
        $personne5->setAdresse(5);
        $manager->persist($personne5);

        $manager->flush();
    }
}
