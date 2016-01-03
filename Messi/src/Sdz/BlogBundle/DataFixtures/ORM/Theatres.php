<?php
namespace Sdz\BlogBundle\DataFixtures\ORM;
 
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sdz\BlogBundle\Entity\Theatre;
use Sdz\BlogBundle\Entity\Auteur;
use Sdz\BlogBundle\Entity\Membre;
 
class Theatres implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
	// Organismes
	$organismes = $manager->getRepository('SdzBlogBundle:Organisme')
						 ->findAll();
						 
	$author = new Auteur;
	$author->setNom('MESSI');
	$author->setPrenom('Louis');
	$author->setDateNaissance(new \Datetime());
	$author->setDateDeces(new \Datetime());
	
	$superieur = new Membre;
	$superieur->setNom('PAQUET');
	$superieur->setPrenom('Jacqueline');
	
	$membre1 = new Membre;
	$membre1->setNom('DUPOND');
	$membre1->setPrenom('Nathalie');
	
	$membre2 = new Membre;
	$membre2->setNom('DUPUY');
	$membre2->setPrenom('Xavier');
	
	$membre3 = new Membre;
	$membre3->setNom('RENARD');
	$membre3->setPrenom('Lea');
	
	// danses
	$romeo = new Theatre;
	$romeo->setPiece('Roméo et Juliette');
	$romeo->setResumePiece('Pièce romantique');
	$romeo->setDateDebut(new \Datetime());
	$romeo->setDateFin(new \Datetime());
	$romeo->setSuperviseur($superieur);
	$romeo->setAuteur($author);
	$romeo->setSuperviseur($superieur);
	$romeo->addMembre($membre1);
	$romeo->addMembre($membre2);
	$romeo->addMembre($membre3);
	$romeo->setType('Romantique');
	$romeo->setLink('lien');
	$romeo->setPublication(true);
	//$romeo->setOganisme($organismes->get(0));
	
	$musset = new Theatre;
	$musset->setPiece('On ne badine pas avec l\'amour');
	$musset->setResumePiece('Pièce romantique et comique');
	$musset->setDateDebut(new \Datetime());
	$musset->setDateFin(new \Datetime());
	$musset->setSuperviseur($superieur);
	$musset->setAuteur($author);
	$musset->setSuperviseur($superieur);
	$musset->addMembre($membre1);
	$musset->addMembre($membre2);
	$musset->addMembre($membre3);
	$musset->setType('Tragique');
	$musset->setPublication(true);
	//$musset->setOganisme($organismes->get(1));
	
	// On déclenche l'enregistrement
	$manager->persist($romeo);
	$manager->persist($musset);
    $manager->flush();
  }
}
?>