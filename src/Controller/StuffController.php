<?php

namespace App\Controller;

use App\Entity\Stuff;
use App\Repository\StuffRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StuffController extends AbstractController
{
    #[Route('/stuff', name: 'app_stuff')]
    public function index(): Response
    {
        return $this->render('stuff/stuff.html.twig', [
            'controller_name' => 'StuffController',
        ]);
    }


    //Create route and define parameters
    #[Route('stuff/create', name: 'stuff_create')]
    public function createStuff(EntityManagerInterface $entityManager): Response{
        
        //Define object
        $stuff = new Stuff();

        //Set values
        $stuff->setName('Magic Stuff');
        $stuff->setPower(100);
        $stuff->setDescription('This magic stuff has 100 power!');

        //use persist to tell doctrine that I want to save the Stuff (no query yet)
        $entityManager->persist($stuff);

        //use flush to tell doctrine to save the Stuff (exec query)
        $entityManager->flush();

        return new Response('Saved new stuff with id ' . $stuff->getId());
    }


    #[Route('/stuff/show/{id}', name: 'stuff_show')]
    public function showStuff(StuffRepository $stuffRepository, int $id): Response{

        $stuff = $stuffRepository->find($id);

        return new Response(
            'This is the stuff called ' .
            $stuff->getName() . 
            ' and its power level is ' .
            $stuff->getPower()
        );
    }
}
