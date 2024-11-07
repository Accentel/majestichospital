<?php 
include('connection.php');
echo $id=$_GET['id'];
//exit;
$u=mysqli_query($link,"select * from carrer where id='$id'") or die(mysqli_error($link));
$u1=mysqli_fetch_array($u);
$name=$u1['name'];
$email=$u1['email'];
$mobile=$u1['mobile'];
$resume=$u1['resume'];

$from="info@accentelsoft.com";
$to ='kolliparasrinu.srinu@gmail.com'.',';
 $to .='arifansari.aaru@gmail.com';
 //$to;
 
$subject = "Resume From Website";

$separator = md5(time());

// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;

// attachment namezz


// main header
$headers  = "From: ".$from.$eol;
$headers .= "MIME-Version: 1.0".$eol; 
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";

// no more headers after this, we start the body! //

$message = "<p>Dear Sir/Madam,</p></br><p>
Greeting from our side!</p></br>
<p>Please find the attached  Invoice with DSC</p></br>
<table border=1 ><tr><td>Name: $name</td></tr>
<tr><td>Email: $email</td></tr>
<tr><td>Mobile No           : $mobile</td></tr>
</table></br></br>
<p>Thanks and Regards</p></br>
";
$body = "--".$separator.$eol;
$body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;

// message
$body .= "--".$separator.$eol;
$body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$body .= $message.$eol;

// attachment

  $doc="upload/resume/".$resume;


$attachment = chunk_split(base64_encode($doc));
$body .= "--".$separator.$eol;
$body .= "Content-Type: application/msword; name=\"".$doc."\"".$eol; 
$body .= "Content-Transfer-Encoding: base64".$eol;
$body .= "Content-Disposition: attachment".$eol.$eol;
$body .= $attachment.$eol;

$body .= "--".$separator."--";
// send message
if (mail($to, $subject, $body, $headers)) {
    echo '<script language="javascript">';
echo 'alert("mail successfully sent")';
echo '</script>';
	print "<script>";
	print "self.location='carriers.php';";
	print "</script>";
} else {
echo "mail send ... ERROR";
}


?>
