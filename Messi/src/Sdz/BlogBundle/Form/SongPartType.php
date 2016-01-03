<?php

namespace Sdz\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SongPartType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        	->add('type', 'choice', array('label' => ' ', 'choices' => array('part' => 'Part', 'chorus' => 'Chorus'), 'attr' => array('class' => 'subContent')))
        	->add('texte', 'textarea', array('label' => ' ', 'max_length' => 355, 'attr' => array('rows' => 3, 'class' => 'subContent')))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sdz\BlogBundle\Entity\SongPart'
        ));
    }

    public function getName()
    {
        return 'sdz_blogbundle_songparttype';
    }
}
