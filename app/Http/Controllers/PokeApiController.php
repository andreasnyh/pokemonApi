<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Pokemon;
use Illuminate\Support\Facades\App;

class PokeApiController extends Controller
{
    public function index()
    {
        // Create a client with a base URI
        $client = new Client(['base_uri' => 'https://pokeapi.co/api/v2/']);
        // Send a request to https://pokeapi.co/api/v2/pokemon/1
        $response = $client->request('GET', 'pokemon/1');
        $body = json_decode($response->getBody());

        $pokemon = $this->getBody($response);

        $exists = Pokemon::query()->find($pokemon->id);
        if (!$exists) {
            try {
                $pokemon->saveOrFail();
                print "Saved";
            } catch (\Throwable $e) {
                var_dump($e);
            }
        }

        return view("pokemon", ["pokemon" => $body]);
    }

    public function findById($id)
    {
        // Create a client with a base URI
        $client = new Client(['base_uri' => 'https://pokeapi.co/api/v2/']);
        // Send a request to https://pokeapi.co/api/v2/pokemon/{id or name}
        $response = $client->request('GET', 'pokemon/'.$id);

        // change this and rewrite frontend to use data from DB
        $body = json_decode($response->getBody());

        $pokemon = $this->getBody($response);
        $exists = Pokemon::query()->find($pokemon->id);

        if (!$exists) {
            try {
                $pokemon->saveOrFail();
                print "Saved";
            } catch (\Throwable $e) {
                var_dump($e);
            }
        }
        return view("pokemon", ["pokemon" => $body]);
    }

    private function getBody($response){
        $body = json_decode($response->getBody());

        $pokemon = new Pokemon;
        $pokemon->id = $body->id;
        $pokemon->name = $body->name;
        $pokemon->base_experience = $body->base_experience;
        $pokemon->height = $body->height;
        $pokemon->is_default = $body->is_default;
        $pokemon->order = $body->order;
        $pokemon->weight = $body->weight;
        return $pokemon;
    }

    public function store(Request $request){
        $pokemon = new Pokemon();
        $pokemon->name = $request->name;
    }

}
