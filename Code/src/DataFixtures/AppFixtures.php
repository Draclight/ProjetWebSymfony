<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Personne;
use App\Entity\Liste;
use App\Entity\Cadeau;
use App\Entity\Adresse;
use App\Entity\Categorie;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
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

        $liste1 = new Liste();
        $liste1->setPersonne($personne2);
        $liste1->addCadeau($cadeau4);
        $liste1->addCadeau($cadeau2);
        $manager->persist($liste1);

        $manager->flush();
    }
}
