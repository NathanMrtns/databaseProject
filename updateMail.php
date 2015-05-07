<?php
session_start();

//connect to MySQL (host, user_name, password)
require('connect_db.php');
if(isset($_GET['sid'])){
    $_SESSION['sid'] = $_GET['sid']; 
    $query = 'select * from building_room where room_number = "' . $_GET['sid'] . '"';
    if(!($result = mysqli_query($dbc, $query)))
    {
        print ("Could not execute query! <br/>");
        die(mysql_error());
    }
	$room_number;
	$hasMail;
	$occupied;
    while($row = mysqli_fetch_array($result)){
		$room_number = $row['room_number'];
		$hasMail = !$row['hasMail'];
		$occupied = $row['occupied'];
    }
}


$query = 'UPDATE building_room
		SET room_number = ' . '"' . $room_number . '"'
		. ', hasMail = ' . '"' . $hasMail . '"'
		. ', occupied = ' . '"' . $occupied . '"'
		. ' WHERE room_number = "' . $_GET['sid'] . '"';

	if(!($result = mysqli_query($dbc, $query)))
	{
	    print ("Coudnot execute query! <br/>");
	    die(mysql_error());
	} 


$query = 'select * from resident
where studentID in (select studentID from building_room where room_number = ' . $room_number;

if(!($result = mysqli_query($dbc, $query)))
	{
	    print ("Coudnot execute query! <br/>");
	    die(mysql_error());
	} 
	
while($row = mysqli_fetch_array($result)){
	if ($hasMail==true){
		$to = $row['email'];
	    $subject = "New Package";
	    $message = "Dear" . " " . $row['first_name'] . " " . $row['last_name']
	        . ", you have a new package." ;
	    $from = "hallgov@email.com";
	    $headers = "From: Your Hall";

	    error_log(@mail($to, $subject, $message, $headers));
	    @mail($to, $subject, $message, $headers);
	}
}


	mysqli_close($dbc);
	header( 'Location: rooms.php' ) ;
    exit;

?>