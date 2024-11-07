<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['name1'])
{

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header.php");
		?>
<script type="text/javascript" src="js/jquery.1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
     <script>
$().ready(function() {
	$("#refdoct").autocomplete("set66.php", {
		width: 150,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});

});
</script>
<script>

function showHint52(str)
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
	//document.getElementById("supname").value=strar[2];
	
	document.getElementById("docname").value=strar[1];
	}
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search56777.php?q="+str,true);
xmlhttp.send();
}


</script>
<script>
function reportxx(){
	var fdate = document.getElementById("fdate").value;
	var tdate = document.getElementById("tdate").value;
	var ptype = document.getElementById("ptype").value;
	var refdoct = document.getElementById("refdoct").value;
	window.open('refdoctamount_collection.php?sdate='+fdate+'&edate='+tdate+'&ptype='+ptype+'&refdoct='+refdoct,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
}
</script>	
	</head>

	<body>

	<div id="conteneur">

		  
			
			  <?php
			  include("logo.php");
				include("main_menu.php");
			  ?>
			           
                              
			<div id="centre" >
					<div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Referal Doctors Amount Report</div>
                <form method="get" name="myform"  target="new">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                
				</tr>
                <tr>
                    <td colspan="2" align="center">
                        <table width="100%" cellpadding="4" cellspacing="0">
						 <tr >
                        <td width="40%" align="right" >From Date :</td>
                        <td align="left">
                            <input name="fdate" type="text" class="tcal " id="fdate" value="<?php echo date('d-m-Y')?>"/>	
					   </td>
                       </tr>		
						  <tr height="20">
                       
                    </tr>
					<tr >
                        <td align="right" > To Date :</td>
                        <td align="left">
                            <input name="tdate" type="text" class="tcal " id="tdate" value="<?php echo date('d-m-Y')?>"/>
                        </td>
                    </tr>
                       
                    </td>
                </tr>
                 </tr>		
						  <tr height="20">
                       
                    </tr>
                     <tr >
                        <td align="right" > Referal Doctor :</td>
                        <td align="left">
                            <input type="text"  name="refdoct" id="refdoct" class="text" onfocus="showHint52(this.value);"/>
                            
                        </td>
                    </tr>
                    <tr >
                        <td align="right" > Doctor Name :</td>
                        <td align="left">
                            <input type="text"  name="docname" id="docname" class="text"/>
                            
                        </td>
                    </tr>
                     </tr>		
						  <tr height="20">
                       
                    </tr>
               <tr >
                        <td align="right" > Patient Type :</td>
                        <td align="left">
                            <select name="ptype" id="ptype">
                            <option value="">Select Patient Type</option>
                            <option value="OPP">OP Patients</option>
                            <option value="IPP">IP Patients</option>
                            <option value="OPL">OP Lab</option>
                            <option value="IPL">IP Lab</option>
                            </select>
                        </td>
                    </tr>
                        </table>
                    </td>
                </tr>
                <tr><td height="20px;"></td></tr>
                <tr>
                    <td align="center">
                        <input type="button" name="submit" class="butt" value="Report" onclick="javascript:reportxx()"/>&nbsp;&nbsp;&nbsp;&nbsp;
                        
						<input type="button" class="butt" value="Close" onclick="window.location.href='home.php'"/>
                    </td>
                </tr>
            </table>
              </form>
				</div>

		<?php include('footer.php'); ?>

	</div>

	</body>

</html>

<?php 

}else
{
session_destroy();

session_unset();

header('Location:login.php?authentication failed');

}

?>