<?php

session_start();

if(isset($_SESSION['unique_id'])){
    require_once("./config.php");
    $friend_id= mysqli_real_escape_string($conn, $_POST["friend-id"]);
    $users_id= mysqli_real_escape_string($conn, $_POST["users-id"]);
}

// $message = $_POST["message"];

// $data = '<div class="chat-box">
// <div class="chat outgoing">
//   <div class="details">
//     <p>
//     '.$message.'
//     </p>
//   </div>
// </div>';

// echo $data;

?>
