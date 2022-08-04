<?php
session_start();
require_once("./config.php");

$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);


if (!empty($email) && !empty($password)) {
    $checkQry = "SELECT * FROM `users` where email = '$email';";
    $fetch = mysqli_query($conn, $checkQry);
    $countRows = mysqli_num_rows($fetch);

    if ($countRows > 0) {

        $RowData = mysqli_fetch_assoc($fetch);
      

        if ($RowData['password'] == $password) {
            // echo $RowData['user_id'];

            $update = mysqli_query($conn, "UPDATE `users` SET `status` = 'Active now' where `user_id` = {$RowData['user_id']};");
            $_SESSION['unique_id'] = $RowData["unique_id"];
            echo "success";
            // $RowData['status'] = "Active Now";
        } else {
            echo "Password not matched";
        }
    } else {
        echo "Email does not exist";
    }
} else {
    echo "Please fill all the login form";
}


?>