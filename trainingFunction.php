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

    $allResults = $query->fetchAll();
    return $allResults;
}

function perDateOutput(array $db_array, array $date_array){
    foreach($date_array as $date) {
        echo "<div class='date_container'><h3>$date</h3>";
        foreach ($db_array as $db_item) {
            if ($db_item['date'] === $date) {
                $db_id = $db_item['id'] - 1;
                $exercise_string = exerciseOutput($db_array, $db_id);
                echo $exercise_string;
            }
        }
        echo "</div>";
    }
}

function getAllDates($db_array):array{
    $db_date_array = [];
    foreach($db_array as $db_item){
        $db_date_array[] = $db_item['date'];
    }
    return array_unique($db_date_array);
}

function exerciseOutput(array $db_array, int $array_index):string{
    $exercise = $db_array[$array_index]['exercise'];
    $weight_added_kg = ($db_array[$array_index]['weight_added_kg']===null) ? 0 : $db_array[$array_index]['weight_added_kg'];
    $comments = ($db_array[$array_index]['comments']===null) ? '' : $db_array[$array_index]['comments'];

    $exercise_string = "<div class='exercise_container'><h3> $exercise </h3><p> $weight_added_kg kg</p><p>$comments</p></div>";

    return $exercise_string;
}

function setupDBOutput():array{
    $MEGA_ARRAY['db_array'] = dbPull();
    $MEGA_ARRAY['date_array'] = getAllDates($MEGA_ARRAY['db_array']);
    return $MEGA_ARRAY;
}


