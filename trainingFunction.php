<?php

function dbPull():array{
    $connectionString = 'mysql:host=db; dbname=training_diary';
    $dbUsername = 'root';
    $dbpassword = 'password';
    $db = new PDO ($connectionString, $dbUsername, $dbpassword);

    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $queryString = 'SELECT * FROM 
             `training_log` 
                 LIMIT 10;';
    $query = $db->prepare($queryString);
    $query->execute();
    return $query->fetchAll();
}

function perDateOutput(array $db_array, array $date_array):string{
    $output_string = '';
    foreach($date_array as $date) {
        $per_date_string = "<div class='date_container'><h2 class='date_text'>$date</h2>";
        foreach ($db_array as $db_item) {
            if ($db_item['date'] === $date) {
                $db_id = $db_item['id'] - 1;
                $exercise_string = exerciseOutput($db_array, $db_id);
                $per_date_string .= $exercise_string;
            }
        }
        $per_date_string .= "</div>";
        $output_string .= $per_date_string;
    }
    return $output_string;
}

function getAllDates($db_array):array{
    $db_date_array = [];
    foreach($db_array as $db_item){
        $db_date_array[] = $db_item['date'];
    }
    return sortDates($db_date_array);
}

function sortDates(array $date_array):array{
    $date_array = array_unique($date_array);
    natsort($date_array);
    return array_reverse($date_array);
}

function exerciseOutput(array $db_array, int $array_index):string{
    $exercise = $db_array[$array_index]['exercise'];
    $weight_added_kg = ($db_array[$array_index]['weight_added_kg']===null) ? 0 : $db_array[$array_index]['weight_added_kg'];
    $comments = ($db_array[$array_index]['comments']===null) ? '' : $db_array[$array_index]['comments'];

    $exercise_string = "<div class='exercise_container'><h3> $exercise <span class='weight_added_span'> | " . $weight_added_kg . "kg Added </span></h3><p>$comments</p></div>";

    return $exercise_string;
}



