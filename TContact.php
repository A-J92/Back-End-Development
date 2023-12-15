<html>
    <head><title>Contact Us</title></head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <div class="navbar">
    <a href="THome.html">Home</a>
            <a href="TViewStudent.php">Student</a>
            <div class="dropdown">
            <button class="dropbtn">Assignments 
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
            <a href="TAssignments.php">Set Assignments</a>
            <a href="TDelAssignment.php">Delete Assignments</a>
            <a href="TViewAssignment.php">View Handed In Assignments</a>
            </div>
            </div> 
            <div class="dropdown">
            <button class="dropbtn">Attendance
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
            <a href="TAttendance.php">Take Attendance</a>
            <a href="TViewAttendance.php">View Attendance</a>
            </div>
            </div> 
            <a href="index.html">Login</a>
            <a href="Register.php">Register</a>
            <l style="float:right"><a href="index.html">Logout</a></l>
            <l style="float:right"><a href="TContact.php">Contact Us</a></l>
        </div>
<body>
<script>
    function validateForm()
    {
        let x = document.forms["myForm"]["u1"].value;
        let y = document.forms["myForm"]["u2"].value;
        let z = document.forms["myForm"]["u3"].value;
        if (x == "")
        {
            alert("Firstname must be filled out");
            return false;
        }
        if (y == "")
        {
            alert("Surname must be filled out");
            return false;
        }
        if (z == "")
        {
            alert("Email must be filled out");
            return false;
        }
    }
    </script>
        <h1>Contact Us</h1>
        <form name="myForm" method="post" action="TContact.php"  onsubmit="return validateForm()">
        <label>Firstname </label>
        <input type="Firstname" name="u1"><br>
        <br>
        <label>Surname </label>
        <input type="Surname" name="u2"><br>
        <br>
        <label>Email </label>
        <input type="Email" name="u3" required><br>
        <br>
        <label>Query </label>
        <input type="Query" name="u4" required><br>
            <?php
            $link = mysqli_connect("localhost", "root", "", "alphonsus");
 
            if ($link === false){
                die("Connection failed:");
            }
            ?>
        <br>
        <input type="submit" name="submit"><br><br>
<?php
if(isset($_POST['submit']))
{
    $Firstname = $_POST['u1'];
    $Surname = $_POST['u2'];
    $Email = $_POST['u3'];
    $Query = $_POST['u4'];
 
    $sql = "INSERT INTO contact (Firstname,Surname,Email,Query) VALUES('$Firstname','$Surname','$Email','$Query')";
    if (mysqli_query($link, $sql))
    {
        echo "Successfully submitted";
    } else
    {
        echo "Error submitting";
    }
}
?>
</form>
</body>
</html>