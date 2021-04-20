<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
if(!isset($_SESSION)) {
    session_start();
}

function head()
{
    $current_page = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);  

    if($current_page == 'done.php'){
        $page = 2; 
    } else {
        $page = 1;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Malware Scanner - Installation Wizard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/favicon.png">
    <meta charset="utf-8">
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link type="text/css" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">  
</head>

<body>

    <div class="container">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-12">
                    <br /><center><h4><i class="fa fa-search"></i> Malware Scanner - Installation Wizard</h4></center><br />
                    <div class="bs-example">
                        <div class="jumbotron">
                            <ul class="nav nav-tabs nav-fill">
                                <li class="nav-item">
                                    <a class="nav-link <?php if($page == 1) { echo 'active'; } ?>"><i class="fas fa-user"></i> Administrator Account</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if($page == 2) { echo 'active'; } ?>"><i class="fas fa-check-square"></i> Completed</a>
                                </li>
                            </ul><br />
                            <div class="tab-content" id="TabContent">
<?php
}

function footer()
{
?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<?php
}
?>