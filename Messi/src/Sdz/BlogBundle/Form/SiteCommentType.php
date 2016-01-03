<?php

namespace Sdz\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SiteCommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('auteur', new VisitorCommentType(), array('label' => ' '))
			->add('contenu', 'textarea', array('label' => 'form.field.comment', 'max_length' => 200, 'attr' => array('rows' => 3)))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sdz\BlogBundle\Entity\SiteComment'
        ));
    }

    public function getName()
    {
        return 'sdz_blogbundle_sitecommenttype';
    }
}
