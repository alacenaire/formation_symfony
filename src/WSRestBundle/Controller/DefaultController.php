<?php

namespace WSRestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use WSRestBundle\Entity\User;

class DefaultController extends Controller
{
    /**
     * @Route("/ws/fakeUsers", name="listFakeUsers")
     * @Method("get")
     */
    public function listFakeUsersAction()
    {
        //dump("listUsersAction");
    	$users = array("1"=>"user1", "2"=>"user2");
        $response = new Response();
        $response->setContent(json_encode($users));
        $response->headers->set("Content-Type","application/json");
        //return $this->render('WSRestBundle:Default:index.html.twig');
        return $response;

        //en symfony 3
        //return $this->json($users)
    }

    /**
     * @Route("/ws/users", name="listUsers")
     * @Method("get")
     */
    public function listUsersAction()
    {
        $userRepository = $this->getDoctrine()->getRepository(User::class);
    	$users = $userRepository->findAll();
        $response = new Response();
        $response->setContent(json_encode($users));
        $response->headers->set("Content-Type","application/json");
        return $response;
    }
}
