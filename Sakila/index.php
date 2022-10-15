<?php
    include('conn.php');
    $sql = "SELECT rental.rental_id, rental.rental_date, rental.inventory_id, rental.customer_id, rental.return_date, rental.staff_id, rental.last_update,
    staff.first_name as sname, customer.first_name as cname, film.title 
    FROM rental
    JOIN staff ON rental.staff_id=staff.staff_id
    JOIN customer ON rental.customer_id=customer.customer_id  
    JOIN inventory ON rental.inventory_id=inventory.inventory_id
    JOIN film ON inventory.film_id = film.film_id
    ORDER BY rental_id ASC
    LIMIT ". $limit.' OFFSET '.$offset;
    $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Pagination Sakila Database</title>
</head>
<body>
    <div class="p-5">
        <div class="container my-5">
            <div class="row" id="table-hover-row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Sakila | Rental</h4>
                  </div>
                  <div class="card-content">
                    <!-- table hover -->
                    <div class="table-responsive">
                      <table class="table table-hover mb-0 my-2">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>DATE RENTED</th>
                            <th>FILM TITLE</th>
                            <th>CUSTOMER</th>
                            <th>RETURN DATE</th>
                            <th>STAFF</th>
                            <th>LAST UPDATE</th>
                          </tr>
                        </thead>
                        <tbody >
                            <?php
                                if($result->num_rows > 0) {
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                      // $sqlfilm = "SELECT * FROM inventory JOIN film ON inventory.inventory_id = film";
                                      echo '<tr>
                                        <td class="text-bold-500">'.$row["rental_id"].'</td>
                                        <td class="text-bold-500">'.$row["rental_date"].'</td>
                                        <td class="text-bold-500">'.$row["title"].'</td>
                                        <td class="text-bold-500">'.$row["cname"].'</td>
                                        <td class="text-bold-500">'.$row["return_date"].'</td>
                                        <td class="text-bold-500">'.$row["sname"].'</td>
                                        <td class="text-bold-500">'.$row["last_update"].'</td>
                                      </tr>';
                                    }
                                }else{
                                  echo "Data no available";
                                }
                            ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="container my-5">
          <div class="d-flex flex-wrap justify-content-center" role="group">
            <?php // Pagination button
              for($page_number = 1; $page_number<= $total_pages; $page_number++) {
                echo '<a class="btn btn-outline-info btn-sm m-2" href = "index.php?page=' . $page_number . '" style="min-width:50px" aria-pressed="true">' . $page_number . ' </a>';
              }
            ?>
          </div>
        </div>
         
    </div>
</body>
</html>