<?php
namespace Sdz\BlogBundle\DataFixtures\ORM;
 
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sdz\BlogBundle\Entity\Message;
use Sdz\BlogBundle\Entity\Visitor;


class Messages implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
  	// Auteur
  	$auteur = new Visitor;
  	$auteur->setNom('MESSI');
  	$auteur->setPrenom('Louis');
  	$auteur->setEmail('messi_louis@yahoo.fr');
  	$auteur->setIpAdress("127.0.0.1");
  	
    // Messages
	$message1 = new Message;
	$message1->setMessage('Premier message');
	$message1->setAuteur($auteur);
	
	$message2 = new Message;
	$message2->setMessage('Deuxième message');
	$message2->setAuteur($auteur);
	
	// On déclenche l'enregistrement
	$manager->persist($message1);
	$manager->persist($message2);
    $manager->flush();
  }
}
?>