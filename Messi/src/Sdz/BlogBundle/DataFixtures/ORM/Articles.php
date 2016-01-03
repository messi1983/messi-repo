<?php
// src/Sdz/BlogBundle/DataFixtures/ORM/Experiences.php
 
namespace Sdz\BlogBundle\DataFixtures\ORM;
 
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sdz\BlogBundle\Entity\Categorie;
use Sdz\BlogBundle\Entity\Commentaire;
use Sdz\BlogBundle\Entity\Article;
 
class Articles implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    // Categories
	// $categorie1 = new Categorie;
	// $categorie1->setNom('Action');
	
	// $categorie2 = new Categorie;
	// $categorie2->setNom('Legende');
	
	
	// Commentaires
	$commentaire1 = new Commentaire;
	$commentaire1->setAuteur('Louis Messi');
	$commentaire1->setContenu('Très bon film');
	
	$commentaire2 = new Commentaire;
	$commentaire2->setAuteur('Louis Messi');
	$commentaire2->setContenu('Film de combat');
	
	$commentaire3 = new Commentaire;
	$commentaire3->setAuteur('Louis Messi');
	$commentaire3->setContenu('Très bon film');
	
	$commentaire4 = new Commentaire;
	$commentaire4->setAuteur('Louis Messi');
	$commentaire4->setContenu('Film de combat');
	
    // Competences
	$article1 = new Article;
    $article1->setTitre('Amazone');
    $article1->setAuteur('Louis Messi');
    $article1->setContenu('Film au coeur de la forêt');
    // $article1->addCategorie($categorie1);
    $article1->addCommentaire($commentaire1);
	$article1->addCommentaire($commentaire2);
	$article1->setNbCommentaires(2);
	
	$article2 = new Article;
	$article2->setTitre('Xena');
    $article2->setAuteur('Louis Messi');
    $article2->setContenu('Film de légende');
    // $article2->addCategorie($categorie2);
    $article2->addCommentaire($commentaire3);
	$article2->addCommentaire($commentaire4);
	$article2->setNbCommentaires(2);
	
	// On déclenche l'enregistrement
	$manager->persist($article1);
	$manager->persist($article2);
    $manager->flush();
  }
}
?>