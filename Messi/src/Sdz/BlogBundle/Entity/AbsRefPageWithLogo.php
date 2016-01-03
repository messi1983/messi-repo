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
abstract class AbsRefPageWithLogo extends AbsRefPageEntity
{
	/**
	 * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Image", cascade={"persist", "remove"})
	 */
	private $logo;
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		parent::__construct();
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
	
}