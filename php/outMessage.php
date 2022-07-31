<?php

session_start();

if(isset($_SESSION['unique_id'])){


    require_once("./config.php");

    //Get the current chatting friends id
    $friend_id= mysqli_real_escape_string($conn, $_POST["user_id"]);

    //Get the current user's id
    $sender_id= mysqli_real_escape_string($conn, $_POST["sender_id"]);

    //Get the message sent from the AJax form submission
    $message=mysqli_real_escape_string($conn,$_POST["message"]);
    if(!empty($message)){
        $query = mysqli_query($conn, "INSERT INTO messages (incomming_msg_id, outgoing_msg_id, msg) VALUES ('{$sender_id}', '{$friend_id}', '{$message}');") or die();
        if($query){
            echo "inserted";
        }
        else{
            echo error_log($query);
        }
    }
}else{

    //redirect to loginpage if session isn't set
    header("./login.php");
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