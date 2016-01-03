<?php

namespace Sdz\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Sdz\BlogBundle\Constants\Constants;

/**
 * 
 * @author Messi
 *
 */
class SiteCommentAdminType extends SiteCommentType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // On fait appel � la m�thode buildForm du parent, qui va ajouter tous les champs � $builder
		parent::buildForm($builder, $options);
		
		 $builder->add(Constants::FORM_INPUT_PUBLICATION, 'checkbox', array('required' => false, 'label' => 'form.field.publication', 'isPublishOption' => 'yes'));
    }

    public function getName()
    {
        return 'sdz_blogbundle_sitecommentadmintype';
    }
}
