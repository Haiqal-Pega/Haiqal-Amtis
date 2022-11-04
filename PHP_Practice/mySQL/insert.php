<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testw3";

//insert into table using MySQLi procedural
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Test', 'Masuk', 'john@example.com')"; //string values must be quoted in query

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn); //display error if fail
}

//to get id of inserted data
if (mysqli_query($conn, $sql)) {
    $last_id = mysqli_insert_id($conn);
    echo "New record created successfully. Last inserted ID is: " . $last_id;
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn); //close connection procedural


// //inset into table using obj oriented mysqli
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);//display error if fail
// }

// $sql = "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('John', 'Doe', 'john@example.com')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
    // $last_id = $conn->insert_id; //get id f last inserted obj oriented mysqli
    // echo "New record created successfully. Last inserted ID is: " . $last_id;
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error; //display error if fail
// }


//insert into table using PDO
// try {
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//     // set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $sql = "INSERT INTO MyGuests (firstname, lastname, email)
//     VALUES ('John', 'Doe', 'john@example.com')";
//     // use exec() because no results are returned
//     $conn->exec($sql);
//     echo "New record created successfully";
        // $last_id = $conn->lastInsertId(); //get id of last data PDO
        // echo "New record created successfully. Last inserted ID is: " . $last_id;
//   } catch(PDOException $e) {
//     echo $sql . "<br>" . $e->getMessage();//display error if fail
//   }
  
//   $conn = null; //PDO close connection

//#############################################################################################################
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testw3";

// insert multiple in database (mysqli procedural)
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Mary', 'Moe', 'mary@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Julie', 'Dooley', 'julie@example.com')";


// if (mysqli_multi_query($conn, $sql)) { //function to add multiple data at once
//   echo "New records created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

//#############################################################################################################
//insert into using prepared statement

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)"); //? replace values
$stmt->bind_param("sss", $firstname, $lastname, $email); ///sss means string 3x /binding parameter with vars

// set parameters and execute
$firstname = "Prepared";
$lastname = "Statement";
$email = "john@example.com";
$stmt->execute(); //execute sql query
?>