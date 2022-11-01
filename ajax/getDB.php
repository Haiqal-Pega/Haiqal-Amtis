<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        td,
        th {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            text-align: left;
        }
    </style>
</head>

<body>

    <?php
    $q = ($_GET['q']);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sys";
    $con = new mysqli($servername, $username, $password);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
      }
    
    mysqli_select_db($con,"sys");
    $sql="SELECT * FROM product WHERE p_name = '".$q."'";
    $result = mysqli_query($con,$sql);

    echo "
    <table>
    <tr>
    <th style='width:20%;'>Product Name</th>
    <th style='width:60%;'>Details</th>
    <th style='width:20%;'>Price</th>
    </tr>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['p_name'] . "</td>";
        echo "<td>" . $row['p_price'] . "</td>";
        echo "<td>" . $row['p_details'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_close($con);
    ?>
</body>