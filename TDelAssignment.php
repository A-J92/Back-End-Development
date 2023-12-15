<html>
    <head><title>Delete Assignments</title></head>
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
        let x = document.forms["myForm"]["AssignmentID"].value;
        if (x == "")
        {
            alert("ID must be filled out");
            return false;
        }
    }
    </script>
    <h1>Delete Assignment</h1>
        <form method="post" action="TDelAssignment.php" name="myForm" onsubmit="return validateForm()">
        <label>Assignment:</label>
        <input type="AssignmentID" name="AssignmentID"><br><br>
        <input type="submit" name="submit" value="Delete">
    </form>
 
<?php
$link = mysqli_connect("localhost", "root", "","alphonsus");
 
if ($link === false)
{
    die("Connection failed:");
}
if (isset($_POST['submit']))
{
    $AssignmentID=$_POST['AssignmentID'];
    $sql = "DELETE FROM assignment WHERE AssignmentID=$AssignmentID";
 
    if ($link->query($sql) === TRUE)
    {
        echo "<br>Record deleted Successfully";
    }
    else
    {
        echo "Error deleting Record:";
    }
    $link->close();
    echo "<br>Cannot find record";
}
?>
</body>
</html>