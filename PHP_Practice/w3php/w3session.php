<?php
// Start the session
//must start before html tags
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
echo "Session variables are set.";
//go to w3session1.php to see
?>

</body>
</html>