<?php require('inc/checklogin.php'); ?>
<?php require('inc/connect.php'); ?>
<?php require('inc/function.php');?>

<?php
admin_only();
$page_title = "Add User";
?>

<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	header('Location: http://localhost/dashboard/');
	die();
	
}

$errors = array();



if (empty($_POST['name'])) {
	$errors[] = 'Name is required.';
}
elseif (strlen($_POST['name']) < 3) {
	$errors[] ='Name is too short.';
}

if (empty($_POST['mac_address'])) {
	$errors[] = 'mac_address is required.';
}
elseif (strlen($_POST['mac_address']) != 17) {
	$errors[] = 'Mac Address is invalid.';
}

if (empty($_POST['user_id'])) {
	$errors[] = 'User Id is required.';
}
elseif ($_POST['user_id'] < 1) {
	$errors[] = 'User Id invalid.';
}
elseif (!get_user_by_id($_POST['user_id'])) {
	$errors[] = 'User Id invalid.';
}


foreach ($errors as $error) {
	echo '<li>' . $error. '</li>';
}

if (!empty($errors)) {
	echo 'Please correct the errors';
	die();
}

$name 				= addslashes($_POST['name']);
$mac_add 		    = $_POST['mac_address'];
$user_id 			= $_POST['user_id'];

$insert = $conn->query("INSERT INTO devices (name, mac_add, user_id) VALUES('$name', '$mac_add', '$user_id')");

if (!$insert) 
	die('database error');
header('Location: http://localhost/dashboard/');