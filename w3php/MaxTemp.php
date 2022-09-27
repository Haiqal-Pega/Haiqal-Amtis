<?php
$suhu = [78, 60, 62, 68, 71, 68, 73, 85, 66,
64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 
74, 62, 62, 65, 64, 68, 73, 75, 79, 73];
$x=0;
$max=$suhu[0];
echo"<h2>Finding Max Value of Temperature w/o Using Loop Function</h2>";
function findMax($suhu,$x,&$max){ //referencing an argument
    if ($x < count($suhu)){ //counter
        if($suhu[$x]>$max){ //compare current value in arr with current max
            $max = $suhu[$x]; //initiate new max value
        }

        $x++; //increment
        findMax($suhu,$x,$max); //call function
        return $max;
    }

    print "Highest Temperature (in function): ".$max."<br>";
}


findMax($suhu,$x,$max);
print "Highest Temperatur (outside function): ".$max."<br>";
//output should be the same as return in function

?>