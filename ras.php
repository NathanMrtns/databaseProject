
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

<?php

	//connect to MySQL (host, user_name, password)
    require('connect_db.php');
    $query = 'select * from resident where isRA = true';
    
	if(!($result = mysqli_query($dbc, $query)))
	{
	    print ("Coudnot execute query! <br/>");
	    die(mysql_error());
	} 

	print '<div class="panel panel-default">';
    	print '<div class="panel-heading">List of Resident Assistants</div>';
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
	mysqli_close($dbc);
    exit;

?>


</body>

</html>