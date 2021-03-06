<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<?php
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
  $id  = $_COOKIE['id'];
  $key = $_COOKIE['key'];
  include 'connection.php';
  $query = mysql_query("SELECT username FROM admin WHERE username = '$id' ");
  $row = mysql_fetch_assoc($query);
  if (hash('sha384', $row['username']) == $key) {
    $_SESSION['id'] = true;
  }
}
if (isset($_SESSION['id'])) {

  $_SESSION['hak'] = $hak['hak'];
  $_SESSION['username'] = $username;
  $_SESSION['status'] = "login";
  header("location: dashboard.php");
  exit;
}
if (isset($_GET['pesan'])) {
  if ($_GET['pesan'] == "gagal") {
    echo "Login gagal! username dan password salah!";
  } else if ($_GET['pesan'] == "tersisa") {

    echo "tersisa 1 lagi";
  } else if ($_GET['pesan'] == "tersisa0") {
    echo "tersisa 0 lagi";
  } else if ($_GET['pesan'] == "tersisa2") {
    echo "tersisa 2 lagi";
  } else if ($_GET['pesan'] == "blokir") {
    header("location:blokir.php");
  } else if ($_GET['pesan'] == "logout") {
    echo "Anda telah berhasil logout";
  } else if ($_GET['pesan'] == "belum_login") {
    echo "Anda harus login untuk mengakses halaman admin";
  };
};

?>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>

                  <!-- 
                      <form class="user" action="cek_login.php" method="post">
                        <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <a href="index.html" class="btn btn-primary btn-user btn-block">
                      Login
                    </a>
                    <hr>
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a> -->
                  <form class="user" action="controller/login.php" method="post">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" maxlength="15" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username..." required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" maxlength="15" required>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="rememberme">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <input type="submit" name="login" value="login" class="btn btn-primary btn-user btn-block">
                    <hr>
                  </form>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>