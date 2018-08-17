<?php

namespace App\Controller;

use App\Repository\MessagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class MessagesController extends AbstractController
{
    public function testMessagerie()
    {

        return $this->render('tests/messagerie.html.twig', [
            'controller_name' => 'MessagesController',
        ]);
    }

    public function tesAllMessages(MessagesRepository $messagesRepository): Response
    {
        return $this->render('tests/messagerie.html.twig', [
            'messages' => $messagesRepository->findAll(),
            'controller_name' => 'MessagesController'
        ]);
    }
}
