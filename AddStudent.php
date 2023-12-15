<html>
    <head><title>Add Student</title></head>
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
            alert("ID must be filled out and 20 digits or less");
            return false;
        }
        if (y == "")
        {
            alert("Name must be filled out and 255 digits or less");
            return false;
        }
        if (z == "")
        {
            alert("Email must be filled out and 255 digits or less");
            return false;
        }
        // || !z.length <= 255  
    }
    </script>
    <body>
        <h1>Add Student</h1>
        <form name="myForm" method="post" action="AddStudent.php"  onsubmit="return validateForm()">
        <label>Student ID </label>
        <input type="StudentID" name="u1"><br>
        <br>
        <label>Student Name </label>
        <input type="StudentName" name="u2"><br>
        <br>
        <label>Student Email </label>
        <input type="Email" name="u3"><br><br>
        <label>Address </label>
        <input type="Address" name="u4"><br>
        <br>
        <label>Select Parent:</label>
        <select name="ParentID">
            <?php
            $link = mysqli_connect("localhost", "root", "", "alphonsus");
 
            if ($link === false){
                die("Connection failed:");
            }
            $sql = mysqli_query($link,"SELECT ParentID, ParentName FROM parent");
            while ($row = $sql->fetch_assoc()){
            echo "<option value='{$row['ParentID']}'>
                                {$row['ParentName']}
                                </option>";
            }
            ?>
        </select><br><br>
        <input type="submit" name="submit"><br><br>
<?php
if(isset($_POST['submit']))
{
    $StudentID = $_POST['u1'];
    $StudentName = $_POST['u2'];
    $Email = $_POST['u3'];
    $Address = $_POST['u4'];    
    $ParentID = $_POST['ParentID'];
 
    $sql = "INSERT INTO student (StudentID,StudentName,Email,Address,ParentID) VALUES('$StudentID','$StudentName','$Email','$Address','$ParentID')";
    if (mysqli_query($link, $sql))
    {
        echo "New Record created successfully";
    } else
    {
        echo "Error adding record";
    }
}
?>
</form>
</html>