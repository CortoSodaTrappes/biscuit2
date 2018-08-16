<?php

namespace App\Controller;

use App\Entity\Membres;
use App\Repository\MembresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RegisterType;

class MembresController extends AbstractController
{
    public function testList(MembresRepository $membresRepository): Response
    {
        return $this->render('tests/list.html.twig', [
            'membres' => $membresRepository->findAll()
        ]);
    }

    public function testShow(Membres $membre): Response
    {
        return $this->render('tests/show.html.twig', ['membre' => $membre]);
    }

    public function testNew(Request $request)
    {
        $membre = new Membres();
        $form = $this->createForm(RegisterType::class, $membre);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {        
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($membre);
            $entityManager->flush();

            return $this->redirectToRoute('test_index');

        }
        return $this->render('tests/register.html.twig', array('form'=>$form->createView()));
    }

    public function testEdit(Request $request, Membres $membre)
    {
        $form = $this->createForm(RegisterType::class, $membre);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {        
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($membre);
            $entityManager->flush();

            return $this->redirectToRoute('test_index');

        }
        return $this->render('tests/register.html.twig', array('form'=>$form->createView()));
    }    

    public function testDelete(Request $request, Membres $membre): Response
    {
            $em = $this->getDoctrine()->getManager();
            $em->remove($membre);
            $em->flush();

        return $this->redirectToRoute('test_list');
    }    
}
