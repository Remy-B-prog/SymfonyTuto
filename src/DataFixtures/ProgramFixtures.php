<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{


   
    public function load(ObjectManager $manager)
    { 
        $Program1 = (object) array('title' => 'Walking dead', 'description' => 'Des zombies envahissent la terre' ,'categorie' => 'category_Action' );
        $Program2 = (object) array('title' => 'Watchmen', 'description' => 'un film tiré d un comics' ,'categorie' => 'category_Action' );
        $Program3 = (object) array('title' => 'Harry Potter', 'description' => 'un film de sorcier ' ,'categorie' => 'category_Aventure' );
        $Program4 = (object) array('title' => 'Le chateau ambulant', 'description' => 'un film d animation super beau ' ,'categorie' => 'category_Animation');
        $Program5 = (object) array('title' => 'Scary Movie', 'description' => 'un film d\'horreur ' ,'categorie' => 'category_Horreur');

        $ListOfProgram = [$Program1, $Program2, $Program3,$Program4, $Program5];

        foreach($ListOfProgram as $list){
            
            $program = new Program();
            $program->setTitle($list->title);
            $program->setSynopsis($list->description);
            $program->setCategory($this->getReference($list->categorie));
            $program->setPoster("poster");
            $manager->persist($program);
            $manager->flush();
        }


    }

    public function getDependencies()
    {
        return [
          CategoryFixtures::class,
        ];
    }


}