<?php
    session_start();
    require_once("./config.php");
    $sql    = mysqli_query($conn, "SELECT * from users");
    $output = "";
    
    if(mysqli_num_rows($sql) == 0){
        $output ="No user available for chatting";

    }elseif(mysqli_num_rows($sql)>0){
      require_once("./reusable.php");
    }
    echo $output;

?>