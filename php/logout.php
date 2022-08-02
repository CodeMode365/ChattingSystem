<?php

session_start();

if (isset($_SESSION['unique_id'])) { //go to chatting page is user is login
    require_once("./config.php");
    $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
    if (isset($logout_id)) {
        $status = "Offline now";
        //set offline once user logout
        $qry = "UPDATE `users` SET status= '{$status}' Where unique_id =$logout_id;";
        $run = mysqli_query($conn, $qry);
        if ($run) {
            session_unset();
            session_destroy();
            header('location:../login.php');
            echo    "done";
        } else {
            header("./users.php");
            echo "now here agoin";
        }
    }
} else {
    header('location:./login.php');
}


?>