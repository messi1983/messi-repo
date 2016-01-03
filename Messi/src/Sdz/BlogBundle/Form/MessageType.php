<?php

namespace Sdz\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('auteur', new VisitorMessageType(), array('label' => ' '))
			->add('subject', 'text', array('label' => 'form.field.subject', 'required' => false, 'attr' => array('class' => 'object')))
			->add('message', 'textarea', array('label' => 'form.field.message', 'attr' => array('rows' => 10)))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sdz\BlogBundle\Entity\Message'
        ));
    }

    public function getName()
    {
        return 'sdz_blogbundle_messagetype';
    }
}
