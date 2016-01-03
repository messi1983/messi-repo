<?php

namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Image
 *
 * @ORM\Table(name="image")
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\ImageRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Image
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
     * @ORM\Column(name="extension", type="string", length=255)
     */
    private $extension;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255)
     */
    private $alt;
	
	/**
	 * @var UploadedFile
	 * @Assert\File(maxSize="6000000")
	 */
	private $file;
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="state", type="string", columnDefinition="enum('USED', 'NOTUSED')")
	 */
	private $state;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="titre", type="string", length=100, nullable=true)
	 */
	private $titre;
	
	// On ajoute cet attribut pour y stocker le nom du fichier temporairement
	private $tempFilename;
 
    // On modifie le setter de File, pour prendre en compte l'upload d'un fichier lorsqu'il en existe déjà un autre
    public function setFile(UploadedFile $file)
    {
      $this->file = $file;
 
      // On vérifie si on avait déjà un fichier pour cette entité
      if (null !== $this->extension) {
        // On sauvegarde l'extension du fichier pour le supprimer plus tard
        $this->tempFilename = $this->extension;
 
        // On réinitialise les valeurs des attributs extension et alt
        $this->extension = null;
        $this->alt = null;
      }
    }
	
	/**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
      // Si jamais il n'y a pas de fichier (champ facultatif)
      if (null === $this->file) {
        return;
      }
      
      // Le nom du fichier est son id, on doit juste stocker également son extension
      // Pour faire propre, on devrait renommer cet attribut en « extension », plutôt que « extension »
      $this->extension = $this->file->guessExtension();
 
      // Et on génère l'attribut alt de la balise <img>, à la valeur du nom du fichier sur le PC de l'internaute
      $this->alt = $this->file->getClientOriginalName();
    }
	
	/**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
      // Si jamais il n'y a pas de fichier (champ facultatif)
      if (null === $this->file) {
        return;
      }
      
      // Si on avait un ancien fichier, on le supprime
      if (null !== $this->tempFilename) {
        $oldFile = $this->getUploadRootDir().'/'.$this->id.'.'.$this->tempFilename;
        if (file_exists($oldFile)) {
          unlink($oldFile);
        }
        
        // Allow to clean thumbs directories
        $this->tempFilename = $this->id.'.'.$this->tempFilename;
        
        // clean all  thumbs directories
        $this->cleanThumbDirs();
      }
      
      // On déplace le fichier envoyé dans le répertoire de notre choix
      $this->file->move(
        $this->getUploadRootDir(), // Le répertoire de destination
        $this->id.'.'.$this->extension   // Le nom du fichier à créer, ici « id.extension »
      );
    }
	
	/**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload()
    {
      // On sauvegarde temporairement le nom du fichier, car il dépend de l'id
      $this->tempFilename = $this->id.'.'.$this->extension;
    }
    
 
    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
    	$file = $this->getUploadRootDir().'/'.$this->tempFilename;
    	
       // En PostRemove, on n'a pas accès à l'id, on utilise notre nom sauvegardé
       if (file_exists($file)) {
         // On supprime le fichier
         unlink($file);
       }
       // clean Thumbs Directories
       $this->cleanThumbDirs();
    }
    
    public function getUploadDir()
    {
      // On retourne le chemin relatif vers l'image pour un navigateur
      return 'uploads/img';
    }
	
	public function getWebPath()
    {
	  return $this->getUploadDir().'/'.$this->getId().'.'.$this->extension;
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
     * Set extension
     *
     * @param string $extension
     * @return Image
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;
    
        return $this;
    }

    /**
     * Get extension
     *
     * @return string 
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set alt
     *
     * @param string $alt
     * @return Image
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;
    
        return $this;
    }

    /**
     * Get alt
     *
     * @return string 
     */
    public function getAlt()
    {
        return $this->alt;
    }
	
	/**
     * Get file
     *
     * @return UploadedFile 
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set state
     *
     * @param string $state
     * @return Image
     */
    public function setState($state)
    {
        $this->state = $state;
    
        return $this;
    }

    /**
     * Get state
     *
     * @return string 
     */
    public function getState()
    {
        return $this->state;
    }
    
    /**
     * Clean Thumbs directories.
     */
    protected function cleanThumbDirs() {
    	// Directory File iterator
    	$iterator = new \DirectoryIterator($this->getThumbsRootDir());
    
    	foreach ($iterator as $fileinfo) {
    		if (!$fileinfo->isDot()) {
    			if($fileinfo->isDir()) {
    				$file = $fileinfo->getRealPath().'/uploads/img/'.$this->tempFilename;
    					
    				if(file_exists($file)) {
    					unlink($file);
    				}
    			}
    		}
    	}
    }
    
    protected function getUploadRootDir()
    {
    	// On retourne le chemin relatif vers l'image pour notre code PHP
    	return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
    
    /**
     * Get Thumbs Root directory
     * @return string
     */
    protected function getThumbsRootDir()
    {
    	return __DIR__.'/../../../../web/media/cache/';
    }
    

    /**
     * Set titre
     *
     * @param string $titre
     * @return Image
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
}