<?php
namespace Sdz\BlogBundle\DataFixtures\ORM;
 
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sdz\BlogBundle\Entity\Formation;
use Sdz\BlogBundle\Entity\Ecole;
use Sdz\BlogBundle\Entity\Techno;
 
class Formations implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
	$categorie = $manager->getRepository('SdzBlogBundle:Categorie')
						 ->findOneBy(array('nom' => 'Developpement'));
	
	// Ecoles
	$ecole1 = new Ecole;
	$ecole1->setNom('Université Bordeaux 1');
	$ecole1->setDescription('Université des sciences et technologies');
	$ecole1->setNumero(341);
	$ecole1->setAdresse('avenue de la libération');
	$ecole1->setCodePostal(33140);
	$ecole1->setVille('Talence');
	$ecole1->setPublication(true);
	$ecole1->setDateEntree(new \Datetime());
	$ecole1->setDateSortie(new \Datetime());
	
	$ecole2 = new Ecole;
	$ecole2->setNom('Université Aix-Marseille II');
	$ecole2->setDescription('Université des sciences et technologies');
	$ecole2->setNumero(92);
	$ecole2->setAdresse('avenue de Luminy');
	$ecole2->setCodePostal(13443);
	$ecole2->setVille('Marseille');
	$ecole2->setPublication(true);
	$ecole2->setDateEntree(new \Datetime());
	
	$ecole3 = new Ecole;
	$ecole3->setNom('Université De Province');
	$ecole3->setDescription('Université des sciences et technologies');
	$ecole3->setNumero(13);
	$ecole3->setAdresse('avenue Charles de Gaulle');
	$ecole3->setCodePostal(13000);
	$ecole3->setVille('Marseille');
	$ecole3->setPublication(true);
	$ecole3->setDateEntree(new \Datetime());
	$ecole3->setDateSortie(new \Datetime());
	
    // Formations
	$fomation1 = new Formation;
	$fomation1->setDiplome('Master 2 Génie logiciel');
	$fomation1->setDateDebut(new \Datetime());
	$fomation1->setDateFin(new \Datetime());
	$fomation1->addEcole($ecole1);
	$fomation1->setDescription('Analyse et Développement');
	$fomation1->setPublication(true);

	$fomation2 = new Formation;
	$fomation2->setDiplome('Master 1 Génie logiciel');
	$fomation2->setDateDebut(new \Datetime());
	$fomation2->setDateFin(new \Datetime());
	$fomation2->addEcole($ecole2);
	$fomation2->setDescription('Analyse et Développement');
	$fomation2->setPublication(true);
	
	$fomation3 = new Formation;
	$fomation3->setDiplome('Licence 3 Informatique');
	$fomation3->setDateDebut(new \Datetime());
	$fomation3->addEcole($ecole3);
	$fomation3->setDateFin(new \Datetime());
	$fomation3->setDescription('Analyse et Développement');
	$fomation3->setPublication(true);
	
	// Competences
	$git = new Techno;
	$git->setNom('Git');
	$git->setDescription('Outils de gestion de configuration');
	$git->setCategorie($categorie);
	$git->setPublication(true);
	$fomation1->addTechno($git);
	
	$rMq = new Techno();
	$rMq->setNom('RabbitMq');
	$rMq->setDescription('Système de gestion de bases de données');
	$rMq->setCategorie($categorie);
	$rMq->setPublication(true);
	$fomation1->addTechno($rMq);
	
	$mvn = new Techno;
	$mvn->setNom('Maven');
	$mvn->setDescription('Outils de gestion de configuration');
	$mvn->setCategorie($categorie);
	$mvn->setPublication(true);
	$fomation2->addTechno($mvn);
	
	$php = new Techno();
	$php->setNom('PHP');
	$php->setDescription('Système de gestion de bases de données');
	$php->setCategorie($categorie);
	$php->setPublication(true);
	$fomation3->addTechno($php);
	
	$android = new Techno();
	$android->setNom('Android');
	$android->setDescription('Langage de programmation orientée objet.');
	$android->setCategorie($categorie);
	$android->setPublication(true);
	$fomation3->addTechno($android);
	
	// On déclenche l'enregistrement
	$manager->persist($fomation1);
	$manager->persist($fomation2);
	$manager->persist($fomation3);
    $manager->flush();
  }
}
?>