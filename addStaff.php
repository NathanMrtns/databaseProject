
<?php
session_start();

include('header.html');

?>

<body>
    <form class="navbar-form navbar" method="post" action="insertStaff.php">
        <div class="alert alert-info">
            <h4>
                Staff info
            </h4>
        </div>
        <div class="form-group">
                Staff ID: <input type="text" class="form-control" name="sid" placeholder="StaffID">
        </div>
        <br>
        <div class="form-group">
            First Name: <input type="text" class="form-control" name="fname" placeholder="First Name">
        </div>
        <br>
        <div class="form-group">
            Last Name: <input type="text" class="form-control" name="lname" placeholder="Last Name">
        </div>
        <div class="form-group">
            Address: <input type="text" class="form-control" name="address" placeholder="Adress">
        </div>
        <br><br>
        <a href="staff.php" class="btn btn-default" role="button">Cancel</a>
        <button type="submit" class="btn btn-success">Add Staff</button>
    </form>
</body>

</html>
