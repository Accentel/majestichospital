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
				
								<h2 class="panel-title">Address </h2>
							
							</header>
							<div class="panel-body">
								<table class="table table-bordered table-striped mb-none" id="datatable-default">
									<thead>
										<tr>
											<th>#</th>
											<th>Address</th>
											<th>Phone</th>
											<th>Email
											</th>
											<th class="hidden-phone">Edit</th>
										
										</tr>
									</thead>
									<tbody>
									<?php
									include("../connection.php");
									 $a="select * from address order by id desc";
									$sq=mysqli_query($link,$a);
									$i=1;
									while($r=mysqli_fetch_array($sq)){?>
										<tr class="gradeX">
											<td><?php echo $i?></td>
											<td><?php echo $r['desc1'];?>
											</td>
											<td><?php echo $r['phone'];?></td><td><?php echo $r['email'];?></td>
											<td class="center hidden-phone">
											<a href="addr_edit.php?id=<?php echo $r['id'];?>">
											<img src="edit.gif"></a></td>
											<!--<td class="center hidden-phone">
											<a href="delete_home_content.php?id=<?php echo $r['id'];?>" onclick="return confirm('Are you sure you want to delete this item?');">
											<img src="delete.gif"></a></td>-->
										</tr>
									<?php $i++; }?>
										
									</tbody>
								</table>
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