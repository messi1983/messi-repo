<?php

namespace Sdz\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VisitorMessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array('label' => 'form.field.name'))
			->add('prenom', 'text', array('label' => 'form.field.firstname', 'required' => false))
			->add('email', 'email', array('label' => 'form.field.email'))
			->add('tel', 'text', array('label' => 'form.field.phone', 'required' => false))
			//->add('pseudo', 'hidden', array('data' => '_NONE_'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sdz\BlogBundle\Entity\Visitor'
        ));
    }

    public function getName()
    {
        return 'sdz_blogbundle_visitormessagetype';
    }
}
