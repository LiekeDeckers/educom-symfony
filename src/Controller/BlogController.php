<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Psr\Log\LoggerInterface;

#[Route('/blog')]
class BlogController extends BaseController
{
    //overloading
    /*#[Route('/{page<\d+>}', name: 'blog_list')]         // volgt deze route wanneer het een getal is
    #[Template()]
    public function list($page) {
        return new Response(
            "<html><body>$page</body></html>"
        );
    }

    #[Route('/{slug}', name: 'blog_show')]              // volgt deze route wanneer het geen getal is
    public function show($slug) {
        return new Response(
            "<html><body>$slug</body></html>"
        );
    } */

    // autowiring (logging)
    /* #[Route('/{id}', name: 'blog_show')]
    public function show(LoggerInterface $logger, $id = 1) {

        $logger->info("info Message");
        $logger->warning("Warning Message");
        $logger->error("De waarde van id is: $id");

        dd($id);
    } */

    // logging vanuit BaseController
    #[Route('/show/{id}', name: 'blog_show')]
    public function show($id = 1) {
        $this->log("info Message from extended BaseController");
        dd($id);
    }
}
