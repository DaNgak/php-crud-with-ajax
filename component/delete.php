<?php 
	require_once "../config/core.php";

    if ( isset($_POST["id"]) ){
        $query = "DELETE FROM user WHERE id=" . $_POST["id"] ;
        $result = mysqli_query($connect, $query);
        echo mysqli_affected_rows($connect);
    } else {
        header("Location: ../");
    }
?>