<?php require_once 'trainingFunction.php';
$input_array = fetchInput();

if (isset($input_array['date'])){
    insertInput($input_array);
    echo 'its working i think?';
    header('Location: submitted.php');
}
?>

<html lang = "en">
    <head>
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="normalize.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Mouse+Memoirs&family=Roboto:wght@300;700&display=swap" rel="stylesheet">
        <title>Add a Session</title>
    </head>
    <body>
        <header>
            <nav class="nav_bar">
                <a href="./index.php" class="nav_button">Return Home</a>
            </nav>
            <div class="title_block">
                <h1 class="title_logo">Chalk it up!</h1>
                <h2 class="title_subheading">Add a session below:</h2>
            </div>
        </header>
        <main>
            <form class="input_form" action="addSession.php" method="get">
                <p><input type="date" name="date" placeholder="Date" required></p>
                <p><input type="text" name="exercise" placeholder="Exercise" required></p>
                <p><input type="number" name="weight_added_kg" placeholder="Weight Added (kg)"></p>
                <p><textarea rows = "6" cols = "45" name = "comments" placeholder="Any Comments?"></textarea></p>
                <p><input type="submit" value="Submit"></p>
            </form>
        </main>
    </body>
</html>

