<?php
    session_start();
    require_once("./config.php");
    $sql    = mysqli_query($conn, "SELECT * from users");
    $output = "";
    
    if(mysqli_num_rows($sql) ==0){
        $output ="No user available for chatting";

    }elseif(mysqli_num_rows($sql)>0){
      
        while($row = mysqli_fetch_assoc($sql)){
          if($_SESSION["unique_id"] != $row["unique_id"]){
            $output.=' <a href="#" class="friend">
            <div class="content">
              <img src="./assets/profiles/'.$row["profile"].'" alt="" />
              <div class="details">
                <span>'.ucfirst($row["fname"])." ".ucfirst($row["lname"]).'</span>
                <p>Test message</p>
              </div>
            </div>
            <div class="status-dot"><i class="fas fa-circle"></i></div>
          </a>';
          }else{
            continue;
          }
        }
    }
    echo $output;

?>