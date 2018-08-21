<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class SomeController extends AbstractController
{

    /**
     * @return Route("/some")
     */
    public function index()
    {
        return $this->render('some/index.html.twig', [
            'controller_name' => 'SomeController',
        ]);
    }
}
