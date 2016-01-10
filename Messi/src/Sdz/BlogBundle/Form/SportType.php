<?php

namespace Sdz\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Sdz\BlogBundle\Constants\Constants;

class SportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		parent::buildForm($builder, $options);
	
        $builder
			->add('dateDebut', 'date', array('label' => 'form.field.date.start', 'widget' => 'single_text', 'format' => 'dd-MM-yyyy', 'attr' => array('class' => 'datepicker')))
            ->add('nom', 'text', array('label' => 'form.field.name'))
			->add('logo', new ImageType(), array('required' => false, 'label' => 'form.field.logo', 'attr' => array('class' => 'master')))
			->add('shortDescription', new TexteType(), array('required' => false, 'label' => 'form.field.description.short', 'attr' => array('class' => 'master')))
			->add('commentaire', new TexteType(), array('required' => false, 'label' => 'form.field.comment', 'attr' => array('class' => 'master')))
			->add('images', 'collection', array('type' => new ImageTitreType(), 'allow_add' => true, 'allow_delete' => true, 'label' => 'form.field.pictures', 'attr' => array('class' => 'master')))
			->add(Constants::FORM_INPUT_PUBLICATION, 'checkbox', array('required' => false, 'label' => 'form.field.publication', 'isPublishOption' => 'yes'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sdz\BlogBundle\Entity\Sport'
        ));
    }

    public function getName()
    {
        return 'sdz_blogbundle_sporttype';
    }
}
