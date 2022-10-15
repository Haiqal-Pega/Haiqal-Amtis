<?php

    $conn = mysqli_connect('localhost', 'root', ''); 
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        mysqli_select_db($conn, 'sakila'); //connect to sakila db
        $limit = 50;    
    }
    // sql to count total rows
    $sql = "SELECT rental.rental_id, rental.rental_date, rental.inventory_id, rental.customer_id, rental.return_date, rental.staff_id, rental.last_update,
    staff.first_name as sname, customer.first_name as cname, film.title 
    FROM rental
    JOIN staff ON rental.staff_id=staff.staff_id
    JOIN customer ON rental.customer_id=customer.customer_id  
    JOIN inventory ON rental.inventory_id=inventory.inventory_id
    JOIN film ON inventory.film_id = film.film_id
    ORDER BY rental_id ASC
    "; 
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