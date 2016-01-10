<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sdz\BlogBundle\Constants\Constants;

/**
 * Categorie
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\CategorieRepository")
 */
class Categorie
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
	 * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Texte", cascade={"persist", "remove"})
	 */
	private $description;

	/**
     * @ORM\OneToMany(targetEntity="Sdz\BlogBundle\Entity\Techno", mappedBy="categorie", cascade={"persist", "remove"})
     */
	private $technos;
	
	/**
     * @var boolean
     *
     * @ORM\Column(name="publication", type="boolean")
     */
    private $publication;
    
    /**
     * @var string
     */
    private $locale;
	
	/**
	 * Constructor.
	 */
	public function __construct()
	{
		$this->technos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Categorie
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
     * Add technos
     *
     * @param \Sdz\BlogBundle\Entity\Techno $techno
     * @return Categorie
     */
    public function addTechno(\Sdz\BlogBundle\Entity\Techno $techno)
    {
        $this->technos[] = $techno;
		$techno->setCategorie($this);
    
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
     * Set description
     *
     * @param \Sdz\BlogBundle\Entity\Texte $description
     * @return Experience
     */
    public function setDescription(\Sdz\BlogBundle\Entity\Texte $description = null)
    {
    	$this->description = $description;
    
    	return $this;
    }
    
    /**
     * Get description
     *
     * @return \Sdz\BlogBundle\Entity\Texte
     */
    public function getDescription()
    {
    	return $this->description;
    }
    
    /**
     * Get description Texte
     *
     * @return \Sdz\BlogBundle\Entity\Texte
     */
    public function getDescriptionTexte()
    {
    	$texte = '';
    	if($this->description !== null) {
    		if(Constants::LOCALE_FR == $this->locale) {
    			$texte = $this->description->getTexteFr();
    		} else {
    			$texte = $this->description->getTexteEn();
    		}
    	}
    
    	return $texte;
    }

    /**
     * Set publication
     *
     * @param boolean $publication
     * @return Categorie
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
