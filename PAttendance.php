<html>
    <head><title>View Attendance</title></head>
    <link rel="stylesheet" href="style.css">
    <div class="navbar">
            <a href="PHome.html">Home</a>
            <a href="PViewStudent.php">Student</a>
            <a href="PAttendance.php">Attendance</a>
            <a href="index.html">Login</a>
            <a href="Register.php">Register</a>
            <l style="float:right"><a href="index.html">Logout</a></l>
            <l style="float:right"><a href="PContact.php">Contact Us</a></l>
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
        <form method="post" action="PAttendance.php" name="myForm" onsubmit="return validateForm()">
        <label>Student ID:</label>
        <input type="StudentID" name="StudentID"><br><br>
        <input type="submit" name="submit">
    </form>
    <table>
            <tr>
                <th width="200px">Attendance ID<br><hr></th>
                <th width="250px">Student ID<br><hr></th>
                <th width="200px">Class ID<br><hr></th>
                <th width="300px">Date and Time<br><hr></th>
            </tr>
 
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
            echo "
                <tr>
                <th>{$row['AttendanceID']}</th>
                <th>{$row['StudentID']}</th>
                <th>{$row['ClassID']}</th>
                <th>{$row['DateTime']}</th>
                </tr>";
        }
    }
    else
    {
        echo "Error finding Record";
    }
    $link->close();
}
?>
</table>
</body>
</html>