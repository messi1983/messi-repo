<?php

namespace Sdz\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Sdz\BlogBundle\Constants\Constants;

class OrganismeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array('label' => 'form.field.name'))
			->add('activite', new TexteType(), array('required' => false, 'label' => 'form.field.activity', 'attr' => array('class' => 'master')))
			->add('adresse',  new AdresseType(), array('label' => 'form.field.address', 'attr' => array('class' => 'master')))
			->add('link', 'text', array('required' => false, 'label' => 'form.field.link', 'attr' => array('class' => 'subContent lien')))
			->add('tel', 'text', array('required' => false, 'label' => 'form.field.phone.number'))
			->add('dateEntree', 'date', array('label' => 'form.field.date.entry', 'widget' => 'single_text', 'format' => 'dd-MM-yyyy', 'attr' => array('class' => 'datepicker')))
			->add('dateSortie', 'date', array('label' => 'form.field.date.exit', 'widget' => 'single_text', 'format' => 'dd-MM-yyyy', 'attr' => array('class' => 'datepicker')))
			->add('logo', new ImageType(), array('required' => false, 'label' => 'form.field.logo'))
			->add(Constants::FORM_INPUT_PUBLICATION, 'checkbox', array('required' => false, 'label' => 'form.field.publication', 'isPublishOption' => 'yes'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sdz\BlogBundle\Entity\Organisme'
        ));
    }

    public function getName()
    {
        return 'sdz_blogbundle_organismetype';
    }
}
