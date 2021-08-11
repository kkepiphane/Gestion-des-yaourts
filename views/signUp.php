<?php 
session_start();
require  '../models/modelLogin.php';
$app = new DemoLib();
$register_error_message = ''; 
// check Register request
if (isset($_POST['btnRegister'])) {
  if ($_POST['username'] === "") {
      $register_error_message = 'Username field is required!';
  } else if ($_POST['email'] === "") {
      $register_error_message = 'Email field is required!';
  } else if ($_POST['password'] === "") {
      $register_error_message = 'Password field is required!';
  } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $register_error_message = 'Invalid email address!';
  } else if ($app->isEmail($_POST['email'])) {
      $register_error_message = 'Email is already in use!';
  } else if ($app->isUsername($_POST['username'])) {
      $register_error_message = 'Username is already in use!';
  } else {
      $user_id = $app->Register($_POST['username'], $_POST['email'], $_POST['password']);

      header("Location:accueil.php");
  }
}
if(!empty($_SESSION['id']))
{
    header("Location:accueil.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Inscrption - KCMG</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="../controller/controllerLogin.php" method="POST">
      <h2 class="form-login-heading">Inscription</h2>
      <?php
            if ($register_error_message != "") {
                echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $register_error_message . '</div>';
            }
            ?>
        <div class="login-wrap">
          <input type="text" class="form-control" placeholder="Pseudo" autofocus name="username">
          <br>
          <input type="email" class="form-control" placeholder="Email" autofocus name="email">
          <br>
          <input type="password" class="form-control" placeholder="Password" name="password">
          <br>
          <button class="btn btn-theme btn-block" href="main.php" type="submit" name="btnRegister" ><i class="fa fa-lock"></i> S'INSCRIR</button>
          <hr>
          <div class="registration">
            Avez vous déja un compte ? <br/>
            <a class="" href="login.php">
            Se connecter
              </a>
          </div>
        </div>
        <!-- Modal -->
        <!-- modal -->
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>

</html>
