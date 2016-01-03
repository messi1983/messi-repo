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
    // Liste des noms de comp�tences � ajouter
    $hosts = array('localhost', '10.123.72.204');
 
    foreach($hosts as $i => $host)
    {
      // On cr�e la comp�tence
      $liste_hosts[$i] = new Site();
      $liste_hosts[$i]->setHostname($host);
 
      // On la persiste
      $manager->persist($liste_hosts[$i]);
    }                            
 
    // On d�clenche l'enregistrement
    $manager->flush();
  }
}
?>