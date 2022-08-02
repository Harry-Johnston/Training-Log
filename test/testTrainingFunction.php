<?php
require '../trainingFunction.php';
use PHPUnit\Framework\TestCase;
class testTrainingFunction extends TestCase {

    public function testsortDatesSuccess(){
        $temp_array = [1, 5, 2, 3, 4, 1];
        $result = sortDates($temp_array);
        $expected = [5, 4, 3, 2, 1];
        $this->assertEquals($expected, $result);
    }

    public function testgetAllDatesSuccess_1(){
        $db_array = [['date'=>'2022-07-10', 'exercise'=>'Max Hang','difficulty'=>'hard', 'weight_added_kg'=>50, 'comments'=>'blah blah blah'],
            ['date'=>'2022-04-06', 'exercise'=>'Repeater','difficulty'=>'easy', 'weight_added_kg'=>10, 'comments'=>'these are some words']];
        $result = getAllDates($db_array);
        $expected = ['2022-07-10', '2022-04-06'];
        $this->assertEquals($expected, $result);
    }

    public function testExerciseOutputSuccess_1(){
        $db_array = [['date'=>'2022-07-10', 'exercise'=>'Max Hang','difficulty'=>'hard', 'weight_added_kg'=>50, 'comments'=>'blah blah blah'],
            ['date'=>'2022-04-06', 'exercise'=>'Repeater','difficulty'=>'easy', 'weight_added_kg'=>10, 'comments'=>'these are some words']];
        $result = exerciseOutput($db_array, 0);
        $expected = "<div class='exercise_container'><h3> Max Hang <span class='weight_added_span'> | " . 50 . "kg Added </span></h3><p>blah blah blah</p></div>";
        $this->assertEquals($expected, $result);
    }

}
