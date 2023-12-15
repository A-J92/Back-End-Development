<html>
    <head><title>Take Attendance</title></head>
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
        <h1>Take Attendance</h1>
        <form name="myForm" method="post" action="AAttendance.php"  onsubmit="return validateForm()">
        <label>Student:</label>
        <select name="StudentID">
            <?php
            $link = mysqli_connect("localhost", "root", "", "alphonsus");
 
            if ($link === false){
                die("Connection failed:");
            }
            $sql = mysqli_query($link,"SELECT StudentID, StudentName FROM student");
            while ($row = $sql->fetch_assoc()){
            echo "<option value='{$row['StudentID']}'>
                                {$row['StudentName']}
                                </option>";
            }   
            ?>
        <br>
        </select><br><br>
        <label>Class:</label>
        <select name="ClassID">
            <?php
            $sql = mysqli_query($link,"SELECT ClassID, ClassName FROM classes");
            while ($row = $sql->fetch_assoc()){
            echo "<option value='{$row['ClassID']}'>
                                {$row['ClassName']}
                                </option>";
            }   
            ?>
        </select><br><br>
        <input type="submit" name="submit"><br><br>
<?php
if(isset($_POST['submit']))
{
    $StudentID = $_POST['StudentID'];
    $ClassID = $_POST['ClassID'];
    $DateTime = date("Y-m-d H:i:s");
 
    $sql = "INSERT INTO attendance (StudentID,ClassID,DateTime) VALUES('$StudentID','$ClassID','$DateTime')";
    if (mysqli_query($link, $sql))
    {
        echo "New Assignment created successfully";
    } else
    {
        echo "Error adding assignment";
    }
}
?>
</html>