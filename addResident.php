
<?php
session_start();

include('header.html');

?>

<body>
    <form class="navbar-form navbar" method="post" action="insertResident.php">
        <div class="alert alert-info">
            <h4>
                Resident info
            </h4>
        </div>
        <div class="form-group">
                Student ID: <input type="text" class="form-control" name="sid" placeholder="StudentID">
        </div>
        <br>
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
            Room: <input type="text" class="form-control" name="room" placeholder="Room Number">
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
        <a href="residents.php" class="btn btn-default" role="button">Cancel</a>
        <button type="submit" class="btn btn-success">Add Resident</button>
    </form>
</body>

</html>
