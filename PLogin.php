<html>
    <head><title>Parent Login</title></head>
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
        let x = document.forms["myForm"]["Username"].value;
        let y = document.forms["myForm"]["Password"].value;
        if (x == "")
        {
            alert("Username must be filled out");
            return false;
        }
        if (y == "")
        {
            alert("Password must be filled out");
            return false;
        }
    }
    </script>
    <body>
        <h1>Parent Login</h1>
        <form name="myForm" method="post" action="PLogin.php"  onsubmit="return validateForm()">
        <label>User name</label>
        <input type="Username" name="Username"><br>
        <br>
        <label>Password </label>
        <input type="Password" name="Password"><br>
        <br>
            <?php
            $link = mysqli_connect("localhost", "root", "", "alphonsus");
 
            if ($link === false){
                die("Connection failed:");
            }
            ?>
        </select>
        <input type="submit" name="submit"><br>
</form>
</html>
<?php
if (isset($_POST['Username']))
{ $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $query = "SELECT * FROM users WHERE Username ='$Username'
    AND Password ='" . md5 ($Password)."'
    AND User ='Parent'";
    $result =mysqli_query($link,$query);
    $rows = mysqli_num_rows($result);
    if($rows == 1){
        header("Location: PHome.html");
    }else {
        echo "<div class='form'>
        <h3>Incorrect Username/Password.</h3>
        <p class ='link'>Click here to <a href ='index.html'>Login</p>
        <p class ='link'>Click here to <a href ='Register.php'>Register</p>
        </div>";
 
    }
    }else{
}
?>