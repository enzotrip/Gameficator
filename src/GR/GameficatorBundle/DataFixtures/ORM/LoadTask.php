<?php

namespace GR\GameficatorBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use GR\GameficatorBundle\Entity\Task;

class LoadTask implements FixtureInterface
{

  public function load(ObjectManager $manager)
  {

    $names = array(
      'Aucune'
    );

    foreach ($names as $name) {

      $task = new Task();
      $task->setName($name);

      $manager->persist($task);
    }

    $manager->flush();
  }
}