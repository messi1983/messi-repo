<?php

namespace Sdz\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Sdz\BlogBundle\Constants\Constants;

class DanseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array('label' => 'form.field.name'))
			->add('shortDescription', new TexteType(), array('required' => false, 'label' => 'form.field.description.short', 'attr' => array('class' => 'master')))
			->add('commentaire', new TexteType(), array('required' => false, 'label' => 'form.field.comment', 'attr' => array('class' => 'master')))
			->add('dateDebut', 'date', array('label' => 'form.field.date.start', 'widget' => 'single_text', 'format' => 'dd-MM-yyyy', 'attr' => array('class' => 'datepicker')))
			->add('logo', new ImageType(), array('label' => 'form.field.logo', 'required' => false))
			->add('images', 'collection', array('label' => 'form.field.pictures', 'type' => new ImageType(), 'allow_add'    => true, 'allow_delete' => true))
			->add(Constants::FORM_INPUT_PUBLICATION, 'checkbox', array('required' => false, 'label' => 'form.field.publication', 'isPublishOption' => 'yes'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sdz\BlogBundle\Entity\Danse'
        ));
    }

    public function getName()
    {
        return 'sdz_blogbundle_dansetype';
    }
}
