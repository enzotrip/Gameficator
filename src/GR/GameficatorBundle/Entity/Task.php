<?php

namespace GR\GameficatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\OneToOne(targetEntity="GR\GameficatorBundle\Entity\Reward")
     * @ORM\JoinColumn(nullable=true)
     */
     private $reward;

     /**
      * @ORM\ManyToOne(targetEntity="GR\GameficatorBundle\Entity\Project")
      * @ORM\JoinColumn(nullable=true)
      */
      private $project;

      /**
       * @ORM\ManyToOne(targetEntity="GR\GameficatorBundle\Entity\Liste")
       * @ORM\JoinColumn(nullable=true)
       */
       private $liste;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Start", type="datetime")
     */
    private $start;

    /**
     * @var array
     *
     * @ORM\Column(name="Type", type="array")
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Deadline", type="datetime")
     */
    private $deadline;

    /**
     * @var array
     *
     * @ORM\Column(name="State", type="array")
     */
    private $state;

    /**
     * @var int
     *
     * @ORM\Column(name="Priority", type="integer")
     */
    private $priority;


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
     * Set type
     *
     * @param array $type
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
     * @return array
     */
    public function getType()
    {
        return $this->type;
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
}
