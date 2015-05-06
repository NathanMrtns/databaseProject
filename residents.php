
<?php
session_start();

include('header.html');

?>
<script type="text/javascript">
$(document).ready(function() {

    document.getElementById("add").onclick = function () {
        window.location.replace("addResident.php");
    };

});
</script>

<body>

    <form class="navbar-form navbar" method="post">
        <div class="alert alert-info">
            <h4>
                Find a Resident
            </h4>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="search" placeholder="Search resident">
        </div> By:
        <div class="form-group">
            <span> 
                <select class="form-control" name="searchby">
                    <option value""></option>
                    <option value="studentID">ID</option>
                    <option value="first_name">First Name</option>
                    <option value="last_name">Last Name</option>
                    <option value="room_number">Room</option>
                </select>
            </span>
        </div>
        <button type="submit" class="btn btn-default">Search</button>
    </form>

<?php

if (isset($_POST['search']) && isset($_POST['searchby'])) {
    $_SESSION['search'] = $_POST['search'];
    $_SESSION['searchby'] = $_POST['searchby'];

	//connect to MySQL (host, user_name, password)
	require('connect_db.php');
    if(($_SESSION['searchby']=="") || ($_SESSION['search']=="")) {
        $query = 'select * from resident';
    }
    else{
            $query = 'select * from resident where ' . $_SESSION['searchby'] . '=' . "'" . $_SESSION['search'] . "'"; 
    }

	if(!($result = mysqli_query($dbc, $query)))
	{
	    print ("Coudnot execute query! <br/>");
	    die(mysql_error());
	} 

	print '<div class="panel panel-default">';
    	print '<div class="panel-heading">Search Results</div>';
			print "<table class='table'>";
            if(mysqli_num_rows($result)==0){
                echo "<tr><td> No Results were found </td></td>";
            }else{
                 print "<tr><th>Student ID</th><th>First Name</th><th>Last Name</th><th>Room</th>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr><td>" . $row['studentID'] . "</td><td> " . $row['first_name'] . "</td><td> " . $row['last_name'] . "</td><td> "
                                          . $row['room_number'] . "</td><td><a href=editResident.php?sid=" . $row['studentID'].">Edit Resident</a></td></tr> ";
                }
            }
			print"</table>";
		print "</div>";
	print "</div>";
    print '        <div class="pull-right">
            <button class="btn btn-success" onclick="redirect()" id="add">Add a new resident</button>
        </div>';
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
        print '<div class="panel-heading">List of Residents</div>';
            print "<table class='table'>";
            print "<tr><th>Student ID</th><th>First Name</th><th>Last Name</th><th>Room</th>";
                while($row = mysqli_fetch_array($result)){
                echo "<tr><td>" . $row['studentID'] . "</td><td> " . $row['first_name'] . "</td><td> " . $row['last_name'] . "</td><td> "
                                          . $row['room_number'] . "</td><td><a href=editResident.php?sid=" . $row['studentID'].">Edit Resident</a></td></tr> ";  
                }
            print"</table>";
        print "</div>";
    print "</div>";
    print '        <div class="pull-right">
            <button class="btn btn-success" onclick="redirect()" id="add">Add a new resident</button>
        </div>';
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