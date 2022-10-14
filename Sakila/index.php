<?php
    include('conn.php'); 
    $sql = "SELECT * FROM `rental` LIMIT 10"; 
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
    <title>Document</title>
</head>
<body>
    <div class="p-5">
        <div class="container ">
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
                            <th>INVENTORY ID</th>
                            <th>CUSTOMER</th>
                            <th>RETURN DATE</th>
                            <th>STAFF</th>
                            <th>LAST UPDATE</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($result->num_rows > 0) {
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo '<tr>
                                          <td class="text-bold-500">'.$row["rental_id"].'</td>
                                          <td class="text-bold-500">'.$row["rental_id"].'</td>
                                          <td class="text-bold-500">'.$row["rental_id"].'</td>
                                          <td class="text-bold-500">'.$row["rental_id"].'</td>
                                          <td class="text-bold-500">'.$row["rental_id"].'</td>
                                          <td class="text-bold-500">'.$row["rental_id"].'</td>
                                          <td class="text-bold-500">'.$row["rental_id"].'</td>
                                        </tr>';
                                    }
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
    </div>
</body>
</html>