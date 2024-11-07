<?php include("header.php");?>
				<!-- end: sidebar -->
<?php $id=$_REQUEST['id'];
	 $a="select * from address where id='$id'";
									$sq=mysqli_query($link,$a);
									$r=mysqli_fetch_array($sq);?>
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
								<li><span>Address</span></li>
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
						
										<h2 class="panel-title">Address</h2>
									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" name="frm" method="post" enctype="multipart/form-data" action="addr_suc.php">
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputHelpText">Address</label>
												<div class="col-md-9">
												<textarea name="desc1" id="desc1"><?php echo $r['desc1'];?></textarea>
												
													
												</div>
											</div>
						
											
						
						
										<div class="form-group">
												<label class="col-md-3 control-label" for="inputHelpText">Phone</label>
												<div class="col-md-9">
												<input name="phone" id="phone" value="<?php echo $r['phone'];?>">
												
													
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputHelpText">Email</label>
												<div class="col-md-9">
											<input name="email" id="email" value="<?php echo $r['email'];?>">
												
													
												</div>
											</div>
											<input type="hidden" name="id" value="<?php echo $id?>">
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputHelpText"></label>
												<div class="col-md-6">
												<input type="submit" name="update" value="Update" class="btn btn-primary">
													
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
<script>
                CKEDITOR.replace( 'desc1', {
                height: 160
                } );
            </script>
		<?php include("footer.php");?>