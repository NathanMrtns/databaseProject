<?php

session_start();

$sid = $_SESSION['sid'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$room = $_POST['room'];
$hallpos = $_POST['hallpos'];

require('connect_db.php');

$query = 'UPDATE resident
		SET first_name = ' . '"' . $fname . '"'
		. ', last_name = ' . '"' . $lname . '"'
		. ', email = ' . '"' . $email . '"'
		. ', room_number = ' . '"' . $room . '"'
		. ', hallgov_position = ' . '"' . $hallpos . '"'
		. ' WHERE studentID = ' . $sid;

	if(!($result = mysqli_query($dbc, $query)))
	{
	    print ("Coudnot execute query! <br/>");
	    die(mysql_error());
	} 

	mysqli_close($dbc);
	header( 'Location: residents.php' ) ;
    exit;
?>