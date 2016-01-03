<?php
// src/Sdz/BlogBundle/Bigbrother/CensureListener.php
 
namespace Sdz\BlogBundle\Bigbrother;
use Symfony\Component\Security\Core\User\UserInterface;
 
class CensureListener
{
  // Liste des id des utilisateurs à surveiller
  protected $liste;
  protected $mailer;
 
  public function __construct(array $liste, \Swift_Mailer $mailer)
  {
    $this->liste  = $liste;
    $this->mailer = $mailer;
  }
 
  // Méthode « reine » 1
  protected function sendEmail($message, UserInterface $user)
  {
    $message = \Swift_Message::newInstance()
        ->setSubject("Nouveau message d'un utilisateur surveillé")
        ->setFrom('admin@votresite.com<script type="text/javascript">
			/* <![CDATA[ */
			(function(){try{var s,a,i,j,r,c,l,b=document.getElementsByTagName("script");l=b[b.length-1].previousSibling;a=l.getAttribute(\'data-cfemail\');if(a){s=\'\';r=parseInt(a.substr(0,2),16);for(j=2;a.length-j;j+=2){c=parseInt(a.substr(j,2),16)^r;s+=String.fromCharCode(c);}s=document.createTextNode(s);l.parentNode.replaceChild(s,l);}}catch(e){}})();
			/* ]]> */
		</script>')
        ->setTo('admin@votresite.com<script type="text/javascript">
			/* <![CDATA[ */
			(function(){try{var s,a,i,j,r,c,l,b=document.getElementsByTagName("script");l=b[b.length-1].previousSibling;a=l.getAttribute(\'data-cfemail\');if(a){s=\'\';r=parseInt(a.substr(0,2),16);for(j=2;a.length-j;j+=2){c=parseInt(a.substr(j,2),16)^r;s+=String.fromCharCode(c);}s=document.createTextNode(s);l.parentNode.replaceChild(s,l);}}catch(e){}})();
			/* ]]> */
		</script>')
        ->setBody("L'utilisateur surveillé '".$user->getUsername()."' a posté le message suivant : '".$message."'");
 
    $this->mailer->send($message);
  }
 
  // Méthode « reine » 2
  protected function censureMessage($message)
  {
    // Ici, totalement arbitraire :
    $message = str_replace(array('top secret', 'mot interdit'), '', $message);
 
    return $message;
  }
 
  // Méthode « technique » de liaison entre l'évènement et la fonctionnalité reine
  public function onMessagePost(MessagePostEvent $event)
  {
    // On active la surveillance si l'auteur du message est dans la liste
    if (in_array($event->getUser()->getId(), $this->liste)) {
      // On envoie un e-mail à l'administrateur
      $this->sendEmail($event->getMessage(), $event->getUser());
 
      // On censure le message
      $message = $this->censureMessage($event->getMessage());
      // On enregistre le message censuré dans l'event
      $event->setMessage($message);
    }
  }
}