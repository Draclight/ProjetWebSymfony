<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Personne;
use App\Entity\Liste;
use App\Entity\Cadeau;
use App\Entity\Adresse;
use App\Entity\Categorie;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder) {
    $this->passwordEncoder = $passwordEncoder;
    }
    
    public function load(ObjectManager $manager)
    {
        //adresse
        $adresse1 = new Adresse();
        $adresse1->setRue('Rue du Général Domon');
        $adresse1->setNumero(33);
        $adresse1->setCodePostal(80000);
        $adresse1->setVille('Amiens');
        $manager->persist($adresse1);

        $adresse2 = new Adresse();
        $adresse2->setRue('Rue Delpeche');
        $adresse2->setNumero(165);
        $adresse2->setCodePostal(80000);
        $adresse2->setVille('Amiens');
        $manager->persist($adresse2);   

        //personne
        $personne1 = new Personne();
        $personne1->setNomPrenom('Lundy Baron');
        $personne1->setSexe('F');
        $personne1->setDateNaissance(new \DateTime(1990-07-02));
        $personne1->setAdresse($adresse1);
        $manager->persist($personne1);
        
        $personne2 = new Personne();
        $personne2->setNomPrenom('Christian Godin');
        $personne2->setSexe('H');
        $personne2->setDateNaissance(new \DateTime(1947-04-29));
        $personne2->setAdresse($adresse2);
        $manager->persist($personne2);
        
        //categorie
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
        
        //Cadeau
        $cadeau1 = new Cadeau();
        $cadeau1->setCategorie($categorie1);
        $cadeau1->setDesignation('PS4');
        $cadeau1->setAgeMinimum(3);
        $cadeau1->setPrix(500);
        $manager->persist($cadeau1);
        
        $cadeau2 = new Cadeau();
        $cadeau2->setCategorie($categorie2);
        $cadeau2->setDesignation('Echecs');
        $cadeau2->setAgeMinimum(6);
        $cadeau2->setPrix(20);
        $manager->persist($cadeau2);

        $cadeau3 = new Cadeau();
        $cadeau3->setCategorie($categorie3);
        $cadeau3->setDesignation('IPeach');
        $cadeau3->setAgeMinimum(10);
        $cadeau3->setPrix(1500);
        $manager->persist($cadeau3);
        
        $cadeau4 = new Cadeau();
        $cadeau4->setCategorie($categorie4);
        $cadeau4->setDesignation('Le PHP pour enfant');
        $cadeau4->setAgeMinimum(3);
        $cadeau4->setPrix(10);
        $manager->persist($cadeau4);
        
        $cadeau5 = new Cadeau();
        $cadeau5->setCategorie($categorie5);
        $cadeau5->setDesignation('Billard américain');
        $cadeau5->setAgeMinimum(5);
        $cadeau5->setPrix(800);
        $manager->persist($cadeau5);

        //Liste
        $liste1 = new Liste();
        $liste1->setPersonne($personne2);
        $liste1->addCadeau($cadeau4);
        $liste1->addCadeau($cadeau2);
        $manager->persist($liste1);

        //User
        $user1 = new User();
        $user1->setUsername('stock');
        $user1->setRoles(['ROLE_STOCK']);
        $encrypted = $this->passwordEncoder->encodePassword($user1,'entrepot');
        $user1->setPassword($encrypted);
        $manager->persist($user1);

        $user2 = new User();
        $user2->setUsername('perenoel');
        $user2->setRoles(['ROLE_ADMIN']);
        $encrypted = $this->passwordEncoder->encodePassword($user2,'papanoel');
        $user2->setPassword($encrypted);
        $manager->persist($user2);

        $user3 = new User();
        $user3->setUsername('secretaire');
        $user3->setRoles(['ROLE_SECRETAIRE']);
        $encrypted = $this->passwordEncoder->encodePassword($user3,'secret');
        $user3->setPassword($encrypted);
        $manager->persist($user3);

        $manager->flush();
    }
}
