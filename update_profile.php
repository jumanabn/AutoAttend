<?php require('inc/checklogin.php'); ?>
<?php require('inc/connect.php'); ?>
<?php require('inc/function.php');?>

<?php
admin_only();
$page_title = "Add User";
?>

<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
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

if (empty($_POST['email'])) {
	$errors[] = 'Email is required.';
}
elseif (strlen($_POST['email']) < 3) {
	$errors[] = 'Email is too short.';
}


if(is_admin()){  
		if (empty($_POST['role'])) {
			$errors[] = 'Role is required.';
			}
		elseif (strlen($_POST['role'] !='user')&&($_POST['role'] != 'admin')){
			$errors[] = 'Invalid role';

		}
}
else
	$_POST['role'] = 'user';


foreach ($errors as $error) {
	echo '<li>' . $error. '</li>';
}

if (!empty($errors)) {
	echo 'Please correct the errors';
	die();
}
$user_id	= (int)$_POST['userID'];

$name 		= addslashes($_POST['name']);
$email 		= addslashes($_POST['email']);
$role 		= $_POST['role'];

$insert = $conn->query("UPDATE users SET name='$name', email='$email', role='$role' WHERE id='$user_id'");

if (!$insert) 
	die('database error');
header('Location: http://localhost/dashboard/edit_profile.php?success=true');