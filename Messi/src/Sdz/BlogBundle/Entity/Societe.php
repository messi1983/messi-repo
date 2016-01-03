<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Societe
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\SocieteRepository")
 */
class Societe extends AbsRefPageWithLogo
{
	/**
	 * @var string
	 *
	 * @ORM\Column(name="nom", type="string", length=255)
	 */
	private $nom;
	
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
     * Constructor
     */
    public function __construct()
    {
		parent::__construct();
    }
    
    /**
     * Set nom
     *
     * @param string $nom
     * @return Danse
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
     * Set descriptif
     *
     * @param \Sdz\BlogBundle\Entity\Texte $descriptif
     * @return Societe
     */
    public function setDescriptif(\Sdz\BlogBundle\Entity\Texte $descriptif = null)
    {
    	$this->descriptif = $descriptif;
    
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
    	return $this->getTexteString($this->descriptif);
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
     * Set commentaire
     *
     * @param \Sdz\BlogBundle\Entity\Texte $commentaire
     * @return Danse
     */
    public function setCommentaire(\Sdz\BlogBundle\Entity\Texte $commentaire = null)
    {
    	$this->commentaire = $commentaire;
    	if($this->commentaire !== null) {
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
    
    /**
     * Get refence page name.
     *
     * @return string
     */
    public function getReferencePageName()
    {
    	return $this->nom;
    }
}