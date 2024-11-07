
<?php
$k=4;
include("connection.php");
 include("header.php");?>
 
 	<script>
 	function doubleZeros(number)
 	{
 	  if(number<10)
 	  {
 	      number="0"+number;
 	  }
 	  return number;
 	}
 	function getTimes(from, until){
            //"01/01/2001" is just an arbitrary date
            var until = Date.parse("01/01/2001 " + until);
            var from = Date.parse("01/01/2001 " + from);
           
            //*2 because because we want every 30 minutes instead of every hour
            var max = (Math.abs(until-from) / (60*60*1000))*4;
            var time = new Date(from);
            var hours = [];
            for(var i = 0; i <= max; i++){
                //doubleZeros just adds a zero in front of the value if it's smaller than 10.
                var hour = this.doubleZeros(time.getHours());
                var minute = this.doubleZeros(time.getMinutes());
                hours.push(hour+":"+minute);
                time.setMinutes(time.getMinutes()+15);
            }
            
            return hours;
}
 	function showTime(str)
 	{
 	    document.getElementById("timeslots").innerHTML = "";
 	    var arrayOfWeekdays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]
 	    const d = new Date(str);
 	    var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = mm + '/' + dd + '/' + yyyy;
today=new Date(today);
       let day = d.getDay();
       var weekdayName = arrayOfWeekdays[day];
       var docname=document.getElementById("doctorname").value;
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
	var strar1=show.split("###");
	var bookedslots = strar1[1].split("$$$");
	
	var strar=strar1[0].split("##");
	
	for(k=0;strar.length;k++)
	{
    var time=strar[k].split("#")
	var timeslotss=getTimes(time[0],time[1]);
	var currentdate = new Date();

d.setHours(0,0,0,0);
today.setHours(0,0,0,0);
	for(i=0;i<timeslotss.length;i++)
	{
	    var currenttimeslot = timeslotss[i]+":00";
	    var checkv = bookedslots.indexOf(currenttimeslot);
	   
	    var checkdate=new Date("01/01/2001 " + timeslotss[i]);
	    var curdate = new Date("01/01/2001 " + currentdate.getHours() + ":"  
                + currentdate.getMinutes());
              
                if((curdate.getTime()<checkdate.getTime() && checkv==-1) || (d>today && checkv==-1))
                {
	    
//	$('#timeslots').append($("<div style='height:30px;width:60px;float:left;padding:10px;border: solid green;margin:10px'><input  type='radio' id='minuteslot"+timeslotss[i] +"' name='minuteslot' value='"+ timeslotss[i] +"'><label for='minuteslot"+timeslotss[i]+"'>" + timeslotss[i] + "</label> </div>"));
	 $('#timeslots')
            .append(`<input type="radio" id="${timeslotss[i]}" name="contact" value="${timeslotss[i]}"><label style="height:30px;width:60px;padding:10px;border: solid green;margin:10px" for="${timeslotss[i]}"> ${ timeslotss[i]}</label></div>`);
        }
                
                else
                 $('#timeslots')
            .append(`<label style="height:30px;width:60px;padding:10px;border: solid red;margin:10px" for="${timeslotss[i]}"> ${ timeslotss[i]}</label></div>`);
               // $('#timeslots').append($("<div style='height:30px;width:60px;float:left;padding:10px;border: solid red;margin:10px'>" + timeslotss[i] + " </div>"));
                }
	//document.getElementById("token1").value=strar[1];
	//document.getElementById("desc").value=strar[1];
	}
    }	
  }
xmlhttp.open("GET","searchtime.php?q="+docname+"&days="+weekdayName+"&cdate="+str,true);
xmlhttp.send();  
 	  
 	}
function showHint(str)
{
   
var apt_type=str;

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
	var strar=show.split("#");
	//document.getElementById("token1").value=strar[1];
	document.getElementById("desc").value=strar[1];
	}
  }
