<nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="/dashboard/welcome.php">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a></li>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/view_user.php">
              <span data-feather="file"></span>
              My Attendance 
            </a>
          </li>
          <?php if(is_admin()):  ?>
            <li class="nav-item">
            <a class="nav-link" href="/dashboard/view_attendance.php">
              <span data-feather="file"></span>
              View Attendance
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/users.php">
              <span data-feather="file"></span>
             Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/add_user.php">
              <span data-feather="file"></span>
              Add User
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/add_device.php">
              <span data-feather="file"></span>
              Add Device
            </a></li>
          </li>
        <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/edit_profile.php">
              <span data-feather="file"></span>
             Edit Profile
            </a>
          </li>      
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/applications_pending.php">
              <span data-feather="file"></span>
              Leave Application
            </a>
          </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      </div>
    </nav>
