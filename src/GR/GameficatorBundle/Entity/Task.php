<?php

namespace GR\GameficatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Task
 *
 * @ORM\Table(name="task")
 * @ORM\Entity(repositoryClass="GR\GameficatorBundle\Repository\TaskRepository")
 */
class Task
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
     * @ORM\ManyToOne(targetEntity="GR\UserBundle\Entity\User", inversedBy="tasks")
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity="GR\GameficatorBundle\Entity\Reward")
     * @ORM\JoinColumn(nullable=true)
     */
    private $reward;

    /**
     * @ORM\OneToOne(targetEntity="GR\GameficatorBundle\Entity\Recurrent", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $recurrent;

    /**
     * @ORM\ManyToOne(targetEntity="GR\GameficatorBundle\Entity\Project", inversedBy="tasks")
     * @ORM\JoinColumn(nullable=true)
     */
    private $project;

    /**
      * @ORM\ManyToOne(targetEntity="GR\GameficatorBundle\Entity\Liste", inversedBy="tasks")
      * @ORM\JoinColumn(nullable=true)
      */
    private $liste;

     /**
      * @ORM\ManyToOne(targetEntity="GR\GameficatorBundle\Entity\Task", inversedBy="tasksenfant")
      * @ORM\JoinColumn(nullable=true)
      */
    private $taskparent;

     /**
      * @ORM\OneToMany(targetEntity="GR\GameficatorBundle\Entity\Task", mappedBy="taskparent")
      * @ORM\JoinColumn(nullable=true)
      */
    private $tasksenfant;

    /**
     * @ORM\ManyToMany(targetEntity="GR\GameficatorBundle\Entity\Topic", cascade={"persist"})
     * @ORM\JoinTable(name="gr_tasks_topics")
     */
    private $topics;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Start", type="datetime", nullable=true)
     */
    private $start;

    /**
     * @var array
     *
     * @ORM\Column(name="Type", type="integer", nullable=true)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Deadline", type="datetime", nullable=true)
     */
    private $deadline;

    /**
     * @var int
     *
     * @ORM\Column(name="State", type="integer")
     * @ORM\JoinColumn(nullable=true)
     */
    private $state;

    /**
     * @var int
     *
     * @ORM\Column(name="Priority", type="integer")
     */
    private $priority;

    /**
     * @var int
     *
     * @ORM\Column(name="Points", type="integer")
     */
    private $points;

    public function __construct()
    {
        $this->start= new \Datetime();
        $this->deadline= new \Datetime();
        $this->topics = new ArrayCollection();
        $this->tasksenfant = new ArrayCollection();
        $this->priority=0;
        $this->points=0;
        $this->state=1;
    }
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
     * @return Task
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
     * Set start
     *
     * @param \DateTime $start
     *
     * @return Task
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set deadline
     *
     * @param \DateTime $deadline
     *
     * @return Task
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
     * Set state
     *
     * @param array $state
     *
     * @return Task
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return array
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return Task
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set reward
     *
     * @param \GR\GameficatorBundle\Entity\Reward $reward
     *
     * @return Task
     */
    public function setReward(\GR\GameficatorBundle\Entity\Reward $reward = null)
    {
        $this->reward = $reward;

        return $this;
    }

    /**
     * Get reward
     *
     * @return \GR\GameficatorBundle\Entity\Reward
     */
    public function getReward()
    {
        return $this->reward;
    }

    /**
     * Set project
     *
     * @param \GR\GameficatorBundle\Entity\Project $project
     *
     * @return Task
     */
    public function setProject(\GR\GameficatorBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \GR\GameficatorBundle\Entity\Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set list
     *
     * @param \GR\GameficatorBundle\Entity\List $list
     *
     * @return Task
     */
    public function setList(\GR\GameficatorBundle\Entity\Liste $liste = null)
    {
        $this->liste = $liste;

        return $this;
    }

    /**
     * Get list
     *
     * @return \GR\GameficatorBundle\Entity\List
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Task
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set liste
     *
     * @param \GR\GameficatorBundle\Entity\Liste $liste
     *
     * @return Task
     */
    public function setListe(\GR\GameficatorBundle\Entity\Liste $liste = null)
    {
        $this->liste = $liste;

        return $this;
    }

    /**
     * Get liste
     *
     * @return \GR\GameficatorBundle\Entity\Liste
     */
    public function getListe()
    {
        return $this->liste;
    }

    /**
     * Set points
     *
     * @param integer $points
     *
     * @return Task
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return integer
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set user
     *
     * @param \GR\UserBundle\Entity\User $user
     *
     * @return Task
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
     * Set type
     *
     * @param integer $type
     *
     * @return Task
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set recurrent
     *
     * @param \GR\GameficatorBundle\Entity\Recurrent $recurrent
     *
     * @return Task
     */
    public function setRecurrent(\GR\GameficatorBundle\Entity\Recurrent $recurrent = null)
    {
        $this->recurrent = $recurrent;

        return $this;
    }

    /**
     * Get recurrent
     *
     * @return \GR\GameficatorBundle\Entity\Recurrent
     */
    public function getRecurrent()
    {
        return $this->recurrent;
    }

    /**
     * Add topic
     *
     * @param \GR\GameficatorBundle\Entity\Topic $topic
     *
     * @return Task
     */
    public function addTopic(\GR\GameficatorBundle\Entity\Topic $topic)
    {
        $this->topics[] = $topic;

        return $this;
    }

    /**
     * Remove topic
     *
     * @param \GR\GameficatorBundle\Entity\Topic $topic
     */
    public function removeTopic(\GR\GameficatorBundle\Entity\Topic $topic)
    {
        $this->topics->removeElement($topic);
    }

    /**
     * Get topics
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTopics()
    {
        return $this->topics;
    }


    /**
     * Set taskparent
     *
     * @param \GR\GameficatorBundle\Entity\Task $taskparent
     *
     * @return Task
     */
    public function setTaskparent(\GR\GameficatorBundle\Entity\Task $taskparent = null)
    {
        $this->taskparent = $taskparent;

        return $this;
    }

    /**
     * Get taskparent
     *
     * @return \GR\GameficatorBundle\Entity\Task
     */
    public function getTaskparent()
    {
        return $this->taskparent;
    }



    /**
     * Add tasksenfant
     *
     * @param \GR\GameficatorBundle\Entity\Task $tasksenfant
     *
     * @return Task
     */
    public function addTasksenfant(\GR\GameficatorBundle\Entity\Task $tasksenfant)
    {
        $this->tasksenfant[] = $tasksenfant;
        $tasksenfant->setTaskparent($this);
        return $this;
    }

    /**
     * Remove tasksenfant
     *
     * @param \GR\GameficatorBundle\Entity\Task $tasksenfant
     */
    public function removeTasksenfant(\GR\GameficatorBundle\Entity\Task $tasksenfant)
    {
        $this->tasksenfant->removeElement($tasksenfant);
    }

    /**
     * Get tasksenfant
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTasksenfant()
    {
        return $this->tasksenfant;
    }
}
