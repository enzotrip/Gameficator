<?php

namespace GR\GameficatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * List
 *
 * @ORM\Table(name="liste")
 * @ORM\Entity(repositoryClass="GR\GameficatorBundle\Repository\ListeRepository")
 */
class Liste
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
     * @ORM\OneToMany(targetEntity="GR\GameficatorBundle\Entity\Task", mappedBy="liste")
     */
    private $tasks;

    /**
     * @ORM\ManyToOne(targetEntity="GR\UserBundle\Entity\User", inversedBy="listes")
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
     * @ORM\Column(name="LastUpdate", type="datetime")
     */
    private $lastUpdate;

    /**
     * @var string
     *
     * @ORM\Column(name="Motivations", type="string", length=255)
     */
    private $motivations;


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
     * @return List
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
     * Set lastUpdate
     *
     * @param \DateTime $lastUpdate
     *
     * @return List
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
     * Set motivations
     *
     * @param string $motivations
     *
     * @return List
     */
    public function setMotivations($motivations)
    {
        $this->motivations = $motivations;

        return $this;
    }

    /**
     * Get motivations
     *
     * @return string
     */
    public function getMotivations()
    {
        return $this->motivations;
    }

    /**
     * Set user
     *
     * @param \GR\UserBundle\Entity\User $user
     *
     * @return Liste
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
     * @return Liste
     */
    public function addTask(\GR\GameficatorBundle\Entity\Task $task)
    {
        $this->tasks[] = $task;

        $task->setListe($this);

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
