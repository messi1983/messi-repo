<?php

namespace Sdz\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TacheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description', new TexteType(), array('required' => false, 'label' => 'form.field.description', 'attr' => array('class' => 'master')))
			->add('ordre', 'integer', array('label' => 'form.field.order', 'attr' => array('class' => 'subContent')))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sdz\BlogBundle\Entity\Tache'
        ));
    }

    public function getName()
    {
        return 'sdz_blogbundle_tachetype';
    }
}
