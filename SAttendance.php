<html>
    <head><title>View Attendance</title></head>
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
        <?php
          $link = mysqli_connect("localhost", "root", "", "alphonsus");
 
          if ($link === false){
              die("Connection failed:");
          }
        ?>
        <h1>View Attendance</h1>
        <form method="post" action="SAttendance.php" name="myForm" onsubmit="return validateForm()">
        <label>Student ID:</label>
        <input type="StudentID" name="StudentID"><br><br>
        <input type="submit" name="submit">
    </form>
 
<?php
$link = mysqli_connect("localhost", "root", "","alphonsus");
 
if ($link === false)
{
    die("Connection failed:");
}
if (isset($_POST['submit'])) {
    $StudentID = $_POST['StudentID'];

    $sql = "SELECT * FROM attendance WHERE StudentID = $StudentID";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            echo "<h2>Attendance:</h2>";
            echo "<p>Attendance ID: {$row['AttendanceID']}</p>";
            echo "<p>Student ID: {$row['StudentID']}</p>";
            echo "<p>Class ID: {$row['ClassID']}</p>";
            echo "<p>Date and Time: {$row['DateTime']}</p>";
        }
    }
    else
    {
        echo "Error finding Record";
    }
    $link->close();
}
?>
</body>
</html>