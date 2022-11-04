<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Echo session variables that were set on previous page
echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>"; //will carry value from session.php
echo "Favorite animal is " . $_SESSION["favanimal"] . ".<br>";

print_r($_SESSION); //display all value in current session

// use to remove all session variables
session_unset();

// use to destroy the session
session_destroy();
?>

</body>
</html>