<html>
    <head><title>View Students Attendance</title></head>
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
        <?php
          $link = mysqli_connect("localhost", "root", "", "alphonsus");
 
          if ($link === false){
              die("Connection failed:");
          }
        ?>
        <h3>View all Students Attendance:</h3>
        <table>
            <tr>
                <th width="150px">Attendance ID<br><hr></th>
                <th width="150px">Student ID<br><hr></th>
                <th width="150px">Class ID<br><hr></th>
                <th width="250px">Date and Time<br><hr></th>
            </tr>
<?php

$sql = mysqli_query($link,"SELECT AttendanceID,StudentID,ClassID,DateTime FROM attendance");
while ($row = $sql->fetch_assoc())
{
    echo "
    <tr>
        <th>{$row['AttendanceID']}</th>
        <th>{$row['StudentID']}</th>
        <th>{$row['ClassID']}</th>
        <th>{$row['DateTime']}</th>
        </tr>";
}
 
?>
</table>
</body>
</html>