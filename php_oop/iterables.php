<?php 
    echo "<h1>PHP OOP Iterables</h1>";

    //any value that can loop using foreach
    function printIterable(iterable $myIterable) { //iterable keyword used as data type
        foreach($myIterable as $item) {
          echo $item;
        }
      }
      
      $arr = ["a", "b", "c"];
      printIterable($arr);


    function getIterable():iterable {
      return ["a", "b", "c"];
    }
    
    $myIterable = getIterable();
    foreach($myIterable as $item) {
      echo $item;
    }
    echo "<br>";
    //methods in iterator~
    // echo current($myIterable);
    // echo key($myIterable);
    // echo next($myIterable);
    // echo rewind($myIterable);
    // echo valid($myIterable);
?>