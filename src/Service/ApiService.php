<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class ApiService{
    private $client;

    public function __construct(){
        $this->client = HttpClient::create();
    }

    public function fetchDataApi($url){

        //Define response
        $response = $this->client->request('GET', $url);

        //Check if the response was successful
        if($response->getStatusCode() === 200){
            //Decode json to array
            return $response->toArray();
        }else{
            //Handle error, just null
            return null;
        }
    }
}