<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sdz\BlogBundle\Constants\Constants;

/**
 * Organisme
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\OrganismeRepository")
 */
class Organisme extends AbstractEntity
{
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
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255, nullable=true)
     */
    private $tel;

	/**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEntree", type="date")
     */
    private $dateEntree;
	
	/**
     * @var \DateTime
     *
     * @ORM\Column(name="dateSortie", type="date", nullable=true)
     */
    private $dateSortie;
    
    /**
     * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Adresse", cascade={"persist", "remove"})
     */
    private $adresse;
    
	/**
     * Constructor
     */
    public function __construct()
    {
		parent::__construct();
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
     * Get $descriptif
     *
     * @return \Sdz\BlogBundle\Entity\Texte
     */
    public function getDescriptif()
    {
    	return $this->descriptif;
    }
    
    /**
     * Get descriptif text
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
     * Set tel
     *
     * @param string $tel
     * @return Ecole
     */
    public function setTel($tel)
    {
    	$this->tel = $tel;
    
    	return $this;
    }
    
    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
    	return $this->tel;
    }
    
    /**
     * Set dateEntree
     *
     * @param \DateTime $dateEntree
     * @return Organisme
     */
    public function setDateEntree($dateEntree)
    {
        $this->dateEntree = $dateEntree;
    
        return $this;
    }

    /**
     * Get dateEntree
     *
     * @return \DateTime 
     */
    public function getDateEntree()
    {
        return $this->dateEntree;
    }

    /**
     * Set dateSortie
     *
     * @param \DateTime $dateSortie
     * @return Organisme
     */
    public function setDateSortie($dateSortie)
    {
        $this->dateSortie = $dateSortie;
    
        return $this;
    }

    /**
     * Get dateSortie
     *
     * @return \DateTime 
     */
    public function getDateSortie()
    {
        return $this->dateSortie;
    }
    
    /**
     * Set adresse
     *
     * @param \Sdz\BlogBundle\Entity\Adresse $adresse
     * @return Ecole
     */
    public function setAdresse(\Sdz\BlogBundle\Entity\Adresse $adresse = null)
    {
    	$this->adresse = $adresse;
    
    	return $this;
    }
    
    /**
     * Get adresse
     *
     * @return \Sdz\BlogBundle\Entity\Adresse
     */
    public function getAdresse()
    {
    	return $this->adresse;
    }
    
}