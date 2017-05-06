<?php

namespace Ccis\CcisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Activite
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Ccis\CcisBundle\Entity\ActiviteRepository")
 */
class Activite {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="resume", type="string", length=255, nullable=true)
     */
    private $resume;

    /**
     * @var string
     *
     * @ORM\Column(name="detail", type="string", length=255)
     */
    private $detail;

    /**
     *   
     * @ORM\ManyToOne(targetEntity="EntiteAdministrative", inversedBy="activities")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @ORM\Column(nullable=true)
     */
    private $entiteadministrative;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @ORM\Column(nullable=true)
     */
    private $createur;

    /**
     * 
     * @ORM\OneToMany(targetEntity="PiecesJoint", mappedBy="activite")
     * @ORM\Column(nullable=true)
     */
    private $piecesjointes;

    /**
     * Get piecesjointes
     *
     * @return  Doctrine\Common\Collections\ArrayCollection 
     */
    public function getPiecesjointes() {
        return $this->piecesjointes;
    }

    /**
     * Set piecesjointes
     *
     * @param  Doctrine\Common\Collections\ArrayCollection $piecesjointes
     * @return Activite
     */
    public function setPiecesjointes($piecesjointes) {
        $this->piecesjointes = $piecesjointes;

        return $this;
    }

    public function __construct() {
        $this->piecesjointes = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Activite
     */
    public function setTitre($titre) {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre() {
        return $this->titre;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Activite
     */
    public function setDate($date) {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * Set resume
     *
     * @param string $resume
     * @return Activite
     */
    public function setResume($resume) {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get resume
     *
     * @return string 
     */
    public function getResume() {
        return $this->resume;
    }

    /**
     * Set detail
     *
     * @param string $detail
     * @return Activite
     */
    public function setDetail($detail) {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get detail
     *
     * @return string 
     */
    public function getDetail() {
        return $this->detail;
    }

    /**
     * Set entiteadministrative
     *
     * @param \Ccis\CcisBundle\Entity\EntiteAdministrative $entiteadministrative
     * @return Activite
     */
    public function setEntiteadministrative($entiteadministrative) {
        $this->entiteadministrative = $entiteadministrative;

        return $this;
    }

    /**
     * Get entiteadministrative
     *
     * @return \Ccis\CcisBundle\Entity\EntiteAdministrative 
     */
    public function getEntiteadministrative() {
        return $this->entiteadministrative;
    }

    /**
     * Set createur
     *
     * @param \Ccis\CcisBundle\Entity\User $createur
     * @return Activite
     */
    public function setCreateur($createur) {
        $this->createur = $createur;

        return $this;
    }

    /**
     * Get createur
     *
     * @return \Ccis\CcisBundle\Entity\User
     */
    public function getCreateur() {
        return $this->createur;
    }

}
