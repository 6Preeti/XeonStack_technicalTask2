<?php

@include 'db.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM xeon WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);
   }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body style="background-color: rgb(26, 86, 154);">
        <form id="register1" method="POST">
            <h3 class="heading">Login to your account</h3>
            <div id="input">
            <div>
            <p class="input-label">Email</p>
            <input class="input-item" type="email" name="Email">
        </div>
        <div>
            <p class="input-label">Password</p>
            <input class="input-item" type="password" name="Password">
        </div>
            <input id="terms-check" type="checkbox" name="terms-condition" value="accept"> Remember Me<br>
            <input class="Submit-button" type="submit" value="Login">
            <div class="text">New to MyApp? <a href="Register.php" id="login">Sign Up</a></div>
        </div>
        </form>
    </body>
</html>