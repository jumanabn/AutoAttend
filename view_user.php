<?php require('inc/checklogin.php'); ?>
<?php require('inc/connect.php'); ?>
<?php require('inc/function.php');?>

<?php

$page_title = "View Attendance";
?>
<?php require('layout/header.php'); ?>


<?php
$error = false;

if(!isset($_GET['user_id'])||!is_admin()){

    $user = current_user();

}

else{
    $user_id = (int) $_GET['user_id'];

    if (get_user_by_id($_GET['user_id'])) {
            $user = get_user_by_id($_GET['user_id']);
        }
        else{
            $error = true;

        }   
}
if(!isset($_GET['date'])){

    $date = date('Y-m-d');

}

else{
    $date = $_GET['date'];
    $date = date('Y-m-d' , strtotime($date));
}

$now    = date('Y-m-d');
$start  = date('Y-m-01' , strtotime($date));
$end    = date('Y-m-t' , strtotime($date));

 
$sql = "SELECT date, user_id, in_time, out_time FROM attendance WHERE user_id = '$user->id' AND date >= '$start' AND date <= '$end'";
$result = $conn->query($sql);

echo "<h6><b>User:</b> $user->name</h6>";
echo "<h6><b>Month:</b> " . date('F Y' , strtotime($date)). "</h6>";


$previous = date('Y-m-d' , strtotime("$start -1 month"));
$next = date('Y-m-d' , strtotime("$start +1 month"));

echo '<a href="view_user.php?user_id=' .$user->id.'&date='.$previous.'"><< Previous</a> ||
        <a href="view_user.php?user_id=' .$user->id.'&date='.$now.'"> Current </a>|| 
        <a href="view_user.php?user_id=' .$user->id. '&date='.$next.'">Next >></a>';

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


<?php require('layout/footer.php'); ?>