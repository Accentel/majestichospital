<?php
$k=7;
 include("header.php");?>
 <section class="breadcumb-area bg-img gradient-background-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">Carriers</h3>
                 
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
                <div class="col-12 col-lg-12">
                    <div class="contact-form">
					
                        <h5 class="mb-50">Job Openings</h5>
<div class="medilife-tabs-content">
<div class="medilife-tab-content d-md-flex align-items-center">
                      <table width="100%" border="0px"><tr>
					 <?php include("connection.php");
					 $id=$_GET['id'];
					  $sq=mysqli_query($link,"select * from jobs where id='$id' ");
					    $i=1;
					  while($r=mysqli_fetch_array($sq)){
						
						  ?>
					 
					  <th>Job title</th><td>:</td><td><?php echo $r['job_title'];?></td></tr>
					  <tr>
					  <th>Positions</th> <td>:</td><td><?php echo $r['positions'];?></td>
					  </tr><tr>
					  <th>Interview From - To date</th> <td>:</td><td><?php $d= $r['intrview_from_date']; $d1= $r['intrview_to_date'];
					  
					  echo $sdate1=date('d-m-Y',strtotime($d));
					  ?> - <?php echo $sdate1=date('d-m-Y',strtotime($d1));?></td>
					  </tr><tr>
					  <th>Job Description</th><td>:</td><td><?php echo $r['Job_desc'];?></td>
					  
					  </tr>
					
					  <?php $i++;}?></table></div>
					 <div align="right"><a href="carriers.php">Back to Carriers Page</a></div>
                    </div>
                </div>
                </div>

                
            </div>
        </div>
    </section>
	
	<?php if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$message=$_POST['message'];
		$sq=mysqli_query($link,"insert into contact_list(name,email,msg)values('$name','$email','$message')");
		
		
		$tt =$_POST['email'];
 $frmail="rajeshksoni2@gmail.com";
 

	  $to = "$tt".",";
	  $to.=$frmail;
	$subject = "Raaj Hospital Contact";
   $header = "From:$frmail \r\n";
   $header .= "TO:$to \r\n";

   $header .= "MIME-Version: 1.0\r\n";
   $header .= "Content-type: text/html\r\n";
     
   $message = '<html><body>';
			$message .= '<img src="http://softdemo.in/raajhospital/img/raj logo1.png" />';
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
			$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>$name</td></tr>";
			$message .= "<tr><td><strong>Email:</strong> </td><td>$email</td></tr>";
		
			$message .= "<tr><td colspan='2'><strong>Comment</strong> </td></tr>";
			$message .= "<tr><td colspan='2'><strong>$msg</strong> </td></tr>";
							$message .= "</table>";
			$message .= "</body>
</html>";


   $retval = mail ($to,$subject,$message,$header);
		
		if($sq){
	print "<script>";
			print "alert('Thank you for contact us. ');";
			print "self.location='contact.php';";
			print "</script>";
	} else {
		print "<script>";
			print "alert('Unable To Save');";
			print "self.location='contact.php';";
			print "</script>";
		
	}
		
	}?>

    <!-- ***** CTA Area Start ***** -->
    <div class="medilife-cta-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content">
                        <i class="icon-smartphone"></i>
                        <h2>For Emergency calls</h2>
                        <h3>+91-9848047481</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php include("footer.php");?>