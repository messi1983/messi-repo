<?php
namespace Sdz\BlogBundle\DataFixtures\ORM;
 
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sdz\BlogBundle\Entity\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;
 
class Images implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
  	$file = new \UploadedFile(__DIR__.'/images', 'image.jpeg');
  	
	// danses
	$image = new Image;
	$image->setFile($file);
	
	// On déclenche l'enregistrement
	$manager->persist($image);
    $manager->flush();
  }
}
?>