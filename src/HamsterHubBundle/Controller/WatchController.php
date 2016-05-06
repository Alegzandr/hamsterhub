<?php

namespace HamsterHubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WatchController extends Controller
{
    public function indexAction($videoId)
    {
        $url = $this->getDoctrine()
            ->getRepository('EntityBundle:Video')
            ->findOneById($videoId);

        return $this->render('HamsterHubBundle:Watch:index.html.twig', array('video' => $url));
    }
}
