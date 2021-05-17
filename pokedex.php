<?php

if (isset($_GET['search'])) {

// ADDED A CHANGE TO LOWER CASE FUNCTION TO AVOID ERRORS WHEN USING CAPS
$_GET['search'] = strtolower($_GET['search']);

$api_url = 'https://pokeapi.co/api/v2/pokemon/' . $_GET['search'];

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
/* When true, JSON objects will be returned as associative arrays; when false, 
JSON objects will be returned as objects. When null, JSON objects will be returned 
as associative arrays or objects depending on whether JSON_OBJECT_AS_ARRAY is set in the flags.  */

$response_data = json_decode($json_data, true);

// All user data exists in array
$pokemon_data = $response_data;

// Print data if need to debug
// print_r($pokemon_data);

// DECLARING THE VARIABLES
$pokemon_name = $pokemon_data['name'];
$pokemon_id = $pokemon_data['id'];
$pokemon_image = $pokemon_data['sprites']['front_default'];
$pokemon_moves = array_slice($pokemon_data['moves'], 0, 4);
$pokemon_move1 = $pokemon_moves[0]['move']['name'];
$pokemon_move2 = $pokemon_moves[1]['move']['name'];
$pokemon_move3 = $pokemon_moves[2]['move']['name'];
$pokemon_move4 = $pokemon_moves[3]['move']['name']; 

} else {
    echo 'search a pokemon';
}

?>

<?php echo $pokemon_name ?>
<?php echo $pokemon_id ?>
<?php echo "<img src='".$pokemon_image."'>"; ?>
<?php echo $pokemon_move1 ?>
<?php echo $pokemon_move2 ?>
<?php echo $pokemon_move3 ?>
<?php echo $pokemon_move4 ?>