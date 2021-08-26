<?php
/*
 * Tutorial: PHP Login Registration system
 *
 * Page index.php
 * */

// Start Session

// Application library ( with DemoLib class )

// check Login request
if (isset($_POST['btnLogin'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username == "") {
        $login_error_message = 'Username field is required!';
    } else if ($password == "") {
        $login_error_message = 'Password field is required!';
    } else {
        $user_id = $app->Login($username, $password); // check user login
        if($user_id > 0)
        {
            $_SESSION['id_users'] = $id_users; // Set Session
            header("Location:../views/main.php"); // Redirect user to the profile.php
        }
        else
        {
            $login_error_message = 'Invalid login details!';
        }
    }
}
?>