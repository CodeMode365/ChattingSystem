<?php
session_start();

if (isset($_SESSION['unique_id'])) {


  require_once("./config.php");

  //Get the current chatting friends id
  $receiver_id = mysqli_real_escape_string($conn, $_POST["user_id"]);

  //Get the current user's id
  $sender_id = mysqli_real_escape_string($conn, $_POST["sender_id"]);

  $sql = "SELECT * from messages 
          LEFT JOIN users ON users.unique_id = messages.sender_id
    where (sender_id = $sender_id AND receiver_id = $receiver_id)
            OR (sender_id = $receiver_id AND receiver_id = $sender_id)";


  /*
            INNER JOIN: Returns records that have matching values in both tables
            LEFT JOIN: Returns all records from the left table, and the matched records from the right table
            RIGHT JOIN: Returns all records from the right table, and the matched records from the left table
            CROSS JOIN: Returns all records from both tables
*/
  $runQry = mysqli_query($conn, $sql);
  $output = "";

  if (mysqli_num_rows($runQry) > 0) {
    while ($row = mysqli_fetch_array($runQry)) {
      if ($row['sender_id'] === $sender_id) { //if this condition matches then current user is sender

        $output .= '
          <div class="chat outgoing">
                <div class="details">
              <p>
               ' . $row["msg"] . '
              </p>
            </div>
          </div>
          ';
      } else { //else current user is receiver

        $output .= '
                <div class="chat incoming">
            <img src="./assets/profiles/' . $row['profile'] . '" alt="" />
            <div class="details">
              <p>
               ' . $row["msg"] . '
              </p>
            </div>
          </div>
          ';
      }
    }
    echo $output;
  }
} else {

  //redirect to loginpage if session isn't set
  header("./login.php");
}


//session id = outgoing_id --> current account user
//user_id = incommig_id --> friend
