<?php

class Pokemon{
    //Properties
    private $name;
    private $id;
    private $image;
    private $move1;
    private $move2;
    private $move3;
    private $move4;

    //Constructor
    public function __construct($name,$id,$image,$move1,$move2,$move3,$move4){
        $this->name=$name;
        $this->id=$id;
        $this->image=$image;
        $this->move1=$move1;
        $this->move2=$move2;
        $this->move3=$move3;
        $this->move4=$move4;
    }

    //Methods
    public function getName(){
        return $this->name;
    }

    public function getId(){
        return $this->id;
    }

    public function getImage(){
        return $this->image;
    }

    public function getMove1(){
        return $this->move1;
    }

    public function getMove2(){
        return $this->move2;
    }

    public function getMove3(){
        return $this->move3;
    }

    public function getMove4(){
        return $this->move4;
    }
}

// ADDED A CHANGE TO LOWER CASE FUNCTION TO AVOID ERRORS WHEN USING CAPS
$api_url = 'https://pokeapi.co/api/v2/pokemon/1';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
/* When true, JSON objects will be returned as associative arrays; when false, 
JSON objects will be returned as objects. When null, JSON objects will be returned 
as associative arrays or objects depending on whether JSON_OBJECT_AS_ARRAY is set in the flags.  */
$response_data = json_decode($json_data, true);

// All user data exists in array
$pokemon_data = $response_data;

//Class Pokemon
$pokemonOne = new Pokemon(
    $pokemon_data['name'],
    $pokemon_data['id'],
    $pokemon_data['sprites']['front_default'],
    $pokemon_data['moves']['0']['move']['name'],
    $pokemon_data['moves']['1']['move']['name'],
    $pokemon_data['moves']['2']['move']['name'],
    $pokemon_data['moves']['3']['move']['name']
);

echo $pokemonOne->getName();
echo $pokemonOne->getId();
echo $pokemonOne->getImage();
echo $pokemonOne->getMove1();
echo $pokemonOne->getMove2();
echo $pokemonOne->getMove3();
echo $pokemonOne->getMove4();

?>