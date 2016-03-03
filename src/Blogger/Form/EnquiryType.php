<?php
// src/Blogger/BlogBundle/Form/EnquiryType.php

namespace Blogger\BlogBundle\Form;

use Blogger\BlogBundle\Entity\Enquiry;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormBuilderInterface;

class EnquiryType extends Controller
{
    public function addAction(FormBuilderInterface $builder, array $options)
    {
        // On crée un objet Advert
        $advert = new Enquiry();

        // On crée le FormBuilder grâce au service form factory
        $formBuilder = $this->get('form.factory')->createBuilder('form', $advert);

        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $formBuilder
            $builder->add('name')
        ;
        // Pour l'instant, pas de candidatures, catégories, etc., on les gérera plus tard

        // À partir du formBuilder, on génère le formulaire
        $form = $formBuilder->getForm();

        // On passe la méthode createView() du formulaire à la vue
        // afin qu'elle puisse afficher le formulaire toute seule
        return $this->render('BlogBundle:Page:contact.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}

<?php
namespace UserBundle\Bundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class CommentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('comment', 'textarea', [
                'attr' => [
                    'placeholder' => 'Entrez votre commentaire',
                    'class' => 'form-control m-b-xs no-radius',
                    'style' => 'resize:none;',
                    'rows'=> '3'
                ],
                'label' => false
            ])
            //->add('date')
            //->add('user')
            //->add('post')
        ;
    }
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SayleBundle\Entity\Comment'
        ));
    }
}