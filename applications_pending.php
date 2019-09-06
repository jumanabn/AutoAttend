<?php require('inc/checklogin.php'); ?>
<?php require('inc/connect.php'); ?>
<?php require('inc/function.php');?>

<?php
admin_only();
$page_title = "Leave Applications";

?>

<?php require('layout/header.php'); ?>

<?php

$sql = "SELECT id, user_id, type, date_start, date_end, description, status FROM leave_applications";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    echo'<table class="table">';
    echo '<tr><th>Id</th> <th>type</th><th>Start Date</th> <th>End Date</th> <th>Descripton</th> <th> </th> <th> </th> </tr>';
    while($row = $result->fetch_assoc()) {
    	echo '<tr>';
    	echo '<td>' . $row["id"] . '</td>';
    	echo '<td>' . $row["type"] . '</td>';
    	echo '<td>' . $row["date_start"] . '</td>';
    	echo '<td>' . $row["date_end"] . '</td>';
    	echo '<td>' . $row["description"] . '</td>';
        echo '<td> <a href="applications_approve.php?user_id='.$row["id"].'button type="button" class="btn btn-success">Approve</button></a></td>';
        echo '<td> <a href="applications_decline.php?user_id='.$row["id"].'button type="button" class="btn btn-danger">Decline</button></a></td>';
    	echo '</tr>';

    }
    echo '</table>';
} else {
    echo '<div class="alert alert-warning" role="alert">No Record Found</div>';
}

?>



<?php require('layout/footer.php') ?>