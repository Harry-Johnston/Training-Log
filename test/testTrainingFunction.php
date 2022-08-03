<?php
require '../trainingFunction.php';
use PHPUnit\Framework\TestCase;
class testTrainingFunction extends TestCase {

    public function testGetAllDatesSuccess_1(){
        $db_array = [
                [
                    'date'=>'2022-07-10',
                    'exercise'=>'Max Hang',
                    'difficulty'=>'hard',
                    'weight_added_kg'=>50,
                    'comments'=>'blah blah blah'
                ],
                [
                    'date'=>'2022-04-06',
                    'exercise'=>'Repeater',
                    'difficulty'=>'easy',
                    'weight_added_kg'=>10,
                    'comments'=>'these are some words'
                ]
            ];
        $result = getAllDates($db_array);
        $expected = ['2022-07-10', '2022-04-06'];
        $this->assertEquals($expected, $result);
    }

    public function testGetAllDatesFailure_1(){
        $db_array = [
            [
                'exercise'=>'Max Hang',
                'difficulty'=>'hard',
                'weight_added_kg'=>50,
                'comments'=>'blah blah blah'
            ],
            [
                'exercise'=>'Repeater',
                'difficulty'=>'easy',
                'weight_added_kg'=>10,
                'comments'=>'these are some words'
            ]
        ];
        $result = getAllDates($db_array);
        $expected = [];
        $this->assertEquals($expected, $result);
    }

    public function testAddHtmlToWorkoutsSuccess_1(){
        $db_array = [
            [
                'date'=>'2022-07-10',
                'exercise'=>'Max Hang',
                'difficulty'=>'hard',
                'weight_added_kg'=>50,
                'comments'=>'blah blah blah',
            ],
            [
                'date'=>'2022-04-06',
                'exercise'=>'Repeater',
                'difficulty'=>'easy',
                'weight_added_kg'=>10,
                'comments'=>'these are some words',
            ]
        ];
        $result = addHtmlToWorkouts($db_array);
        $expected = [
            [
                'date'=>'2022-07-10',
                'exercise'=>'Max Hang',
                'difficulty'=>'hard',
                'weight_added_kg'=>50,
                'comments'=>'blah blah blah',
                'html'=>"<div class='exercise_container'><h3> Max Hang <span class='weight_added_span'> | 50kg Added </span></h3><p>blah blah blah</p></div>"
            ],
            [
                'date'=>'2022-04-06',
                'exercise'=>'Repeater',
                'difficulty'=>'easy',
                'weight_added_kg'=>10,
                'comments'=>'these are some words',
                'html'=>"<div class='exercise_container'><h3> Repeater <span class='weight_added_span'> | 10kg Added </span></h3><p>these are some words</p></div>"
            ]
        ];
        $this->assertEquals($expected, $result);
    }

    public function testAddHtmlToWorkoutsFailure_1(){
        $db_array = [
            [
                'exercise'=>'Max Hang',
                'difficulty'=>'hard',
                'weight_added_kg'=>50,
                'comments'=>'blah blah blah',
            ],
            [
                'exercise'=>'Repeater',
                'difficulty'=>'easy',
                'weight_added_kg'=>10,
                'comments'=>'these are some words',
            ]
        ];
        $result = addHtmlToWorkouts($db_array);
        $expected = [];
        $this->assertEquals($expected, $result);
    }

    public function testPerDateOutputSuccess_1(){
        $db_array = [
            [
                'date'=>'2022-07-10',
                'exercise'=>'Max Hang',
                'difficulty'=>'hard',
                'weight_added_kg'=>50,
                'comments'=>'blah blah blah',
                'html'=>"<div class='exercise_container'><h3> Max Hang <span class='weight_added_span'> | 50kg Added </span></h3><p>blah blah blah</p></div>"
            ],
            [
                'date'=>'2022-04-06',
                'exercise'=>'Repeater',
                'difficulty'=>'easy',
                'weight_added_kg'=>10,
                'comments'=>'these are some words',
                'html'=>"<div class='exercise_container'><h3> Repeater <span class='weight_added_span'> | 10kg Added </span></h3><p>these are some words</p></div>"
            ]
        ];
        $date_array = [
            '2022-07-10',
            '2022-04-06'
        ];
        $result = perDateOutput($db_array, $date_array);
        $expected = "<div class='date_container'><h2 class='date_text'>2022-07-10</h2><div class='exercise_container'><h3> Max Hang <span class='weight_added_span'> | 50kg Added </span></h3><p>blah blah blah</p></div></div><div class='date_container'><h2 class='date_text'>2022-04-06</h2><div class='exercise_container'><h3> Repeater <span class='weight_added_span'> | 10kg Added </span></h3><p>these are some words</p></div></div>";
        $this->assertEquals($expected, $result);
    }

    public function testPerDateOutputFailure_1(){
        $db_array = [
            [
                'exercise'=>'Max Hang',
                'difficulty'=>'hard',
                'weight_added_kg'=>50,
                'comments'=>'blah blah blah',
                'html'=>"<div class='exercise_container'><h3> Max Hang <span class='weight_added_span'> | 50kg Added </span></h3><p>blah blah blah</p></div>"
            ],
            [
                'exercise'=>'Repeater',
                'difficulty'=>'easy',
                'weight_added_kg'=>10,
                'comments'=>'these are some words',
                'html'=>"<div class='exercise_container'><h3> Repeater <span class='weight_added_span'> | 10kg Added </span></h3><p>these are some words</p></div>"
            ]
        ];
        $date_array = [
            '2022-07-10',
            '2022-04-06'
        ];
        $result = perDateOutput($db_array, $date_array);
        $expected = '';
        $this->assertEquals($expected, $result);
    }


}
