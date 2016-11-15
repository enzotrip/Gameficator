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
     * @ORM\Column(name="Motivations_plus", type="string", length=255)
     */
    private $motivationsPlus;

    /**
     * @var string
     *
     * @ORM\Column(name="Motivation_neg", type="string", length=255)
     */
    private $motivationNeg;

    /**
     * @var string
     *
     * @ORM\Column(name="Priority", type="string", length=255)
     */
    private $priority;

    /**
     * @var string
     *
     * @ORM\Column(name="Objectives", type="string", length=255)
     */
    private $objectives;


    /**
     * Get id
     *
     * @return int
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
     * Set motivationsPlus
     *
     * @param string $motivationsPlus
     *
     * @return Project
     */
    public function setMotivationsPlus($motivationsPlus)
    {
        $this->motivationsPlus = $motivationsPlus;

        return $this;
    }

    /**
     * Get motivationsPlus
     *
     * @return string
     */
    public function getMotivationsPlus()
    {
        return $this->motivationsPlus;
    }

    /**
     * Set motivationNeg
     *
     * @param string $motivationNeg
     *
     * @return Project
     */
    public function setMotivationNeg($motivationNeg)
    {
        $this->motivationNeg = $motivationNeg;

        return $this;
    }

    /**
     * Get motivationNeg
     *
     * @return string
     */
    public function getMotivationNeg()
    {
        return $this->motivationNeg;
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
     * Constructor
     */
    public function __construct()
    {
        $this->tasks = new \Doctrine\Common\Collections\ArrayCollection();
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
}