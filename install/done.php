<?php
include "core.php";
head();

$username = $_SESSION['username'];
$password = hash('sha256', $_SESSION['password']);

$config             = include '../config.php';
$config['username'] = $username;
$config['password'] = $password;
file_put_contents('../config.php', '<?php return ' . var_export($config, true) . '; ?>');
?>
<center>
<div class="alert alert-success">
    <p>Malware Scanner has been successfully installed on your website!</p>
</div>
    
<div class="alert alert-warning">
<p>For security reasons, please remove the <b>install/</b> folder from your server!</p>
</div>
    
<a href="../" class="btn-success btn btn-block"><i class="fa fa-arrow-circle-o-right"></i> Continue to Malware Scanner</a>
</center>
<?php
footer();
?>