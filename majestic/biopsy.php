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
	$("#bno").autocomplete("set6.php", {
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
function showHint(str)
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
	//alert(strar);
	document.getElementById("bdate").value=strar[1];
	document.getElementById("pname").value=strar[2];	
	document.getElementById("age").value=strar[3];
    document.getElementById("gender").value=strar[4];
	document.getElementById("dname").value=strar[5];
	
    }
  }
xmlhttp.open("GET","search.php?q="+str,true);
xmlhttp.send();
}
</script>	
	</head>

	<body>

  
	<div id="conteneur">

		 
			
			  <?php
			  include("logo.php");
				include("main_menu.php");
			  ?>
			   
		<div id="centre" style="height:auto;">
		
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Biopsy Report</div>
		  <form name="frm" method="post" action="insert_biopsy.php">
			<table width="100%" border="0" cellpadding="4" cellspacing="0">
                                
                    <tr >
                        <td align="right" >Bill No. :</td>
                        <td align="left" >
                            <input type="text" name="bno" id="bno"  class="text" onfocus="showHint(this.value)" />
                        </td>
						 <td align="right" >Bill Date :</td>
                        <td align="left" >
                            <input type="text" name="bdate" id="bdate" style="width:188px;height:20px;" value="<?php echo date('d-m-Y') ?>" readonly class="tcal"/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Patient Name :</td>
                        <td align="left" >
                            <input type="text" name="pname" id="pname" class="text" readonly />
                        </td>
						 <td align="right" >Age :</td>
                        <td align="left" >
                            <input type="text" name="age" id="age" class="text" readonly />
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Gender :</td>
                        <td align="left" >
                            <input type="text" name="gender" id="gender" class="text" readonly />
								
                        </td>
						 <td align="right" >Doctor Name :</td>
                        <td align="left" >
                            <input type="text" name="dname" id="dname" class="text" readonly />
							
                        </td>
                    </tr>
                     <tr >
                        <td align="right" >Biopsy No. :</td>
                        <td align="left" >
                            <input type="text" name="biono" id="biono" class="text"/>
								
                        </td>
					 </tr>
					<tr>					 
						 <td align="right" >Clinical Diagnosis :</td>
                        <td align="left" colspan="3">
                            <textarea name="cdiag" id="cdiag" cols="120" rows="4"></textarea>
							
                        </td>
                    </tr>
					<tr>					 
						 <td align="right" >Specimen :</td>
                        <td align="left" colspan="3">
                            <textarea name="spec" id="spec" cols="120" rows="4"></textarea>
							
                        </td>
                    </tr>
					<tr>					 
						 <td align="right" >Gross :</td>
                        <td align="left" colspan="3">
                            <textarea name="gross" id="gross" cols="120" rows="4"></textarea>
							
                        </td>
                    </tr>
					<tr>					 
						 <td align="right" >Micro :</td>
                        <td align="left" colspan="3">
                            <textarea name="micro" id="micro" cols="120" rows="4"></textarea>
							
                        </td>
                    </tr>
					<tr>					 
						 <td align="right" >Impression :</td>
                        <td align="left" colspan="3">
                            <textarea name="impre" id="impre" cols="120" rows="4"></textarea>
							
                        </td>
                    </tr>
					<tr>					 
						 <td align="right" >Note :</td>
                        <td align="left" colspan="3">
                            <textarea name="note" id="note" cols="120" rows="4"></textarea>
							
                        </td>
                    </tr>
           
        </table>
		 <div align="center"><input type="submit" name="submit" value="Save" Class="butt"/> <input type="button" value="Close" Class="butt" onclick="window.location.href='home.php'"/></div>
        
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

header('Location:index.php?authentication failed');

}

?>