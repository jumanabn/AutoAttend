<?php

setcookie("user_name", '', time() -3600, "/dashboard");
header('Location: http://localhost/dashboard/'); 

   exit;
   ?>