<?php require('inc/checklogin.php'); ?>
<?php require('inc/connect.php'); ?>
<?php require('inc/function.php');?>

<?php
$page_title = "Application Form";
?>
<?php require('layout/header.php'); ?>
<?php
$error = false;

if(!isset($_GET['user_id'])){

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
 
?>

<?php if (isset($_GET['success'])): 

  echo '<div class="alert alert-success" role="alert">User Updated</div>';
endif;
?>

<?php if(!$error): ?>


<form action="applications_process.php" method="POST">
	<div class="form-group row">
    <label for="field_name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input name="name" type="text" class="form-control" id="field_name" placeholder="Name">
    </div>
    </div>
  <div class="form-row">
<label for="field_name" class="col-sm-2 col-form-label">Leave Type</label>
    <div class="col-auto my-1">
      
      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option selected>Choose...</option>
        <option value="sick">Sick Leave</option>
        <option value="official">Official Leave</option>
        <option value="Yearly">Yearly Leave</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
<label for="feild_date" class="col-sm-2 col-form-label">Date Start</label>
<div class="col-auto my-1">
<input placeholder="Date" id="feild_date" name="fromdate" class="form-control" type="date" data-inputmask="'alias': 'date'" required>
</div>
<div class="form-group row">
<label for="feild_date" class="col-sm-2 col-form-label">Date End</label>
<input placeholder="Date" id="feild_date" name="fromdate" class="form-control" type="date" data-inputmask="'alias': 'date'" required>
</div>
 </div> 
 <div class="form-group">
    <label for="field_text">Description</label>
    <textarea class="form-control" id="field_text" rows="3"></textarea>
  </div>
          </label>
        </div>
      </div>
    </div>
  </fieldset>
  <div class="form-group row">
    <div class="offset-sm-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Apply</button>
    </div>
  </div>
</form>
<?php

else:
  echo "Invalid user";

 endif; ?>

<?php require('layout/footer.php') ?>