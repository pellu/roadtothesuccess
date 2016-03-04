<?php
namespace Blogger\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class BlogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', null, array('label' => "Titre de l'article :", 'translation_domain' => 'FOSUserBundle'));
        $builder->add('blog', null, array('label' => "Contenu de l'article :", 'translation_domain' => 'FOSUserBundle', 'label_attr' => array('class' => 'article')));

    }

    public function getBlockPrefix()
    {
        return 'blog';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}