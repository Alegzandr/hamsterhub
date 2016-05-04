<?php

namespace HamsterHubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use EntityBundle\Entity\Video;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UploadController extends Controller
{
    public function indexAction()
    {
        if ($this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $video = new Video();
            $video->setAuthorId($this->getUser()->getId());
            $video->setUploadDate(new \DateTime(date('Y-m-d H:i:s')));

            $form = $this->createFormBuilder($video)
                ->add('title', TextType::class, array('label' => 'Titre de la vidéo'))
                ->add('url', TextType::class, array('label' => 'URL de la vidéo'))
                ->add('save', SubmitType::class, array('label' => 'Upload'))
                ->getForm();

            return $this->render('HamsterHubBundle:Upload:index.html.twig', array(
                'form' => $form->createView(),
            ));
        }
    }
}
