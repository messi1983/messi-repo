<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Theatre
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\TheatreRepository")
 */
class Theatre extends AbsRefPageEntity
{
    /**
     * @var string
     *
     * @ORM\Column(name="piece", type="string", length=255)
     */
    private $piece;
	
	/**
     * @var string
     *
     * @ORM\Column(name="type", type="string", columnDefinition="enum('Romantique', 'Tragique', 'Humoristique')")
     */
    private $type;

    /**
     * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Texte", cascade={"persist", "remove"})
     */
    private $resume;

    /**
     * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Periode", cascade={"persist", "remove"})
     */
    private $periode;
	
	/**
     * @ORM\ManyToOne(targetEntity="Sdz\BlogBundle\Entity\Auteur", inversedBy="theatres", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $auteur;
	
	/**
     * @ORM\ManyToOne(targetEntity="Sdz\BlogBundle\Entity\Membre", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $superviseur;
	
	/**
     * @ORM\ManyToMany(targetEntity="Sdz\BlogBundle\Entity\Membre", cascade={"persist"})
     */
    private $membres;

    /**
     * @var string
     *
     * @ORM\Column(name="organisme", type="string", length=255)
     */
	 
	 /**
     * @ORM\ManyToOne(targetEntity="Sdz\BlogBundle\Entity\Organisme", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $organisme;

    /**
     * @ORM\ManyToMany(targetEntity="Sdz\BlogBundle\Entity\Image", cascade={"persist"})
     */
    private $images;
	
	/**
     * @var string
     *
     * @ORM\Column(name="link", type="string", nullable=true)
     */
    private $link;
    
    /**
     * Constructor
     */
    public function __construct()
    {
    	parent::__construct();
    	
    	$this->membres = new \Doctrine\Common\Collections\ArrayCollection();
    }
	
    /**
     * Set piece
     *
     * @param string $piece
     * @return Theatre
     */
    public function setPiece($piece)
    {
        $this->piece = $piece;
    
        return $this;
    }

    /**
     * Get piece
     *
     * @return string 
     */
    public function getPiece()
    {
        return $this->piece;
    }

    /**
     * Set organisme
     *
     * @param string $organisme
     * @return Theatre
     */
    public function setOrganisme($organisme)
    {
        $this->organisme = $organisme;
    
        return $this;
    }

    /**
     * Get organisme
     *
     * @return string 
     */
    public function getOrganisme()
    {
        return $this->organisme;
    }
	
    /**
     * Set auteur
     *
     * @param \Sdz\BlogBundle\Entity\Auteur $auteur
     * @return Theatre
     */
    public function setAuteur(\Sdz\BlogBundle\Entity\Auteur $auteur)
    {
        $this->auteur = $auteur;
    
        return $this;
    }

    /**
     * Get auteur
     *
     * @return \Sdz\BlogBundle\Entity\Auteur 
     */
    public function getAuteur()
    {
        return $this->auteur;
    }
    
    /**
     * Set superviseur
     *
     * @param \Sdz\BlogBundle\Entity\Membre $superviseur
     * @return Theatre
     */
    public function setSuperviseur(\Sdz\BlogBundle\Entity\Membre $superviseur = null)
    {
        $this->superviseur = $superviseur;
    
        return $this;
    }

    /**
     * Get superviseur
     *
     * @return \Sdz\BlogBundle\Entity\Membre 
     */
    public function getSuperviseur()
    {
        return $this->superviseur;
    }

    /**
     * Add membres
     *
     * @param \Sdz\BlogBundle\Entity\Membre $membre
     * @return Theatre
     */
    public function addMembre(\Sdz\BlogBundle\Entity\Membre $membre)
    {
        $this->membres[] = $membre;
    
        return $this;
    }

    /**
     * Remove membres
     *
     * @param \Sdz\BlogBundle\Entity\Membre $membre
     */
    public function removeMembre(\Sdz\BlogBundle\Entity\Membre $membre)
    {
        $this->membres->removeElement($membre);
    }

    /**
     * Get membres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMembres()
    {
        return $this->membres;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Theatre
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
     * Set link
     *
     * @param string $link
     * @return Theatre
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
     * Add image
     *
     * @param \Sdz\BlogBundle\Entity\Image $image
     * @return Theatre
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
     * Set resume
     *
     * @param \Sdz\BlogBundle\Entity\Texte $resume
     * @return Theatre
     */
    public function setResume(\Sdz\BlogBundle\Entity\Texte $resume = null)
    {
    	$this->resume = $resume;
    	
        return $this;
    }

    /**
     * Get resume
     *
     * @return \Sdz\BlogBundle\Entity\Texte 
     */
    public function getResume()
    {
        return $this->resume;
    }
    
    /**
     * Get resume Texte
     *
     * @return string
     */
    public function getResumeTexte()
    {
    	return $this->getTexteString($this->resume);
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
    
    /**
     * Get refence page name.
     *
     * @return string
     */
    public function getReferencePageName()
    {
    	return $this->getPiece();
    }
}
