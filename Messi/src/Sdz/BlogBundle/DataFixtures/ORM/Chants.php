<?php
namespace Sdz\BlogBundle\DataFixtures\ORM;
 
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sdz\BlogBundle\Entity\Chant;
 
class Chants implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
	// sports
	$titre1 = new Chant;
	$titre1->setTitre('Angie');
	$titre1->setResume('Chanson française');
	$titre1->setDateRedaction(new \Datetime());
	$titre1->setType('Classique');
	$titre1->setPublication(true);
	
	$titre2 = new Chant;
	$titre2->setTitre('Willy Lynch');
	$titre2->setResume('Mix franco anglais');
	$titre2->setDateRedaction(new \Datetime());
	$titre2->setType('RNB');
	$titre2->setPublication(true);
	
	$titre3 = new Chant;
	$titre3->setTitre('Avant de partir');
	$titre3->setDateRedaction(new \Datetime());
	$titre3->setResume('Mix franco anglais');
	$titre3->setType('Classique');
	$titre3->setPublication(false);
	
	// On déclenche l'enregistrement
	$manager->persist($titre1);
	$manager->persist($titre2);
	$manager->persist($titre3);
	$manager->flush();
  }
}
?>