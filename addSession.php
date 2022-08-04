
<!DOCTYPE html>
<html lang="en">
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
                <p class="title_subheading">Add a session below:</p>
            </div>
        </header>
        <main class="form_container">
            <div class="form_box">
                <form class="input_form" action='dbInsert.php' method="post">
                    <p>Date of Session: <input type="date" name="date" required></p>
                    <p>Exercise Name: <input type="text" name="exercise" required></p>
                    <p>Weight Added: <input type="number" name="weight_added_kg" placeholder="(kg)"></p>
                    <p><textarea rows = "6" cols = "45" name = "comments" placeholder="How did it feel?"></textarea></p>
                    <p><input type="submit" value="Submit"></p>
                </form>
            </div>
        </main>
    </body>
</html>

