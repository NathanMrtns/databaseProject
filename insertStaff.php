<?php

session_start();

$sid = $_POST['sid'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];

require('connect_db.php');
$query = 'insert into staff
		values('.$sid.',"'.$fname.'","'.$lname.'","'. $address .'")';

echo $query;

	if(!($result = mysqli_query($dbc, $query)))
	{
	    print ("Could not execute query! <br/>");
	    die(mysql_error());
	} 

	mysqli_close($dbc);
	header( 'Location: staff.php' ) ;
    exit;
?>