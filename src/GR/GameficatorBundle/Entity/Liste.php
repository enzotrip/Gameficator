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
     * @ORM\OneToOne(targetEntity="GR\GameficatorBundle\Entity\Task", mappedBy="listeprinc")
     */
    private $taskparente;

    /**
     * @ORM\ManyToOne(targetEntity="GR\UserBundle\Entity\User", inversedBy="listes")
     */
    private $user;

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


   

    /**
     * Set taskparente
     *
     * @param \GR\GameficatorBundle\Entity\Task $taskparente
     *
     * @return Liste
     */
    public function setTaskparente(\GR\GameficatorBundle\Entity\Task $taskparente = null)
    {
        $this->taskparente = $taskparente;
        $taskparente->setListeprinc($this);

        return $this;
    }

    /**
     * Get taskparente
     *
     * @return \GR\GameficatorBundle\Entity\Task
     */
    public function getTaskparente()
    {
        return $this->taskparente;
    }
}
