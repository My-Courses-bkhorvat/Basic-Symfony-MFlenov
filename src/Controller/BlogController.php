<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog")
     */
    public function index(): Response
    {
        return new Response("Hello blog!");
    }

    /**
     * @Route("/blog/show/{id}/{ind}")
     */
    public function show($id, $ind): Response
    {
        return new Response("Parameters " . $id . " and " . $ind);
    }
}