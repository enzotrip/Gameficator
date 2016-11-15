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
}
