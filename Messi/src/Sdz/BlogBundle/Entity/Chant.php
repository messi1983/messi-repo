<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sdz\BlogBundle\Constants\Constants;

/**
 * Chant
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\ChantRepository")
 */
class Chant
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
     * @var boolean
     *
     * @ORM\Column(name="publication", type="boolean")
     */
    private $publication;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", columnDefinition="enum('RNB', 'RAP', 'Classique')")
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRedaction", type="date", nullable=true)
     */
    private $dateRedaction;

    /**
     * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Texte", cascade={"persist", "remove"})
     */
    private $resume;
	
    /**
     * @ORM\ManyToMany(targetEntity="Sdz\BlogBundle\Entity\SongPart", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $parts;
    
    /**
     * @var string
     */
    private $locale;

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
     * Set publication
     *
     * @param boolean $publication
     * @return Chant
     */
    public function setPublication($publication)
    {
        $this->publication = $publication;
    
        return $this;
    }

    /**
     * Get publication
     *
     * @return boolean 
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Chant
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set dateRedaction
     *
     * @param \DateTime $dateRedaction
     * @return Chant
     */
    public function setDateRedaction($dateRedaction)
    {
        $this->dateRedaction = $dateRedaction;
    
        return $this;
    }

    /**
     * Get dateRedaction
     *
     * @return \DateTime 
     */
    public function getDateRedaction()
    {
        return $this->dateRedaction;
    }

    /**
     * Set resume
     *
     * @param \Sdz\BlogBundle\Entity\Texte $resume
     * @return Chant
     */
    public function setResume(\Sdz\BlogBundle\Entity\Texte $resume = null)
    {
    	$this->resume = $resume;
    	if($this->resume != null) {
    		$this->resume->setLocale($this->locale);
    	}
    	return $this;
    }
    
    /**
     * Get resume
     *
     * @return \Sdz\BlogBundle\Entity\Texte
     */
    public function getResume()
    {
    	return $this->resume;
    }
    
    /**
     * Get resume Texte
     *
     * @return string
     */
    public function getResumeTexte()
    {
    	if($this->resume != null) {
    		return $this->resume->getTexte();
    	}
    	return Constants::EMPTY_STRING;
    }
    
    /**
     * Set type
     *
     * @param string $type
     * @return Chant
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
	
	/**
     * Get publish option value.
     *
     * @return string 
     */
	public function isYes()
    {
        return true;
    }

    /**
     * Get refence page name.
     *
     * @return string
     */
    public function getReferencePageName()
    {
    	return $this->getTitre();
    }
    
    /**
     *
     * @param unknown $locale
     * @return \Sdz\BlogBundle\Entity\Ecole
     */
    public function setLocale($locale) {
    	$this->locale = $locale;
    
    	return $this;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->parts = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add parts
     *
     * @param \Sdz\BlogBundle\Entity\Texte $part
     * @return Chant
     */
    public function addPart(\Sdz\BlogBundle\Entity\Texte $part)
    {
        $this->parts[] = $part;
    
        return $this;
    }

    /**
     * Remove parts
     *
     * @param \Sdz\BlogBundle\Entity\Texte $part
     */
    public function removePart(\Sdz\BlogBundle\Entity\Texte $part)
    {
        $this->parts->removeElement($part);
    }

    /**
     * Get parts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getParts()
    {
        return $this->parts;
    }

}