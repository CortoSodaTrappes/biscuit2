<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MessagesController extends AbstractController
{
    public function testMessagerie()
    {
        return $this->render('tests/messagerie.html.twig', [
            'controller_name' => 'MessagesController',
        ]);
    }
}
