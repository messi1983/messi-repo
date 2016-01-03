<?php
// src/Sdz/BlogBundle/DataFixtures/ORM/Competences.php
 
namespace Sdz\BlogBundle\DataFixtures\ORM;
 
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sdz\BlogBundle\Entity\Site;
 
class Sites implements FixtureInterface
{
  public function load(ObjectManager $manager)
  {
    // Liste des noms de compétences à ajouter
    $hosts = array('localhost', '10.123.72.204');
 
    foreach($hosts as $i => $host)
    {
      // On crée la compétence
      $liste_hosts[$i] = new Site();
      $liste_hosts[$i]->setHostname($host);
 
      // On la persiste
      $manager->persist($liste_hosts[$i]);
    }                            
 
    // On déclenche l'enregistrement
    $manager->flush();
  }
}
?>