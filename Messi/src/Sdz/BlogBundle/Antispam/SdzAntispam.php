<?php
// src/Sdz/BlogBundle/Antispam/SdzAntispam.php
 
namespace Sdz\BlogBundle\Antispam;

/**
 * Listener pour lutter les spams.
 * @author Messi
 *
 */
class SdzAntispam extends \Twig_Extension
{
  protected $mailer;
  protected $locale;
  protected $nbForSpam;
 
  public function __construct(\Swift_Mailer $mailer, $nbForSpam)
  {
    $this->mailer    = $mailer;
    $this->nbForSpam = (int) $nbForSpam;
  }
  
  // Et on ajoute un setter
  public function setLocale($locale)
  {
    $this->locale = $locale;
  }
  
  /*
   * Twig va ex�cuter cette m�thode pour savoir quelle(s) fonction(s) ajoute notre service
   */
  public function getFunctions()
  {
    return array(
      'checkIfSpam' => new \Twig_Function_Method($this, 'isSpam')
    );
  }
 
  /*
   * La methode getName() identifie votre extension Twig, elle est obligatoire
   */
  public function getName()
  {
    return 'SdzAntispam';
  }
  
  /**
   * Vérifie si le texte est un spam ou non
   * Un texte est considéré comme spam  à partir de 3 liens
   * ou adresses e-mail dans son contenu
   *
   * @param string $text
   */
  public function isSpam($text)
  {
    return ($this->countLinks($text) + $this->countMails($text)) >= 3;
  }
 
  /**
   * Compte les URL de $text
   *
   * @param string $text
   */
  private function countLinks($text)
  {
    return 2;
  }
 
  /**
   * Compte les e-mails de $text
   *
   * @param string $text
   */
  private function countMails($text)
  {
    return 2;
  }
}
?>