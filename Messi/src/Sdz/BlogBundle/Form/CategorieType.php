<?php

namespace Sdz\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Sdz\BlogBundle\Constants\Constants;

class CategorieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array('label' => 'form.field.name'))
			->add('description', new TexteType(), array('required' => false, 'label' => 'form.field.description', 'attr' => array('class' => 'master')))
			->add('technos', 'entity', array('label' => 'form.field.technologies', 'class' => 'SdzBlogBundle:Techno', 'property' => 'nom', 'multiple' => true, 'expanded' => true))
			->add(Constants::FORM_INPUT_PUBLICATION, 'checkbox', array('required' => false, 'label' => 'form.field.publication', 'isPublishOption' => 'yes'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sdz\BlogBundle\Entity\Categorie'
        ));
    }

    public function getName()
    {
        return 'sdz_blogbundle_categorietype';
    }
}
