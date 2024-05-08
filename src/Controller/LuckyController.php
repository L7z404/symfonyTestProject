<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LuckyController extends AbstractController{
    
    // Define route (thanks to AbstractController)
    //{variable url} and the name of the route (check it with debug:router)
    #[Route('/lucky/number/{max}', name: 'app_lucky_number')]
    public function number(int $max): Response {
        $number = random_int(0,$max);
        
        //Thanks to the twig, we can use $this->render 
        //The first parameter is the path of the template
        //The second parameter is an array of variables to pass to the template
        //twig recommends snake_case
        return $this->render('lucky/number.html.twig',[
            'number' => $number,
        ]);
    }
}