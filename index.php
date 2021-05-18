<?php

//ERROR REPORT
error_reporting(E_ALL);
ini_set("display_errors", 1);

if (!empty($_GET['search'])) {
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

    // DECLARING THE VARIABLES
    $pokemon_name = ucfirst($pokemon_data['name']);
    $pokemon_id = $pokemon_data['id'];
    $pokemon_image = $pokemon_data['sprites']['front_default'];
    $pokemon_moves = array_slice($pokemon_data['moves'], 0, 4);
    $pokemon_move1 = $pokemon_moves[0]['move']['name'];
    $pokemon_move2 = $pokemon_moves[1]['move']['name'];
    $pokemon_move3 = $pokemon_moves[2]['move']['name'];
    $pokemon_move4 = $pokemon_moves[3]['move']['name'];
    $pokemon_weight = $pokemon_data['weight'] / 10;
    $pokemon_height = $pokemon_data['height'] * 10;

    // FETCHING A SECOND API FOR THE EVOLUTIONS

    $pokespecies_url = 'https://pokeapi.co/api/v2/pokemon-species/' . $_GET['search'];
    $pokespeciesData = file_get_contents($pokespecies_url);
    $pokespecies = json_decode($pokespeciesData, true);
    $pokemon_evolutions = $pokespecies;
} else {
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pokedex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>

    <!-- BEGIN CONTAINER -->
    <div class="container">
        <div class="row">
            <div class="row g-2 wrapper">
                <div class="col-lg-12 rounded-search searchpoke">
                    <div class="div search">
                        <form action="">
                            <input type="text" name="search" class="rounded-pill form-input">
                            <button type="submit" class="btn rounded-pill btn-searchpoke">Search pokemon</button>
                        </form>

                        <?php
                        if (!empty($_GET['search'])) :
                        ?>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="roundy">
                        <?php echo "#" . $pokemon_id; ?>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="roundy">
                        <?php echo $pokemon_name ?>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="image-background">
                        <?php echo "<img src='" . $pokemon_image . "'>"; ?>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="roundy">
                        <?php echo "Weight: " . $pokemon_weight  . "kg"; ?></div>
                </div>

                <div class="col-lg-6">
                    <div class="roundy">
                        <?php echo "Height: " . $pokemon_height  . "cm"; ?></div>
                </div>

                <div class="col-lg-12">
                    <div class="roundy">
                        <?php
                            if ($pokemon_evolutions['evolves_from_species'] === null) {
                                echo 'This pokemon has no previous form';
                            } else {
                                echo 'This pokemon evolves from ' . $pokemon_evolutions['evolves_from_species']['name'];
                            } ?>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="rounded-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="4">Moves</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><?php echo $pokemon_move1 ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td><?php echo $pokemon_move2 ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td><?php echo $pokemon_move3 ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td><?php echo $pokemon_move4 ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    <?php else :
                            echo '<div class="roundy">Search a pokemon by name or by ID</div>';
                        endif; ?>

    </div>
    <!-- END CONTAINER -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
    </script>

</body>

</html>