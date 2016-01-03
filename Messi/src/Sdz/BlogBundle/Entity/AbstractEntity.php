<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\MappedSuperclass;
// use Gedmo\Mapping\Annotation as Gedmo;
use Sdz\BlogBundle\Constants\Constants;

/**
 * Abstract base class for most Getin entities.
 * 
 * @MappedSuperclass
 *
 */
class AbstractEntity
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
	 * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Image", cascade={"persist", "remove"})
	 */
	private $logo;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="nom", type="string", length=255)
	 */
	private $nom;
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="publication", type="boolean")
	 */
	private $publication;
	
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
	 * Get id
	 *
	 * @return integer
	 */
	public function getId()
	{
		return $this->id;
	}
	
	/**
	 * Set logo
	 *
	 * @param \Sdz\BlogBundle\Entity\Image $logo
	 * @return Danse
	 */
	public function setLogo(\Sdz\BlogBundle\Entity\Image $logo = null)
	{
		$this->logo = $logo;
	
		return $this;
	}
	
	/**
	 * Get logo
	 *
	 * @return \Sdz\BlogBundle\Entity\Image
	 */
	public function getLogo()
	{
		return $this->logo;
	}
	
	/**
	 * Set publication
	 *
	 * @param boolean $publication
	 * @return Danse
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
	 *
	 * @param unknown $locale
	 * @return \Sdz\BlogBundle\Entity\Ecole
	 */
	public function setLocale($locale) {
		$this->locale = $locale;
	
		return $this;
	}
	
	/**
	 * Get locale
	 *
	 * @return string
	 */
	public function getLocale()
	{
		return $this->locale;
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
	 * Set Texte locale
	 * @param \Sdz\BlogBundle\Entity\Texte $texte
	 */
	private function setTexteLocale(\Sdz\BlogBundle\Entity\Texte $texte) {
		if($texte != null) {
			$texte->setLocale($this->getLocale());
		}
		return $this;
	}
	
	/**
	 * Get Texte string
	 */
	protected function getTexteString(\Sdz\BlogBundle\Entity\Texte $texte) {
		$this->setTexteLocale($texte);
		
		if($texte != null) {
			return $texte->getTexte();
		}
		return Constants::EMPTY_STRING;
	}
	
}