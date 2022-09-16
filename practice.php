<?php
$suhu = [78, 60, 62, 68, 71, 68, 73, 85, 66,
64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 
74, 62, 62, 65, 64, 68, 73, 75, 79, 73];
$x=0;

$max=o;
function findMax(){
    $GLOBALS ['suhu'];
    if ($x < count($suhu)){
        $max<$suhu[$x];
        $max = $suhu[$x];
        findMax();


    }
}


findMax();
echo $max;

?>