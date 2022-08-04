<?php require_once 'functions.php';
$fetch_array = [];
if (isset($_POST['date']) && isset($_POST['exercise'])) {
    $fetch_array['date'] = $_POST['date'];
    $fetch_array['exercise'] = $_POST['exercise'];
}
$fetch_array['weight_added_kg'] = $_POST['weight_added_kg'] ?? null;
$fetch_array['comments'] = $_POST['comments'] ?? null;
insertInputintoDb($fetch_array);
header('Location: submitted.php');