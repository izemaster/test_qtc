<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function fetch(){
        $url = 'https://pokeapi.co/api/v2/';
        $pokemon_json = Http::get("{$url}/pokemon",[
            'limit' => 100000,
            'offset' => 0
        ]);
        //Get Random Pokemon
        $pokemon = json_decode($pokemon_json);
        $random = rand(0,$pokemon->count -1);
        $pokemon_selected = $pokemon->results[$random];
        //dd($pokemon_selected);
        //Get Abilities
        $ability_url = $pokemon_selected->url;
        $ability_json = Http::get($ability_url,[

        ]);
        $ability = json_decode($ability_json);

        //Select Ability
        $random_ability = rand(0,count($ability->abilities) -1);
        $selected_ability = $ability->abilities[$random_ability];
        $selected_ability_json = Http::get($selected_ability->ability->url,[
            'language'=>'es'
        ]);

        //Filter spanish language
        $abilities_array_lang = json_decode($selected_ability_json)->names;
        $ability_es = array_filter($abilities_array_lang,function($value){
            return $value->language->name == 'es';
        });
        $ability_es = array_values($ability_es);

        echo nl2br("Pokemon: {$pokemon_selected->name}\n
                    Habilidad: {$ability_es[0]->name}");


    }

    public function ordenar(){
        $array = ['Olga','Lali','Caliope','Avanthika','Romina'];
        $array_asc = $array;
        $array_desc = $array;
        $array_rand = $array;
        sort($array_asc);
        rsort($array_desc);
        shuffle($array_rand);

        $array_asc = implode(',',$array_asc);
        $array_desc = implode(',',$array_desc);
        $array_rand = implode(',',$array_rand);

        echo nl2br("Ascendente: ".$array_asc
                    ."\nDescendente: ".$array_desc
                    ."\nAleatorio: ".$array_rand);

    }

    public function amigas(Request $request){
        $resultado = null;
        if(isset($request->word_1) && isset($request->word_2) && isset($request->word_3)){
            $word_1 = $request->word_1;
            $word_2 = $request->word_2;
            $word_3 = $request->word_3;

            $array_1 = str_split($word_1);
            $array_2 = str_split($word_2);
            $array_3 = str_split($word_3);

            sort($array_1);
            sort($array_2);
            sort($array_3);


            if($array_1 == $array_2 && $array_1 == $array_3 ){
                $resultado = true;
            }else{
                $resultado = false;
            }
        }



        return view('amigas',compact('resultado'));

    }
}
