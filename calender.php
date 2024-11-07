<?php
$k=5;
 include("header.php");?>
 <section class="breadcumb-area bg-img gradient-background-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">Suvarnaprashan Calender List</h3>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Breadcumb Area End ***** -->

    <section class="medilife-contact-area section-padding-100">
        <div class="container">
            <div class="row">
                <!-- Contact Form Area -->



                <div class="col-12 col-lg-10 " align="center">
                    <div class="contact-form">
					
                        <h5 class="mb-50">Suvarnaprashan Calender List</h5>
<div class="medilife-tabs-content">
<div class="medilife-tab-content d-md-flex align-items-center">
                      <table width="100%" border="0px"><tr><th>S.No</th><th>Date</th></tr>
					  <tr><td colspan="2"><hr /></td></tr>
					  <?php include("connection.php");
					  $date=date('Y-m-d');
					  $sq=mysqli_query($link,"select * from suvarna_cal  where date1>'$date' order by date1 asc");
					    $i=1;
					  while($r=mysqli_fetch_array($sq)){
						$d= $r['date1'];
						  ?>
					
					  <tr  ><td><?php echo $i?></td><td><?php $d= $r['date1'];
					  
					  echo $sdate1=date('d-m-Y',strtotime($d));
					  ?></td></tr><tr><td colspan="2"><hr /></td></tr>
					  <?php $k=$i++;}?>
					  
					   <?php include("connection.php");
					  $date=date('Y-m-d');
					   $i=$k+1;
					  $sq=mysqli_query($link,"select * from suvarna_cal  where date1<'$date' order by date1 asc");
					   
					  while($r=mysqli_fetch_array($sq)){
						$d= $r['date1'];
						  ?>
					
					  <tr  style="color:red;"><td><?php echo $i?></td><td><?php $d= $r['date1'];
					  
					  echo $sdate1=date('d-m-Y',strtotime($d));
					  ?></td></tr><tr><td colspan="2"><hr /></td></tr>
					  <?php $i++;}?>
					  
					  </table></div>
                    </div>
                </div>
</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** CTA Area Start ***** -->
    <div class="medilife-cta-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content">
                        <i class="icon-smartphone"></i>
                        <h2>For  calls</h2>
                        <h3>+91-9848047481</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php include("footer.php");?>