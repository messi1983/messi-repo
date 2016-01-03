<?php

namespace Sdz\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Sdz\BlogBundle\Constants\Constants;

class AuteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array('label' => 'form.field.name'))
			->add('prenom', 'text', array('label' => 'form.field.firstname'))
			->add('dateNaissance', 'date', array('label' => 'form.field.date.birth', 'widget' => 'single_text', 'format' => 'dd-MM-yyyy', 'attr' => array('class' => 'datepicker')))
			->add('dateDeces', 'date', array('label' => 'form.field.date.death', 'widget' => 'single_text', 'format' => 'dd-MM-yyyy', 'attr' => array('class' => 'datepicker')))
			->add('photo', new ImageType(), array('required' => false, 'label' => 'form.field.photo'))
			->add('link', 'text', array('required' => false, 'label' => 'form.field.link', 'attr' => array('class' => 'subContent')))
			->add('biographie', new TexteType(), array('required' => false, 'label' => 'form.field.biography', 'attr' => array('class' => 'master')))
			->add(Constants::FORM_INPUT_PUBLICATION, 'checkbox', array('required' => false, 'label' => 'form.field.publication', 'isPublishOption' => 'yes'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sdz\BlogBundle\Entity\Auteur'
        ));
    }

    public function getName()
    {
        return 'sdz_blogbundle_auteurtype';
    }
}
