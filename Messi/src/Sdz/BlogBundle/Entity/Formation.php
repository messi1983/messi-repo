<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\FormationRepository")
 */
class Formation extends AbsRefPageEntity
{
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
     * Constructor
     */
    public function __construct()
    {
		parent::__construct();
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
    	return $this->getTexteString($this->description);
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
    
}