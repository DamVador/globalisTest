<?php

$testA = [[0, 3], [6, 10]];
$testB = [[0, 5], [3, 10]];
$testC = [[0, 5], [2, 4]];
$testD = [[7, 8], [3, 6], [2, 4]];
$testE = [[3, 6], [3, 4], [15, 20], [16, 17], [1, 4], [6, 10], [3, 6]];
$testF = [[1, 9], [12, 15], [8, 10], [3, 7], [17, 22], [0, 3]];
$testG = [[1, 4], [12, 13], [6, 9], [1, 3], [2, 5], [9, 13], [10, 14]];

$allTests = [$testA, $testB, $testC, $testD, $testE, $testF, $testG];

function foo($array){
    usort($array, function ($a, $b) {
        if ($a[0] === $b[0]) {
          return $a[1] <=> $b[1];
        } else {
          return $a[0] <=> $b[0];
        }
    });
    $newArray = [];
    $initialInterval = $array[0];
    $arrayLength = count($array);
    
    for( $i=1; $i< $arrayLength; $i++){
        if($array[$i][0] <= $initialInterval[1]){
            $maxInterval = max($initialInterval[1], $array[$i][1]);
            $initialInterval = [$initialInterval[0], $maxInterval];
        } else {
            array_push($newArray, $initialInterval);
            $initialInterval = $array[$i];
        }
    }
    array_push($newArray, $initialInterval);
    return $newArray;
}

foreach($allTests as $test){
    print_r(foo($test));
}

?>