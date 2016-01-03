<?php
namespace Sdz\BlogBundle\Form;
 
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * 
 * @author Messi
 *
 */
class ArticleEditType extends ArticleType // Ici, on h�rite de ArticleType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    // On fait appel � la m�thode buildForm du parent, qui va ajouter tous les champs � $builder
    parent::buildForm($builder, $options);
 
    // On supprime celui qu'on ne veut pas dans le formulaire de modification
    $builder->remove('date');
  }
 
  // On modifie cette m�thode car les deux formulaires doivent avoir un nom diff�rent
  public function getName()
  {
    return 'sdz_blogbundle_articleedittype';
  }
}
?>