<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sdz\BlogBundle\Constants\Constants;

/**
 * Societe
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\SocieteRepository")
 */
class Societe
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
     * @ORM\Column(name="nom", type="string", length=30)
     */
    private $nom;
	
	/**
     * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Image", cascade={"persist", "remove"})
     */
    private $logo;
	
    /**
     * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Texte", cascade={"persist", "remove"})
     */
    private $descriptif;
    
	
	/**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=true)
     */
    private $link;
	
	/**
     * @ORM\OneToMany(targetEntity="Sdz\BlogBundle\Entity\Experience", mappedBy="societe", cascade={"persist", "remove"})
     */
    private $experiences;
	
    /**
     * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Texte", cascade={"persist", "remove"})
     */
    private $commentaire;
    
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
     * @return Experience
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
     * Set nom
     *
     * @param string $nom
     * @return Societe
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
     * Set logo
     *
     * @param \Sdz\BlogBundle\Entity\Image $logo
     * @return Societe
     */
    public function setLogo(\Sdz\BlogBundle\Entity\Image $logo = null)
    {
        $this->logo = $logo;
    
        return $this;
    }

    /**
     * Get logo
     *
     * @return \Sdz\BlogBundle\Entity\Image 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set descriptif
     *
     * @param \Sdz\BlogBundle\Entity\Texte $descriptif
     * @return Societe
     */
    public function setDescriptif(\Sdz\BlogBundle\Entity\Texte $descriptif = null)
    {
    	$this->descriptif = $descriptif;
    	if($this->descriptif != null) {
    		$this->descriptif->setLocale($this->locale);
    	}
    
    	return $this;
    }
    
    /**
     * Get descriptif
     *
     * @return \Sdz\BlogBundle\Entity\Texte
     */
    public function getDescriptif()
    {
    	return $this->descriptif;
    }
    
    /**
     * Get shortDescription Texte
     *
     * @return \Sdz\BlogBundle\Entity\Texte
     */
    public function getDescriptifTexte()
    {
    	if($this->descriptif != null) {
    		return $this->descriptif->getTexte();
    	}
    	return Constants::EMPTY_STRING;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Societe
     */
    public function setLink($link)
    {
        $this->link = $link;
    
        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Add experience
     *
     * @param \Sdz\BlogBundle\Entity\Experience $experience
     * @return Societe
     */
    public function addExperience(\Sdz\BlogBundle\Entity\Experience $experience)
    {
        $this->experiences[] = $experience;
		$experience->setSociete($this); 
        return $this;
    }

    /**
     * Remove experience
     *
     * @param \Sdz\BlogBundle\Entity\Experience $experience
     */
    public function removeExperience(\Sdz\BlogBundle\Entity\Experience $experience)
    {
        $this->experiences->removeElement($experience);
    }

    /**
     * Get experiences
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getExperiences()
    {
        return $this->experiences;
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
    	return $this->getNom();
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
     * Set commentaire
     *
     * @param \Sdz\BlogBundle\Entity\Texte $commentaire
     * @return Danse
     */
    public function setCommentaire(\Sdz\BlogBundle\Entity\Texte $commentaire = null)
    {
    	$this->commentaire = $commentaire;
    	if($this->commentaire != null) {
    		$this->commentaire->setLocale($this->locale);
    	}
    	return $this;
    }
    
    /**
     * Get commentaire
     *
     * @return \Sdz\BlogBundle\Entity\Texte
     */
    public function getCommentaire()
    {
    	return $this->commentaire;
    }
    
}