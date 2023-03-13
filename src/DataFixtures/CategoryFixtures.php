<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public $CATEGORIES = ['Action', 'Aventure','Animation', 'Fantastique', 'Horreur'];


    public function load(ObjectManager $manager)
    {
        foreach ($this->CATEGORIES as $CATEGORIE) {
            $category = new Category();  
            $category->setName($CATEGORIE);  
            $manager->persist($category);  
        }
    $manager->flush();
    }
}