<?php

namespace GR\GameficatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use When\When;


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
     * @ORM\Column(name="mode", type="integer", nullable=true)
     */
    private $mode;

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

    /**
     * @var array
     *
     * @ORM\Column(name="occurences", type="array", nullable=true)
     */
    private $occurences;


    public function __construct() {

        $this->startdate = new \Datetime();
        date_add($this->startdate, date_interval_create_from_date_string('1 hour'));
        $this->days = new ArrayCollection();
        $this->mode = 2;

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

    /**
     * Set mode
     *
     * @param integer $mode
     *
     * @return Recurrent
     */
    public function setMode($mode)
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * Get mode
     *
     * @return integer
     */
    public function getMode()
    {
        return $this->mode;
    }

    public function setOccurrencesByWhen() {
        $r = new When();
        $r2 = new When();
        $flag =false;
        $today = new \Datetime();
        date_add($today, date_interval_create_from_date_string('1 hour'));
        $stdr = substr(strtoupper($today->format('l')), 0, 2);
        $days = array($stdr);
        foreach($this->days as $day) {
            if($day->getName() == "Lundi"){
                $days[] = "MO";
                $flag = true;
            }elseif($day->getName() == "Mardi") {
                $days[] = "TU";
                $flag = true;
            }elseif($day->getName() == "Mercredi") {
                $days[] = "WE";
                $flag = true;
            }elseif($day->getName() == "Jeudi") {
                $days[] = "TH";
                $flag = true;
            }elseif($day->getName() == "Vendredi") {
                $days[] = "FR";
                $flag = true;
            }elseif($day->getName() == "Samedi") {
                $days[] = "SA";
                $flag = true;
            }elseif($day->getName() == "Dimanche") {
                $days[] = "SU";
                $flag = true;
            }
        }
        if($flag == false) {
            if($this->timechoice2 == "Heures"){
                $r2->startDate($this->startdate)
                   ->freq("hourly")
                   ->count(10)
                   ->interval($this->nbchoice2)
                   ->generateOccurrences();
                unset($r2->occurrences[0]);
                $r2->occurrences = array_values($r2->occurrences);

                $r->startDate($r2->occurrences[0])
                  ->freq("hourly")
                  ->count(10)
                  ->interval($this->nbchoice2)
                  ->generateOccurrences();
            }elseif($this->timechoice2 == "Jours"){
                $r->startDate($this->startdate)
                  ->freq("daily")
                  ->count(10)
                  ->interval($this->nbchoice2)
                  ->generateOccurrences();
            }elseif($this->timechoice2 == "Semaines"){
                $r->startDate($this->startdate)
                  ->freq("weekly")
                  ->count(10)
                  ->interval($this->nbchoice2)
                  ->generateOccurrences();
            }elseif($this->timechoice2 == "Mois"){
                $r->startDate($this->startdate)
                  ->freq("monthly")
                  ->count(10)
                  ->interval($this->nbchoice2)
                  ->generateOccurrences();
            }elseif($this->timechoice2 == "Ans"){
                $r->startDate($this->startdate)
                  ->freq("yearly")
                  ->count(10)
                  ->bymonth($this->startdate->format('m'))
                  ->interval($this->nbchoice2)
                  ->generateOccurrences();
            }
       }elseif ($flag==true){
          // if($flag==true) {
            $date = new \Datetime();
            date_add($date, date_interval_create_from_date_string('1 hour'));
                $r2->startDate($date)
                   ->freq("weekly")
                   ->count(10)
                   ->byday($days)
                   ->generateOccurrences();
                unset($days[0]);
                $days = array_values($days);

                $r->startDate($r2->occurrences[1])
                  ->freq("weekly")
                  ->count(10)
                  ->byday($days)
                  ->generateOccurrences();
           // }
       }
        $occurrences = $r->occurrences;
        $this->occurences = $occurrences;
        return $this;
    }

    public function updateOccurrences(){
        $today[] = new \Datetime();
        $today[0]->setTimezone(new \DateTimeZone('Europe/Paris'));
        date_add($today[0], date_interval_create_from_date_string('1 hours'));

        $clone = $today;
        $date = new \Datetime();
        date_add($date, date_interval_create_from_date_string('1 hours'));
        if($this->occurences[0] < $clone[0]){
            unset($this->occurences[0]);
            $this->setStartdate($date);
            $this->setOccurrencesByWhen();
            //$this->occurences = array_values($this->occurences);
        }
    }
    /**
     * Set occurences
     *
     * @param array $occurences
     *
     * @return Recurrent
     */
    public function setOccurences($occurences)
    {
        $this->occurences = $occurences;

        return $this;
    }
    /**
     * Get occurences
     *
     * @return array
     */
    public function getOccurences()
    {
        return $this->occurences;
    }

}
