<?php
echo "<h2>PHP Cookies</h2>";
// used to identify a user
// must set cookie before html tag
$cookie_name = "Biskut";
$cookie_value = "Koko Krunch";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day 
//setcookie("user", "", time() - 3600); //use to delete cookie
?>
<html>
<body>

<?php
if(!isset($_COOKIE[$cookie_name])) {
  echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
  echo "Cookie '" . $cookie_name . "' is set!<br>";
  echo "Value is: " . $_COOKIE[$cookie_name] ."<BR>";
}

if(count($_COOKIE) > 0) { //to check if cookie is enable
    echo "Cookies are enabled.";
  } else {
    echo "Cookies are disabled.";
  }
?>

</body>
</html>