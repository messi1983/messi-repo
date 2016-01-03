<?php

namespace Sdz\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Sdz\BlogBundle\Constants\Constants;

class ChantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', 'text', array('label' => 'form.field.title'))
			->add('type', 'text', array('label' => 'form.field.type'))
			->add('dateRedaction', 'date', array('label' => 'form.field.date.redaction', 'widget' => 'single_text', 'format' => 'dd-MM-yyyy', 'attr' => array('class' => 'datepicker')))
			->add('resume', new TexteType(), array('required' => false, 'label' => 'form.field.summary', 'attr' => array('class' => 'master')))
			->add('parts', 'collection', array('label' => 'form.field.parts', 'type' => new SongPartType(), 'allow_add' => true, 'allow_delete' => true))
			->add(Constants::FORM_INPUT_PUBLICATION, 'checkbox', array('required' => false, 'label' => 'form.field.publication', 'isPublishOption' => 'yes'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sdz\BlogBundle\Entity\Chant'
        ));
    }

    public function getName()
    {
        return 'sdz_blogbundle_chanttype';
    }
}
