<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Danse
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\DanseRepository")
 */
class Danse extends AbsRefPageWithLogo
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
	private $shortDescription;
	
	/**
	 * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Texte", cascade={"persist", "remove"})
	 */
	private $commentaire;
	
	/**
	 * @ORM\ManyToMany(targetEntity="Sdz\BlogBundle\Entity\Image", cascade={"persist", "remove"})
	 */
	private $images;
	
	/**
	 * @ORM\ManyToMany(targetEntity="Sdz\BlogBundle\Entity\Organisme", cascade={"persist"})
	 */
	private $organismes;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="dateDebut", type="date")
	 */
	private $dateDebut;
	
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
     * Get duration
     *
     * @return string 
     */
    public function getDuration()
    {
		// if ($this->dateDebut != null)
		// {
			// return ($this->dateDebut - $this->dateDebut).' mois';
		// }
        return 'N/A';
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Danse
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
    
    /**
     * Add image
     *
     * @param \Sdz\BlogBundle\Entity\Image $image
     * @return Sport
     */
    public function addImage(\Sdz\BlogBundle\Entity\Image $image)
    {
    	$this->images[] = $image;
    
    	return $this;
    }
    
    /**
     * Remove image
     *
     * @param \Sdz\BlogBundle\Entity\Image $image
     */
    public function removeImage(\Sdz\BlogBundle\Entity\Image $image)
    {
    	$this->images->removeElement($image);
    
    	return $this;
    }
    
    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
    	return $this->images;
    }
    
    /**
     * Add organisme
     *
     * @param \Sdz\BlogBundle\Entity\Organisme $organisme
     * @return Sport
     */
    public function addOrganisme(\Sdz\BlogBundle\Entity\Organisme $organisme)
    {
    	$this->organismes[] = $organisme;
    
    	return $this;
    }
    
    /**
     * Remove organisme
     *
     * @param \Sdz\BlogBundle\Entity\Organisme $organisme
     */
    public function removeOrganisme(\Sdz\BlogBundle\Entity\Organisme $organisme)
    {
    	$this->organismes->removeElement($organisme);
    }
    
    /**
     * Get organismes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrganismes()
    {
    	return $this->organismes;
    }
    
    /**
     * Set shortDescription
     *
     * @param \Sdz\BlogBundle\Entity\Texte $shortDescription
     * @return Sport
     */
    public function setShortDescription(\Sdz\BlogBundle\Entity\Texte $shortDescription = null)
    {
    	$this->shortDescription = $shortDescription;
    
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
    	return $this->getTexteString($this->shortDescription);;
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
     * Get commentaireTexte
     *
     * @return \Sdz\BlogBundle\Entity\Texte
     */
    public function getCommentaireTexte()
    {
    	return $this->getTexteString($this->commentaire);
    }
    
    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     * @return Danse
     */
    public function setDateDebut($dateDebut)
    {
    	$this->dateDebut = $dateDebut;
    
    	return $this;
    }
    
    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
    	return $this->dateDebut;
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
}
