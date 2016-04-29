<?php

namespace HamsterHubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ChannelController extends Controller
{
    public function indexAction($username)
    {
        return $this->render('HamsterHubBundle:Channel:index.html.twig', array('username' => $username));
    }
}
