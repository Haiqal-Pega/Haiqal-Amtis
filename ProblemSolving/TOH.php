<?php 

    $a= array();
    $b= array();
    $c= array();
    $n=15;
    $counter=0;

    for ($x=$n; $x>0; --$x){
        array_push($a,$x);
    }
    //echo "<br>A: [".implode(", ", $a)."] ";
    //echo empty($b) ;   
    
    echo "A: [".implode(", ", $a)."] ";
    echo "B: [".implode(", ", $b)."] ";
    echo "C: [".implode(", ", $c)."] <br><br>";
    if($n%2==0){
        TOHe();
    }else{
        TOHo();
    }


    function TOHe(){
        global $a, $b, $c, $n, $counter;
        
        if(empty($b) || end($a)<end($b) && !empty($a)){
            $first = array_pop($a);
            array_push($b,$first);
        }
        elseif(empty($a) ||end($a)>end($b)){
            $first = array_pop($b);
            array_push($a, $first);
        }
        
        echo "A: [".implode(", ", $a)."] ";
        echo "B: [".implode(", ", $b)."] ";
        echo "C: [".implode(", ", $c)."] ";
        echo "Moves #".++$counter."<br>";

        //#####################
        if(empty($c) ||end($a)<end($c)){
            $sec = array_pop($a);   
            array_push($c,$sec);
        }
        elseif(empty($a) || end($a)>end($c)){
            $sec = array_pop($c);
            array_push($a, $sec);
        }
        
        echo "A: [".implode(", ", $a)."] ";
        echo "B: [".implode(", ", $b)."] ";
        echo "C: [".implode(", ", $c)."] ";
        echo "Moves #".++$counter."<br>";
        
        //######################
        if(empty($b) || end($b)<end($c)){
            $tr = array_pop($b);
            array_push($c, $tr);
        }
        elseif(empty($c) || end($b)>end($c)){
            $tr = array_pop($c);
            array_push($b, $tr);
        }
        
        echo "A: [".implode(", ", $a)."] ";
        echo "B: [".implode(", ", $b)."] ";
        echo "C: [".implode(", ", $c)."] ";
        echo "Moves #".++$counter."<br>";

        if($counter >= (pow(2,$n)-1)){
            return 0;
        }
        TOHe();
    }

    function TOHo(){
        global $a, $b, $c, $n, $counter;
        
        if(empty($c) || end($a)<end($c) && !empty($a)){
            $first = array_pop($a);
            array_push($c,$first);
        }
        elseif(empty($a) || end($a)>end($c)){
            $first = array_pop($c);
            array_push($a, $first);
        }
        
        echo "A: [".implode(", ", $a)."] ";
        echo "B: [".implode(", ", $b)."] ";
        echo "C: [".implode(", ", $c)."] ";
        echo "Moves #".++$counter."<br><br>";
        if($counter >= (pow(2,$n)-1)){
            return 0;
        }

        //#####################
        if(empty($b) ||end($a)<end($b) && !empty($a)){
            $sec = array_pop($a);   
            array_push($b,$sec);
        }
        elseif(empty($a) || end($a)>end($b)){
            $sec = array_pop($b);
            array_push($a, $sec);
        }
        
        echo "A: [".implode(", ", $a)."] ";
        echo "B: [".implode(", ", $b)."] ";
        echo "C: [".implode(", ", $c)."] ";
        echo "Moves #".++$counter."<br><br>";
        if($counter >= (pow(2,$n)-1)){
            return 0;
        }
        
        //######################
        if(empty($b) || end($b)<end($c) && !empty($c)){
            $tr = array_pop($b);
            array_push($c, $tr);
        }
        elseif(empty($c) || end($b)>end($c)){
            $tr = array_pop($c);
            array_push($b, $tr);
        }
        
        echo "A: [".implode(", ", $a)."] ";
        echo "B: [".implode(", ", $b)."] ";
        echo "C: [".implode(", ", $c)."] ";
        echo "Moves #".++$counter."<br><br> ";

        if($counter >= (pow(2,$n)-1)){
            return 0;
        }
        TOHo();
    }
?>