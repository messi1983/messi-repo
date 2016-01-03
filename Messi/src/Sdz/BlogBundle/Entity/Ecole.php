<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Sdz\BlogBundle\Constants\Constants;

/**
 * Ecole
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\EcoleRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Ecole extends AbsRefPageWithLogo
{	
    /**
     * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Texte", cascade={"persist", "remove"})
     */
    private $shortDescription;
    
    /**
     * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Texte", cascade={"persist", "remove"})
     */
    private $detailedDescription;
    
	/**
	 * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Adresse", cascade={"persist", "remove"})
	 */
	private $adresse;
	
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
     * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Periode", cascade={"persist", "remove"})
     */
    private $periode;
    
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
     * Set periode
     *
     * @param \Sdz\BlogBundle\Entity\Periode $periode
     * @return Ecole
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

    /**
     * Set link
     *
     * @param string $link
     * @return Ecole
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
     * Get dateEntree
     *
     * @return \DateTime 
     */
    public function getDateEntree()
    {
    	if($this->periode !== null) {
        	return $this->periode->getDateDebut();	
    	}
    	return new \DateTime();
    }

    /**
     * Get dateSortie
     *
     * @return \DateTime 
     */
    public function getDateSortie()
    {
        if($this->periode !== null) {
        	return $this->periode->getDateFin();	
    	}
    	return new \DateTime();
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

    /**
     * Set shortDescription
     *
     * @param \Sdz\BlogBundle\Entity\Texte $shortDescription
     * @return Ecole
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
    	if($this->shortDescription !== null) {
    		return $this->shortDescription->getTexte();
    	}
    	return Constants::EMPTY_STRING;
    }

    /**
     * Set detailedDescription
     *
     * @param \Sdz\BlogBundle\Entity\Texte $detailedDescription
     * @return Ecole
     */
    public function setDetailedDescription(\Sdz\BlogBundle\Entity\Texte $detailedDescription = null)
    {
        $this->detailedDescription = $detailedDescription;
        if($this->detailedDescription !== null) {
        	$this->detailedDescription->setLocale($this->locale);
        }
        return $this;
    }

    /**
     * Get detailedDescription
     *
     * @return \Sdz\BlogBundle\Entity\Texte 
     */
    public function getDetailedDescription()
    {
        return $this->detailedDescription;
    }
    
    /**
     * Get detailedDescription Texte
     *
     * @return \Sdz\BlogBundle\Entity\Texte
     */
    public function getDetailedDescriptionTexte()
    {
    	if($this->detailedDescription !== null) {
    		return $this->detailedDescription->getTexte();
    	}
    	return Constants::EMPTY_STRING;
    }
}