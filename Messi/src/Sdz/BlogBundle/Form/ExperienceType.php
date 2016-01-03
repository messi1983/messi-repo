<?php

namespace Sdz\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Sdz\BlogBundle\Constants\Constants;

class ExperienceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		parent::buildForm($builder, $options);
        $builder
            //->add('slug')
            ->add('projet', 'text', array('label' => 'form.field.project'))
            ->add('description', new TexteType(), array('required' => false, 'label' => 'form.field.description', 'attr' => array('class' => 'master')))
			->add('societe', 'entity', array('label' => 'form.field.company', 'class' => 'SdzBlogBundle:Societe', 'property' => 'nom', 'multiple' => false))
			->add('periode', new PeriodeType(), array('required' => false, 'label' => ' '))
            ->add('technos', 'entity', array('label' => 'form.field.technologies', 'class' => 'SdzBlogBundle:Techno', 'property' => 'nom', 'multiple' => true, 'expanded' => true))
			->add('taches', 'collection', array('label' => 'form.field.tasks', 'type' => new TacheType(), 'allow_add' => true, 'allow_delete' => true))
			->add(Constants::FORM_INPUT_PUBLICATION, 'checkbox', array('required' => false, 'label' => 'form.field.publication', 'isPublishOption' => 'yes'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sdz\BlogBundle\Entity\Experience'
        ));
    }

    public function getName()
    {
        return 'sdz_blogbundle_experiencetype';
    }
}

