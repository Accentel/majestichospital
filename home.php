  <?php
$k=1;
  include("header.php");?>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Hero Area Start ***** -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
			
			<?php include("connection.php");
			$sq=mysqli_query($link,"select * from home_gallery order by id desc");
			while($r=mysqli_fetch_array($sq)){?>
           <!-- <div class="single-hero-slide bg-img bg-overlay-white" style="background-image: url(img/bg-img/hero1.jpg);">-->
		   <div class="single-hero-slide bg-img bg-overlay-white" style="background-image: url();margin-top:155px; ">
                  <img src="upload/home_gallery/<?php echo $r['image'];?>" style="width:100% margin-top:155px;">
				<div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
							
							<h2 data-animation="fadeInUp" data-delay="100ms"><br><br><?php echo $r['desc1'];?></h2>
							<!--
                                <h2 data-animation="fadeInUp" data-delay="100ms">Medical Services that <br>You can Trust 100%</h2>
                                <h6 data-animation="fadeInUp" data-delay="400ms">Lorem ipsum dolor sit amet, consectetuer adipiscing elit sed diam nonummy nibh euismod.</h6>
                                <a href="#" class="btn medilife-btn mt-50" data-animation="fadeInUp" data-delay="700ms">Discover Medifile <span>+</span></a>
                           -->

						   </div>
                        </div>
                    </div>
                </div>
            </div><?php }?>
            <!-- Single Hero Slide -->
            <!--<div class="single-hero-slide bg-img bg-overlay-white" style="background-image: url(img/bg-img/breadcumb3.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Medical Services that <br>You can Trust 100%</h2>
                                <h6 data-animation="fadeInUp" data-delay="400ms">Lorem ipsum dolor sit amet, consectetuer adipiscing elit sed diam nonummy nibh euismod.</h6>
                                <a href="#" class="btn medilife-btn mt-50" data-animation="fadeInUp" data-delay="700ms">Discover Medifile <span>+</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            <!-- Single Hero Slide -->
           <!-- <div class="single-hero-slide bg-img bg-overlay-white" style="background-image: url(img/bg-img/breadcumb1.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Medical Services that <br>You can Trust 100%</h2>
                                <h6 data-animation="fadeInUp" data-delay="400ms">Lorem ipsum dolor sit amet, consectetuer adipiscing elit sed diam nonummy nibh euismod.</h6>
                                <a href="#" class="btn medilife-btn mt-50" data-animation="fadeInUp" data-delay="700ms">Discover Medifile <span>+</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
        </div>
    </section>
    <!-- ***** Hero Area End ***** -->

    <!-- ***** Book An Appoinment Area Start ***** -->
   
    <!-- ***** Book An Appoinment Area End ***** -->

    <!-- ***** About Us Area Start ***** -->
   <!-- <section class="medica-about-us-area section-padding-100-20">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="medica-about-content">
                        <h2>We always put our pacients first</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing eli.</p>
                        <a href="#" class="btn medilife-btn mt-50">View the services <span>+</span></a>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="row">
                       
                        <div class="col-12 col-sm-6">
                            <div class="single-service-area d-flex">
                                <div class="service-icon">
                                    <i class="icon-doctor"></i>
                                </div>
                                <div class="service-content">
                                    <h5>The Best Doctors</h5>
                                    <p>Lorem ipsum dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.</p>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-12 col-sm-6">
                            <div class="single-service-area d-flex">
                                <div class="service-icon">
                                    <i class="icon-blood-donation-1"></i>
                                </div>
                                <div class="service-content">
                                    <h5>Baby Nursery</h5>
                                    <p>Dolor sit amet, consecte tuer elit, sed diam nonummy nibh euismod tincidunt ut ldolore magna.</p>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-12 col-sm-6">
                            <div class="single-service-area d-flex">
                                <div class="service-icon">
                                    <i class="icon-flask-2"></i>
                                </div>
                                <div class="service-content">
                                    <h5>Laboratory</h5>
                                    <p>Lorem ipsum dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.</p>
                                </div>
                            </div>
                        </div>
                 
                        <div class="col-12 col-sm-6">
                            <div class="single-service-area d-flex">
                                <div class="service-icon">
                                    <i class="icon-emergency-call-1"></i>
                                </div>
                                <div class="service-content">
                                    <h5>Emergency Room</h5>
                                    <p>Dolor sit amet, consecte tuer elit, sed diam nonummy nibh euismod tincidunt ut ldolore magna.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <!-- ***** About Us Area End ***** -->

    <!-- ***** Cool Facts Area Start ***** -->
    <!--<section class="medilife-cool-facts-area section-padding-100-0">
        <div class="container">
            <div class="row">
               
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-fact-area text-center mb-100">
                        <i class="icon-blood-transfusion-2"></i>
                        <h2><span class="counter">5632</span></h2>
                        <h6>Blood donations</h6>
                        <p>Dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
                    </div>
                </div>
           
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-fact-area text-center mb-100">
                        <i class="icon-atoms"></i>
                        <h2><span class="counter">23</span>k</h2>
                        <h6>Pacients</h6>
                        <p>Dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
                    </div>
                </div>
              
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-fact-area text-center mb-100">
                        <i class="icon-microscope"></i>
                        <h2><span class="counter">25</span></h2>
                        <h6>Specialities</h6>
                        <p>Dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
                    </div>
                </div>
            
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-fact-area text-center mb-100">
                        <i class="icon-doctor-1"></i>
                        <h2><span class="counter">723</span></h2>
                        <h6>Doctors</h6>
                        <p>Dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <!-- ***** Cool Facts Area End ***** -->

    <!-- ***** Gallery Area Start ***** -->
      <!--<div class="medilife-gallery-area owl-carousel">
        <!-- Single Gallery Item 
      <div class="single-gallery-item">
            <img src="img/bg-img/g1.jpg" alt="">
            <div class="view-more-btn">
                <a href="img/bg-img/g1.jpg" class="btn gallery-img">See More +</a>
            </div>
        </div>
    
        <div class="single-gallery-item">
            <img src="img/bg-img/g2.jpg" alt="">
            <div class="view-more-btn">
                <a href="img/bg-img/g2.jpg" class="btn gallery-img">See More +</a>
            </div>
        </div>

        <div class="single-gallery-item">
            <img src="img/bg-img/g3.jpg" alt="">
            <div class="view-more-btn">
                <a href="img/bg-img/g3.jpg" class="btn gallery-img">See More +</a>
            </div>
        </div>

 
        <div class="single-gallery-item">
            <img src="img/bg-img/g4.jpg" alt="">
            <div class="view-more-btn">
                <a href="img/bg-img/g4.jpg" class="btn gallery-img">See More +</a>
            </div>
        </div>
    </div>-->
    <!-- ***** Gallery Area End ***** -->

    <!-- ***** Features Area Start ***** -->
    <div class="medilife-features-area section-padding-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <div class="features-content">
                        <!--<h2>A new way to treat pacients in a revolutionary facility</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing eli.Lorem ipsum dolor sit amet, consec tetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer.</p>
                        <a href="#" class="btn medilife-btn mt-50">View the services <span>+</span></a>-->
						<?php $sq=mysqli_query($link,"select * from home_content order by id desc");
						$r1=mysqli_fetch_array($sq);
						echo $r1['desc1'];?>
						
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="features-thumbnail">
                        <img src="upload/home_gallery/<?php echo $r1['image'];?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Features Area End ***** -->

    <!-- ***** Blog Area Start ***** -->
   <!-- <div class="medilife-blog-area section-padding-100-0">
        <div class="container">
            <div class="row">
             
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-blog-area mb-100">
                  
                        <div class="blog-post-thumbnail">
                            <img src="img/blog-img/1.jpg" alt="">
                       
                            <div class="post-date">
                                <a href="#">Jan 23, 2018</a>
                            </div>
                        </div>
                      
                        <div class="post-content">
                            <div class="post-author">
                                <a href="#"><img src="img/blog-img/p1.jpg" alt=""></a>
                            </div>
                            <a href="#" class="headline">New drog release soon</a>
                            <p>Dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
                            <a href="#" class="comments">3 Comments</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-blog-area mb-100">
                     
                        <div class="blog-post-thumbnail">
                            <img src="img/blog-img/2.jpg" alt="">
                          
                            <div class="post-date">
                                <a href="#">Jan 23, 2018</a>
                            </div>
                        </div>
                       
                        <div class="post-content">
                            <div class="post-author">
                                <a href="#"><img src="img/blog-img/p2.jpg" alt=""></a>
                            </div>
                            <a href="#" class="headline">Free dental care</a>
                            <p>Dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
                            <a href="#" class="comments">3 Comments</a>
                        </div>
                    </div>
                </div>
             
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-blog-area mb-100">
                     
                        <div class="blog-post-thumbnail">
                            <img src="img/blog-img/3.jpg" alt="">
                        
                            <div class="post-date">
                                <a href="#">Jan 23, 2018</a>
                            </div>
                        </div>
                      
                        <div class="post-content">
                            <div class="post-author">
                                <a href="#"><img src="img/blog-img/p3.jpg" alt=""></a>
                            </div>
                            <a href="#" class="headline">Good news for the pacients</a>
                            <p>Dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
                            <a href="#" class="comments">3 Comments</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <!-- ***** Blog Area End ***** -->

    <!-- ***** Emergency Area Start ***** -->
   
    <!-- ***** Emergency Area End ***** -->

    <!-- ***** Footer Area Start ***** -->
   
    <!-- ***** Footer Area End ***** -->
	
	
	
	

  <?php include("footer.php");?>

</body>

</html>