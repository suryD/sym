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
        $program = new Program();
        $program->setTitle('Harry potter');
        $program->setSynopsis('Sorciers dans une école de magie');
        $program->setCategory($this->getReference('category_Fantastique'));
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('very bad trip');
        $program->setSynopsis('road trip en thailande');
        $program->setCategory($this->getReference('category_Comedie'));
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('jurassic park');
        $program->setSynopsis('dinosaure à new york');
        $program->setCategory($this->getReference('category_Aventure'));
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('vaiana');
        $program->setSynopsis('voyage audacieux');
        $program->setCategory($this->getReference('category_Animation'));
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('007');
        $program->setSynopsis('agent secret en action');
        $program->setCategory($this->getReference('category_Action'));
        $manager->persist($program);

        $manager->flush();
    }


    public function getDependencies()
    {
      return [
        CategoryFixtures::class,
      ];
  }

}
