<?php

namespace GR\GameficatorBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use GR\GameficatorBundle\Entity\Topic;

class LoadTopic implements FixtureInterface
{

  public function load(ObjectManager $manager)
  {

    $names = array(
      'Aucun',
      'Sport',
      'Maison',
      'Jardinage',
      'Devoir',
      'Famille',
      'Travail',
      'Quotidien'
    );

    foreach ($names as $name) {

      $topic = new Topic();
      $topic->setName($name);

      $manager->persist($topic);
    }

    $manager->flush();
  }
}