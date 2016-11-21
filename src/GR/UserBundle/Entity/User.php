<?php

namespace GR\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="gr_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="GR\GameficatorBundle\Entity\Project", mappedBy="user")
     */
    private $projects;

    /**
     * @ORM\OneToMany(targetEntity="GR\GameficatorBundle\Entity\Liste", mappedBy="user")
     */
    private $listes;

    /**
     * @ORM\OneToMany(targetEntity="GR\GameficatorBundle\Entity\Task", mappedBy="user")
     * @ORM\OrderBy({"deadline" = "DESC"})
     */
    private $tasks;

    /**
     * @ORM\OneToMany(targetEntity="GR\GameficatorBundle\Entity\Reward", mappedBy="user")
     */
    private $rewards;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Add project
     *
     * @param \GR\GameficatorBundle\Entity\Project $project
     *
     * @return User
     */
    public function addProject(\GR\GameficatorBundle\Entity\Project $project)
    {
        $this->projects[] = $project;

        $project->setUser($this);

        return $this;
    }

    /**
     * Remove project
     *
     * @param \GR\GameficatorBundle\Entity\Project $project
     */
    public function removeProject(\GR\GameficatorBundle\Entity\Project $project)
    {
        $this->projects->removeElement($project);
    }

    /**
     * Get projects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * Add liste
     *
     * @param \GR\GameficatorBundle\Entity\Liste $liste
     *
     * @return User
     */
    public function addListe(\GR\GameficatorBundle\Entity\Liste $liste)
    {
        $this->listes[] = $liste;

        $liste->setUser($this);

        return $this;
    }

    /**
     * Remove liste
     *
     * @param \GR\GameficatorBundle\Entity\Liste $liste
     */
    public function removeListe(\GR\GameficatorBundle\Entity\Liste $liste)
    {
        $this->listes->removeElement($liste);
    }

    /**
     * Get listes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getListes()
    {
        return $this->listes;
    }

    /**
     * Add task
     *
     * @param \GR\GameficatorBundle\Entity\Task $task
     *
     * @return User
     */
    public function addTask(\GR\GameficatorBundle\Entity\Task $task)
    {
        $this->tasks[] = $task;

        $task->setUser($this);

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
     * Add reward
     *
     * @param \GR\GameficatorBundle\Entity\Reward $reward
     *
     * @return User
     */
    public function addReward(\GR\GameficatorBundle\Entity\Reward $reward)
    {
        $this->rewards[] = $reward;
        $reward->setUser($this);
        return $this;
    }

    /**
     * Remove reward
     *
     * @param \GR\GameficatorBundle\Entity\Reward $reward
     */
    public function removeReward(\GR\GameficatorBundle\Entity\Reward $reward)
    {
        $this->rewards->removeElement($reward);
    }

    /**
     * Get rewards
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRewards()
    {
        return $this->rewards;
    }
}
