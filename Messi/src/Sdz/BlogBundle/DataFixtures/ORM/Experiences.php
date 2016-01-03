<?php
namespace Sdz\BlogBundle\DataFixtures\ORM;
 
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sdz\BlogBundle\Entity\Experience;
use Sdz\BlogBundle\Entity\Techno;
use Sdz\BlogBundle\Entity\Societe;
use Sdz\BlogBundle\Entity\Tache;
use Sdz\BlogBundle\Entity\Categorie;
use Sdz\BlogBundle\Entity\MotCle;
 
class Experiences implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {	
	// Mots  clés
	$javaMotCle1 = new MotCle;
	$javaMotCle1->setMotCle('listener');
	$javaMotCle2 = new MotCle;
	$javaMotCle2->setMotCle('layout');
	
	$svnMotCle = new MotCle;
	$svnMotCle->setMotCle('gestion de conf');
	
	$mySqlMotCle1 = new MotCle;
	$mySqlMotCle1->setMotCle('SGBD');
	$mySqlMotCle2 = new MotCle;
	$mySqlMotCle2->setMotCle('SQL');
	
    // Competences
	$svn = new Techno;
	$svn->setNom('SVN');
	$svn->setDescription('Outils de gestion de configuration');
	//$svn->setCategorie('Developpement');
	$svn->addMotCle($svnMotCle);
	$svn->setPublication(true);
	$svn->setLevel(0);
	
	$mySql = new Techno();
	$mySql->setNom('MySQL');
	$mySql->setDescription('Système de gestion de bases de données');
	//$mySql->setCategorie('Developpement');
	$mySql->addMotCle($mySqlMotCle1);
	$mySql->addMotCle($mySqlMotCle2);
	$mySql->setLevel(0);
	
	$java = new Techno();
	$java->setNom('Java');
	$java->setDescription('Langage de programmation orientée objet.');
	//$mySql->setCategorie('Developpement');
	$java->addMotCle($javaMotCle1);
	$java->addMotCle($javaMotCle2);
	$java->setPublication(true);
	$java->setLevel(0);
	
	// Societes
	$societe1 = new Societe;
	$societe1->setNom('France Télécom');
	$societe1->setActivite('Télécommunication');
	$societe1->setPublication(true);
	$societe1->setDateEntree(new \Datetime());
	
	$societe2 = new Societe;
	$societe2->setNom('Air Bus');
	$societe2->setActivite('Avionique');
	$societe2->setDateEntree(new \Datetime());
	$societe2->setDateSortie(new \Datetime());
	
	
	// Tâches
	$tache1 = new Tache;
	$tache1->setDescription('Analyse du cahier des charges');
	
	$tache2 = new Tache;
	$tache2->setDescription('Gestion de version via SVN');
	
	$tache3 = new Tache;
	$tache3->setDescription('Analyse du cahier des charges');
	
	$tache4 = new Tache;
	$tache4->setDescription('Gestion de version via SVN');
	
	// Experiences
	$experience1 = new Experience;
	$experience1->setPoste('Ingénieur d\'études et développement');
	$experience1->setProjet('XGLUE');
	$experience1->setDescription('Application de Xchecking');
	$experience1->setLieu('Blagnac');
	$experience1->setSociete($societe1);
	$experience1->addTechno($java);
	$experience1->addTechno($mySql);
	$experience1->setDateDebut(new \Datetime());
	$experience1->addTache($tache1);
	$experience1->addTache($tache2);
	$experience1->setPublication(true);
	
	$experience2 = new Experience;
	$experience2->setPoste('Ingénieur d\'études et développement');
	$experience2->setProjet('VODOI');
	$experience2->setLieu('Blagnac');
	$experience2->setDescription('Application 2424Video');
	$experience2->setSociete($societe2);
	$experience2->addTechno($java);
	$experience2->addTechno($svn);
	$experience2->setDateDebut(new \Datetime());
	$experience2->addTache($tache3);
	$experience2->addTache($tache4);
	$experience1->setPublication(true);
	
	// On déclenche l'enregistrement
	$manager->persist($experience1);
	$manager->persist($experience2);
    $manager->flush();
  }
}
?>