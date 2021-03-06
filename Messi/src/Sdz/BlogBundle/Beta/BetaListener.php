<?php
// src/Sdz/BlogBundle/Beta/BetaListener.php
 
namespace Sdz\BlogBundle\Beta;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;
 
class BetaListener
{
  // La date de fin de la version béta :
  // - Avant cette date, on affichera un compte à rebours (J-3 par exemple)
  // - Après cette date, on n'affichera plus le béta
  protected $dateFin;
 
  public function __construct($dateFin)
  {
    $this->dateFin = new \Datetime($dateFin);
  }
 
  // Methode pour ajouter le "beta" à une reponse
  protected function displayBeta(Response $response, $joursRestant)
  {
    $content = $response->getContent();
   
    // Code à rajouter
    $html = '<span style="color: red; font-size: 0.5em;"> - Beta J-'.(int) $joursRestant.' !</span>';
 
    // Insertion du code dans la page, dans le <h1> du header
    $content = preg_replace('#<h1>(.*?)</h1>#iU',
                            '<h1>$1'.$html.'</h1>',
                            $content,
                            1);
   
    // Modification du contenu dans la réponse
    $response->setContent($content);
   
    return $response;
  }
  
  public function onKernelResponse(FilterResponseEvent $event)
  {
    // On teste si la requête est bien la requête principale
    if (HttpKernelInterface::MASTER_REQUEST !== $event->getRequestType()) {
      return;
    }
 
    // On récupère la réponse depuis l'évènement
    $response = $event->getResponse();
 
    $joursRestant = $this->dateFin->diff(new \Datetime())->days;
 
    if ($joursRestant > 0) {
      $response = $this->displayBeta($event->getResponse(), $joursRestant);
    }
 
    // On n'oublie pas d'enregistrer les modifications dans l'évènement
    $event->setResponse($response);
  }
}
