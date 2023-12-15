<html>
    <head><title>Update Class</title></head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <div class="navbar">
            <a href="AHome.html">Home</a>
            <div class="dropdown">
                <button class="dropbtn">View
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="ViewStudent.php">Student</a>
                    <a href="ViewParent.php">Parent</a>
                    <a href="ViewTeacher.php">Teacher</a>
                    <a href="ViewClass.php">Class</a>
                    <a href="ViewSalary.php">Salary</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Add
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="AddStudent.php">Student</a>
                    <a href="AddParent.php">Parent</a>
                    <a href="AddTeacher.php">Teacher</a>
                    <a href="AddClass.php">Class</a>
                    <a href="AddSalary.php">Salary</a>
                </div>
            </div>
            <div class="dropdown">
              <button class="dropbtn">Delete
                  <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                  <a href="DelStudent.php">Student</a>
                  <a href="DelParent.php">Parent</a>
                  <a href="DelTeacher.php">Teacher</a>
                  <a href="DelClass.php">Class</a>
                  <a href="DelSalary.php">Salary</a>
              </div>
          </div>
          <div class="dropdown">
            <button class="dropbtn">Update
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="UpdateStudent.php">Student</a>
                <a href="UpdateParent.php">Parent</a>
                <a href="UpdateTeacher.php">Teacher</a>
                <a href="UpdateClass.php">Class</a>
                <a href="UpdateSalary.php">Salary</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Assignments
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
            <a href="AAssignments.php">Set Assignments</a>
            <a href="DelAssignment.php">Delete Assignments</a>
            <a href="ViewAssignment.php">View Handed In Assignments</a>
            </div> 
            </div>
            <div class="dropdown">
                <button class="dropbtn">Attendance
                <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                <a href="AAttendance.php">Take Attendance</a>
                <a href="AViewAttendance.php">View Attendance</a>
                </div>
                </div> 
            <a href="index.html">Login</a>
            <a href="Register.php">Register</a>
            <l style="float:right"><a href="Contact.php">Contact Us</a>
            <l style="float:right"><a href="index.html">Logout</a>
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
            alert("ID must be filled out");
            return false;
        }
        if (y == "")
        {
            alert("Class must be filled out");
            return false;
        }
        if (z == "")
        {
            alert("Capacity must be filled out");
            return false;
        }
    }
    </script>
        <h1>Update Class</h1>
        <form name="myForm" method="post" action="UpdateClass.php"  onsubmit="return validateForm()">
        <label>Class ID </label>
        <input type="ClassID" name="u1"><br>
        <br>
        <label>Class  </label>
        <input type="ClassName" name="u2"><br>
        <br>
        <label>Capacity </label>
        <input type="Capacity" name="u3"><br>
        <br>
        <label>Room Number </label>
        <input type="RoomNumber" name="u4"><br><br>
            <?php
            $link = mysqli_connect("localhost", "root", "", "alphonsus");
 
            if ($link === false){
                die("Connection failed:");
            }
            ?>
        </select>
        <input type="submit" name="submit"><br><br>
        </form>
<?php

if(isset($_POST['submit']))
{
    $ClassID = $_POST['u1'];
    $ClassName = $_POST['u2'];
    $Capacity = $_POST['u3'];
    $RoomNumber = $_POST['u4'];
 
    $sql = "UPDATE classes SET ClassName ='$ClassName', Capacity ='$Capacity', RoomNumber ='$RoomNumber'
    WHERE ClassID ='$ClassID'";
    if ($link->query($sql) === TRUE)
    {
        echo "Record updated successfully";
    } else
    {
        echo "Error updating record: " . $link->error;
    }
    $link->close();
}
?>
</html>