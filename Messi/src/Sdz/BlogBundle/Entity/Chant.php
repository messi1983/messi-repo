<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chant
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\ChantRepository")
 */
class Chant extends AbsRefPageEntity
{

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", columnDefinition="enum('RNB', 'RAP', 'Classique')")
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRedaction", type="date", nullable=true)
     */
    private $dateRedaction;

    /**
     * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Texte", cascade={"persist", "remove"})
     */
    private $resume;
	
    /**
     * @ORM\ManyToMany(targetEntity="Sdz\BlogBundle\Entity\SongPart", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $parts;
    
    /**
     * Constructor
     */
    public function __construt()
    {
    	parent:: __construt();
    	
    	$this->parts = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Set titre
     *
     * @param string $titre
     * @return Chant
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set dateRedaction
     *
     * @param \DateTime $dateRedaction
     * @return Chant
     */
    public function setDateRedaction($dateRedaction)
    {
        $this->dateRedaction = $dateRedaction;
    
        return $this;
    }

    /**
     * Get dateRedaction
     *
     * @return \DateTime 
     */
    public function getDateRedaction()
    {
        return $this->dateRedaction;
    }

    /**
     * Set resume
     *
     * @param \Sdz\BlogBundle\Entity\Texte $resume
     * @return Chant
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
     * Set type
     *
     * @param string $type
     * @return Chant
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
     * Add parts
     *
     * @param \Sdz\BlogBundle\Entity\Texte $part
     * @return Chant
     */
    public function addPart(\Sdz\BlogBundle\Entity\Texte $part)
    {
        $this->parts[] = $part;
    
        return $this;
    }

    /**
     * Remove parts
     *
     * @param \Sdz\BlogBundle\Entity\Texte $part
     */
    public function removePart(\Sdz\BlogBundle\Entity\Texte $part)
    {
        $this->parts->removeElement($part);
    }

    /**
     * Get parts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getParts()
    {
        return $this->parts;
    }
    
    /**
     * Get refence page name.
     *
     * @return string
     */
    public function getReferencePageName()
    {
    	return $this->titre;
    }

}