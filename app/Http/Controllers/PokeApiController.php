<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PokeApiController extends Controller
{
    public function index()
    {
        // Create a client with a base URI
        $client = new Client(['base_uri' => 'https://pokeapi.co/api/v2/']);
        // Send a request to https://pokeapi.co/api/v2/pokemon/1
        $response = $client->request('GET', 'pokemon/1');
        $body = json_decode($response->getBody());
        return view("pokemon", ["pokemon" => $body]);
    }

}
