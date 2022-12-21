<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    /**
     * @Route("/")
     */
    public function index(): Response
    {
        return new Response("Hello world!");
    }
}