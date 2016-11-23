<?php

namespace GR\GameficatorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GR\GameficatorBundle\Entity\Task;
use GR\GameficatorBundle\Entity\Liste;
use GR\GameficatorBundle\Entity\Project;
use GR\GameficatorBundle\Entity\Reward;
use GR\UserBundle\Entity\User;
use GR\GameficatorBundle\Entity\Recurrent;

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

      $date = date('Y-m-d');

      $user = $this->getUser();
      
      $repository = $this->getDoctrine()->getRepository('GRGameficatorBundle:Task');

      $query = $repository->createQueryBuilder('t')
        ->where('t.user = :user')
        ->setParameter('user', $user)
        ->andWhere('t.deadline = :date')
        ->setParameter('date', $date)
        ->orderBy('t.priority', 'DESC')
        ->getQuery();

      $listDaylyTasks = $query->getResult();

      $query2 = $repository->createQueryBuilder('t')
        ->where('t.user = :user')
        ->setParameter('user', $user)
        ->andWhere('t.deadline > :date')
        ->setParameter('date', $date)
        ->orderBy('t.priority', 'DESC')
        ->getQuery();

      $listTasks = $query2->getResult();

      $listProjects = $user->getProjects();


        return $this->render('GRGameficatorBundle:Gameficator:index.html.twig', array(
          'listTasks' => $listTasks,
          'listProjects' => $listProjects,
          'listDaylyTasks' =>$listDaylyTasks
        ));
    }

    public function viewProjectsAction()
    {

      $user = $this->getUser();

      $listProjects = $user->getProjects();
        return $this->render('GRGameficatorBundle:Gameficator:mesProjets.html.twig', array(
          'listProjects' => $listProjects
        ));
    }

    public function viewRewardsAction()
    {

      $user = $this->getUser();

      $listRewards = $user->getRewards();
        return $this->render('GRGameficatorBundle:Gameficator:mesRecompenses.html.twig', array(
          'listRewards' => $listRewards
        ));
    }

    public function viewRewardAction($id)
    {

      $em = $this->getDoctrine()->getManager();
      $Rewards= $this->getDoctrine()->getManager()->getRepository('GRGameficatorBundle:Reward');
      $reward = $Rewards->find($id);
      if($reward == null){
        throw new NotFoundHttpException('Récompense introuvable');
      }
        return $this->render('GRGameficatorBundle:Gameficator:viewReward.html.twig', array(
          'reward' => $reward
        ));
    }

    public function viewProjectAction($id)
    {

      $em = $this->getDoctrine()->getManager();
      $Projects= $this->getDoctrine()->getManager()->getRepository('GRGameficatorBundle:Project');
      $project = $Projects->find($id);
      if($project == null){
        throw new NotFoundHttpException('Projet introuvable');
      }
        return $this->render('GRGameficatorBundle:Gameficator:viewProject.html.twig', array(
          'project' => $project
        ));
    }

    public function viewTaskAction($id)
    {

      $em = $this->getDoctrine()->getManager();
      $Tasks= $this->getDoctrine()->getManager()->getRepository('GRGameficatorBundle:Task');
      $task = $Tasks->find($id);
      if($task == null){
        throw new NotFoundHttpException('Tache introuvable');
      }
        return $this->render('GRGameficatorBundle:Gameficator:viewTask.html.twig', array(
          'task' => $task
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
        if($task->getType() == 1){
            $recurrent = new Recurrent();
            $task->setRecurrent($recurrent);
        }
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

      $user = $this->getUser();

      $listTasks = $user->getTasks();

      return $this->render('GRGameficatorBundle:Gameficator:tasksToDo.html.twig', array(
        'listTasks' => $listTasks
      ));
    }
}
