<html>
    <head><title>Set Assignments</title></head>
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
    function validateFormA()
    {
        let x = document.forms["myForm"]["u1"].value;
        let y = document.forms["myForm"]["u2"].value;
        let z = document.forms["myForm"]["u3"].value;
        if (x == "" || !x.length <= 20)
        {
            alert("ID must be filled out and 20 digits or less");
            return false;
        }
        if (y == "" || !y.length <= 255)
        {
            alert("Name must be filled out and 255 digits or less");
            return false;
        }
        if (z == "" || !z.length <= 255)
        {
            alert("Email must be filled out and 255 digits or less");
            return false;
        }
    }
    </script>
    <body>
        <h1>Set Assignments</h1>
        <form name="myForm" method="post" action="TAssignments.php"  onsubmit="return validateForm()">
        <label>Assignment ID:</label>
        <input type="AssignmentID" name="u1"><br>
        <br>
        <label>Assignment:</label>
        <input type="Assignment" name="u2"><br>
        <br>
        <label>Due Date (YYYY-MM-DD):</label>
        <input type="DueDate" name="Y-m-d"><br>
        <br>
        <label>Select Year Group:</label>
        <select name="ClassID">
            <?php
            $link = mysqli_connect("localhost", "root", "", "alphonsus");
 
            if ($link === false){
                die("Connection failed:");
            }
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
    $AssignmentID = $_POST['u1'];
    $Assignment = $_POST['u2'];
    $ClassID = $_POST['ClassID'];
    $DueDate = date("Y-m-d");
 
    $sql = "INSERT INTO assignment (AssignmentID,Assignment,ClassID,DueDate) VALUES('$AssignmentID','$Assignment','$ClassID','$DueDate')";
    if (mysqli_query($link, $sql))
    {
        echo "New Assignment created successfully";
    } else
    {
        echo "Error adding assignment";
    }
}
?>
<h3>View Assignments:</h3>
        <table>
            <tr>
                <th width="150px">AssignmentID:<br><hr></th>
                <th width="250px">Assignment:<br><hr></th>
                <th width="150px">ClassID:<br><hr></th>
                <th width="150px">Due Date:<br><hr></th>
            </tr>
<?php
$sql = mysqli_query($link,"SELECT AssignmentID,Assignment,ClassID,DueDate FROM assignment");
 
while ($row = $sql->fetch_assoc())
{
    echo "
    <tr>
        <th>{$row['AssignmentID']}</th>
        <th>{$row['Assignment']}</th>
        <th>{$row['ClassID']}</th>
        <th>{$row['DueDate']}</th>
        </tr>";
}
?>
</html>