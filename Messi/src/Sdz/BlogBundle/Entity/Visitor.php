<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visitor
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\VisitorRepository")
 */
class Visitor
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=255, nullable=true)
     */
    private $pseudo;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255, nullable=true)
     */
    private $tel;
	
	/**
     * @var string
     *
     * @ORM\Column(name="ipAdress", type="string", length=255)
     */
    private $ipAdress;
	
	/**
     * @var string
     *
     * @ORM\Column(name="lastConnection", type="datetime")
     */
    private $lastConnection;
    
    /**
     * @ORM\ManyToMany(targetEntity="Sdz\BlogBundle\Entity\Page", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $pages;
    
    /**
     * @var string
     */
    private $locale;

	/**
	 * Constructor.
	 */
	public function __construct()
    {
		$this->lastConnection = new \Datetime();
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
     * Set nom
     *
     * @param string $nom
     * @return Visitor
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
     * Set prenom
     *
     * @param string $prenom
     * @return Visitor
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set pseudo
     *
     * @param string $pseudo
     * @return Visitor
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    
        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string 
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Visitor
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return Visitor
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
     * Set ipAdress
     *
     * @param string $ipAdress
     * @return Visitor
     */
    public function setIpAdress($ipAdress)
    {
        $this->ipAdress = $ipAdress;
    
        return $this;
    }

    /**
     * Get ipAdress
     *
     * @return string 
     */
    public function getIpAdress()
    {
        return $this->ipAdress;
    }

    /**
     * Set lastConnection
     *
     * @param \DateTime $lastConnection
     * @return Visitor
     */
    public function setLastConnection($lastConnection)
    {
        $this->lastConnection = $lastConnection;
    
        return $this;
    }

    /**
     * Get lastConnection
     *
     * @return \DateTime 
     */
    public function getLastConnection()
    {
        return $this->lastConnection;
    }

    /**
     * Add pages
     *
     * @param \Sdz\BlogBundle\Entity\Page $page
     * @return Visitor
     */
    public function addPage(\Sdz\BlogBundle\Entity\Page $page)
    {
        $this->pages[] = $page;
    
        return $this;
    }
    
    /**
     *
     * @param unknown $locale
     * @return \Sdz\BlogBundle\Entity\Ecole
     */
    public function setLocale($locale) {
    	$this->locale = $locale;
    
    	return $this;
    }

    /**
     * Remove page
     *
     * @param \Sdz\BlogBundle\Entity\Page $page
     */
    public function removePage(\Sdz\BlogBundle\Entity\Page $page)
    {
        $this->pages->removeElement($page);
    }

    /**
     * Get pages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPages()
    {
        return $this->pages;
    }
    
    /**
     * Allows to know if a page has already visted
     * @param \Sdz\BlogBundle\Entity\Page $page
     */
    public function hasAlreadyVisitedPage(\Sdz\BlogBundle\Entity\Page $page) {
    	if($this->pages != null) {
    		foreach($this->pages as $currentPage) {
    			if($currentPage->getNom() == $page->getNom()) {
    				return true;
    			}
    		}
    	}
    	return false;
    }
    
    /**
     * Get publication
     *
     * @return boolean
     */
    public function getPublication()
    {
    	return true;
    }
    
}