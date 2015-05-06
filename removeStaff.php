<?php

session_start();

$sid = $_GET['sid'];

echo $sid;

require('connect_db.php');

$query = 'DELETE FROM staff
		WHERE staffID = '. $sid;

	if(!($result = mysqli_query($dbc, $query)))
	{
	    print ("Could not execute query! <br/>");
	    die(mysql_error());
	} 

	mysqli_close($dbc);
	header( 'Location: staff.php' ) ;
    exit;
?>