<?php
// src/Sdz/BlogBundle/Validator/AntiFloodValidator.php
 
namespace Sdz\BlogBundle\Validator;
 
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * AntiFlood Validator
 * @author Messi
 *
 */
class AntiFloodValidator extends ConstraintValidator
{
  private $request;
 
  // Les arguments d�clar�s dans la d�finition du service arrivent au constructeur
  // On doit les enregistrer dans l'objet pour pouvoir s'en resservir dans la m�thode validate()
  public function __construct(Request $request, EntityManager $em)
  {
    $this->request = $request;
  }

  public function validate($value, Constraint $constraint)
  {
	// On v�rifie si cette IP a d�j� post� un message il y a moins de 15 secondes
	$isFlood = false;
	
    // Pour l'instant, on consid�re comme flood tout message de moins de 3 caract�res
    if (strlen($value) < 3  && $isFlood) {
      // C'est cette ligne qui d�clenche l'erreur pour le formulaire, avec en argument le message
      $this->context->addViolation($constraint->message, array('%string%' => $value));
    }
  }
}
?>