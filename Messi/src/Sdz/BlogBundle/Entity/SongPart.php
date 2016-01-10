<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SongPart
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class SongPart
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
     * @ORM\Column(name="texte", type="string", length=500)
     */
    private $texte;

     /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", columnDefinition="enum('chorus', 'part')")
     */
    private $type;


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
     * Set texte
     *
     * @param string $texte
     * @return SongPart
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;
    
        return $this;
    }

    /**
     * Get texte
     *
     * @return string 
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set chorus
     *
     * @param boolean $chorus
     * @return SongPart
     */
    public function setChorus($chorus)
    {
        $this->chorus = $chorus;
    
        return $this;
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
}
