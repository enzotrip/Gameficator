<?php

namespace GR\GameficatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="GR\GameficatorBundle\Repository\ProjectRepository")
 */
class Project
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="GR\GameficatorBundle\Entity\Task", mappedBy="project")
     */
    private $tasks;

    /**
     * @ORM\ManyToOne(targetEntity="GR\UserBundle\Entity\User", inversedBy="projects")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Deadline", type="date")
     */
    private $deadline;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="LastUpdate", type="datetime")
     */
    private $lastUpdate;

    /**
     * @var string
     *
     * @ORM\Column(name="Motivation_plus", type="string", length=255, nullable=true)
     */
    private $motivationplus;

    /**
     * @var string
     *
     * @ORM\Column(name="Motivation_neg", type="string", length=255, nullable=true)
     */
    private $motivationneg;

    /**
     * @var string
     *
     * @ORM\Column(name="Priority", type="string", length=255)
     */
    private $priority;

    /**
     * @var string
     *
     * @ORM\Column(name="Objectives", type="string", length=255, nullable=true)
     */
    private $objectives;

    /**
     * @ORM\Column(name="Avancement", type="integer")
     */
    private $avancement;

    /**
     * @ORM\Column(name="State", type="integer")
     */
    private $state;
    // state=1 à faire state=2 archive state=3 corbeille

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tasks = new \Doctrine\Common\Collections\ArrayCollection();
        $this->deadline= new \Datetime();
        $this->lastUpdate= new \Datetime();
        $this->avancement= 0;
        $this->state=1;
        $this->priority=0;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Project
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * toString
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Set deadline
     *
     * @param \DateTime $deadline
     *
     * @return Project
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;

        return $this;
    }

    /**
     * Get deadline
     *
     * @return \DateTime
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * Set lastUpdate
     *
     * @param \DateTime $lastUpdate
     *
     * @return Project
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;

        return $this;
    }

    /**
     * Get lastUpdate
     *
     * @return \DateTime
     */
    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

    /**
     * Set motivationplus
     *
     * @param string $motivationplus
     *
     * @return Project
     */
    public function setMotivationplus($motivationplus)
    {
        $this->motivationplus = $motivationplus;

        return $this;
    }

    /**
     * Get motivationplus
     *
     * @return string
     */
    public function getMotivationplus()
    {
        return $this->motivationplus;
    }

    /**
     * Set motivationneg
     *
     * @param string $motivationneg
     *
     * @return Project
     */
    public function setMotivationneg($motivationneg)
    {
        $this->motivationneg = $motivationneg;

        return $this;
    }

    /**
     * Get motivationneg
     *
     * @return string
     */
    public function getMotivationneg()
    {
        return $this->motivationneg;
    }

    /**
     * Set priority
     *
     * @param string $priority
     *
     * @return Project
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return string
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set objectives
     *
     * @param string $objectives
     *
     * @return Project
     */
    public function setObjectives($objectives)
    {
        $this->objectives = $objectives;

        return $this;
    }

    /**
     * Get objectives
     *
     * @return string
     */
    public function getObjectives()
    {
        return $this->objectives;
    }

    /**
     * Add task
     *
     * @param \GR\GameficatorBundle\Entity\Task $task
     *
     * @return Project
     */
    public function addTask(\GR\GameficatorBundle\Entity\Task $task)
    {
        $this->tasks[] = $task;
        $task->setProject($this);
        return $this;
    }

    /**
     * Remove task
     *
     * @param \GR\GameficatorBundle\Entity\Task $task
     */
    public function removeTask(\GR\GameficatorBundle\Entity\Task $task)
    {
        $this->tasks->removeElement($task);
    }

    /**
     * Get tasks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * Set user
     *
     * @param \GR\UserBundle\Entity\User $user
     *
     * @return Project
     */
    public function setUser(\GR\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \GR\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }



    /**
     * Set avancement
     *
     * @param integer $avancement
     *
     * @return Project
     */
    public function setAvancement($avancement)
    {

        $this->avancement = $avancement;

        return $this;
    }

    /**
     * Get avancement
     *
     * @return integer
     */
    public function getAvancement()
    {
      $tasks = $this->getTasks();
      $somme_finie = 0;
      $somme = 0;
      if ($tasks != null) {
        foreach($tasks as $task) {
          if ($task->getState() == 2 | $task->getState() == 3) {
            $somme_finie = $somme_finie + $task->getPriority();
          }
          $somme = $somme + $task->getPriority();
        }
        if ($somme > 0) {
          $avancement = round(($somme_finie/$somme)*100);
          return $this->avancement = $avancement;
        }
        else {
          return $this->avancement = 0;
        }
      }
      else {
        return $this->avancement = 0;
      }
    }

    /**
     * Set state
     *
     * @param integer $state
     *
     * @return Project
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return integer
     */
    public function getState()
    {
        return $this->state;
    }
}
