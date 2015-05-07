<?php

session_start();

$sid = $_SESSION['sid'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$room = $_POST['room'];
$oldRoom = $_SESSION['oldRoom'];
$hallpos = $_POST['hallpos'];
$isRA = $_POST['ra'];
$raFloor = $_POST['rafloor'];

require('connect_db.php');
$query = 'UPDATE building_room
	SET occupied = false
	WHERE room_number="' . $oldRoom . '"';

	if(!($result = mysqli_query($dbc, $query)))
	{
	    print ("Coudnot execute query! 1<br/>");
	    die(mysql_error());
	} 
	if($isRA == 'yes'){
		$query = 'UPDATE resident
		SET first_name = ' . '"' . $fname . '"'
		. ', last_name = ' . '"' . $lname . '"'
		. ', email = ' . '"' . $email . '"'
		. ', room_number = ' . '"' . $room . '"'
		. ', hallgov_position = ' . '"' . $hallpos . '"'
		. ', isRA = true'
		. ', raFloor = ' . '"' . $raFloor . '"'
		. ' WHERE studentID = ' . $sid;
	}else{
		$query = 'UPDATE resident
		SET first_name = ' . '"' . $fname . '"'
		. ', last_name = ' . '"' . $lname . '"'
		. ', email = ' . '"' . $email . '"'
		. ', room_number = ' . '"' . $room . '"'
		. ', hallgov_position = ' . '"' . $hallpos . '"'
		. ', isRA = false '
		. ', raFloor = NULL'
		. ' WHERE studentID = ' . $sid;
	}

	echo $query;


	if(!($result = mysqli_query($dbc, $query)))
	{
	    print ("Coudnot execute query! <br/>");
	    die(mysql_error());
	}

	$query = 'UPDATE building_room
	SET occupied = true
	WHERE room_number="' . $room . '"';

	if(!($result = mysqli_query($dbc, $query)))
	{
	    print ("Coudnot execute query! <br/>");
	    die(mysql_error());
	} 

	mysqli_close($dbc);
	header( 'Location: residents.php' ) ;
    exit;
?>