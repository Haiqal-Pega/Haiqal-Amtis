<?php
$family = array(
    "nama" => "abu", 
    "anak" => array(
                array(
                    "nama" => "hassan", 
                    "anak" => array(
                        array(
                            "nama" => "ali", 
                            "anak" => array(
                                array("nama" => "arif"), 
                                array("nama" => "taufik")
                            )
                            ), 
                        array("nama" => "bakar")
                        )
                    ),
                array(
                "nama" => "shahir", ////ayah kepada hafiz dan afiq
                "anak" => array(
                    array(
                        "nama" => "hafiz"), ///adik beradik
                    array(
                        "nama" => "afiq", /////adik beradik
                        "anak" => array(
                            array(
                                "nama" => "muhamad", 
                                "anak" => array(
                                    array("nama" => "sukor")))))))));
///////////////////////////hierarchy keluarga shahir////////////////////////////////////////////////////////////
// 1. Keluarkan output mcm dekat gambar pakai looping

echo"<ul>";
foreach($family as $x =>$x_value){
    if($x == "nama"){
        echo "<li>".$x_value."</li>"; //abu
        $lvl1 = $x_value;}
    if($x=="anak"){
        echo"<ul>"; //hssan shahir
        foreach($x_value as $y =>$y_value){
            //if(is_array($y_value)){
                foreach($y_value as $z => $z_value){
                    if($z == "nama"){
                        echo "<li>".$z_value." bin ".$lvl1."</li>"; //hassan shahir
                        $lvl2=$z_value;}
                    if($z == "anak"){
                        foreach($z_value as $a => $a_value){

                                foreach($a_value as $b=>$b_value){
                                    echo "<ul>";//ali bakar hafiz afiq
                                    if($b=="nama"){
                                        
                                        
                                    echo "<li>".$b_value." bin ".$lvl2."</li>"; //ali bakar hafiz afiq
                                        $lvl3 = $b_value;}

                                    if($b=="anak"){
                                        //echo "<ul>";
                                        foreach($b_value as $c => $c_value){

                                            foreach($c_value as $d=>$d_value){
                                                echo "<ul>";
                                                if($d=="nama"){
                                                    echo "<li>".$d_value." bin ".$lvl3."</li>"; //arif taufik muhammad
                                                    $lvl4=$d_value;}

                                                if($d == "anak"){
                                                    //echo"<ul>";
                                                    foreach($d_value as $e=>$e_value){
                                                        
                                                        foreach($e_value as $f=>$f_value){
                                                            
                                                            if($f=="nama")
                                                                echo "<li>".$f_value." bin ".$lvl4."</li>";
                                                                
                                                        }
                                                    }echo "</ul>";
                                                }
                                            }echo "</ul>";
                                        }
                                    }
                                    echo "</ul>";
                                }
                            //}
                            
                        }
                    }
                    

                }
            //}
        }
    }
}  

echo"</ul>";
?>