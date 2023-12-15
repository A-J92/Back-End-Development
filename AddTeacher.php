<html>
    <head><title>Add Teacher</title></head>
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
    function validateFormA()
    {
        let a = document.forms["myForm"]["t1"].value;
        let b = document.forms["myForm"]["t2"].value;
        let c = document.forms["myForm"]["ClassID"].value;
        if (a == "" || !x.length <= 20)
        {
            alert("ID must be filled out and 20 digits or less");
            return false;
        }
        if (b == "" || !y.length <= 255)
        {
            alert("Name must be filled out and 255 digits or less");
            return false;
        }
        if (c == "")
        {
            alert("Class must be selected");
            return false;
        }
    }
    </script>
        <h1>Add Teacher</h1>
        <form name="myForm" method="post" action="AddTeacher.php" onsubmit="return validateForm()">
        <label>Teacher ID </label>
        <input type="TeacherID" name="t1"><br>
        <br>
        <label>Teacher Name </label>
        <input type="TeacherName" name="t2"><br>
        <br>
        <label>Teacher Number </label>
        <input type="int" name="t3" required><br>
        <br>
        <label>Select Class:</label>
        <select name="ClassID">
            <?php
            $link = mysqli_connect("localhost", "root", "", "alphonsus");
 
            if ($link === false){
                die("Connection failed:");
            }
            $sql = mysqli_query($link,"SELECT ClassID, Capacity FROM classes");
            while ($row = $sql->fetch_assoc()){
            echo "<option value='{$row['ClassID']}'>
                                {$row['Capacity']}
                                </option>";
            }
            ?>
        </select><br><br>
        <input type="submit" name="submit"><br><br>
<?php
 
if(isset($_POST['submit']))
{
    $TeacherID = $_POST['t1'];
    $TeacherName = $_POST['t2'];
    $TeacherNumber = $_POST['t3'];
    $ClassID = $_POST['ClassID'];
    
    $sql = "INSERT INTO teacher (TeacherID,TeacherName,TeacherNumber,ClassID) VALUES('$TeacherID','$TeacherName','$TeacherNumber','$ClassID')";
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
</body>
</html>