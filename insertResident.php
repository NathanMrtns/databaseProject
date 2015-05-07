<?php

session_start();

$sid = $_POST['sid'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$room = $_POST['room'];
$hallpos = $_POST['hallpos'];
$isRA = $_POST['ra'];
$raFloor = $_POST['rafloor'];

require('connect_db.php');

if($isRA == 'yes'){
	$query = 'insert into resident
		values('.$sid.',"'.$fname.'","'.$lname.'","'.$email.'","'.$room.'","'.$hallpos.'",true, '. $raFloor .')';
	}else{
		$query = 'insert into resident (studentID,first_name,last_name,email,room_number,hallgov_position)
		values('.$sid.',"'.$fname.'","'.$lname.'","'.$email.'","'.$room.'","'.$hallpos. '")';
	}

	echo $query;

	if(!($result = mysqli_query($dbc, $query)))
	{
	    print ("Coudnot execute query! <br/>");
	    die(mysql_error());
	} 

	$query = 'UPDATE building_room
	SET occupied = true,
		studentID = ' . $sid . '
	WHERE room_number="' . $room . '"';

	if(!($result = mysqli_query($dbc, $query)))
	{
	    print ("Coudnot execute query 2! <br/>");
	    die(mysql_error());
	} 

	mysqli_close($dbc);
	header( 'Location: residents.php' ) ;
    exit;
?>