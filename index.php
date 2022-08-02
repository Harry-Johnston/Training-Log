<?php require_once 'trainingFunction.php';
$db_array = dbPull();
$date_array = getAllDates($db_array);
?>
<html lang = "en">
    <head>
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="normalize.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Mouse+Memoirs&family=Roboto:wght@300;700&display=swap" rel="stylesheet">
        <title>Training Log</title>
    </head>
    <body>
        <header>
            <nav class="nav_bar">
                <a href="#" class="nav_button">Add a session</a>
            </nav>
            <div class="title_block">
                <h1 class="title_logo">Chalk it up!</h1>
                <h2 class="title_subheading">Check out your previous sessions below:</h2>
            </div>
        </header>
        <main class="diary_container">
            <?php echo perDateOutput($db_array, $date_array) ?>
        </main>
    </body>
</html>