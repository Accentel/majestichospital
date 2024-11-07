<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['name1'])
{

	$aname = $_SESSION['name1'];
	$lr_id=$_REQUEST['lr_id'];
	$cflag1="no";
	$cflag2="no";
	 
 ?>
<?php include('config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
	<?php
		include("header1.php");
	?>
<script language="javascript" type="text/javascript" src="js/actb.js"></script>
<script language="javascript" type="text/javascript" src="actb2.js"></script>
<script language="javascript" type="text/javascript" src="js/common.js"></script>

</head>

	<body>

	<div id="conteneur container">
		<?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
		<?php */?><?php
		include("logo.php");
			include("main_menu.php");
			?>
		   <div id="centre" class="table-responsive" style="height:auto; min-height:450px;">
          <h1 style="color:red;" align="center">SUPPLIER PAYMENT HISTORY</h1>
           <form name="form" autocomplete="off" method="post" action="salesentry_insert1.php">
		   <input type="hidden" name="authby" value="<?php echo $aname ?>"/>
<table id="t1" width="100%" class="table">
                  <tr>
                    <td align="center">
                      <table width="93%" class="ruler table" id="dataTable" summary="Table of my records" align="center" >
                          <thead>
                            <tr>
							 <th width="1" class="TH1">Sup Code</th>
                              <th class="TH1">Date</th>
                               <th class="TH1">Inv No</th>
                               <th class="TH1">Recpt No</th>
                              <th class="TH1">Total Amount</th>
                              <th class="TH1">Discount</th>
                              <th class="TH1">Paid Amount</th>
                              <th class="TH1">Balance Amount</th>
                              
                              
                            </tr>
                          </thead>
                          <tbody>
						  <?php
							$id=$_GET['id'];
							$inv=$_GET['inv'];
							$sp=$_GET['sup'];
							$sq=mysqli_query($link,"select * from sup_amount where LR_NO='$id'")or die(mysqli_error($link));
							while($r=mysqli_fetch_array($sq)){
							?>
                              <tr style="text-align:center;">
								<td><?php echo $s=$r['sup_code'];?></td>
                                <td><?php $d= $r['date1']; echo date('d-m-Y', strtotime($d));?></td>
                                <td><?php echo $inv;?></td>
                                 <td><?php echo $r['recpt_num'];?></td>
                                <td><?php echo $r['tamt'];?></td>
                                <td><?php echo $r['discount'];?></td>
                                <td><?php echo $r['paid'];?></td>
                                <td><?php echo $r['bal'];?></td>
                                
                                      </tr>
							  <?php }  ?>
                          </tbody>
                        </table>
                   </td>
                   </td>
                    
                    <td valign="top">&nbsp;</td>
                  </tr>
              </table></td>
            </tr>
            
  
                    <td ><div align="center">
					<input type="button" value="Close" onclick="window.location.href='edit_supplier_info1.php?id=<?php echo $sp?>'" class="butt"/></div></td>
                  </tr>
              </table></td>
            </tr>
          </table>
          <p><br>
          </p>
          </td>
      </tr>
      
    </table></td>
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

header('Location:login.php');

}

?>