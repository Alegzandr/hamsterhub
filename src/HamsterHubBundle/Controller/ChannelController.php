<?php

namespace HamsterHubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ChannelController extends Controller
{
    public function indexAction($username)
    {
        $user = $this->getDoctrine()
            ->getRepository('EntityBundle:User')
            ->findOneByusername($username);

        $url = $this->getDoctrine()
            ->getRepository('EntityBundle:Video')
            ->findBy(array('authorId'=>$user->getId()), array('id' => 'desc'));

        return $this->render('HamsterHubBundle:Channel:index.html.twig', array('user'=>$user, 'url'=>$url));
    }
}
