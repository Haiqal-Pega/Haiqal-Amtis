<?php

    $conn = mysqli_connect('localhost', 'root', ''); 
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        mysqli_select_db($conn, 'sakila'); //connect to sakila db
        $limit = 20;    
    }
    // sql to count total rows
    $sql = "SELECT * FROM rental"; 
    $result = mysqli_query($conn, $sql);
    $total_rows = mysqli_num_rows($result);
    $total_pages = ceil ($total_rows / $limit); //get required # of pages

    // set/update active page number
    if (!isset ($_GET['page']) ) {  
        $page_number = 1;  
    }else {  
        $page_number = $_GET['page'];  
    } 
    //get current number
    $offset = ($page_number-1) * $limit; 
?>