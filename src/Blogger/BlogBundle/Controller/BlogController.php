<?php
// src/Blogger/BlogBundle/Controller/BlogController.php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Blogger\BlogBundle\Form\EnquiryType;
use Blogger\BlogBundle\Form\BlogType;
use Blogger\BlogBundle\Entity\Blog;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Blog controller.
 */
class BlogController extends Controller
{
    /**
     * Show a blog entry
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $this->render('BloggerBlogBundle:Blog:show.html.twig', array(
            'blog'      => $blog,
        ));
    }

    public function ajouterAction()
    {
        $message='';
        $blog = new Blog();
        $form = $this->container->get('form.factory')->create(new BlogType(), $blog);

        $request = $this->container->get('request');

        if ($request->getMethod() == 'POST')
        {
            $form->bind($request);

            if ($form->isValid())
            {
                $user = $this->get('security.token_storage')->getToken()->getUser();
                $blog->setUser($user);

                $em = $this->getDoctrine()->getManager();

                $em = $this->container->get('doctrine')->getManager();
                $em->persist($blog);
                $em->flush();
                $message='Article ajouté avec succès !';
            }
        }

        return $this->container->get('templating')->renderResponse(
            'BloggerBlogBundle:Blog:ajouter.html.twig',
            array(
                'form' => $form->createView(),
                'message' => $message,
            ));
    }
}