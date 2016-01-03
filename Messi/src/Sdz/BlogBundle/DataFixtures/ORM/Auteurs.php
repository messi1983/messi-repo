<?php
// src/Sdz/BlogBundle/DataFixtures/ORM/Experiences.php
 
namespace Sdz\BlogBundle\DataFixtures\ORM;
 
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sdz\BlogBundle\Entity\Categorie;
use Sdz\BlogBundle\Entity\Commentaire;
use Sdz\BlogBundle\Entity\Auteur;
 
class Auteurs implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
	$auteur1 = new Auteur;
	$auteur1->setNom('Messi');
	$auteur1->setPrenom('Louis');
	$auteur1->setDateNaissance(new \Datetime());
	$auteur1->setPublication(true);
	
	$auteur2 = new Auteur;
	$auteur2->setNom('DUPUY');
	$auteur2->setPrenom('Xavier');
	$auteur2->setDateNaissance(new \Datetime());
	$auteur2->setPublication(true);
	
	$auteur3 = new Auteur;
	$auteur3->setNom('Mengara');
	$auteur3->setDateNaissance(new \Datetime());
	$auteur3->setPrenom('Martial');
	
	// On déclenche l'enregistrement
	$manager->persist($auteur1);
	$manager->persist($auteur2);
	$manager->persist($auteur3);
    $manager->flush();
  }
}
?>