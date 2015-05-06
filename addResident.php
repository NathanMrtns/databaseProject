
<?php
session_start();

include('header.html');

?>

<body>
    <form class="navbar-form navbar" action="addResident.php">
        <div class="alert alert-info">
            <h4>
                Resident info
            </h4>
        </div>
        <div class="form-group">
            First Name: <input type="text" class="form-control" name="fname" placeholder="First Name">
        </div>
        <br>
        <div class="form-group">
            Last Name: <input type="text" class="form-control" name="lname" placeholder="Last Name">
        </div>
        <br>
        <div class="form-group">
            Email: <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <br>
        <div class="form-group">
            Room: <input type="number" class="form-control" name="room" placeholder="Room Number">
        </div>
        <br>
        <div class="input-group">
            RA: <input type="radio" name="ra" value="yes"> Yes <input type="radio" name="ra" value="no"> No
        </div>
        <!--
        <div class="form-group">
            RA in what floor: <input type="number" class="form-control" name="rafloor" placeholder="Search resident">
        </div>
        -->
        <br>
        <div class="form-group">
            Hall Gov Position: 
            <span> 
                <select class="form-control" name="hallpos">
                    <option value""></option>
                    <option value="president">President</option>
                    <option value="vice_president">Vice President</option>
                    <option value="floorRep">Floor Representative</option>
                     <option value="secretary">Secretary</option>
                </select>
            </span>
        </div>
        <br><br>
        <button type="submit" class="btn btn-success">Add Resident</button>
    </form>

<?php

if (isset($_POST['search']) && isset($_POST['searchby'])) {
    $_SESSION['search'] = $_POST['search'];
    $_SESSION['searchby'] = $_POST['searchby'];

	//connect to MySQL (host, user_name, password)
	require('connect_db.php');
	
	$query = 'select room.room_number, capacity, description, room_type, price, start_date, end_date
			from room
			left join reservation on room.room_number = reservation.room_number
			where capacity = ' . "'" . $_SESSION['capacity'] . "' and room_type = '" . $_SESSION['rtype'] . "'";

	if(!($result = mysqli_query($dbc, $query)))
	{
	    print ("Coudnot execute query! <br/>");
	    die(mysql_error());
	}

	print '<div class="panel panel-default">';
    	print '<div class="panel-heading">Search Results</div>';
			print "<table class='table'>";
				while($row = mysqli_fetch_array($result)){
                    //echo '<tr><td rowspan="7"><img src="' . $img . '" class="img-rounded" width="350" height="250"/></td></tr>'
			    	//filterByDates($row, $stDateFieldSQL, $endDateFieldSQL);      	
			    }
			print"</table>";
		print "</div>";
	print "</div>";

	mysqli_close($dbc);
    exit;

}else{

    require('connect_db.php');
    
    $query = 'select * from resident';

    if(!($result = mysqli_query($dbc, $query)))
    {
        print ("Coudnot execute query! <br/>");
        die(mysql_error());
    }

    print '<div class="panel panel-default">';
        print '<div class="panel-heading">Search Results</div>';
            print "<table class='table'>";
            print "<tr><td>Student ID</td><td>First Name</td><td>Last Name</td><td>Room</td>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr><td>" . $row['studentID'] . "</td><td> " . $row['first_name'] . "</td><td> " . $row['last_name'] . "</td><td> "
                                          . $row['room_number'] . "</td></tr> ";
                    //echo '<tr><td rowspan="7"><img src="' . $img . '" class="img-rounded" width="350" height="250"/></td></tr>'
                    //filterByDates($row, $stDateFieldSQL, $endDateFieldSQL);       
                }
            print"</table>";
        print "</div>";
    print "</div>";

    mysqli_close($dbc);
    exit;

    if(isset($_SESSION['search']) && isset($_SESSION['searchby'])) {
        unset($_SESSION['search']);
        unset($_SESSION['searchby']);
        print "";
	}
}


?>
</body>

</html>
