<?php require('inc/checklogin.php'); ?>
<?php require('inc/connect.php'); ?>
<?php require('inc/function.php');?>

<?php
admin_only();
$page_title = "View Attendance";
?>
<?php require('layout/header.php'); ?>


<?php

$error = false;

if(!isset($_GET['date'])){

    $date = date('Y-m-d');

}

else{
    $date = $_GET['date'];
    $date = date('Y-m-d' , strtotime($date));
}
 


$sql = "SELECT date, user_id, in_time, out_time FROM attendance WHERE date = '$date'";
$result = $conn->query($sql);

echo "<h6><b>Date:</b> $date</h6>";

$previous = date('Y-m-d' , strtotime("$date -1 day"));
$next = date('Y-m-d' , strtotime("$date +1 day"));

echo '<a href="view_attendance.php?date='.$previous.'"><< Previous</a> || 
        <a href="view_attendance.php?date='.$next.'">Next >></a>';

if ($result->num_rows > 0) {
    // output data of each row

    echo'<table class="table">';
    echo '<tr><th>Date</th> <th>Name </th> <th>In Time </th> <th>Out Time</th> </tr>';
    while($row = $result->fetch_assoc()) {
    	echo '<tr>';
    	echo '<td>' . $row["date"] . '</td>';
    	echo '<td>' . get_user_by_id($row["user_id"])->name . '</td>';
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