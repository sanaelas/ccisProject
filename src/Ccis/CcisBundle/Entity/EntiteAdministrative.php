<?php

namespace Ccis\CcisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * EntiteAdministrative
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class EntiteAdministrative
{
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id") 
     */
    private $responsable;
	
	
	/**
     * 
     * @ORM\OneToMany(targetEntity="Activite", mappedBy="entiteadministrative")
     */
	private $activites;
	
	 /**
     * Get activities
     *
     * @return  Doctrine\Common\Collections\ArrayCollection 
     */
    public function getActivities()
    {
        return $this->activites;
    }
	
	 /**
     * Set activities
     *
     * @param  Doctrine\Common\Collections\ArrayCollection $activities
     * @return EntiteAdministrative
     */
    public function setActivities($activities)
    {
        $this->activities = $activities;
    
        return $this;
    }
	
	public function __construct() {
        $this->activites = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return EntiteAdministrative
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return EntiteAdministrative
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
     * Set responsable
     *
     * @param \Ccis\CcisBundle\Entity\User $responsable
     * @return EntiteAdministrative
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;
    
        return $this;
    }

    /**
     * Get responsable
     *
     * @return \Ccis\CcisBundle\Entity\User
     */
    public function getResponsable()
    {
        return $this->responsable;
    }
}
