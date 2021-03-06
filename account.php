<?php
require("core.php");
head();
?>
<div class="content-wrapper">

			<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div id="content-container">
				
				<section class="content-header">
    			  <h1><i class="fa fa-user"></i> Admin Account</h1>
    			  <ol class="breadcrumb">
   			         <li><a href="dashboard.php"><i class="fa fa-home"></i> Sevensecure Panel</a></li>
    			     <li class="active">Admin Account</li>
    			  </ol>
    			</section>


				<!--Page content-->
				<!--===================================================-->
				<section class="content">

<?php
if (isset($_POST['edit'])) {
    $username = addslashes($_POST['username']);
    $password = $_POST['password'];
    
    $config['username'] = $username;
    file_put_contents('config.php', '<?php return ' . var_export($config, true) . '; ?>');
    if ($password != null) {
        $password = hash('sha256', $_POST['password']);
        
        $config['password'] = $password;
        file_put_contents('config.php', '<?php return ' . var_export($config, true) . '; ?>');
    }
    echo '<meta http-equiv="refresh" content="0;url=account.php">';
}
?>
                    
                <div class="row">                  
                    
				<div class="col-md-9">
				    <div class="box">
						<div class="box-header">
							<h3 class="box-title">Admin Account</h3>
						</div>
						<div class="box-body">
<table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Username</th>
										</tr>
									</thead>
									<tbody>
										<tr>
                                            <td><img src="assets/img/avatar.png" width="25px" height="25px"> <?php
echo $config['username'];
?></td>
										</tr> 
								</tbody>
								</table>
                        </div>
                     </div>
                </div>
                    
				<div class="col-md-3">
<form class="form-horizontal" action="" method="post">
				     <div class="box">
						<div class="box-header">
							<h3 class="box-title">Edit Account</h3>
						</div>
				        <div class="box-body">
                               <div class="form-group">
									 <label class="col-sm-4 control-label">Username: </label>
									 <div class="col-sm-8">
								           <input type="text" name="username" class="form-control" value="<?php
echo $config['username'];
?>" required>
									 </div>
							   </div>
                               <hr>
                               <div class="form-group">
								    <label class="col-sm-4 control-label">New Password: </label>
								    <div class="col-sm-8">
										<input type="text" name="password" class="form-control">
									</div>
                                </div>
                                <br /><i>Fill this field only if you want to change the password.</i>
                        </div>
                        <div class="panel-footer">
							<button class="btn btn-flat btn-success btn-block" name="edit" type="submit">Save</button>
				        </div>
				     </div>
</form>

				</div>
				</div>
                    
				</div>
				<!--===================================================-->
				<!--End page content-->


			</div>
			<!--===================================================-->
			<!--END CONTENT CONTAINER-->

<?php
footer();
?>