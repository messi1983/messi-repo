<?php

namespace Sdz\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SocieteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array('label' => 'form.field.name'))
            ->add('descriptif', new TexteType(), array('required' => false, 'label' => 'form.field.activity', 'attr' => array('class' => 'master')))
            ->add('link', 'text', array('required' => false, 'label' => 'form.field.link', 'attr' => array('class' => 'subContent lien')))
			->add('logo', new ImageType(), array('required' => false, 'label' => 'form.field.logo'))
			->add('publication', 'checkbox', array('required' => false, 'label' => 'form.field.publication', 'isPublishOption' => 'yes'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sdz\BlogBundle\Entity\Societe'
        ));
    }

    public function getName()
    {
        return 'sdz_blogbundle_societetype';
    }
}
