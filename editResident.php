<?php
session_start();

include('header.html');

//connect to MySQL (host, user_name, password)
require('connect_db.php');

if(isset($_GET['sid'])){
    $_SESSION['sid'] = $_GET['sid']; 
    $query = 'select * from resident where studentID = ' . $_GET['sid'] ;
    $query2 = 'select * from building_room where occupied = false';
//'. $row['hallgov_position'] . '
    if(!($result = mysqli_query($dbc, $query)))
    {
        print ("Coudnot execute query! <br/>");
        die(mysql_error());
    }

    if(!($result2 = mysqli_query($dbc, $query2)))
    {
        print ("Coudnot execute query! 2 <br/>");
        die(mysql_error());
    }

    while($row = mysqli_fetch_array($result)){

    print '
<script type="text/javascript">
$(document).ready(function() {
    ';
    if($row['isRA']==true){
        echo 'document.getElementById("rayes").checked = true;';
        echo 'document.getElementById("raform").style.display = "inline-block";';
    }else{
        echo 'document.getElementById("rano").checked = true;';
    }
    echo '
    $("input[type=radio][name=ra]").change(function() {
        if (this.value == "yes") {
            document.getElementById("raform").style.display = "inline-block";
        }
        else if (this.value == "no") {
            document.getElementById("raform").style.display = "none";
            document.getElementById("rafloor").value = "";
        }
    });
});
</script>
    <body>
        <form class="navbar-form navbar" method="post" action="updateResident.php">
            <div class="alert alert-info">
                <h4>
                    Resident info
                </h4>
            </div>
            <div class="form-group">
                Student ID: <input type="text" class="form-control" name="sid" placeholder="StudentID" value="' . $row['studentID'].'" disabled>
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
                Email: <input type="email" class="form-control" name="email" placeholder="Email" value="' . $row['email'].'">
            </div>
            <br>
            <div class="form-group">';
            echo "Room: <span>
                <select class='form-control' name='room'>";
                $_SESSION['oldRoom'] = $row['room_number'];
                echo "<option value='" . $row['room_number'] . "'>" . $row['room_number'] . "</option>";
                while($row2 = mysqli_fetch_array($result2)){
                    echo "<option value=" . $row2['room_number'].">". $row2['room_number']."</option>";
                }
            echo '</select>
            </span>
            </div>
            <br>
            <div class="input-group">
                RA: <input type="radio" name="ra" id="rayes" value="yes"> Yes <input type="radio" name="ra" id="rano" value="no"> No
            </div>
            <div class="input-group" id="raform" style="display: none;">
                RA in what floor: <input type="number" class="form-control" name="rafloor" id="rafloor" value='. $row['raFloor'] .'>
            </div>
            <br>
            <div class="form-group">
                Hall Gov Position: 
                <span> 
                    <select class="form-control" name="hallpos" id="hallpos">';
                    if($row['hallgov_position']=='president'){
                        echo '<option value""></option>
                        <option value="president" selected>President</option>
                        <option value="vice_president">Vice President</option>
                        <option value="floorRep">Floor Representative</option>
                        <option value="secretary">Secretary</option>';
                    }else if($row['hallgov_position']=='vice_president'){
                        echo '<option value""></option>
                        <option value="president" >President</option>
                        <option value="vice_president" selected>Vice President</option>
                        <option value="floorRep">Floor Representative</option>
                        <option value="secretary">Secretary</option>';
                    }else if($row['hallgov_position']=='floorRep'){
                        echo '<option value""></option>
                        <option value="president" >President</option>
                        <option value="vice_president">Vice President</option>
                        <option value="floorRep" selected>Floor Representative</option>
                        <option value="secretary">Secretary</option>';
                    }else if($row['hallgov_position']=='secretary'){
                        echo '<option value""></option>
                        <option value="president" >President</option>
                        <option value="vice_president">Vice President</option>
                        <option value="floorRep">Floor Representative</option>
                        <option value="secretary" selected>Secretary</option>';
                    }else{
                        echo '<option value"" selected></option>
                        <option value="president" >President</option>
                        <option value="vice_president">Vice President</option>
                        <option value="floorRep">Floor Representative</option>
                        <option value="secretary">Secretary</option>';
                    }
echo '
                    </select>
                </span>
            </div>
            <br><br>
            <a href="residents.php" class="btn btn-default" role="button">Cancel</a>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="removeResident.php?sid='.$_SESSION['sid'].'" class="btn btn-danger" role="button">Remove Resident</a>
        </form>
        
    </body>
    ';
    }
}
?>