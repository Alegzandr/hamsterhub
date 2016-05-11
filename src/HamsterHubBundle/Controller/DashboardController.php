<?php

namespace HamsterHubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use HamsterHubBundle\Form\Type\EditVideoType;

class DashboardController extends Controller
{
    public function indexAction()
    {
        if ($this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $user = $this->getDoctrine()
                ->getRepository('EntityBundle:User')
                ->findOneById($this->container->get('security.context')->getToken()->getUser()->getId());

            $url = $this->getDoctrine()
                ->getRepository('EntityBundle:Video')
                ->findBy(array('authorId' => $user->getId()), array('id' => 'desc'));

            return $this->render('HamsterHubBundle:Dashboard:index.html.twig', array('user' => $user, 'url' => $url));
        } else {
            header('Location: /');
            exit;
        }
    }

    public function editAction(Request $request, $id)
    {
        if ($this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $video = $this->getDoctrine()
                ->getRepository('EntityBundle:Video')
                ->findOneById(array($id));

            if ($video->getAuthorId() === $this->container->get('security.context')->getToken()->getUser()->getId()) {
                $form = $this->createForm(EditVideoType::class, $video);

                $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($video);
                    $em->flush();

                    return $this->redirectToRoute('hamster_hub_dashboard');
                }

                return $this->render(
                    'HamsterHubBundle:Dashboard:edit.html.twig',
                    array('form' => $form->createView(), 'video' => $video)
                );
            } else {
                return $this->redirectToRoute('hamster_hub_dashboard');
            }
        } else {
            return $this->redirectToRoute('hamster_hub_homepage');
        }

    }

    public function removeAction($id)
    {
        if ($this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $video = $this->getDoctrine()
                ->getRepository('EntityBundle:Video')
                ->findOneById(array($id));

            if ($video->getAuthorId() === $this->container->get('security.context')->getToken()->getUser()->getId()) {
                $em = $this->getDoctrine()->getManager();
                $em->remove($video);
                $em->flush();
            }

            return $this->redirectToRoute('hamster_hub_dashboard');
        }

        return $this->redirectToRoute('hamster_hub_homepage');
    }
}
