<?php require('inc/checklogin.php'); ?>
<?php require('inc/connect.php'); ?>
<?php require('inc/function.php');?>

<?php
admin_only();
$page_title = "Decline List";
?>
<?php require('layout/header.php'); ?>

<?php 

if (isset($_POST['Approve'])) {
	echo "approved";
}



?>





<?php require('layout/footer.php') ?>