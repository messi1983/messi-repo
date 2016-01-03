<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sdz\BlogBundle\Constants\Constants;

/**
 * Formation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\FormationRepository")
 */
class Formation
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
     * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Periode", cascade={"persist", "remove"})
     */
    private $periode;

    /**
     * @var string
     *
     * @ORM\Column(name="diplome", type="string", length=255, nullable=false)
     */
    private $diplome;
	
	/**
     * @ORM\ManyToMany(targetEntity="Sdz\BlogBundle\Entity\Ecole", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
	private $ecoles;
	
	/**
     * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Texte", cascade={"persist", "remove"})
     */
    private $description;
	
	/**
     * @ORM\ManyToMany(targetEntity="Sdz\BlogBundle\Entity\Techno", cascade={"persist"})
	 * @ORM\JoinColumn(nullable=true)
     */
    private $technos;
    
    /**
     * @var string
     */
    private $locale;
	
	/**
     * Constructor
     */
    public function __construct()
    {
		$this->publication = false;
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
     * Set publication
     *
     * @param boolean $publication
     * @return Formation
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
     * Set diplome
     *
     * @param string $diplome
     * @return Formation
     */
    public function setDiplome($diplome)
    {
        $this->diplome = $diplome;
    
        return $this;
    }

    /**
     * Get diplome
     *
     * @return string 
     */
    public function getDiplome()
    {
        return $this->diplome;
    }
    
    /**
     * Set description
     *
     * @param \Sdz\BlogBundle\Entity\Texte $description
     * @return Formation
     */
    public function setDescription(\Sdz\BlogBundle\Entity\Texte $description = null)
    {
    	$this->description = $description;
    	if($this->description != null) {
    		$this->description->setLocale($this->locale);
    	}
    
    	return $this;
    }
	
    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Get description Texte
     *
     * @return string
     */
    public function getDescriptionTexte()
    {
    	if($this->description != null) {
    		return $this->description->getTexte();
    	}
    	return Constants::EMPTY_STRING;
    }

    /**
     * Add ecole
     *
     * @param \Sdz\BlogBundle\Entity\Ecole $ecole
     * @return Formation
     */
    public function addEcole(\Sdz\BlogBundle\Entity\Ecole $ecole)
    {
        $this->ecoles[] = $ecole;
    
        return $this;
    }

    /**
     * Remove ecole
     *
     * @param \Sdz\BlogBundle\Entity\Ecole $ecole
     */
    public function removeEcole(\Sdz\BlogBundle\Entity\Ecole $ecole)
    {
        $this->ecole->removeElement($ecole);
    }
	
	/**
     * Get ecoles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEcoles()
    {
        return $this->ecoles;
    }

    /**
     * Add technos
     *
     * @param \Sdz\BlogBundle\Entity\Techno $techno
     * @return Formation
     */
    public function addTechno(\Sdz\BlogBundle\Entity\Techno $techno)
    {
        $this->technos[] = $techno;
    
        return $this;
    }

    /**
     * Remove technos
     *
     * @param \Sdz\BlogBundle\Entity\Techno $techno
     */
    public function removeTechno(\Sdz\BlogBundle\Entity\Techno $techno)
    {
        $this->technos->removeElement($techno);
    }

    /**
     * Get technos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTechnos()
    {
        return $this->technos;
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
    	return $this->getDiplome();
    }
    
    /**
     * Set periode
     *
     * @param \Sdz\BlogBundle\Entity\Periode $periode
     * @return Experience
     */
    public function setPeriode(\Sdz\BlogBundle\Entity\Periode $periode = null)
    {
    	$this->periode = $periode;
    
    	return $this;
    }
    
    /**
     * Get periode
     *
     * @return \Sdz\BlogBundle\Entity\Periode
     */
    public function getPeriode()
    {
    	return $this->periode;
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
}