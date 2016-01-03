<?php

namespace Sdz\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VisitorCommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('pseudo', 'text', array('label' => 'form.field.pseudo', 'required' => false))
			->add('email', 'email', array('label' => 'form.field.email'))
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
        return 'sdz_blogbundle_visitorcommenttype';
    }
}
