<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class VinylController extends AbstractController
{
    #[Route('/')]
    public function homepage(): Response
    {
        $tracks = [
            ['song' => 'Hello', 'artist' => 'Jake'],
            ['song' => 'The Broom', 'artist' => 'Agent 16'],
            ['song' => 'Comin\' Up', 'artist'  => 'The Runners'],
            ['song' => 'Down', 'artist' => 'Players of The Game'],
        ];




        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'Zach\'s Monster Playlist',
            'tracks' => $tracks,
        ]);
    }


    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response
    {
        if ($slug){
            $title = 'Genre: '.u(str_replace('-', ' ', $slug))->title(true);
        }  else  {
              $title = 'All Genres';
        }
        return new Response($title);
    }
}
