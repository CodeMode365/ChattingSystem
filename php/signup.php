<?php
require_once("./config.php");

$fname = mysqli_real_escape_string($conn, $_POST["fname"]);
$lname = mysqli_real_escape_string($conn, $_POST["lname"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);


if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {

    //check email validataion
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //to validate email

        //check if email is already present or not
        $fetchData = "SELECT * FROM `users` WHERE email= '$email'; ";
        $runQry = mysqli_query($conn, $fetchData);
        $rowsCount = mysqli_num_rows($runQry);
        if ($rowsCount > 0) {
            echo $email . ":Email already used";
        } else {

            //check for user's uploaded image
            if (isset($_FILES["image"])) {

                $img_name = $_FILES['image']["name"]; //getting user uploaded img name
                $img_type = $_FILES["image"]["type"]; //getting the file type
                $tmp_name = $_FILES["image"]["tmp_name"]; //this temporary name is used to save/move file in our folders

                //To get the extension of the file(.jpg, .png...)
                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode); //get the extesion of the file

                //check extenstion array
                $extensions = ["png", "jpeg", "jpg"];

                if (in_array($img_ext, $extensions) === true) //works if extensio gets matched
                {
                    
                    $time = time(); //return current time(to renama the image with current time)


                    //to move the uploaded file to ceration folder
                    $new_img_name = $time . $img_name;
                    if (move_uploaded_file($tmp_name, "../assets/profiles/".$new_img_name)) {


                        $status = "Active now"; //account gets actived when signed in
                       $random_id = rand($time, 100000000); // creating random id for user
                        //insert users data into table
                        $insertQry = "INSERT INTO `users`(`unique_id`, `fname`, `lname`, `email`, `password`, `profile`, `status`) VALUES ('{$random_id}','{$fname}','{$lname}','{$email}','{$password}','$new_img_name', '{$status}') ";
                        $insertData = mysqli_query($conn, $insertQry);

                        if ($insertData) {
                            //run if data inserted
                            $qry = mysqli_query($conn, "SELECT * FROM `users` WHERE email= '$email';");
                            if (mysqli_num_rows($qry) > 0) {
                                $row = mysqli_fetch_assoc($qry);
                                session_start();
                                $_SESSION["unique_id"] = $row["unique_id"]; //using user_uniqure id as session
                                echo "Account created successfully";
                            } else {
                                echo "Data inserting error";
                            }
                        }
                    }
                } else {
                    echo "file extesnsion error - jpeg, jpg, png only";
                }
            } else {
                echo "Please choose a profile image";
            }
        }
    } else {
        echo $email . " is not a valid  email";
    }
} else {
    echo "All input field are required";
}

?>