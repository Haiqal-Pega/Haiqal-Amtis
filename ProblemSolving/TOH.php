<?php 

    //create 3 arrays representing the towers of hanoi
    $a= array();
    $b= array();
    $c= array();
    $n=15; //number of disks
    $counter=0; //to stop recursive //not the best to stop recursive

    //initilize first tower with amount of disks
    for ($x=$n; $x>0; --$x){
        array_push($a,$x);
    }  //higher number means bigger disks  
    
    echo "A: [".implode(", ", $a)."] ";
    echo "B: [".implode(", ", $b)."] ";
    echo "C: [".implode(", ", $c)."] <br><br>";

    //check if number of disks evven/odd
    if($n%2==0){
        TOHe(); //algo for even disks
    }else{
        TOHo(); //algo for odd disks
    }


    function TOHe(){
        global $a, $b, $c, $n, $counter; 
        
        if(empty($b) || end($a)<end($b) && !empty($a)){ //Move between tower A and B in legal movement
            $first = array_pop($a); 
            array_push($b,$first); //move A to B
        }
        elseif(empty($a) ||end($a)>end($b)){
            $first = array_pop($b);
            array_push($a, $first); //move B to A
        }
        
        //display each array for every iteration
        echo "A: [".implode(", ", $a)."] ";
        echo "B: [".implode(", ", $b)."] ";
        echo "C: [".implode(", ", $c)."] ";
        echo "Moves #".++$counter."<br>"; //show number of movement with counter

        //#####################
        if(empty($c) ||end($a)<end($c)){ //Move between tower A and C in legal movement
            $sec = array_pop($a);   
            array_push($c,$sec); //move A to C
        }
        elseif(empty($a) || end($a)>end($c)){
            $sec = array_pop($c);
            array_push($a, $sec); //move C to A
        }
        
        echo "A: [".implode(", ", $a)."] ";
        echo "B: [".implode(", ", $b)."] ";
        echo "C: [".implode(", ", $c)."] ";
        echo "Moves #".++$counter."<br>";
        
        //######################
        if(empty($b) || end($b)<end($c)){ //Move between tower C and B in legal movement
            $tr = array_pop($b);
            array_push($c, $tr); //move B to C
        }
        elseif(empty($c) || end($b)>end($c)){
            $tr = array_pop($c);
            array_push($b, $tr); //move C to B
        }
        
        echo "A: [".implode(", ", $a)."] ";
        echo "B: [".implode(", ", $b)."] ";
        echo "C: [".implode(", ", $c)."] ";
        echo "Moves #".++$counter."<br>";

        if($counter >= (pow(2,$n)-1)){ //check counter reaching mimimum moves of n
            return 0; //exiting recursive
        }
        TOHe();
    }

    function TOHo(){ //same as above with slight diff algo
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