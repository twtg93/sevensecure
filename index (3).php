<?php
include "config.php";

$config = include 'config.php';

if ($config['username'] == '' && $config['password'] == '') {
    echo '<meta http-equiv="refresh" content="0; url=install" />';
    exit();
}

@session_start();
    
    if (isset($_SESSION['sec-username'])) {
        $uname = $_SESSION['sec-username'];
        if ($uname == $config['username']) {
            echo '<meta http-equiv="refresh" content="0; url=dashboard.php" />';
            exit;
        }
    }
    
    $_GET  = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
    $error = "No";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
        <title>SevenSecure - Antivirus</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
        <link rel="stylesheet" href="assets/css/admin.min.css">

        <!-- Favicon -->
        <link rel="shortcut icon" href="assets/img/favicon.png">
    </head>

    <body class="hold-transition login-page">
        
<div class="login-box">
    <div class="login-logo">
        <a href="index.php"><i class="fa fa-search"></i> SevenSecure <strong>Antivirus</strong></a>
    </div>
    <div class="login-box-body">
<?php
    if (isset($_POST['signin'])) {
        $username = $_POST['username'];
        $password = hash('sha256', $_POST['password']);
        if ($username == $config['username'] && $password == $config['password']) {
            $_SESSION['sec-username'] = $username;
            echo '<meta http-equiv="refresh" content="0;url=dashboard.php">';
        } else {
            echo '<br />
		<div class="callout callout-danger">
              <i class="fa fa-exclamation-circle"></i> The entered <strong>Username</strong> or <strong>Password</strong> is incorrect.
        </div>';
            $error = "Yes";
        }
    }
?> 
        <form action="" method="post">
            <div class="form-group has-feedback <?php
    if ($error == "Yes") {
        echo 'has-error';
    }
?>">
                <input type="username" name="username" class="form-control" placeholder="Username" <?php
    if ($error == "Yes") {
        echo 'autofocus';
    }
?> required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" name="signin" class="btn btn-primary btn-block btn-flat btn-lg"><i class="fa fa-sign-in"></i>
&nbsp;Sign In</button>
                </div>
            </div>
        </form> 
    </div>
</div>

    </body>
</html>