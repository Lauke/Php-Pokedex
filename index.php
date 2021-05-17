<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POKEDEX</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<h1>POKEDEX</h1>

<form action="">
    <input type="text" name="search">
    <button type="submit">Search pokemon</button>
</form>

<section id="pokemon-stats">
    <?php
        require 'pokedex.php'
    ?>
</section>

</body>
</html>