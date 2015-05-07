
<?php
session_start();

include('header.html');

?>

<body>

<?php

	//connect to MySQL (host, user_name, password)
	require('connect_db.php');
    $query = 'select * from building_room';

	if(!($result = mysqli_query($dbc, $query)))
	{
	    print ("Could not execute query! <br/>");
	    die(mysql_error());
	} 

	print '<div class="panel panel-default">';
    	print '<div class="panel-heading">List of Rooms</div>';
			print "<table class='table'>";
            if(mysqli_num_rows($result)==0){
                echo "<tr><td> No Results were found </td></td>";
            }else{
                 print "<tr><th>Room Number</th><th>Has Mail?</th><th>Occupied</th>";
                while($row = mysqli_fetch_array($result)){
                    if(($row['hasMail']==1) && ($row['occupied']==1)){
                        echo "<tr><td>" . $row['room_number'] . "</td><td> Yes </td><td> Yes </td><td><a href=updateMail.php?sid=" . $row['room_number'].">Mail was picked up</a></td></tr> ";
                    }else if(($row['hasMail']==0) && ($row['occupied']==1)){
                        echo "<tr><td>" . $row['room_number'] . "</td><td> No </td><td> Yes </td><td><a href=updateMail.php?sid=" . $row['room_number'].">Mail has arrived</a></td></tr> ";
                    }else if(($row['hasMail']==0) && ($row['occupied']==0)){
                        echo "<tr><td>" . $row['room_number'] . "</td><td> No </td><td> No </td><td></td></tr> ";
                    }else if(($row['hasMail']==1) && ($row['occupied']==0)){
                        echo "<tr><td>" . $row['room_number'] . "</td><td> Yes </td><td> No </td><td></td></tr> ";
                    }
                }
            }
			print"</table>";
		print "</div>";
	print "</div>";
	mysqli_close($dbc);
    exit;

?>


</body>

</html>