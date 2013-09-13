<?php 

$con = mysql_connect( "clerkpress.chicityclerk.com", "admin18", "GtA+est!f^95" );

	if( !$con ) :
		die( 'Could not connect: ' . mysql_error() );
	endif;
	
	mysql_select_db("clerkData", $con);
	
?>