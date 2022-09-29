<?php 

    $a= array();
    $b= array();
    $c= array();
    $n=2;
    $counter=1;

    for ($x=$n; $x>0; --$x){
        array_push($a,$x);
    }
    //echo "<br>A: [".implode(", ", $a)."] ";
    //echo empty($b) ;   
    
    echo "A: [".implode(", ", $a)."] ";
    echo "B: [".implode(", ", $b)."] ";
    echo "C: [".implode(", ", $c)."] <br><br>";
    TOHe(pow(2,$n),$counter);
    //TOHe($n);
    function TOHe($n,$counter){
        global $a, $b, $c;
        
        if(empty($b) || end($a)<end($b)){
            $first = array_pop($a);
            array_push($b,$first);
        }
        elseif(empty($a) ||end($a)>end($b)){
            $first = array_pop($b);
            array_push($a, $first);
        }
        echo $counter;
        echo "<br>A: [".implode(", ", $a)."] ";
        echo "B: [".implode(", ", $b)."] ";
        echo "C: [".implode(", ", $c)."] ";


        //#####################
        if(empty($c) ||end($a)<end($c)){
            $sec = array_pop($a);   
            array_push($c,$sec);
        }
        elseif(empty($a) || end($a)>end($c)){
            $sec = array_pop($c);
            array_push($a, $sec);
        }
        echo "<br>A: [".implode(", ", $a)."] ";
        echo "B: [".implode(", ", $b)."] ";
        echo "C: [".implode(", ", $c)."] ";

        
        //######################
        if(empty($b) || end($b)<end($c)){
            $tr = array_pop($b);
            array_push($c, $tr);
        }
        elseif(empty($c) || end($b)>end($c)){
            $tr = array_pop($c);
            array_push($b, $tr);
        }
        echo "<br>A: [".implode(", ", $a)."] ";
        echo "B: [".implode(", ", $b)."] ";
        echo "C: [".implode(", ", $c)."] ";
        echo "<br><br>";

        if($n<0){
            return 0;
        }
        TOHe($n-1,$counter+1);
    }
?>