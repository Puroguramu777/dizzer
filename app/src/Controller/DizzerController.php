<?php

namespace App\Controller;

use App\Repository\MusicRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class DizzerController extends AbstractController
{

    private $musicRepo;

    public function __construct(MusicRepository $bookRepository)
    {
        $this->musicRepo = $bookRepository;
    }

    #[Route("/home", name: "Accueil")]
    public function home()
    {
        return $this->render("home/home.html.twig", [
            "musics" => $this->musicRepo->findAllMusic()
        ]);
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