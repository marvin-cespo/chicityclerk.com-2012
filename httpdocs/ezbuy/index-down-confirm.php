<?php

$fname 			=	$_POST['fname'];
$lname			=	$_POST['lname'];
$emailDowntime	=	$_POST['emailSubmit'];

$con = mysql_connect("clerkpress.chicityclerk.com", "admin18", "GtA+est!f^95");
		if (!$con) {
			die('Could not connect: ' . mysql_error());
		}
		
	mysql_select_db("clerkData", $con);
	
	$inputEmail = mysql_query(sprintf("INSERT INTO downtime (fname, lname, email, emailSent, time) VALUES ('%s', '%s', '%s', 0, UTC_TIMESTAMP())",
		mysql_real_escape_string($fname),
		mysql_real_escape_string($lname),
		mysql_real_escape_string($emailDowntime)));
		
		if (!$inputEmail) {
			echo "Could not update database." . " " . mysql_error();
		}
		
		else {
			header('Location: http://chicityclerk.com/ezbuy/index-email-list.html');
		}

?>
