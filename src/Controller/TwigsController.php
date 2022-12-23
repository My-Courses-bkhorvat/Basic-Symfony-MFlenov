<?php

namespace App\Controller;

use App\Model\Person;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TwigsController extends AbstractController
{
    #[Route('/twigs', name: 'app_twigs')]
    public function index(): Response
    {
        return $this->render('twigs/index.html.twig', [
            'message' => 'Hello world!',
            'people' => Person::CreateTestList(),
            'flag' => 1
        ]);
    }
}
