<?php

namespace GR\GameficatorBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use GR\GameficatorBundle\Entity\Project;

class LoadProject implements FixtureInterface
{

  public function load(ObjectManager $manager)
  {

    $names = array(
      ' '
    );

    foreach ($names as $name) {

      $project = new Project();
      $project->setName($name);

      $manager->persist($project);
    }

    $manager->flush();
  }
}
