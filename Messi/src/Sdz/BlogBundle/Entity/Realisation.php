<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Realisation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\RealisationRepository")
 */
class Realisation extends AbsRefPageWithLogo
{
	/**
     * @var string
     *
     * @ORM\Column(name="application", type="string", length=255, nullable=true)
     */
    private $application;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;
	
	/**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
	

	/**
     * Constructor
     */
    public function __construct()
    {
		parent::__construct();
		
		$this->date = new \Datetime();
    }
	
    /**
     * Set description
     *
     * @param string $description
     * @return Realisation
     */
    public function setDescription($description)
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
     * Set application
     *
     * @param string $application
     * @return Realisation
     */
    public function setApplication($application)
    {
        $this->application = $application;
    
        return $this;
    }

    /**
     * Get application
     *
     * @return string 
     */
    public function getApplication()
    {
        return $this->application;
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
     * Set auteur
     *
     * @param \Sdz\BlogBundle\Entity\Visitor $auteur
     * @return Realisation
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
    	return $this->application;
    }
}