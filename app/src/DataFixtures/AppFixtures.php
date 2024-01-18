<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Music;
use App\Entity\Author;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('us_US');
        for($i = 0; $i < 10; $i++){
            $author = new Author();
            $author->setFirstName($faker->firstName)
                   ->setLastName($faker->lastName);
            $manager->persist($author);
            $this->addReference("auteur". $i, $author);
        }
          for($i = 0; $i < 7; $i++){
              $song = new Music();
              $song->setMusicName($faker->word(1, true))
                    ->setMusicDateCreation($faker->dateTime('now'))
                    ->setAuthor($this->getReference("auteur". rand(0,9)));
             $manager->persist($song);
          }     
        

        
        $manager->flush();
        
    }
}
