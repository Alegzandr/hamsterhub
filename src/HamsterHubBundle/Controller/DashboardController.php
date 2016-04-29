<?php

namespace HamsterHubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function indexAction($username)
    {
        if ($username === $this->getUser()->getUsernameCanonical()) {
            return $this->render('HamsterHubBundle:Dashboard:index.html.twig', array('username' => $username));
        } else {
            header('Location: /channel/' . $username);
            exit;
        }
    }
}