xmlhttp.open("GET","search.php?q="+str,true);
xmlhttp.send();
}
</script>

   
    <!-- ***** Breadcumb Area End ***** -->

    <section class="medilife-contact-area section-padding-100">
        <div style="margin-top :70px;"></div>
        <div class="container">
            <div class="row">
                <!-- Contact Form Area -->
                <div class="col-12 col-lg-12">
                    <div class="contact-form">
                        <h1 class="row h-100 align-items-center">Doctor Appointment</h1>

                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
   
     <div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Patient Name:</label>
      <div class="col-sm-9">          
        <input type="text" class="form-control input-sm" required id="pname"  name="pname">
      </div>
    </div>
   
    <div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Mobile No:</label>
      <div class="col-sm-6">          
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
	                                            <label class="control-label col-sm-6" for="Dr">Consult Doct Name</label>
  <div class="col-sm-9">
 <input id="doctorname" list="doctorslist" name="dname" class="form-control" required    onChange="showHint(this.value)" >
  <datalist id="doctorslist">
 <?php 
            $yt=mysqli_query($link,"select * from doctor") or die(mysqli_error($link));
            while($pp=mysqli_fetch_array($yt)){
            
            ?>
            <option  value="<?php echo $pp['name']; ?>">
            
            <?php } ?>
  </datalist>
  </div>
</div>
    <div class="form-group">
      <label class="control-label col-sm-12" for="pwd">Available on:</label>
      <div class="col-sm-9">          
        <input type="text" readonly class="form-control input-sm" id="desc"  name="desc">
      </div>
    </div>
    
  <div class="form-group">
      <label class="control-label col-sm-9" for="pwd">Appointment Date:</label>
      <div class="col-sm-6">          
        <input type="date"  class="form-control input-sm" required id="apt_date"  name="apt_date" onChange="showTime(this.value)">
        </div>
      </div>
       <div class="form-group" style="position:relative">
      <label class="control-label col-sm-9" for="pwd">Appointment Time:</label>
      <div class="col-sm-12" id='timeslots'>          
       
      </div>
    </div>
  
    <div class="form-group" style="position:relative">        
      <div class="col-sm-offset-6col-sm-9">
        <button type="submit" name="submit"  class="btn medilife-appoint-btn ml-30">Submit</button>
      </div>
    </div>
  </form>
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
	

       
            
           
     

	 
						

	
	<?php 
		 if(isset($_POST['submit'])){
		$pname=$_POST['pname'];
		$mno=$_POST['mno'];
		$age=$_POST['age'];
		$sex=$_POST['sex'];
		$dname=$_POST['dname'];
		$address=$_POST['address'];
		$apt_date=$_POST['apt_date'];
		$timeslot=$_POST['contact'];
		$sq=mysqli_query($link,"insert into appointment(name,mobile,gender,age,consult_doct,addr,appint_date,appint_time)
		values('$pname','$mno','$sex','$age','$dname','$address','$apt_date','$timeslot')");
		if($sq){print "<script>";
			print "alert('Thank you for Booking Appointment with us. ');";	
			print "self.location='home.php';";
			print "</script>";
		}
	}

	
	/*if(isset($_POST['submit1'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$message=$_POST['message'];
		$sq=mysqli_query($link,"insert into contact_list(name,email,msg)values('$name','$email','$message')");
		
		
		$tt =$_POST['email'];
 $frmail="majestic.hospital@yahoo.com";
 

	  $to = "$tt".",";
	  $to.=$frmail;
	$subject = "Majestic Hospital";
   $header = "From:$frmail \r\n";
   $header .= "TO:$to \r\n";

   $header .= "MIME-Version: 1.0\r\n";
   $header .= "Content-type: text/html\r\n";
     
   $message = '<html><body>';
		
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
			print "alert('Thank you for Booking Appointment with us. ');";
			print "self.location='index.html';";
			print "</script>";
	} else {
		print "<script>";
			print "alert('Unable To Book Appointment');";
			print "self.location='index.html';";
			print "</script>";
		
	}
		
	}*/?>

    <!-- ***** CTA Area Start ***** -->
    
	<?php include("footer.php");?>
	