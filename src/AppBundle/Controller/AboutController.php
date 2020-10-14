<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class AboutController extends Controller
{
    /**
     * @Route("/about", name="about")
     * @Template()
     */
    public function aboutAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $about =$em->getRepository("AppBundle:About")->findOneBy([]);

        $query = 'SELECT id FROM  services
                ORDER BY RAND()
                LIMIT 2';

        $statement = $em->getConnection()->prepare($query);

        $statement->execute();

        $rendServices = $statement->fetchAll();

        $services = [];
        foreach ($rendServices as $rendId){
            $product =$em->getRepository("AppBundle:Services")->find($rendId['id']);
            array_push($services,$product);
        }

        return ['about'=>$about,'services'=>$services];
    }
}
