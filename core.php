<?php
include 'config.php';

$config = include 'config.php';

if ($config['username'] == '' || $config['password'] == '') {
    echo '<meta http-equiv="refresh" content="0; url=install" />';
    exit();
}

session_start();

if (isset($_SESSION['sec-username'])) {
    $uname = $_SESSION['sec-username'];
    if ($uname != $config['username']) {
        echo '<meta http-equiv="refresh" content="0; url=index.php" />';
        exit;
    }
} else {
    echo '<meta http-equiv="refresh" content="0; url=index.php" />';
    exit;
}

$_GET  = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

function head()
{
    include 'config.php';
    
	$config = include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <title>SevenSecure - Antivirus</title>

    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Bootstrap Stylesheet-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/skin-purple.min.css">

	<!--Font Awesome-->
    <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
	
	<!--Stylesheet-->
    <link href="assets/css/admin.min.css" rel="stylesheet">

    <!--DataTables-->
    <link href="https://cdn.datatables.net/v/bs/dt-1.10.22/r-2.2.6/datatables.min.css" rel="stylesheet">
	
	<!--DatePicker-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css"/>

    <!--SCRIPT-->
    <!--=================================================-->

    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    
    <!--DatePicker-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.en-CA.min.js"></script>

</head>

<body class="hold-transition skin-purple sidebar-mini fixed">
<div class="wrapper">

  <header class="main-header">

    <a href="dashboard.php" class="logo">
      <span class="logo-mini">Sevensecure<strong> Antivirus</strong></span>
      <span class="logo-lg"><i class="fas fa-search"></i> Sevensecure <strong>Antivirus</strong></span>
    </a>

    <nav class="navbar navbar-static-top">

      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span><i class="fas fa-bars"></i>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
<?php
    $uname = $_SESSION['sec-username'];
?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="assets/img/avatar.png" class="user-image" alt="Admin Image">
              <span class="hidden-xs"><?php
        echo $_SESSION['sec-username'];
?></span>
            </a>
            <ul class="dropdown-menu">

              <li class="user-header">
                <img src="assets/img/avatar.png" class="img-circle" alt="Admin Image">

                <p>
                  <?php
        echo $_SESSION['sec-username'];
?>
                </p>
              </li>

              <li class="user-footer">
                <div class="pull-left">
                  <a href="account.php" class="btn btn-default btn-flat"><i class="fa fa-user fa-fw fa-lg"></i> Edit Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">

    <section class="sidebar">

      <div class="user-panel">
        <div class="pull-left image">
          <img src="assets/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <br /><p><?php
        echo $_SESSION['sec-username'];
?></p>
        </div>
      </div>

      <ul class="sidebar-menu">
        <li class="header">NAVIGATION</li>
        
        <li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'dashboard.php') {
        echo 'class="active"';
    }
?>>
           <a href="dashboard.php">
              <i class="fa fa-home"></i> <span>Dashboard</span>
           </a>
        </li>

        <li <?php
        if (basename($_SERVER['SCRIPT_NAME']) == 'account.php') {
            echo 'class="active"';
        }
?>>
           <a href="account.php">
              <i class="fa fa-user"></i> <span>Account</span>
           </a>
        </li>

        <li class="header">SECURITY</li>
          
        <li <?php
        if (basename($_SERVER['SCRIPT_NAME']) == 'malware-scanner.php') {
            echo 'class="active"';
        }
?>>
           <a href="malware-scanner.php">
              <i class="fa fa-search"></i> <span>Malware Scanner</span>
           </a>
        </li>
		
		<li class="header">TOOLS</li>
		
		<li <?php
        if (basename($_SERVER['SCRIPT_NAME']) == 'security-check.php') {
            echo 'class="active"';
        }
?>>
           <a href="security-check.php">
              <i class="fa fa-check"></i> <span>Security Check</span>
           </a>
        </li>
          
      </ul>
    </section>

  </aside>
<?php
}

function footer()
{
    include 'config.php';
    
    $config = include 'config.php';
?>
<footer class="main-footer">
    <strong>&copy; <?php
    echo date("Y");
?> Sevensecure</strong>
    
</footer>

</div>

    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--Bootstrap-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<!--Admin-->
    <script src="assets/js/admin.min.js"></script>

	<!--SlimScroll-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>

    <!--DataTables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.22/r-2.2.6/datatables.min.js"></script>

</body>
</html>
<?php
}
?>