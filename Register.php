<html>
    <head><title>Register</title></head>
    <link rel="stylesheet" href="login.css">
<body>
    <style>
        body
        {
        margin-left: 600px;
        margin-top: 250px;
        }
    </style>
    <script>
    function validateForm()
    {
        let x = document.forms["myForm"]["u1"].value;
        let y = document.forms["myForm"]["u2"].value;
        let z = document.forms["myForm"]["u3"].value;
        if (x == "")
        {
            alert("Username must be filled out");
            return false;
        }
        if (y == "")
        {
            alert("Email must be filled out");
            return false;
        }
        if (z == "")
        {
            alert("Email must be filled out");
            return false;
        }
    }
    </script>
    <body>
        <h1>Register</h1>
        <form name="myForm" method="post" action="Register.php" onsubmit="return validateForm()">
        <label>User Name:</label>
        <input type="username" name="u1"><br><br>
        <label>Email:</label>
        <input type="email" name="u2"><br><br>
        <label>Password:</label>
        <input type="password" name="u3"><br><br>
        <label>Select:</label>
        <select name="user">
            <option value="Admin">Admin</option>
            <option value="Teacher">Teacher</option>
            <option value="Student">Student</option>
            <option value="Parent">Parent/Guardian</option>
            <?php
            $link = mysqli_connect("localhost", "root", "", "alphonsus");
 
            if ($link === false){
                die("Connection failed:");
            }
            ?>
        </select>
        <input type="submit" name="submit"><br>
        <p class='link'>Already have an account? <a href='Index.html'>Login</a></p>  
<?php
if(isset($_POST['submit']))
{
    $Username = $_POST['u1'];
    $Email = $_POST['u2'];
    $Password = $_POST['u3'];
    $User = $_POST['user'];
    $DateTime = date("Y-m-d H:i:s");
 
    $query = "INSERT INTO users (Username,Email,Password,User,DateTime)
            VALUES('$Username','$Email','" . md5($Password) . "','$User','$DateTime')";
    $result = mysqli_query($link, $query);
    if ($result)
    {
        echo "<div class='form'>
        <h3>You have registered successfully.</h3><br/>
        <p class='link'>Click here to <a href='Login.php'>Login</a></p>
        </div>";
    } else
    {
        echo "<div class='form'>
        <h3>Required fields are missing.</h3><br/>
        <p class='link'>Click here to <a href='Register.php'>Register</a></p>
        </div>";
    }
}else{
?>
<?php
}
?>
</form>
</body>
</html>