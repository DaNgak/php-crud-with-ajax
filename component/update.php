<?php 
    require_once "../config/core.php";

    if ( isset($_POST["submit"]) ){
        $id = $_POST["id"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $query = "UPDATE user SET 
            username = '$username', 
            password = '$password'
            WHERE id = $id";
        mysqli_query($connect, $query);
        echo mysqli_affected_rows($connect);
    } else {
        header("Location: ../");
    }
?>