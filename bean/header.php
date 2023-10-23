<?php
include "koneksi.php";

error_reporting(0);
session_start();
if (isset($_SESSION["ses_username"]) == "") {
  header("location: landingpage.php");
} else {
  $data_id = $_SESSION["ses_id"];
  $data_level = $_SESSION["ses_level"];
  $data_username = $_SESSION["ses_username"];
  $data_password = $_SESSION["ses_password"];
  $foto = $_SESSION["ses_foto"];
}


?>
<header class="main-header">
  <!-- Logo -->
  <a href="index.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>K</b>SP</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin</b>Koperasi</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="./foto/<?php echo $foto; ?>" class="user-image" alt="User Image">
            <span class="hidden-xs">
              <?php echo $data_username ?>
            </span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="./foto/<?php echo $foto; ?>" class="img-circle" alt="User Image">

              <p>
                <?php echo $data_username ?>
                <small>
                  <?php

                  if ($data_level == 1) {
                    echo 'Admin';
                  } else {
                    echo 'Petugas';
                  }
                  $data_level

                    ?>
                </small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div style="text-align:center;">
                <a href="logout.php" class="btn btn-default btn-flat alert_notif">Logout</a>
              </div>
              <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
                crossorigin="anonymous">
                </script>
              <!-- script js sweetalert-->
              <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>

              <script>
                $('.alert_notif').on('click', function () {
                  var getLink = $(this).attr('href');
                  Swal.fire({
                    title: "Anda Ingin Logout",
                    icon: 'question',
                    position: 'top-end',
                    width: '300px',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: "Cancel"

                  }).then(result => {
                    //jika klik ya maka arahkan ke logout.php
                    if (result.isConfirmed) {
                      window.location.href = getLink
                    }
                  })
                  return false;
                });
              </script>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>