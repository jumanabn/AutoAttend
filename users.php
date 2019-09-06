<?php require('inc/checklogin.php'); ?>
<?php require('inc/connect.php'); ?>
<?php require('inc/function.php');?>

<?php
admin_only();
$page_title = "Users";
?>

<?php require('layout/header.php'); ?>
<?php


$sql = "SELECT id, name, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    echo'<table class="table">';
    echo '<tr><th>Id</th> <th>Name </th> <th>Email</th> <th></th> </tr>';
    while($row = $result->fetch_assoc()) {
    	echo '<tr>';
    	echo '<td>' . $row["id"] . '</td>';
    	echo '<td> <a href="view_user.php?user_id='. $row["id"]. '">'.$row["name"].'</td>';
    	echo '<td>' . $row["email"] . '</td>';
        echo '<td> <a href="edit_profile.php?user_id='.$row["id"].'">Edit </a></td>';
    	echo '</tr>';

    }
    echo '</table>';
} else {
    echo '<div class="alert alert-warning" role="alert">No Record Found</div>';
}

?>
<?php require('layout/footer.php'); ?>