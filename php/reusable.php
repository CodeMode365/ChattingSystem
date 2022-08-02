<?php
// session_start();
while ($row = mysqli_fetch_assoc($sql)) {
  require_once("./config.php");

  //fetch all last messages from all users
  $query ="SELECT * FROM `messages` WHERE (receiver_id= {$row["unique_id"]} OR sender_id= {$row["unique_id"]}) and (  receiver_id= {$sender_id} OR sender_id= {$sender_id}) order by msg_id DESC LIMIT 1";

  // var_dump($query);

  //run the query
  $qryRun = mysqli_query($conn, $query);

  //Feth the row with last message
  $rowLSTmsg = mysqli_fetch_assoc($qryRun);

  if (mysqli_num_rows($qryRun) > 0) {
    $LMessage = $rowLSTmsg['msg'];
  } else {
    $LMessage = " No message yet";
  }

  //Adding you: text if current user have sent last message
  (strlen($LMessage) > 28) ? $msg = substr($LMessage, 0, 28) : $msg = $LMessage;

  //If you current user have sent the last message then don't show that 
  ($sender_id == $rowLSTmsg['sender_id'])? $you = "You: " :$you ="";

  //chek is use is online or not
  ($row['status'] =="Offline now") ? $offline ="Offline" :$offline="";

  //ALl users listed in db profile rendering except current user
  if ($_SESSION["unique_id"] != $row["unique_id"]) {
    $output .= ' <a href="chat.php?user_id=' . $row['unique_id'] . '" class="friend">
      <div class="content">
        <img src="./assets/profiles/' . $row["profile"] . '" alt="" />
        <div class="details">
          <span>' . ucfirst($row["fname"]) . " " . ucfirst($row["lname"]) . '</span>
          <p>' . $you.$msg . '</p>
        </div>
      </div>
      <div class="status-dot '.$offline.'" ><i class="fas fa-circle"></i></div>
    </a>';
  } else {
    continue;
  }
}


?>