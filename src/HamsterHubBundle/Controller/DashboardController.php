<?php

namespace HamsterHubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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

    public function editAction($id)
    {
        if ($this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            
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
