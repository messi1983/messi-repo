<?php
namespace Sdz\BlogBundle\DataFixtures\ORM;
 
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sdz\BlogBundle\Entity\Techno;
use Sdz\BlogBundle\Entity\Organisme;
 
class Organismes implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
	// Organismes
	$organisme1 = new Organisme;
	$organisme1->setNom('Soupetard');
	$organisme1->setActivite('Centre d\'animation');
	$organisme1->setPublication(true);
	$organisme1->setDateEntree(new \Datetime());
	
	$organisme2 = new Organisme;
	$organisme2->setNom('Sentier de Thalie');
	$organisme2->setActivite('Groupe de théâtre amateur');
	$organisme2->setPublication(true);
	$organisme2->setDateEntree(new \Datetime());
	
	// On déclenche l'enregistrement
	$manager->persist($organisme1);
	$manager->persist($organisme2);
    $manager->flush();
  }
}
?>