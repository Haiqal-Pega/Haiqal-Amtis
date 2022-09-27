<?php
session_start();
$_SESSION["update_id"] = $id = $_GET["id"];
?>
<!DOCTYPE html>
<html>
    <body>
        <h2 style="text-align: center;">Fill The Form Below to Update Your Profile</h2><br>
        <h2 style="text-align: center;">Leave the space empty for details you want to stay the same</h2>
        <form style="text-align: center;" action="u_update.php" method="post">
            Name: <br><input type="text" name="name"><br>
            Password: <br><input type="password" name="pw" ><br>
            <input type="submit">
        </form>

    </body>

</html>