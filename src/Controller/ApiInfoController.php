<?php

namespace App\Controller;

use App\Service\ApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ApiInfoController extends AbstractController
{
    #[Route('/api/info', name: 'app_api_info')]
    public function fetchData(ApiService $apiService): Response
    {

        $data = $apiService->fetchDataApi('https://pokeapi.co/api/v2/pokemon/gulpin');


        // dd($data);

        return $this->render('api_info/index.html.twig', [
            'controller_name' => 'ApiInfoController',
            'data' => $data,
        ]);
    }
}
