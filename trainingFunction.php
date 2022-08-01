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
    $query = $db->prepare($queryString); // "preparing" the query - not executed yet
    $query->execute(); //executes the query and stores all the results

    $allResults = $query->fetchAll(); //retrieving all the resulting rows as array
    return $allResults;
}

function outputResults(){}

function dateOutput($db_array, $date){
    foreach($db_array as $db_item){
        if ($db_item['date'] === $date){
            echo exerciseOutput($db_array, $db_item['id']);
        }
    }
}

function exerciseOutput($db_array, $array_index):string{
    $exercise_string = "<div class='exercise_container'><h3>" . $db_array[$array_index]['exercise'] . "</h3><p>" . $db_array[$array_index]['weight_added_kg'] . "</p><p>" . $db_array[$array_index]['comments'] . "</p></div>";

    return $exercise_string;
}

$db_array = dbPull();
//echo exerciseOutput($db_array, 1);

$temp_date = $db_array;


dateOutput($db_array, );

echo '<pre>';
var_dump($db_array);