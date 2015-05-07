<?php

session_start();

$sid = $_SESSION['sid'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];

require('connect_db.php');

$query = 'UPDATE staff
		SET first_name = ' . '"' . $fname . '"'
		. ', last_name = ' . '"' . $lname . '"'
		. ', address = '. '"' . $address . '"'
		. ' WHERE staffID = ' . $sid;

	if(!($result = mysqli_query($dbc, $query)))
	{
	    print ("Could not execute query! <br/>");
	    die(mysql_error());
	} 

	mysqli_close($dbc);
	header( 'Location: staff.php' ) ;
    exit;
?>