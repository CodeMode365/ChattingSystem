<?php

while ($row = mysqli_fetch_assoc($sql)) {
  $sql= mysqli_query($conn, "SELECT * FROM messages WHERE (receiver_id = {$row["unique_id"]} OR sender_id ={$row["unique_id"]}" AND );
  if ($_SESSION["unique_id"] != $row["unique_id"]) {
    $output .= ' <a href="chat.php?user_id='.$row['unique_id'].'" class="friend">
      <div class="content">
        <img src="./assets/profiles/' . $row["profile"] . '" alt="" />
        <div class="details">
          <span>' . ucfirst($row["fname"]) . " " . ucfirst($row["lname"]) . '</span>
          <p>Test message</p>
        </div>
      </div>
      <div class="status-dot"><i class="fas fa-circle"></i></div>
    </a>';
  } else {
    continue;
  }
}

?>