<?php

namespace Ccis\CcisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PiecesJoint
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Ccis\CcisBundle\Entity\PiecesJointRepository")
 */
class PiecesJoint
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
     * @var string
     *
     * @ORM\Column(name="format", type="string", length=255)
     */
    private $format;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="Activite")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $activite;


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
     * @return PiecesJoint
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
     * @return PiecesJoint
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
     * Set format
     *
     * @param string $format
     * @return PiecesJoint
     */
    public function setFormat($format)
    {
        $this->format = $format;
    
        return $this;
    }

    /**
     * Get format
     *
     * @return string 
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return PiecesJoint
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set activite
     *
     * @param \Ccis\CcisBundle\Entity\Activite $activite
     * @return PiecesJoint
     */
    public function setActivite($activite)
    {
        $this->activite = $activite;
    
        return $this;
    }

    /**
     * Get activite
     *
     * @return \Ccis\CcisBundle\Entity\Activite 
     */
    public function getActivite()
    {
        return $this->activite;
    }
}
