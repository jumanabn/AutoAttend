<?php require('inc/checklogin.php'); ?>
<?php require('inc/connect.php'); ?>
<?php require('inc/function.php');?>

<?php

$page_title = "Leave Applications";

?>
<<?php require('layout/header.php'); ?>
<div>
<a href="#" class="btn btn-primary btn-lg disabled" tabindex="-1" role="button" aria-disabled="true">Apply for leave</a></div>
<?php
admin_only(); ?>

<a href="applications_pending.php">Pending</a> | <a href="applications_approved.php">Approved</a> | <a href="applications_declined.php">Declined</a>

<?php

$sql = "SELECT id, user_id, type, date_start, date_end, description, status FROM leave_applications where status=''";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    echo'<table class="table">';
    echo '<tr><th>ID</th><th>Name</th> <th>Type</th><th>Start Date</th> <th>End Date</th> <th>Descripton</th> <th> </th> <th> </th> </tr>';
    while($row = $result->fetch_assoc()) {
    	echo '<tr>';
    	echo '<td>' . $row["id"] . '</td>';
    	echo '<td>' . get_user_by_id($row["user_id"])->name . '</td>';
    	echo '<td>' . $row["type"] . '</td>';
    	echo '<td>' . $row["date_start"] . '</td>';
    	echo '<td>' . $row["date_end"] . '</td>';
    	echo '<td>' . $row["description"] . '</td>';
        echo '<td> <a href="applications_status.php?id='.$row["id"].'&status=Approved" class="btn btn-success">Approve</button></a></td>';
        echo '<td> <a href="applications_status.php?id='.$row["id"].'&status=Declined" class="btn btn-danger">Decline</button></a></td>';
    	echo '</tr>';

    }
    echo '</table>';
} else {
    echo '<div class="alert alert-warning" role="alert">No Record Found</div>';
}
?>

<?php require('layout/footer.php'); ?>