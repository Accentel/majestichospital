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
								<li><span>Specialist Menu Names</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
                        <?php
                        if(isset($_POST['sublll'])){
                        $name=$_POST['name'];
                        $id=$_POST['id1'];
                        $k=mysqli_query($link,"update smenu set name='$name' where id='$id'") or die(mysqli_error($link));
                        if($k){
                        print "<script>";
                        print "alert('Successfully  Saved');";
                        print "self.location='specialnames.php';";
                        print "</script>";
                        }
						}else{
						    $id=$_REQUEST['id'];
						    $m=mysqli_query($link,"select * from smenu where id='$id'");
						    $m1=mysqli_fetch_array($m);
						    
						}
						
						?>
					<div class="row">
							<div class="col-lg-12">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title">Specialist Menu Names</h2>
									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" name="frm" method="post" enctype="multipart/form-data" action="">
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputHelpText">Name</label>
												<div class="col-md-9">
												<input type="text" name="name" id="name" class="form-control" placeholder="Enter Specialist Menu Name" value="<?php echo $m1['name']; ?>">
												<input type="hidden" name="id1" id="id1" class="form-control" placeholder="Enter Specialist Menu Name" value="<?php echo $m1['id']; ?>">
													
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
					
						
					<!-- end: page -->
			
			
		</section>

		<?php include("footer.php");?>