<?php

namespace Sdz\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Realisation Type.
 * 
 * @author Messi
 *
 */
class RealisationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('$application', 'text', array('label' => 'form.field.street.number', 'attr' => array('class' => 'subContent')))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sdz\BlogBundle\Entity\Realisation'
        ));
    }

    public function getName()
    {
        return 'sdz_blogbundle_realisationtype';
    }
}
