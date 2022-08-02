<?php require_once 'trainingFunction.php';
$db_array = dbPull();
$date_array = getAllDates($db_array);
?>
<html lang = "en">
    <head>
        <title>Training Log</title>
    </head>
    <body>
        <header>
            <h1 class="title_logo">Chalk it up!</h1>
            <h2 class="title_subheading">Check out your previous sessions below:</h2>
        </header>
        <main class="diary_container">
            <?php perDateOutput($db_array, $date_array) ?>
        </main>
    </body>
</html>