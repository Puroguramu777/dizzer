<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class DizzerController extends AbstractController
{
    #[Route("/home", name: "Accueil")]
    public function home()
    {
        return $this->render("home/home.html.twig");
    }

    #[Route("/playlist", name: "Playlist")]
    public function playlist()
    {
        return $this->render("playlist/playlist.html.twig");
    }

    #[Route("/favourite", name: "Fav")]
    public function favourite()
    {
        return $this->render("favourite/favourite.html.twig");
    }

    #[Route("/notification", name: "Noti")]
    public function notification()
    {
        return $this->render("notification/notification.html.twig");
    }

    #[Route("/user", name: "User")]
    public function user()
    {
        return $this->render("user/user.html.twig");
    }

    #[Route("/setting", name: "Setting")]
    public function setting()
    {
        return $this->render("setting/setting.html.twig");
    }
    
}