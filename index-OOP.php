<?php
include 'pokemon-ini.php';

// ERROR HANDLING
error_reporting(E_ALL);
ini_set("display_errors", 1);

// ADDED A CHANGE TO LOWER CASE FUNCTION TO AVOID ERRORS WHEN USING CAPS
if (!empty($_GET['search'])) {

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
} else {
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pokedex</title>
</head>

<body>

    <form action="">
        <input type="text" name="search" class="rounded-pill form-input">
        <button type="submit" class="btn rounded-pill btn-searchpoke">Search pokemon</button>
    </form>

    <?php
    if (!empty($_GET['search'])) :
    ?>

        <?php echo $pokemonOne->getName() . '<br>'; ?>
        <?php echo $pokemonOne->getId() . '<br>'; ?>
        <img src="<?php echo $pokemonOne->getImage() ?>" alt="PokemonImage">
        <?php echo $pokemonOne->getMove1() . '<br>'; ?>
        <?php echo $pokemonOne->getMove2() . '<br>'; ?>
        <?php echo $pokemonOne->getMove3() . '<br>'; ?>
        <?php echo $pokemonOne->getMove4() . '<br>'; ?>

    <?php else :
        echo '<div class="roundy">Search a pokemon by name or by ID</div>';
    endif; ?>

</body>

</html>