<?php
session_start();

require_once("config.php");
$search = mysqli_real_escape_string($conn, $_POST['Search']) ;
$sender_id = $_SESSION["unique_id"];

$output=" ";

$sql = mysqli_query($conn, "SELECT * from users where fname like '%{$search}%' OR lname like '%{$search}%';");

if(mysqli_num_rows($sql)>0){
   require_once("./reusable.php");
}else{
    $output="No users found..";
}
echo $output;
?>