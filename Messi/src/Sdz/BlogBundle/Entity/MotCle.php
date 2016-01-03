<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MotCle
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\MotCleRepository")
 */
class MotCle
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
     * @ORM\Column(name="motCle", type="string", length=255)
     */
    private $motCle;
	
	/**
     * @ORM\ManyToOne(targetEntity="Sdz\BlogBundle\Entity\Techno", inversedBy="motsCles", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $techno;


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
     * Set motCle
     *
     * @param string $motCle
     * @return MotCle
     */
    public function setMotCle($motCle)
    {
        $this->motCle = $motCle;
    
        return $this;
    }

    /**
     * Get motCle
     *
     * @return string 
     */
    public function getMotCle()
    {
        return $this->motCle;
    }

    /**
     * Set techno
     *
     * @param \Sdz\BlogBundle\Entity\Techno $techno
     * @return MotCle
     */
    public function setTechno(\Sdz\BlogBundle\Entity\Techno $techno)
    {
        $this->techno = $techno;
    
        return $this;
    }

    /**
     * Get techno
     *
     * @return \Sdz\BlogBundle\Entity\Techno 
     */
    public function getTechno()
    {
        return $this->techno;
    }
}