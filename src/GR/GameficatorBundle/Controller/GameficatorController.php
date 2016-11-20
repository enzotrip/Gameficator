<?php

namespace GR\GameficatorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GR\GameficatorBundle\Entity\Task;
use GR\GameficatorBundle\Entity\Liste;
use GR\GameficatorBundle\Entity\Project;
use GR\GameficatorBundle\Entity\Reward;
use GR\UserBundle\Entity\User;

use GR\GameficatorBundle\Form\TaskType;
use GR\GameficatorBundle\Form\ProjectType;
use GR\GameficatorBundle\Form\RewardType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class GameficatorController extends Controller
{
    public function indexAction()
    {

      $user = $this->getUser();

      $listTasks = $user->getTasks();
      $listProjects = $user->getProjects();
        return $this->render('GRGameficatorBundle:Gameficator:index.html.twig', array(
          'listTasks' => $listTasks,
          'listProjects' => $listProjects
        ));
    }

    public function createTaskAction(Request $request)
    {

      $task = new Task();
      $type = 0;
      $form   = $this->get('form.factory')->create(TaskType::class, $task);

      if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
        $task = $form->getData();

        $currentuser = $this->get('security.token_storage')->getToken()->getUser()->getUsername(); // get the current user
        $user = $this ->getDoctrine()
                      ->getRepository('GRUserBundle:User')
                      ->findOneBy(array('username' => $currentuser));
        $task->setUser($user); // set the current user
        $task->setType($type);
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

    public function createProjectAction(Request $request)
    {

      $project = new Project();
      $form   = $this->get('form.factory')->create(ProjectType::class, $project);

      if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
        $project = $form->getData();

        $currentuser = $this->get('security.token_storage')->getToken()->getUser()->getUsername(); // get the current user
        $user = $this ->getDoctrine()
                      ->getRepository('GRUserBundle:User')
                      ->findOneBy(array('username' => $currentuser));
        $project->setUser($user); // set the current user

        $em = $this->getDoctrine()->getManager();
        $em->persist($project);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Projet bien créé.');

        return $this->redirectToRoute('gr_gameficator_homepage');
      }

      return $this->render('GRGameficatorBundle:Gameficator:createProject.html.twig', array(
        'form' => $form->createView(),
      ));
    }

    public function createRewardAction(Request $request)
    {

      $reward = new Reward();
      $form   = $this->get('form.factory')->create(RewardType::class, $reward);

      if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
        $reward = $form->getData();

        $currentuser = $this->get('security.token_storage')->getToken()->getUser()->getUsername(); // get the current user
        $user = $this ->getDoctrine()
                      ->getRepository('GRUserBundle:User')
                      ->findOneBy(array('username' => $currentuser));
        $reward->setUser($user); // set the current user

        $em = $this->getDoctrine()->getManager();
        $em->persist($reward);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Récompense bien créée.');

        return $this->redirectToRoute('gr_gameficator_homepage');
      }

      return $this->render('GRGameficatorBundle:Gameficator:createReward.html.twig', array(
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
