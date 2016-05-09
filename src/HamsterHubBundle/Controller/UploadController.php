<?php

namespace HamsterHubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use EntityBundle\Entity\Video;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use HamsterHubBundle\Form\Type\UploadVideoType;

class UploadController extends Controller
{
    public function videoAction(Request $request)
    {
        if ($this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $video = new Video();
            $form = $this->createForm(UploadVideoType::class, $video);

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $video->setAuthorId($this->getUser()->getId());
                $video->setUser($this->getUser());
                $video->setUploadDate(new \DateTime(date('Y-m-d H:i:s')));

                $em = $this->getDoctrine()->getManager();
                $em->persist($video);
                $em->flush();

                return $this->redirectToRoute('hamster_hub_homepage');
            }

            return $this->render(
                'HamsterHubBundle:Upload:index.html.twig',
                array('form' => $form->createView())
            );
        }
    }
}
