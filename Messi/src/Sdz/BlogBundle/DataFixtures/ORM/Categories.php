<?php
// src/Sdz/BlogBundle/DataFixtures/ORM/Experiences.php
 
namespace Sdz\BlogBundle\DataFixtures\ORM;
 
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sdz\BlogBundle\Entity\Experience;
use Sdz\BlogBundle\Entity\Techno;
use Sdz\BlogBundle\Entity\Societe;
use Sdz\BlogBundle\Entity\Tache;
use Sdz\BlogBundle\Entity\Categorie;
use Sdz\BlogBundle\Entity\MotCle;
 
class Categories implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {	
	$devCategorie = new Categorie;
	$devCategorie->setNom('Developpement');
	
	$sqlCategorie = new Categorie;
	$sqlCategorie->setNom('Base de données');
	
	// On déclenche l'enregistrement
	$manager->persist($devCategorie);
	$manager->persist($sqlCategorie);
    $manager->flush();
  }
}
?>