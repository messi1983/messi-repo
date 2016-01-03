<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sdz\BlogBundle\Constants\Constants;

/**
 * Texte
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\TexteRepository")
 */
class Texte
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
     * @ORM\Column(name="texte_fr", type="text", nullable=true)
     */
    private $texte_fr;
    
    /**
     * @var string
     *
     * @ORM\Column(name="texte_en", type="text", nullable=true)
     */
    private $texte_en;
    
    /**
     * @var string
     */
    private $locale;
    
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
     * Set texte_fr
     *
     * @param string $texteFr
     * @return Texte
     */
    public function setTexteFr($texteFr)
    {
        $this->texte_fr = $texteFr;
    
        return $this;
    }

    /**
     * Get texte_fr
     *
     * @return string 
     */
    public function getTexteFr()
    {
        return $this->texte_fr;
    }

    /**
     * Set texte_en
     *
     * @param string $texteEn
     * @return Texte
     */
    public function setTexteEn($texteEn)
    {
        $this->texte_en = $texteEn;
    
        return $this;
    }

    /**
     * Get texte_en
     *
     * @return string 
     */
    public function getTexteEn()
    {
        return $this->texte_en;
    }
    
    /**
     * Set texte
     *
     * @param string $texte
     * @return Texte
     */
    public function setTexte($texte)
    {
    	if(Constants::LOCALE_EN == $this->locale) {
    		$this->texte_en = $texte;
    	} else {
    		$this->texte_fr = $texte;
    	}
    	return $this;
    }
    
    /**
     * Get texte
     *
     * @return string
     */
    public function getTexte()
    {
    	$texte =  Constants::EMPTY_STRING;
    	if(Constants::LOCALE_EN == $this->locale) {
    		$texte = $this->texte_en;
    	} else {
    		$texte = $this->texte_fr;
    	}
    	return $texte;
    }
    
    /**
     *
     * @param unknown $locale
     * @return \Sdz\BlogBundle\Entity\Texte
     */
    public function setLocale($locale) {
    	$this->locale = $locale;
    
    	return $this;
    }
}