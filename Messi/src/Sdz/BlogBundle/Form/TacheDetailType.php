<?php

namespace Sdz\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TacheDetailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description', new TexteType(), array('required' => false, 'label' => 'form.field.description', 'attr' => array('class' => 'master')))
			->add('ordre', 'integer', array('label' => 'form.field.order'))
			->add('soustaches', 'collection', array('label' => 'form.field.under.tasks', 'type' => new SousTacheType(), 'allow_add' => true, 'allow_delete' => true))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sdz\BlogBundle\Entity\Tache'
        ));
    }

    public function getName()
    {
        return 'sdz_blogbundle_tachedetailtype';
    }
}
