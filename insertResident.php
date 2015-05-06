<?php

session_start();

$sid = $_POST['sid'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$room = $_POST['room'];
$hallpos = $_POST['hallpos'];

require('connect_db.php');
$query = 'insert into resident
		values('.$sid.',"'.$fname.'","'.$lname.'","'.$email.'","'.$room.'","'.$hallpos.'")';

echo $query;

	if(!($result = mysqli_query($dbc, $query)))
	{
	    print ("Coudnot execute query! <br/>");
	    die(mysql_error());
	} 

	mysqli_close($dbc);
	header( 'Location: residents.php' ) ;
    exit;
?>