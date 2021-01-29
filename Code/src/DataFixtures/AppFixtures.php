<?php

namespace App\DataFixtures;

use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Personne;
use App\Entity\Liste;
use App\Entity\Cadeau;
use App\Entity\Adresse;
use App\Entity\Categorie;


class AppFixtures extends Fixture {
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder) {
    $this->passwordEncoder = $passwordEncoder;
    }
    
    public function load(ObjectManager $manager)
    {

        /******************************************/
        /****************USER_ROLE******************/
        /******************************************/

        $user1 = new User();
        $user1->setUsername('stock');
        $user1->setRoles(['ROLE_USER']);
        $encrypted = $this->passwordEncoder->encodePassword($user1,'secret');
        $user1->setPassword($encrypted);
        $manager->persist($user1);

        $user2 = new User();
        $user2->setUsername('perenoel');
        $user2->setRoles(['ROLE_ADMIN']);
        $encrypted = $this->passwordEncoder->encodePassword($user2,'secret');
        $user2->setPassword($encrypted);
        $manager->persist($user2);

        $user3 = new User();
        $user3->setUsername('secretariat');
        $user3->setRoles(['ROLE_SECRETARIAT']);
        $encrypted = $this->passwordEncoder->encodePassword($user3,'secret');
        $user3->setPassword($encrypted);
        $manager->persist($user3);

        /******************************************/
        /****************ADRESSES******************/
        /******************************************/

        $adresse1 = new Adresse();
        $adresse1->setRue('Rue du chateau');
        $adresse1->setNumero(10);
        $adresse1->setCodePostal(60860);
        $adresse1->setVille('St Omer en Chaussée');
        $manager->persist($adresse1);

        $adresse2 = new Adresse();
        $adresse2->setRue('Rue de Maidstone');
        $adresse2->setNumero(6);
        $adresse2->setCodePostal(60000);
        $adresse2->setVille('Beauvais');
        $manager->persist($adresse2);

        $adresse3 = new Adresse();
        $adresse3->setRue('Avenue Blaise Pascal');
        $adresse3->setNumero(41);
        $adresse3->setCodePostal(60020);
        $adresse3->setVille('Beauvais');
        $manager->persist($adresse3);        

        $adresse3 = new Adresse();
        $adresse3->setRue('Rue vide');
        $adresse3->setNumero(0);
        $adresse3->setCodePostal(10000);
        $adresse3->setVille('Nowhere');
        $manager->persist($adresse3);  

        /******************************************/
        /****************PERSONNES*****************/
        /******************************************/

        $personne1 = new Personne();
        $personne1->setNomPrenom('Jean Mi');
        $personne1->setSexe('H');
        $personne1->setDateNaissance(new \DateTime(1998-12-10));
        $personne1->setAdresse($adresse1);
        $manager->persist($personne1);
        
        $personne2 = new Personne();
        $personne2->setNomPrenom('Jean Emile');
        $personne2->setSexe('H');
        $personne2->setDateNaissance(new \DateTime(2010-05-20));
        $personne2->setAdresse($adresse2);
        $manager->persist($personne2);

        $personne3 = new Personne();
        $personne3->setNomPrenom('Sophie');
        $personne3->setSexe('F');
        $personne3->setDateNaissance(new \DateTime(2030-07-10));
        $personne3->setAdresse($adresse2);
        $manager->persist($personne3);
        
        /******************************************/
        /**************CATEGORIES******************/
        /******************************************/

        $categorie1 = new categorie();
        $categorie1->setNom('Jeux de construction');
        $manager->persist($categorie1);
        
        $categorie2 = new categorie();
        $categorie2->setNom('Sans cadeau');
        $manager->persist($categorie2);
        
        $categorie3 = new categorie();
        $categorie3->setNom('Jeux-vidéo');
        $manager->persist($categorie3);
        
        $categorie4 = new categorie();
        $categorie4->setNom('Créatifs');
        $manager->persist($categorie4);
        
        $categorie5 = new categorie();
        $categorie5->setNom('Jeux de société');
        $manager->persist($categorie5);
        
        /******************************************/
        /****************CADEAUX*******************/
        /******************************************/

        $cadeau1 = new Cadeau();
        $cadeau1->setCategorie($categorie1);
        $cadeau1->setDesignation('Lego');
        $cadeau1->setAgeMinimum(3);
        $cadeau1->setPrix(10);
        $manager->persist($cadeau1);
        
        $cadeau2 = new Cadeau();
        $cadeau2->setCategorie($categorie1);
        $cadeau2->setDesignation('Playmobil');
        $cadeau2->setAgeMinimum(3);
        $cadeau2->setPrix(10);
        $manager->persist($cadeau2);

        $cadeau3 = new Cadeau();
        $cadeau3->setCategorie($categorie5);
        $cadeau3->setDesignation('Monopoly');
        $cadeau3->setAgeMinimum(12);
        $cadeau3->setPrix(25);
        $manager->persist($cadeau3);
        
        $cadeau4 = new Cadeau();
        $cadeau4->setCategorie($categorie3);
        $cadeau4->setDesignation('Nintendo Switch');
        $cadeau4->setAgeMinimum(6);
        $cadeau4->setPrix(300);
        $manager->persist($cadeau4);

                
        $cadeau5 = new Cadeau();
        $cadeau5->setCategorie($categorie4);
        $cadeau5->setDesignation('Sans liste');
        $cadeau5->setAgeMinimum(3);
        $cadeau5->setPrix(5);
        $manager->persist($cadeau5);


        /******************************************/
        /*****************LISTES*******************/
        /******************************************/

        $liste1 = new Liste();
        $liste1->setPersonne($personne2);
        $liste1->addCadeau($cadeau1);
        $liste1->addCadeau($cadeau2);
        $liste1->addCadeau($cadeau3);
        $manager->persist($liste1);

        $liste2 = new Liste();
        $liste2->setPersonne($personne3);
        $liste2->addCadeau($cadeau4);
        $manager->persist($liste2);

        $manager->flush();
    }
}
