<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class VinylController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(): Response
    {
        $tracks = [
            ['song' => 'Help', 'artist' => 'Jake'],
            ['song' => 'The Broom', 'artist' => 'Agent 16'],
            ['song' => 'Comin\' Up', 'artist'  => 'The Runners'],
            ['song' => 'Down', 'artist' => 'Players of The Game'],
        ];


        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'Zach\'s Monster Playlist',
            'tracks' => $tracks,
        ]);

    }

    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse(string $slug = null): Response
    {

        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;

        return $this->render('vinyl/browse.html.twig', [

            'genre' => $genre,
        ]);
    }
}
