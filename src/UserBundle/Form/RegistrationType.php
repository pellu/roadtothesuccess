<?php
namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('youtube', null, array('label' => 'Chaîne Youtube :', 'translation_domain' => 'FOSUserBundle', 'required' => false));
        $builder->add('twitter', null, array('label' => 'Twitter :', 'translation_domain' => 'FOSUserBundle', 'required' => false));
        $builder->add('facebook', null, array('label' => 'Page Facebook: ', 'translation_domain' => 'FOSUserBundle', 'required' => false));
        $builder->add('twitch', null, array('label' => 'Chaîne Twitch: ', 'translation_domain' => 'FOSUserBundle', 'required' => false));
        $builder->add('profilePictureFile', null, array('label' => 'Importer une photo de profil: ', 'required' => false));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}