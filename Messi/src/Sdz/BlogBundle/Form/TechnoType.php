<?php

namespace Sdz\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TechnoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array('label' => 'form.field.name'))
            ->add('shortDescription', new ShortTexteType(), array('required' => false, 'label' => 'form.field.description.short', 'attr' => array('class' => 'master')))
            ->add('description', new TexteType(), array('required' => false, 'label' => 'form.field.description', 'attr' => array('class' => 'master')))
			->add('logo', new ImageType(), array('required' => false, 'label' => 'form.field.logo'))
			->add('categorie', 'entity', array('label' => 'form.field.category', 'required' => false, 'class' => 'SdzBlogBundle:Categorie', 'property' => 'nom', 'multiple' => false))
			->add('experiences', 'entity', array('label' => 'form.field.experiences', 'class' => 'SdzBlogBundle:Experience', 'property' => 'projet', 'multiple' => true, 'expanded' => true))
			->add('motsCles', 'entity', array('label' => 'form.field.keywords', 'class' => 'SdzBlogBundle:MotCle', 'property' => 'motCle', 'multiple' => true, 'expanded' => true))
			->add('publication', 'checkbox', array('required' => false, 'label' => 'form.field.publication', 'isPublishOption' => 'yes'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sdz\BlogBundle\Entity\Techno'
        ));
    }

    public function getName()
    {
        return 'sdz_blogbundle_technotype';
    }
}
