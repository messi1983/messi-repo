<?php

namespace Sdz\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Sdz\BlogBundle\Constants\Constants;

class TheatreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		parent::buildForm($builder, $options);
	
        $builder
        	->add('piece', 'text', array('label' => 'form.field.theater.play', 'attr' => array('class' => 'subContent')))
        	->add('type', 'choice', array('label' => 'form.field.theater.type', 'choices' => array('t' => 'Romantique', 't' => 'Tragique', 'h' => 'Humoristique'), 'attr' => array('class' => 'subContent')))
        	->add('periode', new PeriodeType(), array('required' => false, 'label' => ' '))
			->add('superviseur', new MembreType(), array('label' => 'form.field.supervisor', 'attr' => array('class' => 'master')))
            ->add('resume', new TexteType(), array('label' => ' '))
			->add('images', 'collection', array('label' => 'form.field.pictures', 'type' => new ImageType(), 'allow_add'    => true, 'allow_delete' => true, 'attr' => array('class' => 'subContent')))
			->add('organisme', 'entity', array('label' => 'form.field.organism', 'class' => 'SdzBlogBundle:Organisme', 'property' => 'nom', 'multiple' => false))
			->add(Constants::FORM_INPUT_PUBLICATION, 'checkbox', array('required' => false, 'label' => 'form.field.publication', 'isPublishOption' => 'yes'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sdz\BlogBundle\Entity\Theatre'
        ));
    }

    public function getName()
    {
        return 'sdz_blogbundle_theatretype';
    }
}

