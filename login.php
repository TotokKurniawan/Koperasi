<?php
session_start();
if (isset($_SESSION['ses_username']) != '') {
  header("index.php");
  header("menu.php");
  header("header.php");
  header("footer.php");
}
?>


<!DOCTYPE html>
<html>

<head>
  <title>Login Form</title>
  <link rel="stylesheet" type="text/css" href="style/style_login.css" />
  <link href="img/logo_koperasi.png" rel="icon">
  <link href="img/logo_koperasi.png" rel="apple-touch-icon">
</head>

<body>
  <section class="anjay">
    <video autoplay loop muted plays-inline class="back-video">
      <source src="asset/anjay.mp4" type="video/mp4" />
    </video>
    <img src="asset/logo.png" class="avatar" />
    <div class="login-box">

      <h1>Login Here</h1>
      <form action="login.php" method="POST">
        <p>Username</p>
        <input type="text" name="username" placeholder="Masukin Username" />
        <p>Password</p>
        <input type="password" name="password" placeholder="Masukin Password" />
        <input class="btn-hover color" type="submit" name="submit" value="Login" />
        <!-- <a href="#">Lupa Password</a> -->
        <span class="top"></span>
        <span class="right"></span>
        <span class="bottom"></span>
        <span class="left"></span>
      </form>
    </div>
  </section>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>

<?php
include "koneksi.php";
if (isset($_POST['submit'])) {
  //anti inject sql
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  //query login
  $sql_login = "SELECT * FROM karyawan WHERE username='$username' AND password='$password'";
  $query_login = mysqli_query($conn, $sql_login);
  $data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
  $jumlah_login = mysqli_num_rows($query_login);


  if ($jumlah_login == 1) {

    $_SESSION["ses_id"] = $data_login["id"];
    // $_SESSION["ses_nama"] = $data_login["nama"];
    $_SESSION["ses_level"] = $data_login["level"];
    $_SESSION["ses_username"] = $data_login["username"];
    $_SESSION["ses_password"] = $data_login["password"];
    $_SESSION["ses_foto"] = $data_login["foto"];

    echo "<script>
		Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
		}).then((result) => {if (result.value)
			{window.location = 'index.php';}
		})</script>";

  } else {

    echo "<script>
			Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'login.php';}
			})</script>";
  }
}
?>