 <footer class="footer-area section-padding-50" style="background-color: #4cc0cb !important;">
        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container-fluid">
                <div class="row">

                </div>
            </div>
        </div>
        <!-- Bottom Footer Area -->
        <div class="bottom-footer-area" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="bottom-footer-content">
                            <!-- Copywrite Text -->
                            <div class="copywrite-text" style="color:#020f20 !important;">
                                <p style="color:#020f20 !important"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Majestic Hospital developed by <a href="https://accentelsoft.com/" target="_blank" style="color:#006cff !important">Accentel Software Solutions Pvt.ltd</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
 
  
    
    
	<div class="modal fade ofload" id="myModal"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Doctor Appointment</h4>  <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
   
     <div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Patient Name:</label>
      <div class="col-sm-9">          
        <input type="text" class="form-control input-sm" required id="pname"  name="pname">
      </div>
    </div>
   
    <div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Mobile No:</label>
      <div class="col-sm-9">          
        <input type="text" class="form-control input-sm" required id="mno"  name="mno">
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Age:</label>
      <div class="col-sm-9">          
        <input type="text" class="form-control input-sm" id="age"  name="age">
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Gender:</label>
      <div class="col-sm-9">          
        <input type="radio"  id="sex"  name="sex" value="male">Male &nbsp;&nbsp;<input type="radio"  id="sex"  name="sex" value="female">Female
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-6" for="add">Address:</label>
      <div class="col-sm-9">          
        <textarea class="form-control input-sm" id="address"  name="address"></textarea>
      </div>
    </div>
	 <div class="form-group">
      <label class="control-label col-sm-3" requried for="pwd">Consult Doctor:</label>
      <div class="col-sm-9">          
        <select name="dname" id="dname"  onchange="showUser(this.value)">
            <option  value="">Select Doctor</option>
            <?php 
            $yt=mysqli_query($link,"select * from doctor") or die(mysqli_error($link));
            while($pp=mysqli_fetch_array($yt)){
            
            ?>
            <option  value="<?php echo $pp['id']; ?>"><?php echo $pp['name']; ?></option>
            
            <?php } ?>
            
        </select>
      </div>
    </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Available on:</label>
      <div class="col-sm-9">          
        <input type="text" class="form-control input-sm" id="available"  name="available">
      </div>
    </div>
    
  <div class="form-group">
      <label class="control-label col-sm-9" for="pwd">Appointment Date:</label>
      <div class="col-sm-6">          
        <input type="date" class="form-control input-sm" required id="apt_date"  name="apt_date">
        </div>
      </div>
       <div class="form-group">
      <label class="control-label col-sm-9" for="pwd">Appointment Time:</label>
      <div class="col-sm-9">          
        <input type="time" class="form-control input-sm" required id="apt_time"  name="apt_time">
      </div>
    </div>
  
    <div class="form-group">        
      <div class="col-sm-offset-6col-sm-9">
        <button type="submit" name="submit" class=""btn medilife-appoint-btn ml-30">Submit</button>
      </div>
    </div>
  </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
	
	
	<script src="js/jquery.min.js"></script>
 
	<?php /*if(isset($_POST['submit'])){
		$pname=$_POST['pname'];
		$mno=$_POST['mno'];
		$age=$_POST['age'];
		$sex=$_POST['sex'];
		$dname=$_POST['dname'];
		$address=$_POST['address'];
		$apt_date=$_POST['apt_date'];
		$sq=mysqli_query($link,"insert into appointment(name,mobile,gender,age,consult_doct,addr,appint_date)
		values('$pname','$mno','$sex','$age','$dname','$address','$apt_date')");
		if($sq){print "<script>";
			print "alert('Registerd Sucessfully ');";	
			print "self.location='home.php';";
			print "</script>";
		}
	}*/?>


		 <script>
   $(window).load(function(){
	  
                $('.onload').modal('show');
            });
   </script>
	  <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>