<div class="modal fade onload" id="myModal"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        
          <h4 class="modal-title">Doctor Appointment</h4>  <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         
          <form class="form-horizontal"  method="post" enctype="multipart/form-data">
   
    
    <div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Patient Name:</label>
      <div class="col-sm-9">          
        <input type="text" class="form-control input-sm" id="pname"  name="pname">
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Mobile No:</label>
      <div class="col-sm-9">          
        <input type="text" class="form-control input-sm" id="mno"  name="mno">
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
      <label class="control-label col-sm-3" for="pwd">Consult Doctor:</label>
      <div class="col-sm-9">          
        <input type="radio"  id="dname"  name="dname" value="Dr. Rajesh Soni">Dr. Rajesh Soni &nbsp;&nbsp;
		<input type="radio"  id="dname"  name="dname" value="Dr. Rajshri Soni">Dr. Rajshri Soni
      </div>
    </div>
	
	
	
    
    <div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Addresss:</label>
      <div class="col-sm-9">          
        <textarea  class="form-control " id="address"  name="address"></textarea>
      </div>
    </div>
     
    <div class="form-group">        
      <div class="col-sm-offset-3 col-sm-9">
        <button type="submit" name="submit1" class="btn btn-default">Submit</button>
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
  
	<?php if(isset($_POST['submit1'])){
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
	}?>