<?php

namespace App\DataFixtures;

use App\Entity\Plat;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categorie_n1 = new Category();
        $categorie_n1->setName('Entrée');
        $manager->persist($categorie_n1);

        $categorie_n2 = new Category();
        $categorie_n2->setName('Plat');
        $manager->persist($categorie_n2);

        $categorie_n3 = new Category();
        $categorie_n3->setName('Dessert');
        $manager->persist($categorie_n3);


        $plat = new Plat();
        $plat->setNom('Bœuf bourguignon');
        $plat->setDescription("Le bœuf bourguignon est une recette de cuisine d'estouffade de bœuf, traditionnelle de la cuisine bourguignonne, cuisinée au vin rouge de Bourgogne, avec une garniture de champignons, de petits oignons et de lardons. Les variations d'accompagnement sont multiples.");
        $plat->setCategory($categorie_n2);
        $manager->persist($plat);

        $plat = new Plat();
        $plat->setNom('Poulet Marengo');
        $plat->setDescription("Le poulet Marengo ou veau Marengo ou lapin Marengo ou sauce Marengo est une recette de cuisine traditionnelle de la cuisine française à base de morceaux de poulet mijotés dans une sauce à la tomate et au vin blanc. ");
        $plat->setCategory($categorie_n2);
        $manager->persist($plat);

        $manager->flush();
    }
}
