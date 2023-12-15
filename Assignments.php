<html>
    <head><title>Assignments</title></head>
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
        <h1>Assignments</h1>
        <h4>If you are in the class, the work is required. However, everyone is free to do as many assignments as they'd like :)</h4>
        <?php
            $link = mysqli_connect("localhost", "root", "", "alphonsus");
 
            if ($link === false){
                die("Connection failed:");  
            }
            ?>
        <table>
            <tr>
                <th width="300px">Task:<br><hr></th>
                <th width="250px">Class:<br><hr></th>
                <th width="200px">Due date:<br><hr></th>
            </tr>
<?php
$sql = mysqli_query($link,"SELECT Assignment,ClassID,DueDate FROM assignment");
while ($row = $sql->fetch_assoc())
{
    echo "
    <tr>
        <th>{$row['Assignment']}</th>
        <th>{$row['ClassID']}</th>
        <th>{$row['DueDate']}</th>
        </tr>";
}
?>
</form>
</html>