<?php

namespace GR\GameficatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Recurrent
 *
 * @ORM\Table(name="recurrent")
 * @ORM\Entity(repositoryClass="GR\GameficatorBundle\Repository\RecurrentRepository")
 */
class Recurrent
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
     * @ORM\ManyToMany(targetEntity="GR\GameficatorBundle\Entity\Day", cascade={"persist"})
     * @ORM\JoinTable(name="gr_recurrent_days")
     */
    private $days;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startdate", type="datetime", nullable=true)
     */
    private $startdate;


    /**
     * @var int
     *
     * @ORM\Column(name="nbchoice2", type="integer", nullable=true)
     */
    private $nbchoice2;

    /**
     * @var array
     *
     * @ORM\Column(name="timechoice2", type="array", nullable=true)
     */
    private $timechoice2;

    /**
     * @var int
     *
     * @ORM\Column(name="nbchoice3", type="integer", nullable=true)
     */
    private $nbchoice3;

    /**
     * @var array
     *
     * @ORM\Column(name="timechoice3", type="array", nullable=true)
     */
    private $timechoice3;


    public function __construct() {

        $this->startdate = new \Datetime();
        $this->days = new ArrayCollection();

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
     * Set startdate
     *
     * @param \DateTime $startdate
     *
     * @return Recurrent
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;

        return $this;
    }

    /**
     * Get startdate
     *
     * @return \DateTime
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Set nbchoice2
     *
     * @param integer $nbchoice2
     *
     * @return Recurrent
     */
    public function setNbchoice2($nbchoice2)
    {
        $this->nbchoice2 = $nbchoice2;

        return $this;
    }

    /**
     * Get nbchoice2
     *
     * @return int
     */
    public function getNbchoice2()
    {
        return $this->nbchoice2;
    }

    /**
     * Set timechoice2
     *
     * @param array $timechoice2
     *
     * @return Recurrent
     */
    public function setTimechoice2($timechoice2)
    {
        $this->timechoice2 = $timechoice2;

        return $this;
    }

    /**
     * Get timechoice2
     *
     * @return array
     */
    public function getTimechoice2()
    {
        return $this->timechoice2;
    }

    /**
     * Set nbchoice3
     *
     * @param integer $nbchoice3
     *
     * @return Recurrent
     */
    public function setNbchoice3($nbchoice3)
    {
        $this->nbchoice3 = $nbchoice3;

        return $this;
    }

    /**
     * Get nbchoice3
     *
     * @return int
     */
    public function getNbchoice3()
    {
        return $this->nbchoice3;
    }

    /**
     * Set timechoice3
     *
     * @param array $timechoice3
     *
     * @return Recurrent
     */
    public function setTimechoice3($timechoice3)
    {
        $this->timechoice3 = $timechoice3;

        return $this;
    }

    /**
     * Get timechoice3
     *
     * @return array
     */
    public function getTimechoice3()
    {
        return $this->timechoice3;
    }

    /**
     * Add day
     *
     * @param \GR\GameficatorBundle\Entity\Day $day
     *
     * @return Recurrent
     */
    public function addDay(\GR\GameficatorBundle\Entity\Day $day)
    {
        $this->days[] = $day;

        return $this;
    }

    /**
     * Remove day
     *
     * @param \GR\GameficatorBundle\Entity\Day $day
     */
    public function removeDay(\GR\GameficatorBundle\Entity\Day $day)
    {
        $this->days->removeElement($day);
    }

    /**
     * Get days
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDays()
    {
        return $this->days;
    }
}
