<?php
namespace Sdz\BlogBundle\DataFixtures\ORM;
 
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sdz\BlogBundle\Entity\Danse;
 
class Danses implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
	// danses
	$salsa = new Danse;
	$salsa->setNom('Salse');
	$salsa->setCommentaire('Danse latine');
	$salsa->setType('Latine');
	$salsa->setDateDebut(new \Datetime());
	$salsa->setPublication(true);
	
	$kizomba = new Danse;
	$kizomba->setNom('Kizomba');
	$kizomba->setCommentaire('Danse latine');
	$kizomba->setType('Latine');
	$kizomba->setDateDebut(new \Datetime());
	$kizomba->setPublication(true);
	
	$bachata = new Danse;
	$bachata->setNom('Bachata');
	$bachata->setDateDebut(new \Datetime());
	$bachata->setCommentaire('Danse latine');
	$bachata->setType('Latine');
	$bachata->setPublication(false);
	
	// On déclenche l'enregistrement
	$manager->persist($salsa);
	$manager->persist($kizomba);
	$manager->persist($bachata);
    $manager->flush();
  }
}
?>