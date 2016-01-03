<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sdz\BlogBundle\Constants\Constants;

/**
 * Auteur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\AuteurRepository")
 */
class Auteur
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="datetime")
     */
    private $dateNaissance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDeces", type="datetime", nullable=true)
     */
    private $dateDeces;
	
	/**
     * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Image", cascade={"persist", "remove"})
     */
    private $photo;
	
	/**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=true)
     */
    private $link;
	
	/**
     * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Texte", cascade={"persist", "remove"})
     */
	private $biographie;

	
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
     * Set nom
     *
     * @param string $nom
     * @return Auteur
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
     * Set prenom
     *
     * @param string $prenom
     * @return Auteur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     * @return Auteur
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    
        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime 
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set dateDeces
     *
     * @param \DateTime $dateDeces
     * @return Auteur
     */
    public function setDateDeces($dateDeces)
    {
        $this->dateDeces = $dateDeces;
    
        return $this;
    }

    /**
     * Get dateDeces
     *
     * @return \DateTime 
     */
    public function getDateDeces()
    {
        return $this->dateDeces;
    }

    /**
     * Set publication
     *
     * @param boolean $publication
     * @return Auteur
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
     * Set photo
     *
     * @param \Sdz\BlogBundle\Entity\Image $photo
     * @return Auteur
     */
    public function setPhoto(\Sdz\BlogBundle\Entity\Image $photo = null)
    {
        $this->photo = $photo;
    
        return $this;
    }

    /**
     * Get photo
     *
     * @return \Sdz\BlogBundle\Entity\Image 
     */
    public function getPhoto()
    {
        return $this->photo;
    }
	
	/**
     * Set link
     *
     * @param string $link
     * @return Organisme
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
     * Set biographie
     *
     * @param \Sdz\BlogBundle\Entity\Texte $biographie
     * @return Auteur
     */
    public function setBiographie(\Sdz\BlogBundle\Entity\Texte $biographie = null)
    {
    	$this->biographie = $biographie;
    
    	return $this;
    }

    /**
     * Get biographie
     *
     * @return string 
     */
    public function getBiographie()
    {
        return $this->biographie;
    }
    
    /**
     * Get biographie Texte
     *
     * @return \Sdz\BlogBundle\Entity\Texte
     */
    public function getBiographieTexte()
    {
    	$texte = '';
    	if($this->biographie != null) {
    		if(Constants::LOCALE_FR == $this->locale) {
    			$texte = $this->biographie->getTexteFr();
    		} else {
    			$texte = $this->biographie->getTexteEn();
    		}
    	}
    	 
    	return $texte;
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
}