<?php 

session_start();
// Start Session

// Application library ( with DemoLib class )
require  '../models/modelLogin.php';
$app = new DemoLib();

$login_error_message = '';

// check Login request
if (isset($_POST['btnLogin'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username == "") {
        $login_error_message = 'Username field is required!';
    } else if ($password == "") {
        $login_error_message = 'Password field is required!';
    } else {
        $id_users = $app->Login($username, $password); // check user login
        if($id_users > 0)
        {
           $_SESSION['id'] = $id_users; // Set Session
            header("Location:accueil.php"); // Redirect user to the profile.php
        }
        else
        {
            $login_error_message = 'Nom ou Mot de passe incorrect';
        }
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
  <title>Login - KCMG</title>

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
      <form class="form-login" action="login.php" method="POST">
      <?php
            if ($login_error_message != "") {
                echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $login_error_message . '</div>';
            }
            ?>
        <h2 class="form-login-heading">Connexion</h2>
        <div class="login-wrap">
          <input type="text" class="form-control" placeholder="Pseudo ou email" name="username" required>
          <br>
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <label class="checkbox">
            <span class="pull-right">
            <a data-toggle="modal" href="login.html#myModal"> Mots de passe oublier?</a>
            </span>
            </label>
          <button class="btn btn-theme btn-block" type="submit" name="btnLogin"><i class="fa fa-lock"></i> SIGN IN</button>
          <hr>
          <div class="registration">
            Vous n'avez pas de compte ?<br/>
            <a class="" href="signUp.php">
             Créer un compte
              </a>
          </div>
        </div>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
              </div>
              <div class="modal-body">
                <p>Enterez votre adresse email de votre votre mot de passe.</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme" type="button">Submit</button>
              </div>
            </div>
          </div>
        </div>
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
