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

class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact")
     * @Template()
     */
    public function contactAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $about =$em->getRepository("AppBundle:About")->findOneBy([]);
        if($request->isMethod('post')) {
            $data = $request->request->all();
            $contactObj = new Contact();
            $contactObj->setName($data['name']);
            $contactObj->setEmail($data['email']);
            $contactObj->setDescription($data['message']);
            $em->persist($contactObj);
            $em->flush();
            return $this->redirectToRoute('contact');
        }
       return ['about' => $about];
    }
}
