<?php

namespace Sdz\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Sdz\BlogBundle\Constants\Constants;

class EcoleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array('label' => 'form.field.name', 'attr' => array('class' => 'subContent')))
        	->add('shortDescription', new TexteType(), array('required' => false, 'label' => 'form.field.description.short', 'attr' => array('class' => 'master')))
			->add('detailedDescription', new TexteType(), array('required' => false, 'label' => 'form.field.description.detailed', 'attr' => array('class' => 'master')))
            ->add('adresse',  new AdresseType(), array('label' => 'form.field.address', 'attr' => array('class' => 'master')))
            ->add('link', 'text', array('required' => false, 'label' => 'form.field.link', 'attr' => array('class' => 'subContent')))
            ->add('tel', 'text', array('required' => false, 'label' => 'form.field.phone.number', 'attr' => array('class' => 'subContent')))
            ->add('logo', new ImageType(), array('required' => false, 'label' => 'form.field.logo', 'attr' => array('class' => 'subContent')))
			->add(Constants::FORM_INPUT_PUBLICATION, 'checkbox', array('required' => false, 'label' => 'form.field.publication', 'isPublishOption' => 'yes'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sdz\BlogBundle\Entity\Ecole'
        ));
    }

    public function getName()
    {
        return 'sdz_blogbundle_ecoletype';
    }
}
