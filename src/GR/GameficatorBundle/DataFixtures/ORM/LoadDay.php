<?php

namespace GR\GameficatorBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use GR\GameficatorBundle\Entity\Day;

class LoadDay implements FixtureInterface
{

  public function load(ObjectManager $manager)
  {

    $names = array(
      'Lundi',
      'Mardi',
      'Mercredi',
      'Jeudi',
      'Vendredi',
      'Samedi',
      'Dimanche'
    );

    foreach ($names as $name) {

      $day = new Day();
      $day->setName($name);

      $manager->persist($day);
    }

    $manager->flush();
  }
}