<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Sdz\BlogBundle\Constants\Constants;

/**
 * Experience
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\ExperienceRepository")
 */
class Experience extends AbsRefPageEntity
{
	/**
     * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Texte", cascade={"persist", "remove"})
     */
	private $poste;
	
	/**
     * @Gedmo\Slug(fields={"projet"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;
	
    /**
     * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Periode", cascade={"persist", "remove"})
     */
    private $periode;

    /**
     * @var string
     *
     * @ORM\Column(name="projet", type="string", length=25)
     */
    private $projet;

   	/**
     * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Texte", cascade={"persist", "remove"})
     */
    private $description;
    
	 /**
     * @ORM\ManyToOne(targetEntity="Sdz\BlogBundle\Entity\Societe", inversedBy="experiences", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $societe;
	
	/**
     * @ORM\ManyToMany(targetEntity="Sdz\BlogBundle\Entity\Techno", cascade={"persist"})
     */
    private $technos;
	
	/**
     * @ORM\OneToMany(targetEntity="Sdz\BlogBundle\Entity\Tache", mappedBy="experience", cascade={"persist", "remove"})
     */
    private $taches;

	/**
     * @var string
     *
     * @ORM\Column(name="lieu", type="text")
     */
    private $lieu;
	
	/**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="date")
     */
    private $dateCreation;
	
	/**
     * @var \DateTime
     *
     * @ORM\Column(name="dateModification", type="date", nullable=true)
     */
    private $dateModification;
    
	/**
     * Constructor
     */
    public function __construct()
	{
		parent::__construct();
		
		$this->technos = new \Doctrine\Common\Collections\ArrayCollection();
		$this->taches = new \Doctrine\Common\Collections\ArrayCollection();
		$this->dateCreation = new \Datetime();
	}
	
    /**
     * Set projet
     *
     * @param string $projet
     * @return Experience
     */
    public function setProjet($projet)
    {
        $this->projet = $projet;
    
        return $this;
    }

    /**
     * Get projet
     *
     * @return string 
     */
    public function getProjet()
    {
        return $this->projet;
    }

    /**
     * Set societe
     *
     * @param string $societe
     * @return Experience
     */
    public function setSociete($societe)
    {
        $this->societe = $societe;
    
        return $this;
    }

    /**
     * Get societe
     *
     * @return string 
     */
    public function getSociete()
    {
        return $this->societe;
    }
    
    /**
     * Add technos
     *
     * @param \Sdz\BlogBundle\Entity\Techno $technos
     * @return Experience
     */
    public function addTechno(\Sdz\BlogBundle\Entity\Techno $techno)
    {
        $this->technos[] = $techno;
    
        return $this;
    }

    /**
     * Remove technos
     *
     * @param \Sdz\BlogBundle\Entity\Techno $technos
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
     * Set slug
     *
     * @param string $slug
     * @return Experience
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Experience
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    
        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set dateModification
     *
     * @param \DateTime $dateModification
     * @return Experience
     */
    public function setDateModification($dateModification)
    {
        $this->dateModification = $dateModification;
    
        return $this;
    }

    /**
     * Get dateModification
     *
     * @return \DateTime 
     */
    public function getDateModification()
    {
        return $this->dateModification;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     * @return Experience
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    
        return $this;
    }

    /**
     * Get lieu
     *
     * @return string 
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Add taches
     *
     * @param \Sdz\BlogBundle\Entity\Tache $tache
     * @return Experience
     */
    public function addTache(\Sdz\BlogBundle\Entity\Tache $tache)
    {
        $this->taches[] = $tache;
		$tache->setExperience($this); // On ajoute ceci
    
        return $this;
    }

    /**
     * Remove taches
     *
     * @param \Sdz\BlogBundle\Entity\Tache $tache
     */
    public function removeTache(\Sdz\BlogBundle\Entity\Tache $tache)
    {
        $this->taches->removeElement($tache);
    }

    /**
     * Get taches
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTaches()
    {
        return $this->taches;
    }
	
	 /**
     * Get duration
     *
     * @return string 
     */
    public function getDuration()
    {
    	if($this->periode !== null) {
			if ($this->periode->getDateFin() !== null && $this->periode->getDateDebut() !== null)
			{
				$diff = $this->periode->getDateFin()->diff($this->periode->getDateDebut());
				return $diff->format('%m mois');
			}
    	}
        return 'En cours';
    }

    /**
     * Get refence page name.
     *
     * @return string
     */
    public function getReferencePageName()
    {
    	return $this->getProjet();
    }
    
    /**
     *
     * @param unknown $locale
     * @return \Sdz\BlogBundle\Entity\Ecole
     */
    public function setLocale($locale) {
    	parent::setLocale( $locale);
    	
    	if($this->taches !== null) {
    		foreach($this->taches as $tache) {
    			$tache->setLocale($locale);
    			
    			if($tache->getSoustaches() !== null) {
    				foreach($tache->getSoustaches() as $sousTache) {
    					$sousTache->setLocale($locale);
    				}
    			}
    		}
    	}
    
    	return $this;
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
     * Set poste
     *
     * @param \Sdz\BlogBundle\Entity\Texte $poste
     * @return Experience
     */
    public function setPoste(\Sdz\BlogBundle\Entity\Texte $poste = null)
    {
        $this->poste = $poste;
    
        return $this;
    }

    /**
     * Get poste
     *
     * @return \Sdz\BlogBundle\Entity\Texte 
     */
    public function getPoste()
    {
        return $this->poste;
    }
    
    /**
     * Get posteTexte Texte
     *
     * @return \Sdz\BlogBundle\Entity\Texte
     */
    public function getPosteTexte()
    {
    	return $this->getTexteString($this->poste);
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
