<?php

$api_url = 'https://pokeapi.co/api/v2/pokemon';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data);

// All user data exists in 'results' object
$pokemon_data = $response_data->results;

// Print data if need to debug
// print_r($pokemon_data);

// Traverse array and display user data
foreach ($pokemon_data as $pokemon) {
	echo "name: ".$pokemon->name;
	echo "<br />";
	echo "name: ".$pokemon->url;
	echo "<br /> <br />";
}

?>