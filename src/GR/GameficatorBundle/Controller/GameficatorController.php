<?php

namespace GR\GameficatorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GR\GameficatorBundle\Entity\Task;
use GR\GameficatorBundle\Entity\Liste;
use GR\GameficatorBundle\Entity\Project;
use GR\GameficatorBundle\Entity\Reward;
use GR\UserBundle\Entity\User;

use GR\GameficatorBundle\Form\TaskType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class GameficatorController extends Controller
{
    public function indexAction()
    {

      $user = $this->getUser();

      $listTasks = $user->getTasks();

        return $this->render('GRGameficatorBundle:Gameficator:index.html.twig', array(
          'listTasks' => $listTasks
        ));
    }

    public function createTaskAction(Request $request)
    {

      $task = new Task();
      $form   = $this->get('form.factory')->create(TaskType::class, $task);

      if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
        $task = $form->getData();

        $currentuser = $this->get('security.token_storage')->getToken()->getUser()->getUsername(); // get the current user
        $user = $this ->getDoctrine()
                      ->getRepository('GRUserBundle:User')
                      ->findOneBy(array('username' => $currentuser));
        $task->setUser($user); // set the current user

        $em = $this->getDoctrine()->getManager();
        $em->persist($task);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Tâche bien créée.');

        return $this->redirectToRoute('gr_gameficator_homepage');
      }

      return $this->render('GRGameficatorBundle:Gameficator:createTask.html.twig', array(
        'form' => $form->createView(),
      ));
    }

    public function tasksToDoAction()
    {

      $listTasks = $this->getDoctrine()
        ->getManager()
        ->getRepository('GRGameficatorBundle:Task')
        ->findAll()
      ;

        return $this->render('GRGameficatorBundle:Gameficator:tasksToDo.html.twig', array(
          'listTasks' => $listTasks
        ));
    }
}
