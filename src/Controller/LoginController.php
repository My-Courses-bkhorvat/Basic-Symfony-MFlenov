<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends AbstractController
{
    /**
     * @Route("/login/index", methods={"get"})
     */
    public function index(): Response
    {
        return new Response("This is GET");
    }

    /**
     * @Route("/login/index", methods={"post"})
     */
    public function post(): Response
    {
        return new Response("This is POST");
    }
}