<?php

namespace App\Controller;

use App\Entity\Poppodium;
use App\Entity\Artiest;
use App\Entity\Optreden;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;


#[Route('/')]
class HomepageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    #[Template()]
    public function index() {
        return ['controller_name' => 'HomepageController'];
    }

    #[Route('/backhome', name: 'backhome')]
    public function backhome() {
        return $this->redirectToRoute('homepage');
    }

    // meertaligheid
    #[Route(path: [
        'en' => '/contact-us',
        'nl' => '/neem-contact-op'
    ], name: 'contact')]
    public function contact(Request $request) {
        $locale = $request->getLocale();
        $msg = "This page is in English";
        if($locale == "nl") {
            $msg = "Deze pagina is in het Nederlands";
        }
        return new Response(
            "<html><body>$msg</body></html>"
        );
    }

    // json en xml response
    #[Route('/data.{_format}', name: 'api_output', requirements: ['format' => 'xml|json'])]
    public function api($_format) {
        $data = [
            ["id" => 1, "naam" => "Piet"],
            ["id" => 2, "naam" => "Wilma"],
            ["id" => 3, "naam" => "Harry"]
        ];

        if ($_format == 'json') {
            return($this->json($data));
        } else {                                // om een array naar XML om te zetten is een parser nodig.
            $d = "<data>";                      // hier even een snelle oplossing --> kan eventueel ook met Twig
                foreach ($data as $record) {
                    $id = $record['id'];
                    $naam = $record['naam'];
                    $d .= "<record id='$id'>$naam</record>";
                }
            $d .= "<data>";
            return(new Response($d));    
        }
    }
    
    //request
    #[Route('/save-data', name:'homepage_save_data')] 
    public function saveData(Request $request) {
        //$params = $request->request->all();
        $params = $request->get('input');
        dd($params);
    }
}



    /**
        * @method Poppodium|null find($id, $lockMode = null, $lockVersion = null)
        * @method Poppodium|null findOneBy(array $criteria, array $orderBy = null)
        * @method Poppodium[]    findAll()
        * @method Poppodium[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    */

class PoppodiumRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Poppodium::class);
    }
 
    // /**
    //  * @return Poppodium[] Returns an array of Poppodium objects
    //  */
    
    public function findByExampleField($value) {
        return $this->createQueryBuilder('p')
            //->andWhere('p.exampleField = :val')
            //->setParameter('val', $value)
            //->orderBy('p.id', 'ASC')
            //->setMaxResults(10)
            //->getQuery()
            //->getResult()
        ;
    }
    
    public function findOneBySomeField($value): ?Poppodium {
        return $this->createQueryBuilder('p')
            //->andWhere('p.exampleField = :val')
            //->setParameter('val', $value)
            //->getQuery()
            //->getOneOrNullResult()
        ;
    }

}

class ArtiestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Artiest::class);
    }
}

class OptredenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Optreden::class);
    }
}
 
    

