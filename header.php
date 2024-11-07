<?php include("connection.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Majestic Hospital</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/mmlogo.png">

    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">
 <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/bootstrap.min.css">
      <script>
function showUser(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	document.getElementById("available").value=strar[1];
	
  }
xmlhttp.open("GET","set101.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="medilife-load"></div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <!-- Top Header Area -->
       <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="h-100 d-md-flex justify-content-between align-items-center">
                      
                           
							 <a href="appointment.php" class="btn medilife-appoint-btn ml-30" 
							 >For <span>Appointment</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Header Area -->
        <div class="main-header-area" id="stickyHeader" style="background-color:#4cc0cb !important;">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 h-100">
                        <div class="main-menu h-100">
                            <nav class="navbar h-100 navbar-expand-lg">
                                <!-- Logo Area  -->
                                <a class="navbar-brand" href="index.php"><img src="img/mlogo.jpg" alt="Logo"></a>

                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#medilifeMenu" aria-controls="medilifeMenu" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                                <div class="collapse navbar-collapse" id="medilifeMenu">
                                    <!-- Menu Area -->
                                    <ul class="navbar-nav ml-auto">
                                       <?php if($k=='1'){?>  <li class="nav-item active">
                                            <a class="nav-link" href="home.php"  >Home <span class="sr-only">(current)</span></a>
                                        </li>
									   <?php } else {?> 
										<li class="nav-item ">
                                            <a class="nav-link" href="home.php">Home </a>
									   </li><?php }?>
                                    
										 
                                        <?php if($k=='2'){?>  
										<li class="nav-item dropdown active">
										     <a class="nav-link" href="about.php">About Us</a>
										
                                        
                                        </li><?php } else {?>
										
										<li class="nav-item dropdown">
										     <a class="nav-link" href="about.php">About Us</a>
										
                                        </li><?php }?>
                                     

									   <?php if($k=='3'){?>
									   
									   	<li class="nav-item dropdown active">
										 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
											data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Our Specialists</a>
                                           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                               <?php
                                               $yt=mysqli_query($link,"select * from smenu");
                                               while($yt1=mysqli_fetch_array($yt)){
                                               
                                               ?>
                                                <a class="dropdown-item" href="specialist.php?id=<?php echo $yt1['id'] ?>&name=<?php echo $yt1['name'] ?>"><?php echo ($yt1['name']) ?></a>
                                                
                                                <?php }?>
												
                                               
                                               
                                            </div>
                                        </li><?php } else {?>
										
										<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
											data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Our Specialists</a>
                                           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                               <?php
                                               $yt=mysqli_query($link,"select * from smenu");
                                               while($yt1=mysqli_fetch_array($yt)){
                                               
                                               ?>
                                                <a class="dropdown-item" href="specialist.php?id=<?php echo $yt1['id'] ?>&name=<?php echo $yt1['name'] ?>"><?php echo $yt1['name'] ?></a>
                                                
                                                <?php }?>
                                              
                                            </div>
                                        </li><?php }?>
									   
									   
									   <?php if($k=='6'){?><li class="nav-item active">
                                            <a class="nav-link" href="gallery.php">Gallery</a>
                                        </li>
									   <?php } else{?>
										<li class="nav-item">	
                                            <a class="nav-link" href="gallery.php">Gallery</a>
									   </li><?php }?>
									  
									   
									    
									   
									    <?php if($k=='7'){?><li class="nav-item active">
                                            <a class="nav-link" href="carriers.php">Carriers</a>
                                        </li>
									   <?php } else{?>
										<li class="nav-item">
                                            <a class="nav-link" href="carriers.php">Carriers</a>
									   </li><?php }?>
									   
                                       <!-- <li class="nav-item">
                                            <a class="nav-link" href="blog.html">News</a>
                                        </li>-->
                                      <?php if($k=='4'){?>  <li class="nav-item active">
                                            <a class="nav-link" href="contact.php">Contact</a>
									  </li><?php } else {?>
										<li class="nav-item">
                                            <a class="nav-link" href="contact.php">Contact</a>
									  </li><?php }?>
									  <li class="nav-item">
                                            <a class="nav-link" href="majestic/index.php" target="new">Login</a>
									  </li>
									  
                                    </ul>
                                    <!-- Appointment Button -->
                                   
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
	
