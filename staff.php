
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
<!--
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
-->
<?php

    //connect to MySQL (host, user_name, password)
    require('connect_db.php');

    $query = 'select * from staff';

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
                 print "<tr><th>Staff ID</th><th>First Name</th><th>Last Name</th>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr><td>" . $row['staffID'] . "</td><td> " . $row['first_name'] . "</td><td> " . $row['last_name'] . "</td><td><a href=editResident.php?sid=" . $row['staffID'].">Edit Staff</a></td></tr> ";
                }
            }
            print"</table>";
        print "</div>";
    print "</div>";
    print '        <div class="pull-right">
            <button class="btn btn-success" onclick="redirect()" id="add">Add a new member</button>
        </div>';
    mysqli_close($dbc);
    exit;

?>


</body>

</html>