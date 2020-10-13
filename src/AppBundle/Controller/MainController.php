<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class MainController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function homeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $about =$em->getRepository("AppBundle:About")->findOneBy([]);

        $queryItens = 'SELECT id FROM  items
                ORDER BY RAND()
                LIMIT 9';

        $statementItems = $em->getConnection()->prepare($queryItens);

        $statementItems->execute();

        $rendItems = $statementItems->fetchAll();

        $itemsArray = [];
        foreach ($rendItems as $rendTtems){
            $itemsRepo =$em->getRepository("AppBundle:Items")->find($rendTtems['id']);
            array_push($itemsArray,$itemsRepo);
        }


        $query = 'SELECT id FROM  services
                ORDER BY RAND()
                LIMIT 3';

        $statement = $em->getConnection()->prepare($query);

        $statement->execute();

        $rendServices = $statement->fetchAll();

        $services = [];
        foreach ($rendServices as $rendId){
            $product =$em->getRepository("AppBundle:Services")->find($rendId['id']);
            array_push($services,$product);
        }


        if($request->isMethod('post')) {
            $data = $request->request->all();
            $contactObj = new Contact();
            $contactObj->setName($data['name']);
            $contactObj->setEmail($data['email']);
            $contactObj->setDescription($data['message']);
            $em->persist($contactObj);
            $em->flush();
            return $this->redirectToRoute('homepage');
        }

        return ['about'=>$about,'services' => $services,'items'=>$itemsArray];
    }
}
