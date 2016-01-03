<?php
namespace Sdz\BlogBundle\DataFixtures\ORM;
 
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sdz\BlogBundle\Entity\Sport;
 
class Sports implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
	// sports
	$jujitsu = new Sport;
	$jujitsu->setNom('Jujitsu');
	$jujitsu->setCommentaire('Sport individuel');
	$jujitsu->setDateDebut(new \Datetime());
	$jujitsu->setType('Combat');
	$jujitsu->setPublication(true);
	
	$basket = new Sport;
	$basket->setNom('Basket-Ball');
	$basket->setCommentaire('Sport collectif');
	$basket->setDateDebut(new \Datetime());
	$basket->setType('Collectif');
	$basket->setPublication(true);
	
	$foot = new Sport;
	$foot->setNom('Foot-Ball');
	$foot->setDateDebut(new \Datetime());
	$foot->setCommentaire('Sport collectif');
	$foot->setType('Collectif');
	$foot->setPublication(false);
	
	// On déclenche l'enregistrement
	$manager->persist($jujitsu);
	$manager->persist($basket);
	$manager->persist($foot);
	$manager->flush();
  }
}
?>