<?php 
    require_once "../config/core.php";

    if ( isset($_POST["submit"]) ){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $query = "INSERT INTO user VALUES ('', '$username', '$password')";
        mysqli_query($connect, $query);
        echo mysqli_affected_rows($connect);
    } else {
        header("Location: ../");
    }

?>