<?php

function dbPull():array{
    $connectionString = 'mysql:host=db; dbname=training_diary';
    $dbUsername = 'root';
    $dbpassword = 'password';
    $db = new PDO ($connectionString, $dbUsername, $dbpassword);

    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $queryString = 'SELECT * FROM 
             `training_log`
                 ORDER BY `date` DESC 
                 LIMIT 10;'; //order by date descending
    $query = $db->prepare($queryString);
    $query->execute();
    return $query->fetchAll();
}

function addHtmlToWorkouts(array $all_workouts_array):array{
    foreach ($all_workouts_array as $key=>$workout_item){
        if (!is_array($workout_item) ||
            !array_key_exists('date', $workout_item) ||
            !array_key_exists('exercise', $workout_item) ||
            !array_key_exists('weight_added_kg', $workout_item) ||
            !array_key_exists('comments', $workout_item)) {
            return [];
        }
        $exercise = $workout_item['exercise'];
        $weight_added_kg = ($workout_item['weight_added_kg']===null) ? 0 : $workout_item['weight_added_kg'];
        $comments = ($workout_item['comments']===null) ? '' : $workout_item['comments'];
        $all_workouts_array[$key]['html'] = "<div class='exercise_container'><h3> $exercise <span class='weight_added_span'> | " . $weight_added_kg . "kg Added </span></h3><p>$comments</p></div>";
    }
    return $all_workouts_array;
}

function perDateOutput(array $all_workouts_array, array $date_array):string{
     $output_string = '';
    foreach($date_array as $date) {
        $per_date_string = "<div class='date_container'><h2 class='date_text'>$date</h2>";
        foreach ($all_workouts_array as $workout_item) {
            if (!is_array($workout_item) ||
                !array_key_exists('date', $workout_item) ||
                !array_key_exists('html', $workout_item)){
                return '';
            }
            if ($workout_item['date'] === $date) {
                $exercise_string = $workout_item['html'];
                $per_date_string .= $exercise_string;
                array_shift($all_workouts_array);
            } else {
                break;
            }
        }
        $per_date_string .= "</div>";
        $output_string .= $per_date_string;
    }
    return $output_string;
}

function getAllDates(array $all_workouts_array):array{
    $db_date_array = [];
    foreach($all_workouts_array as $workout){
        if (!is_array($workout) ||
            !array_key_exists('date', $workout)){
            return [];
        }
        $db_date_array[] = $workout['date'];
    }
    return array_unique($db_date_array);
}



