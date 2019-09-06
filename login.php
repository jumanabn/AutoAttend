<?php

require('inc/connect.php');



if (isset($_POST["username"]) && isset($_POST["password"])){ 

   $username = $_POST["username"];
   $password = md5($_POST["password"]);

   
    //check usename and password
    $sql = "SELECT email, password FROM users where email='$username'  AND password='$password'";
      $result = $conn->query($sql);

      //USER FOUND
      if ($result->num_rows == 1) {

          setcookie("user_name", $username, time() + 3600, "/dashboard");
        header('Location: http://localhost/dashboard/welcome.php'); //header er maddhome ki dhoroner file seta janay dewa hoi
        exit;
      } else {   //USER NOT 
          header('Location: http://localhost/dashboard?invalid=1');
          echo 'Invalid user <a href="/dashboard">login</a> ';
      }
      $conn->close();
}

	else die("Invalid Request");
?>
