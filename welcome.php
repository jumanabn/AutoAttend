<?php require('inc/checklogin.php'); ?>
<?php require('inc/connect.php'); ?>
<?php require('inc/function.php');?>
<?php require('layout/header.php'); ?>

<?php

if(isset($_COOKIE["user_name"]))
echo 'Welcome ' . $_COOKIE["user_name"];
else echo 'Please <a href="/dashboard">login</a> ';

?>

<?php
// var_dump(current_user()->id);

$sql = "SELECT date, in_time, out_time FROM attendance where user_id = " . current_user()->id;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    echo'<table class="table">';
    echo '<tr><th>Date</th> <th>In Time </th> <th>Out Time</th> </tr>';
    while($row = $result->fetch_assoc()) {
    	echo '<tr>';
    	echo '<td>' . $row["date"] . '</td>';
    	echo '<td>' . date('h:i A' , strtotime($row["in_time"])) . '</td>';
    	echo '<td>' . date('h:i A' , strtotime($row["out_time"])) . '</td>';
    	echo '</tr>';

    }
    echo '</table>';
} else {
    echo '<div class="alert alert-warning" role="alert">No Record Found</div>';
}

?>
<?php require('layout/footer.php') ?>
