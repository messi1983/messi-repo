<?php

namespace Sdz\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AdresseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('numero', 'text', array('label' => 'form.field.street.number', 'attr' => array('class' => 'subContent')))
            ->add('adresse', 'textarea', array('label' => 'form.field.address', 'attr' => array('class' => 'subContent')))
			->add('codePostal', 'text', array('label' => 'form.field.zip.code', 'attr' => array('class' => 'subContent')))
			->add('ville', 'text', array('label' => 'form.field.town', 'attr' => array('class' => 'subContent')))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sdz\BlogBundle\Entity\Adresse'
        ));
    }

    public function getName()
    {
        return 'sdz_blogbundle_adressetype';
    }
}
