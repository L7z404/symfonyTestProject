<?php

namespace App\Controller;

use App\Service\ApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ApiInfoController extends AbstractController
{
    #[Route('/api/info', name: 'app_api_info')]
    public function fetchData(): Response
    {
        return $this->render('api_info/index.html.twig', [
            'controller_name' => 'ApiInfoController',
            'data' => null,
        ]);
    }

    #[Route('/api/info/{name}', name: 'app_api_info_search')]
    public function fetchDataSearch($name, ApiService $apiService): Response{

        $data = $apiService->fetchDataApi('https://pokeapi.co/api/v2/pokemon/'.$name);

        return $this->render('api_info/index.html.twig', [
            'controller_name' => 'ApiInfoController',
            'data' => $data,
        ]);
    }
}
