<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SiteComment
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\SiteCommentRepository")
 */
class SiteComment
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
     * @var boolean
     *
     * @ORM\Column(name="publication", type="boolean")
     */
    private $publication;
	
    /**
     * @ORM\ManyToOne(targetEntity="Sdz\BlogBundle\Entity\Visitor", inversedBy="auteur", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
	 private $auteur;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

	/*
	 * Constructor
	 */
	public function __construct()
    {
		$this->date = new \Datetime();
		$this->publication = true;
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
     * Set contenu
     *
     * @param string $contenu
     * @return Commentaire
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    
        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Commentaire
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }
	
	/**
     * Set publication
     *
     * @param boolean $publication
     * @return Experience
     */
    public function setPublication($publication)
    {
        $this->publication = $publication;
    
        return $this;
    }

    /**
     * Get publication
     *
     * @return boolean 
     */
    public function getPublication()
    {
        return $this->publication;
    }
	
	/**
     * Get publish option value.
     *
     * @return string 
     */
	public function isYes()
    {
        return true;
    }

    /**
     * Set auteur
     *
     * @param \Sdz\BlogBundle\Entity\Visitor $auteur
     * @return SiteComment
     */
    public function setAuteur(\Sdz\BlogBundle\Entity\Visitor $auteur)
    {
        $this->auteur = $auteur;
    
        return $this;
    }

    /**
     * Get auteur
     *
     * @return \Sdz\BlogBundle\Entity\Visitor 
     */
    public function getAuteur()
    {
        return $this->auteur;
    }
    
    /**
     * Get refence page name.
     *
     * @return string
     */
    public function getReferencePageName()
    {
    	return null;
    }
}