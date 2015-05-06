<?php
session_start();

include('header.html');

//connect to MySQL (host, user_name, password)
require('connect_db.php');

if(isset($_GET['sid'])){
    $_SESSION['sid'] = $_GET['sid']; 
    $query = 'select * from staff where staffID = ' . $_GET['sid'] ;
    if(!($result = mysqli_query($dbc, $query)))
    {
        print ("Could not execute query! <br/>");
        die(mysql_error());
    }

    while($row = mysqli_fetch_array($result)){

    print '

    <body>
        <form class="navbar-form navbar" method="post" action="updateStaff.php">
            <div class="alert alert-info">
                <h4>
                    Staff info
                </h4>
            </div>
            <div class="form-group">
                Staff ID: <input type="text" class="form-control" name="sid" placeholder="StaffID" value="' . $row['staffID'].'" disabled>
            </div>
            <br>
            <div class="form-group">
                First Name: <input type="text" class="form-control" name="fname" placeholder="First Name" value="' . $row['first_name'].'">
            </div>
            <br>
            <div class="form-group">
                Last Name: <input type="text" class="form-control" name="lname" placeholder="Last Name" value="' . $row['last_name'].'">
            </div>
            <br>
            <div class="form-group">
                Address: <input type="text" class="form-control" name="address" placeholder="Adress" value="'. $row['adress'] .'">
            </div>  
            </div>
            <br><br>
            <a href="staff.php" class="btn btn-default" role="button">Cancel</a>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="removestaff.php?sid='.$_SESSION['sid'].'" class="btn btn-danger" role="button">Remove Staff</a>
        </form>   
    </body>
    ';
    }
}
?>