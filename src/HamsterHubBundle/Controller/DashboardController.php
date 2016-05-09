<?php

namespace HamsterHubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function indexAction($username)
    {
        if ($username === $this->getUser()->getUsernameCanonical()) {
            $user = $this->getDoctrine()
                ->getRepository('EntityBundle:User')
                ->findOneByusername($username);

            $url = $this->getDoctrine()
                ->getRepository('EntityBundle:Video')
                ->findBy(array('authorId'=>$user->getId()), array('id' => 'desc'));
            
            return $this->render('HamsterHubBundle:Dashboard:index.html.twig', array('user'=>$user, 'url'=>$url));
        } else {
            header('Location: /channel/' . $username);
            exit;
        }
    }
}
