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
								<li><span>Home Gallery</span></li>
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
						
										<h2 class="panel-title">Home Gallery</h2>
									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" name="frm" method="post" enctype="multipart/form-data" action="home_gallery_suc.php">
											
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputHelpText">Description</label>
												<div class="col-md-9">
												<textarea name="desc1" id="desc1"></textarea>
												
													
												</div>
											</div>
						
											
						
						
											<div class="form-group">
												<label class="col-md-3 control-label">File Upload</label>
												<div class="col-md-6">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fa fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input type="file"  name="image" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
														</div>
													</div>
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
<script>
                CKEDITOR.replace( 'desc1', {
                height: 160
                } );
            </script>
		<?php include("footer.php");?>