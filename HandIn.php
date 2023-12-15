<html>
    <head><title>Hand In Assignment</title></head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <div class="navbar">
            <a href="SHome.html">Home</a>
            <a href="SAttendance.php">Attendance</a>
            <div class="dropdown">
            <button class="dropbtn">Assignments
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
            <a href="Assignments.php">View Assignments</a>
            <a href="HandIn.php">Hand in Assignment</a>
            </div> 
            </div>
            <a href="index.html">Login</a>
            <a href="Register.php">Register</a>
            <l style="float:right"><a href="index.html">Logout</a></l>
            <l style="float:right"><a href="SContact.php">Contact Us</a></l>
        </div>
</div>
<body>
    <script>
    function validateForm()
    {
        let x = document.forms["myForm"]["u1"].value;
        let y = document.forms["myForm"]["AssignmentID"].value;
        if (x == "")
        {
            alert("ID must be filled out and 20 digits or less");
            return false;
        }
        if (y == "")
        {
            alert("Assignment must be selected");
            return false;
        }
    }
    </script>
    <body>
        <h1>Hand in Assignment</h1>
        <form name="myForm" method="post" action="HandIn.php"  onsubmit="return validateForm()">
        <label>Student ID </label>
        <input type="StudentID" name="u1"><br>
        <br>
        <label>Select Assignment:</label>
        <select name="AssignmentID">
            <?php
            $link = mysqli_connect("localhost", "root", "", "alphonsus");
 
            if ($link === false){
                die("Connection failed:");
            }
            $sql = mysqli_query($link,"SELECT AssignmentID, Assignment FROM assignment");
            while ($row = $sql->fetch_assoc()){
            echo "<option value='{$row['AssignmentID']}'>
                                {$row['Assignment']}
                                </option>";
            }
            ?>
        </select><br><br>
        <label>Work:</label>
        <input type="File" name="file"><br><br>
        <label>Select Class:</label>
        <select name="ClassID">
            <?php
            $link = mysqli_connect("localhost", "root", "", "alphonsus");
 
            if ($link === false){
                die("Connection failed:");
            }
            $sql = mysqli_query($link,"SELECT ClassID,ClassName FROM classes");
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
    $StudentID = $_POST['u1'];
    $AssignmentID = $_POST['AssignmentID'];
    $File = $_POST['file'];
    $ClassID = $_POST['ClassID'];
    $ClassName = $_POST['ClassName'];
 
    $sql = "INSERT INTO handedassignment (StudentID,AssignmentID,File,ClassID ) VALUES('$StudentID','$AssignmentID','$File','$ClassID')";
    if (mysqli_query($link, $sql))
    {
        echo "Assignment uploaded successfully";
    } else
    {
        echo "Error uploading assignment";
    }
}
?>
</form>
</html>