<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sdz\BlogBundle\Constants\Constants;

/**
 * Tache
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\SousTacheRepository")
 */
class SousTache
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
     * @ORM\ManyToOne(targetEntity="Sdz\BlogBundle\Entity\Tache", inversedBy="soustaches", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $tache;
    
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
     * Set tache
     *
     * @param \Sdz\BlogBundle\Entity\Tache $tache
     * @return SousTache
     */
    public function setTache(\Sdz\BlogBundle\Entity\Tache $tache)
    {
        $this->tache = $tache;
    
        return $this;
    }

    /**
     * Get tache
     *
     * @return \Sdz\BlogBundle\Entity\Tache 
     */
    public function getTache()
    {
        return $this->tache;
    }

    /**
     * Set ordre
     *
     * @param integer $ordre
     * @return SousTache
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
     * Set description
     *
     * @param \Sdz\BlogBundle\Entity\Texte $description
     * @return SousTache
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
     *
     * @param unknown $locale
     * @return \Sdz\BlogBundle\Entity\Ecole
     */
    public function setLocale($locale) {
    	$this->locale = $locale;
    
    	return $this;
    }
}