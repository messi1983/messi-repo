<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Sdz\BlogBundle\Constants\Constants;


/**
 * Techno
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\TechnoRepository")
 */
class Techno extends AbsRefPageWithLogo
{
    /**
     * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Texte", cascade={"persist", "remove"})
     */
    private $shortDescription;
    
	 /**
	 * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Texte", cascade={"persist", "remove"})
	 */
	private $description;
	
	/**
     * @ORM\ManyToMany(targetEntity="Sdz\BlogBundle\Entity\MotCle", cascade={"persist"})
     */
    private $motsCles;
	
	/**
     * @ORM\ManyToMany(targetEntity="Sdz\BlogBundle\Entity\Experience", cascade={"persist"})
     */
    private $experiences;
    
    /**
     * @ORM\ManyToMany(targetEntity="Sdz\BlogBundle\Entity\Formation", cascade={"persist"})
     */
    private $formations;
	
	/**
     * @ORM\ManyToOne(targetEntity="Sdz\BlogBundle\Entity\Categorie", inversedBy="technos", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $categorie;
	
	/**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer", nullable=true)
     */
	 private $level;
	 
	 /**
	  * Constructor
	  */
	 public function __construct()
	 {
	 	parent::__construct();
	 	
	 	$this->motsCles = new \Doctrine\Common\Collections\ArrayCollection();
	 	$this->formations = new \Doctrine\Common\Collections\ArrayCollection();
	 	$this->experiences = new \Doctrine\Common\Collections\ArrayCollection();
	 
	 	$this->level = 0;
	 }
	 
    /**
     * Set shortDescription
     *
     * @param \Sdz\BlogBundle\Entity\Texte $shortDescription
     * @return Ecole
     */
    public function setShortDescription(\Sdz\BlogBundle\Entity\Texte $shortDescription = null)
    {
    	$this->shortDescription->setLocale($this->locale);
    	
    	return $this;
    }
    
    /**
     * Get shortDescription
     *
     * @return \Sdz\BlogBundle\Entity\Texte
     */
    public function getShortDescription()
    {
    	return $this->shortDescription;
    }
    
    /**
     * Get shortDescription Texte
     *
     * @return \Sdz\BlogBundle\Entity\Texte
     */
    public function getShortDescriptionTexte()
    {
    	return $this->getTexteString($this->shortDescription);
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
    	return $this->getTexteString($this->description);
    }

    /**
     * Add motsCles
     *
     * @param \Sdz\BlogBundle\Entity\MotCle $motCle
     * @return Techno
     */
    public function addMotCle(\Sdz\BlogBundle\Entity\MotCle $motCle)
    {
        $this->motsCles[] = $motCle;
		$motCle->setTechno($this);
    
        return $this;
    }

    /**
     * Remove motsCles
     *
     * @param \Sdz\BlogBundle\Entity\MotCle $motCle
     */
    public function removeMotsCle(\Sdz\BlogBundle\Entity\MotCle $motCle)
    {
        $this->motsCles->removeElement($motCle);
    }

    /**
     * Get motsCles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMotsCles()
    {
        return $this->motsCles;
    }
	
	/**
     * Get publication label.
     *
     * @return string 
     */
	public function getPublicationLabel()
    {
        return 'Publier';
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     * @return Techno
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    
        return $this;
    }

    /**
     * Get categorie
     *
     * @return string 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Add motsCles
     *
     * @param \Sdz\BlogBundle\Entity\MotCle $motsCles
     * @return Techno
     */
    public function addMotsCle(\Sdz\BlogBundle\Entity\MotCle $motsCles)
    {
        $this->motsCles[] = $motsCles;
    
        return $this;
    }
	
    /**
     * Set level
     *
     * @param integer $level
     * @return Techno
     */
    public function setLevel($level)
    {
        $this->level = $level;
    
        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Add experience
     *
     * @param \Sdz\BlogBundle\Entity\Experience $experience
     * @return Techno
     */
    public function addExperience(\Sdz\BlogBundle\Entity\Experience $experience)
    {
    	if(!$this->experiences->contains($experience)) {
    		$this->experiences[] = $experience;
    	}
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
     * Add formation
     *
     * @param \Sdz\BlogBundle\Entity\Formation $formation
     * @return Techno
     */
    public function addFormation(\Sdz\BlogBundle\Entity\Formation $formation)
    {
    	$this->formations[] = $formation;
    
    	return $this;
    }
    
    /**
     * Remove formation
     *
     * @param \Sdz\BlogBundle\Entity\Formation $formation
     */
    public function removeFormation(\Sdz\BlogBundle\Entity\Formation $formation)
    {
    	$this->formations->removeElement($formation);
    }
    
    /**
     * Get formations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFormations()
    {
    	return $this->formations;
    }
    
}