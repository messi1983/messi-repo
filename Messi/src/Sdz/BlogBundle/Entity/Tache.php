<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sdz\BlogBundle\Constants\Constants;

/**
 * Tache
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\TacheRepository")
 */
class Tache
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
     * @var integer
     *
     * @ORM\Column(name="ordre", type="integer")
     */
	private $ordre;
	
	/**
	 * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Texte", cascade={"persist", "remove"})
	 */
	private $description;
	
	/**
     * @ORM\ManyToOne(targetEntity="Sdz\BlogBundle\Entity\Experience", inversedBy="taches", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $experience;
    
    /**
     * @ORM\OneToMany(targetEntity="Sdz\BlogBundle\Entity\SousTache", mappedBy="tache", cascade={"persist", "remove"})
     */
    private $soustaches;
    
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
		$this->ordre = 0;
		$this->soustaches = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set description
     *
     * @param \Sdz\BlogBundle\Entity\Texte $description
     * @return Experience
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
    	if($this->description != null) {
    		return $this->description->getTexte();
    	}
    	return Constants::EMPTY_STRING;
    }

    /**
     * Set experience
     *
     * @param \Sdz\BlogBundle\Entity\Experience $experience
     * @return Tache
     */
    public function setExperience(\Sdz\BlogBundle\Entity\Experience $experience)
    {
        $this->experience = $experience;
    
        return $this;
    }

    /**
     * Get experience
     *
     * @return \Sdz\BlogBundle\Entity\Experience 
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set ordre
     *
     * @param integer $ordre
     * @return Tache
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;
    
        return $this;
    }

    /**
     * Get ordre
     *
     * @return integer 
     */
    public function getOrdre()
    {
        return $this->ordre;
    }
    
    /**
     * Add soustaches
     *
     * @param \Sdz\BlogBundle\Entity\SousTache $soustache
     * @return Tache
     */
    public function addSousTache(\Sdz\BlogBundle\Entity\SousTache $soustache)
    {
    	$this->soustaches[] = $soustache;
    	$soustache->setTache($this);
    
    	return $this;
    }
    
    /**
     * Remove soustaches
     *
     * @param \Sdz\BlogBundle\Entity\SousTache $soustache
     */
    public function removeSousTache(\Sdz\BlogBundle\Entity\SousTache $soustache)
    {
    	$this->soustaches->removeElement($soustache);
    }
    
    /**
     * Get soustaches
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSousTaches()
    {
    	return $this->soustaches;
    }
    
    /**
     * Get refence page name.
     *
     * @return string
     */
    public function getReferencePageName()
    {
    	return $this->getDescription();
    }

    /**
     *
     * @param unknown $locale
     * @return \Sdz\BlogBundle\Entity\Ecole
     */
    public function setLocale($locale) {
    	$this->locale = $locale;
    	
    	// Set locale
    	foreach($this->getSousTaches() as $sousTache) {
    		$sousTache->setLocale($locale);
    	}
    
    	return $this;
    }
    
    /**
     * @ORM\PreUpdate()
     */
    public function updateSousTaches() {
    	foreach($this->soustaches as $soustache)
    	{
    		if($soustache->getTache() == null) {
    			$soustache->setTache($this);
    		}
    	}
    }
}