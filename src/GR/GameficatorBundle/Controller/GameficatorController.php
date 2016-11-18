<?php

namespace GR\GameficatorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GameficatorController extends Controller
{
    public function indexAction()
    {
        return $this->render('GRGameficatorBundle:Gameficator:index.html.twig');
    }

    public function createTaskAction()
    {
      return $this->render('GRGameficatorBundle:Gameficator:createTask.html.twig');
    }
}
