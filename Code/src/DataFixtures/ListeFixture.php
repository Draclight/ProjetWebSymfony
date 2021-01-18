<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Personne;
use App\Entity\Liste;
use App\Entity\Cadeau;
use App\Entity\Adresse;
use App\Entity\Categorie;



class ListeFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        
        $adresse2 = new Adresse();
        $adresse2->setRue('Rue de Paris');
        $adresse2->setNumero(2);
        $adresse2->setCodePostal(80000);
        $adresse2->setVille('Amiens');
        $manager->persist($adresse2);
            
        $categorie4 = new categorie();
        $categorie4->setNom('Livre');
        $manager->persist($categorie4);

        $cadeau4 = new Cadeau();
        $cadeau4->setCategorie($categorie4);
        $cadeau4->setDesignation('Petit ours brun');
        $cadeau4->setAgeMinimum(3);
        $cadeau4->setPrix(10);
        $manager->persist($cadeau4);
        
        $cadeau2 = new Cadeau();
        $cadeau2->setCategorie($categorie4);
        $cadeau2->setDesignation('Gros ours brun');
        $cadeau2->setAgeMinimum(3);
        $cadeau2->setPrix(39);
        $manager->persist($cadeau2);
        
        $personne2 = new Personne();
        $personne2->setNomPrenom('Jean Emile');
        $personne2->setSexe('Z');
        $personne2->setDateNaissance(new \DateTime(2010-05-20));
        $personne2->setAdresse($adresse2);
        $manager->persist($personne2);
        
        $liste1 = new Liste();
        $liste1->setPersonne($personne2);
        $liste1->addCadeau($cadeau4);
        $liste1->addCadeau($cadeau2);
        $manager->persist($liste1);

        $manager->flush();
    }
}
