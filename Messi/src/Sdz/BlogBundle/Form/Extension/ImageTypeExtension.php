<?php

namespace Sdz\BlogBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Image Type Extension
 * @author Messi
 *
 */
class ImageTypeExtension extends AbstractTypeExtension
{
    /**
     * Retourne le nom du type de champ qui est �tendu
     *
     * @return string Le nom du type qui est �tendu
     */
    public function getExtendedType()
    {
        return 'file';
    }
	
	/**
     * Ajoute l'option image_path
     *
     * @param \Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setOptional(array('image_path'));
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
        if (array_key_exists('image_path', $options)) {
            $parentData = $form->getParent()->getData();

            if (null !== $parentData) {
               $accessor = PropertyAccess::createPropertyAccessor();
               $imageUrl = $accessor->getValue($parentData, $options['image_path']);
            } else {
                $imageUrl = null;
            }

            // d�finit une variable "image_url" qui sera disponible � l'affichage du champ
            $view->vars['image_url'] = $imageUrl;
        }
    }
}