<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('birthdate', 'date', array(
            'format' => 'dd / MM / yyyy',
            'years' => range(\date("Y") - 10, \date("Y") - 100),
            'label' => 'form.birthdate',
            'translation_domain' => 'FOSUserBundle'
        ));
        $builder->add('image', 'vich_image', array(
            'required'      => false,
            'allow_delete'  => true, // not mandatory, default is true
            'download_link' => true, // not mandatory, default is true
            'label'         => 'Photo de profil'
        ));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }
}