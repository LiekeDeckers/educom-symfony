<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\OptredenService;

#[Route('/optreden')]
class OptredenController extends AbstractController
{
    private $os;            // os = optredenService

    public function __construct(OptredenService $os) {
        $this->os = $os;
    }

 
    #[Route('/save', name: 'optreden_save')]
    public function saveOptreden() {

        /// Ook hier weer een kleine simulatie van een "POST" request
        $optreden = [
            "poppodium_id" => 1,
            "hoofdprogramma_id" => 5, 
            "voorprogramma_id" => 2,
            "omschrijving" => "Een avondje blues uit het boekje...",
            "datum" => "2023-05-14",
            
            /// Prijs altijd in centen wegscrhijven ivm afronding
            "prijs" => 3800,
            
            "ticket_url" => "https://melkweg.nl/ticket/",
            "afbeelding_url" => "https://melkweg.nl/optreden/plaatje.jpg"
        ];

        $result = $this->os->saveOptreden($optreden);
        dd($result);

    }
}
