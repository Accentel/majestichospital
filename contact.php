<?php
$k=4;
 include("header.php");?>
 <section class="breadcumb-area bg-img gradient-background-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">Contact</h3>

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
                <div class="col-12 col-lg-8">
                    <div class="contact-form">
                        <h5 class="mb-50">Get in touch</h5>

                        <form action="#" method="post">
                            <div class="form-group">
                                <input type="text" name="name" required class="form-control" id="contact-name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email"  name="email" required class="form-control" id="contact-email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn medilife-btn">Send Message <span>+</span></button>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="content-sidebar">


                        <!-- Contact Card -->
                        <div class="medilife-contact-card mb-50">

                            <div class="single-contact d-flex align-items-center">
                                <div class="contact-icon mr-30">
                                    <i class="icon-doctor"></i>
                                </div>
                                <div class="contact-meta">
                                    <p><b>Address:</b> 
									<?php $sq=mysqli_query($link,"select * from address");
									$r=mysqli_fetch_array($sq);
									echo $r['desc1'];
									?>
									
									<!--#3-6-459/A,Street No.5<br>Lane Beside Laxmi Hyundai Showroom<br>HIMAYATHNAGAR,Hyderabad-500029(T.S.).--></p>
                                </div>
                            </div>

 
                            <div class="single-contact d-flex align-items-center">
                                <div class="contact-icon mr-30">
                                    <i class="icon-doctor"></i>
                                </div>
                                <div class="contact-meta">
                                    <p><b>Phone:</b> <?php echo $r['phone'];?></p>
                                </div>
                            </div>

                            <div class="single-contact d-flex align-items-center">
                                <div class="contact-icon mr-30">
                                    <i class="icon-doctor"></i>
                                </div>
                                <div class="contact-meta">
                                    <p><b>Email:</b> <?php echo $r['email'];?></p>
                                </div>
                            </div>


                            <div class="contact-social-area">
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                              
                                <a href="https://www.facebook.com/Hospital.Raaj/" target="new"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </div>

                        </div>
                        

						
						
                        <!-- medilife Emergency Card -->
                       <!-- <div class="medilife-emergency-card bg-img bg-overlay" style="background-image: url(img/bg-img/about1.jpg);">
                            <i class="icon-smartphone"></i>
                            <h2>For Emergency calls</h2>
                            <h3>+91-9848047481</h3>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
	

       
            
                <div class="col-12 col-lg-12">
                    <div class="cta-content" border=1>
					<fieldset style="border:2px solid; width:100%;" align="center">
					<br/> 
					<br/> 
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15230.642407785472!2d78.4210215!3d17.3800571!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3012921608cc6512!2sMajestic%20Hospital!5e0!3m2!1sen!2sin!4v1618649420321!5m2!1sen!2sin" width="92%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                  
						<br/> <br/> 
						</fieldset>
						
                    </div>
					
                </div>
      
     

	 
						

	
	<?php if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$message=$_POST['message'];
		$sq=mysqli_query($link,"insert into contact_list(name,email,msg)values('$name','$email','$message')");
		
		
		$tt =$_POST['email'];
 $frmail="majestic.hospital@yahoo.com";
 

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
                        <h3>+91-8341694595</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php include("footer.php");?>