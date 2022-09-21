<!DOCTYPE html>
<?php
    session_start();
    session_destroy();
?>
<html>
    <body>
        <h1 style="text-align: center;">Home Page</h1>

        <form style="text-align: center;" action="connect.php" method="post">
            <input type="submit" name="sign" value="Sign In" />
            <input type="submit" name="register" value="Register Here" />
            <input type="submit" name="admin" value="Admin" />
        </form>
    </body>
</html>