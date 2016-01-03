<?php
// src/Sdz/BlogBundle/Validator/AntiFlood.php
 
namespace Sdz\BlogBundle\Validator;
 
use Symfony\Component\Validator\Constraint;
 
/**
 * @Annotation
 */
class AntiFlood extends Constraint
{
  public $message = 'Votre message %string% est consid�r� comme flood';
  
  public function validatedBy()
  {
    return 'sdzblog_antiflood'; // Ici, on fait appel � l'alias du service
  }
}
?>