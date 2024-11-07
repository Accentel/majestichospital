<?php include("header.php");?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Dashboard</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Doctor  Names</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<div class="row">
							<div class="col-lg-12">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title">Doctor Names</h2>
									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" name="frm" method="post" enctype="multipart/form-data" action="">
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputHelpText">Name</label>
												<div class="col-md-9">
												<input type="text" name="name" id="name" class="form-control" placeholder="Enter Specialist Menu Name">
													
												</div>
											</div>
							
							<div class="form-group">
												<label class="col-md-3 control-label" for="inputHelpText">Available on</label>
												<div class="col-md-9">
												<input type="text" name="available" id="available" class="form-control" placeholder="Enter Available Days and Time">
													
												</div>
											</div>
							
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputHelpText"></label>
												<div class="col-md-6">
												<input type="submit" name="sublll" value="Submit" class="btn btn-primary">
													
												</div>
											</div>
											
												</section>
												</div>
											</div>
									
										</form>
									</div>
								</section>
							</div>
						</div>

					<!-- start: page -->
					
						<?php
						if(isset($_POST['sublll'])){
						    $name=$_POST['name'];
						    $available=$_POST['available'];
						    $k=mysqli_query($link,"insert into doctor(name,desc1)values('$name','$available')") or die(mysqli_error($link));
						    if($k){
						        print "<script>";
			print "alert('Successfully  Saved');";
			print "self.location='doctorslist.php';";
			print "</script>";
		
						    }
						}
						
						?>
					<!-- end: page -->
			
			
		</section>

		<?php include("footer.php");?>