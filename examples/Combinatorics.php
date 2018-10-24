<?php
/**
 * Created by PhpStorm.
 * User: smskin
 * Date: 24/10/2018
 * Time: 16:00
 */

use SMSkin\Math\Combinatorics;

require_once __DIR__.'/../vendor/autoload.php';

$data = [
    'a1'=>1,
    'a2'=>2,
    'a3'=>3
];
$subsetSize = 2;

$instance = new Combinatorics();
$combinations = $instance->combinations($data,$subsetSize);
//$combinations = [
//    [
//        'a1'=>1,
//        'a2'=>2
//    ],
//    [
//        'a1'=>1,
//        'a3'=>3
//    ],
//    [
//        'a2'=>2,
//        'a3'=>3
//    ]
//];
print_r($combinations);

$permutations = $instance->permutations($data, $subsetSize);
//$permutations = [
//    [
//        'a1' => 1,
//        'a2' => 2
//    ],
//    [
//        'a2' => 2,
//        'a1' => 1
//    ],
//    [
//        'a1' => 1,
//        'a3' => 3
//    ],
//    [
//        'a3' => 3,
//        'a1' => 1
//    ],
//    [
//        'a2' => 2,
//        'a3' => 3
//    ],
//    [
//        'a3' => 3,
//        'a2' => 2
//    ]
//];
print_r($permutations);