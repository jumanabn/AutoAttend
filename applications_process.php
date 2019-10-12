<?php require('inc/checklogin.php'); ?>
<?php require('inc/connect.php'); ?>
<?php require('inc/function.php');?>

<?php
admin_only();
$page_title = "Form";
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

if (empty($_POST['type'])) {
	$errors[] = 'Type is required.';
}
if (empty($_POST['description'])){
	$errors[] = 'Description is required.'; 

}
if (empty($_POST['date_start'])) {
	$errors[] = ' Start Date is required.';
}

if (empty($_POST['date_end'])) {
	$errors[] = ' End Date is required.';
}
if (empty($_POST['status'])) {
	$errors[] = 'status is required.';
}

foreach ($errors as $error) {
	echo '<li>' . $error. '</li>';
}

if (!empty($errors)) {
	echo 'Please correct the errors';
	die();
}

$name 		 	= addslashes($_POST['name']);
$type 			= $_POST['type'];
$date_start		= $_POST['date_start'];
$date_end 		= $_POST['date_end'];		 	
$description 	= $_POST['description'];
$status 		= $_POST['status'];


if($date_start > $dat_end){
                $error=" Start date should be greater than end Date ";
           }

$insert = $conn->query("INSERT INTO leave_applications (name, type, date_start, date_end, description, status) VALUES('$name', '$type', '$date_start', '$date_end', '$description','$status')");

if (!$insert) 
	die('database error');
header('Location: http://localhost/dashboard/');



