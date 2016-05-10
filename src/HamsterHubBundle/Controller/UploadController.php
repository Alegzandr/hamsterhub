<?php

namespace HamsterHubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use EntityBundle\Entity\Video;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use HamsterHubBundle\Form\Type\UploadVideoType;
use Symfony\Component\HttpFoundation\Response;

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

                $response = new Response();
                $response->setContent(json_encode(array(
                    'success' => true
                )));
               $response->headers->set('Content-Type', 'application/json');
                return $response;
            } elseif ($form->isSubmitted()) {
                $errors = array();

                foreach ($form->getErrors() as $error) {
                    $errors[$form->getName()][] = $error->getMessage();
                }

                foreach ($form as $child /** @var Form $child */) {
                    if (!$child->isValid()) {
                        foreach ($child->getErrors() as $error) {
                            $errors[$child->getName()][] = $error->getMessage();
                        }
                    }
                }

                $response = new Response();
                $response->setContent(json_encode($errors));
                $response->headers->set('Content-Type', 'application/json');
                $response->setStatusCode(400);
                return $response;
            }
        }

        return $this->render(
            'HamsterHubBundle:Upload:index.html.twig',
            array('form' => $form->createView())
        );
    }
}
