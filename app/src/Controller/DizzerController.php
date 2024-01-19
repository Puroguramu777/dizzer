<?php

namespace App\Controller;

use App\Form\MusicType;
use App\Repository\MusicRepository;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DizzerController extends AbstractController
{

    private $musicRepo;

    public function __construct(MusicRepository $musicRepository)
    {
        $this->musicRepo = $musicRepository;
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

    #[Route("/editmusic/{id}", name: "editmusic", methods: ['GET', 'POST'])]
    public function editMusic(int $id, Request $request, ManagerRegistry $managerRegistry)
    {
        $music = $this->musicRepo->find($id);
        //création du formulaire à partir de la class de structuration de formulaire
        $form = $this->createForm(MusicType::class, $music);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
           

            $em = $managerRegistry->getManager();
            $em->persist($form->getData()); // je persiste les données
            $em->flush();
            $message = ($id > 0) ? "Le livre a été modifié" : "Le livre a été créé";

            $this->addFlash('success', $message);
            return $this->redirectToRoute('Accueil'); // et je renvoie vers la liste des livres
        }

        return $this->render('form/editMusic.html.twig',[
            'music' => $music,
            'form' => $form->createView(), // creation de la vue de formulaire
        ]);
    }
    
}