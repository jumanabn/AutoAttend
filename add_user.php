<?php require('inc/checklogin.php'); ?>
<?php require('inc/connect.php'); ?>
<?php require('inc/function.php');?>

<?php
admin_only();
$page_title = "Add User";
?>
<?php require('layout/header.php'); ?>



<form action="create_user.php" method="POST">
	<div class="form-group row">
    <label for="field_name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input name="name" type="text" class="form-control" id="field_name" placeholder="Name">
    </div>
    </div>
  <div class="form-group row">
    <label for="field_email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input name="email" type="email" class="form-control" id="field_email" placeholder="Email">
    </div>
  </div>
  <div class="form-group row">
    <label for="field_password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input name="password" type="password" class="form-control" id="field_password" placeholder="Password">
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Role</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="role" id="field_role_user" value="user" checked>
          <label class="form-check-label" for="field_role_user">
            User
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="role" id="field_role_admin" value="admin">
          <label class="form-check-label" for="field_role_admin">
            Admin
          </label>
        </div>
      </div>
    </div>
  </fieldset>
  <div class="form-group row">
    <div class="offset-sm-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Create User</button>
    </div>
  </div>
</form>


<?php require('layout/footer.php') ?>