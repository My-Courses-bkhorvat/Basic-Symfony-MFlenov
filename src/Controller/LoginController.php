<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends AbstractController
{
    /**
     * @Route("/login/index", methods={"get"}, name="login_index")
     */
    public function index(): Response
    {
        return new Response("This is GET");
    }

    /**
     * @Route("/login/index", methods={"post"}, name="login_index_post")
     */
    public function post(): Response
    {
        return new Response("This is POST");
    }
}