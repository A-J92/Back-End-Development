<html>
    <head><title>View Student</title></head>
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
        <body>
        <?php
          $link = mysqli_connect("localhost", "root", "", "alphonsus");
 
          if ($link === false){
              die("Connection failed:");
          }
        ?>
        <h1>View Student</h1>
        <form method="post" action="PViewStudent.php" name="myForm">
        <label>Student ID:</label>
        <input type="StudentID" name="StudentID" required><br><br>
        <input type="submit" name="submit">
    </form>
    <table>
            <tr>
                <th width="100px">Student ID<br><hr></th>
                <th width="250px">Student Name<br><hr></th>
                <th width="300px">Email<br><hr></th>
                <th width="350px">Address<br><hr></th>
                <th width="100px">Parent ID<br><hr></th>
            </tr>
 
<?php
if (isset($_POST['submit'])) {
    $StudentID = $_POST['StudentID'];

    $sql = "SELECT * FROM student WHERE StudentID = $StudentID";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            echo "
                <tr>
                <th>{$row['StudentID']}</th>
                <th>{$row['StudentName']}</th>
                <th>{$row['Email']}</th>
                <th>{$row['Address']}</th>
                <th>{$row['ParentID']}</th>
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