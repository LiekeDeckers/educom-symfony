<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Artiest;

class ArtiestController extends AbstractController
{
    #[Route('/artiest', name: 'artiest')]
    public function index(): Response
    {
        $artiest = [
        "naam" => "Gary Clark jr.",
        "genre" => "Blues Rock",
        "omschrijving" => "Gary Clark jr. is...",
        "afbeelding_url" => "https://gery-clark-jr.com",
        "website" => "https://www.garyclarkjr.nl",
        ];

       $rep = $this->getDoctrine()->getRepository(Artiest::class);
       $result = $rep->saveArtiest($artiest);

       dd($result);
    
    }
}
