<?php

namespace HamsterHubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VideoController extends Controller
{
    public function indexAction($videoId)
    {
        return $this->render('HamsterHubBundle:Channel:index.html.twig', array('videoId' => $videoId));
    }
}
