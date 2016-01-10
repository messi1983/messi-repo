<?php

namespace Sdz\BlogBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Case Type Extension 
 * @author Messi
 *
 */
class CaseTypeExtension extends AbstractTypeExtension
{
    /**
     * Retourne le nom du type de champ qui est �tendu
     *
     * @return string Le nom du type qui est �tendu
     */
    public function getExtendedType()
    {
        return 'checkbox';
    }
	
	/**
     * Ajoute l'option image_path
     *
     * @param \Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setOptional(array('isPublishOption'));
    }
	
	/**
     * Passe l'url de l'image � la vue
     *
     * @param \Symfony\Component\Form\FormView $view
     * @param \Symfony\Component\Form\FormInterface $form
     * @param array $options
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
		$publish = null;
        if (array_key_exists('isPublishOption', $options)) {
            $parentData = $form->getParent()->getData();

            if (null !== $parentData) {
               $accessor = PropertyAccess::createPropertyAccessor();
               $publish = $accessor->getValue($parentData, $options['isPublishOption']);
            } 
        }
		// d�finit une variable "isPublishOption" qui sera disponible � l'affichage du champ
		$view->vars['isPublishOption'] = $publish;
    }
}
