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

class ServicesController extends Controller
{
    /**
     * @Route("/services", name="services")
     * @Template()
     */
    public function servicesAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $services = $em->getRepository("AppBundle:Services")->findAll();
        return ['services' => $services];
    }


    /**
     * @Route("/services-inner/{id}", name="servicesInner")
     * @Template()
     */
    public function serviceInnerAction($id,Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $services = $em->getRepository("AppBundle:Services")->find($id);
        return ['services' => $services];
    }


}
