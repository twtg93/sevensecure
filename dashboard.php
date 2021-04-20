<?php
require("core.php");
head();
?>
<div class="content-wrapper">

			<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div id="content-container">
				
				<section class="content-header">
    			  <h1><i class="fa fa-home"></i> Dashboard</h1>
    			  <ol class="breadcrumb">
   			         <li><a href="dashboard.php"><i class="fa fa-home"></i> Sevensecure Panel</a></li>
    			     <li class="active">Dashboard</li>
    			  </ol>
    			</section>

				<!--Page content-->
				<!--===================================================-->
				<section class="content">
				
				<center><div class="well"><h1><span class="fa-stack fa-lg"><i class="fa fa-bug fa-stack-1x"></i><i class="fa fa-search fa-stack-2x text-danger"></i></span> Sevensecure</h1></div></center>

                <h3 class="text-thin">Statistics</h3>
				
<?php
if (!function_exists("view_size")) {
    function view_size($size)
    {
        if (!is_numeric($size)) {
            return FALSE;
        } else {
            if ($size >= 1073741824) {
                $size = round($size / 1073741824 * 100) / 100 . " GB";
            } elseif ($size >= 1048576) {
                $size = round($size / 1048576 * 100) / 100 . " MB";
            } elseif ($size >= 1024) {
                $size = round($size / 1024 * 100) / 100 . " KB";
            } else {
                $size = $size . " B";
            }
            return $size;
        }
    }
}

if (is_callable("disk_free_space") && is_callable("disk_total_space")) {
    $directory = '/';
    @$free = disk_free_space($directory);
    @$total = disk_total_space($directory);
    if ($free === FALSE) {
        $free = 0;
    }
    if ($total === FALSE) {
        $total = 0;
    }
    if ($free < 0) {
        $free = 0;
    }
    if ($total < 0) {
        $total = 0;
    }
    @$used = $total - $free;
    @$free_percent = round(100 / ($total / $free), 2);
    @$used_percent = round(100 / ($total / $used), 2);

$files   = 0;
$folders = 0;
$images  = 0;
$php     = 0;
$html    = 0;
$css     = 0;
$js      = 0;
$dir     = glob("../");
foreach ($dir as $obj) {
    if (is_dir($obj)) {
        $folders++;
        $scan = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($obj, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST);
        foreach ($scan as $file) {
            if (is_file($file)) {
                $files++;
                $exp = explode(".", $file);
                if (@array_search("png", $exp) || @array_search("jpg", $exp) || @array_search("svg", $exp) || @array_search("jpeg", $exp || @array_search("gif", $exp))) {
                    $images++;
                } else if (array_search("php", $exp)) {
                    $php++;
                } else if (array_search("html", $exp) || array_search("htm", $exp)) {
                    $html++;
                } else if (array_search("css", $exp)) {
                    $css++;
                } else if (array_search("js", $exp)) {
                    $js++;
                }
            } else {
                $folders++;
            }
        }
    } else {
        $files++;
    }
}
?>
				<div class="row">
				    <div class="col-md-6">
					    <div class="col-md-12">
                            <div class="info-box bg-aqua">
                               <span class="info-box-icon"><i class="fa fa-hdd"></i></span>

                               <div class="info-box-content">
                                 <span class="info-box-text">HDD Total Space</span>
                                 <span class="info-box-number"><?php
    echo view_size($total);
?></span>

                                 <div class="progress">
                                   <div class="progress-bar" style="width: <?php
    echo $used_percent;
?>%"></div>
                                 </div>
                                     <span class="progress-description">
                                         Used Space: <span class="text-semibold"><?php
    echo view_size($used);
?></span>
                                     </span>
                               </div>
                            </div>
                        </div>
				        <div class="col-md-6">
                            <div class="small-box bg-blue">
                               <div class="inner">
                                   <h3><?php
echo $files;
?></h3>
                                   <p>Files</p>
                               </div>
                               <div class="icon">
                                   <i class="fa fa-file"></i>
                               </div>
                               <a href="#" class="small-box-footer"></a>
                            </div>
					    </div>
						<div class="col-md-6">
                            <div class="small-box bg-yellow">
                               <div class="inner">
                                   <h3><?php
echo $folders;
?></h3>
                                   <p>Folders</p>
                               </div>
                               <div class="icon">
                                   <i class="fa fa-folder"></i>
                               </div>
                               <a href="#" class="small-box-footer"></a>
                            </div>
					    </div>
						<div class="col-md-6">
                            <div class="small-box bg-red">
                               <div class="inner">
                                   <h3><?php
echo $php;
?></h3>
                                   <p>PHP Files</p>
                               </div>
                               <div class="icon">
                                   <i class="fab fa-php"></i>
                               </div>
                               <a href="#" class="small-box-footer"></a>
                            </div>
					    </div>
						<div class="col-md-6">
                            <div class="small-box bg-green">
                               <div class="inner">
                                   <h3><?php
echo $html;
?></h3>
                                   <p>HTML Files</p>
                               </div>
                               <div class="icon">
                                   <i class="fab fa-html5"></i>
                               </div>
                               <a href="#" class="small-box-footer"></a>
                            </div>
					    </div>
						<div class="col-md-6">
                            <div class="small-box bg-green">
                               <div class="inner">
                                   <h3><?php
echo $css;
?></h3>
                                   <p>CSS Files</p>
                               </div>
                               <div class="icon">
                                   <i class="fab fa-css3-alt"></i>
                               </div>
                               <a href="#" class="small-box-footer"></a>
                            </div>
					    </div>
						<div class="col-md-6">
                            <div class="small-box bg-red">
                               <div class="inner">
                                   <h3><?php
echo $js;
?></h3>
                                   <p>JS Files</p>
                               </div>
                               <div class="icon">
                                   <i class="fab fa-js"></i>
                               </div>
                               <a href="#" class="small-box-footer"></a>
                            </div>
					    </div>
                    </div>

            <div class="col-md-6">
			   <div class="row">
                        <div class="col-md-12">
                            <div class="info-box bg-aqua">
                               <span class="info-box-icon"><i class="fa fa-hdd"></i></span>

                               <div class="info-box-content">
                                 <span class="info-box-text">HDD FREE SPACE</span>
                                 <span class="info-box-number"><?php
    echo view_size($free);
?></span>

                                 <div class="progress">
                                   <div class="progress-bar" style="width: <?php
    echo $free_percent;
?>%"></div>
                                 </div>
                                     <span class="progress-description">Free <span class="text-semibold"><?php
    echo $free_percent;
?>%</span> of <span class="text-semibold"><?php
    echo view_size($total);
?></span>
                                     </span>
                               </div>
                            </div>
                        </div>
						<div class="col-md-12">
							<div class="box">
								<div class="box-header">
									<h3 class="box-title"><i class="far fa-calendar-alt"></i> Date</h3>
								</div>
								<div class="box-body">
									<center><div class="datepicker datepicker-inline" id="datepicker-d" data-language='en'></div></center>
								</div>
							</div>
						</div>
                 </div>
			</div>
<?php
}
?>				   
            </div>
                    
				</div>
				<!--===================================================-->
				<!--End page content-->


			</div>
			<!--===================================================-->
			<!--END CONTENT CONTAINER-->

<script>
    $('#datepicker-d').datepicker({
        todayHighlight: true,
        calendarWeeks: true
    });
</script>
<?php
footer();
?>