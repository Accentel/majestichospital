<html>
   
   <head>
      <title>Sending HTML email using PHP</title>
   </head>
   
   <body>
      
      <?php
         $to = "sam241997@gmail.com";
         $subject = "This is subject";
         $message = '<html><body>';
			$message .= '<img src="http://majestichospital.com/majestic/images/logo  Final.jpg" />';
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
			$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>$pname</td></tr>";
			$message .= "<tr><td><strong>Age:</strong> </td><td>age</td></tr>";
	    	$message .= "<tr><td><strong>Mobile:</strong> </td><td>mno</td></tr>";
	    	$message .= "<tr><td><strong>Gender:</strong> </td><td>sex</td></tr>";
	    	$message .= "<tr><td><strong>Address:</strong> </td><td>address</td></tr>";
	    	$message .= "<tr><td><strong>Doctor:</strong> </td><td>doc</td></tr>";
	    	$message .= "<tr><td><strong>date & Time:</strong> </td><td>tyu</td></tr>";
	    	$message .= "</table>";
			$message .= "</body>";
         
         
         $header = "From:abc@somedomain.com \r\n";
         $header .= "Cc:afgh@somedomain.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
      ?>
      
   </body>
</html>