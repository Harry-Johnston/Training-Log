<?php

function pullAllWorkoutsFromDb(): array
{
    $connectionString = 'mysql:host=db; dbname=training_diary';
    $dbUsername = 'root';
    $dbpassword = 'password';
    $db = new PDO($connectionString, $dbUsername, $dbpassword);

    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $queryString = 'SELECT `date`, `exercise`, `weight_added_kg`, `comments` FROM 
             `workouts`
                 ORDER BY `date` DESC';
    $query = $db->prepare($queryString);
    $query->execute();
    return $query->fetchAll();
}

function addHtmlToWorkouts(array $all_workouts_array): array
{
    foreach ($all_workouts_array as $key=>$workout_item){
        if (
            !is_array($workout_item) ||
            !array_key_exists('date', $workout_item) ||
            !array_key_exists('exercise', $workout_item) ||
            !array_key_exists('weight_added_kg', $workout_item) ||
            !array_key_exists('comments', $workout_item)
        ) {
            return [];
        }
        $exercise = $workout_item['exercise'];
        $weight_added_kg = ($workout_item['weight_added_kg']===null) ? 0 : $workout_item['weight_added_kg'];
        $comments = ($workout_item['comments']===null) ? '' : '<p>' . $workout_item['comments'] . '</p>' ;
        $all_workouts_array[$key]['html'] = "<div class='exercise_container'><h3> $exercise <span class='weight_added_span'> | " . $weight_added_kg . "kg Added </span></h3>$comments</div>";
    }
    return $all_workouts_array;
}

function displayAllWorkouts(array $all_workouts_array, array $date_array): string
{
    $output_string = '';
    foreach($date_array as $date) {
        $per_date_string = "<div class='date_container'><h2 class='date_text'>$date</h2>";
        foreach ($all_workouts_array as $workout_item) {
            if (
                !is_array($workout_item) ||
                !array_key_exists('date', $workout_item) ||
                !array_key_exists('html', $workout_item)
            ) {
                return '';
            }
            if ($workout_item['date'] === $date) {
                $exercise_string = $workout_item['html'];
                $per_date_string .= $exercise_string;
                array_shift($all_workouts_array); // Since $date_array is in descending order, once an item has been linked to a date it can be removed from the array to save time on future loops
            } else {
                break; // Since $date_array is in descending order, if the date doesn't match we can simply move to the next date.
            }
        }
        $per_date_string .= "</div>";
        $output_string .= $per_date_string;
    }
    return $output_string;
}

function getAllUniqueDates(array $all_workouts_array): array
{
    $db_date_array = [];
    foreach($all_workouts_array as $workout){
        if (
            !is_array($workout) ||
            !array_key_exists('date', $workout)
        ) {
            return [];
        }
        $db_date_array[] = $workout['date'];
    }
    return array_unique($db_date_array);
}

function insertInputintoDb($fetch_array)
{
    $connectionString = 'mysql:host=db; dbname=training_diary';
    $dbUsername = 'root';
    $dbpassword = 'password';
    $date = $fetch_array['date'];
    $exercise = $fetch_array['exercise'];
    $weight_added_kg = $fetch_array['weight_added_kg'];
    $comments = $fetch_array['comments'];

    $db = new PDO($connectionString, $dbUsername, $dbpassword);

    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $queryString = 'INSERT INTO `workouts` (`date`, `exercise`, `weight_added_kg`, `comments`)
        VALUES (:date, :exercise, :weight_added_kg, :comments)';

    $query = $db->prepare($queryString);
    $query->execute(['date'=> $date, 'exercise'=> $exercise, 'weight_added_kg'=> $weight_added_kg, 'comments'=> $comments]);
}



