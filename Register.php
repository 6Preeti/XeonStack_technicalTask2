<?php

@include 'db.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM xeon WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO xeon(name, email, password,) VALUES('$name','$email','$pass')";
         mysqli_query($conn, $insert);
         header('location:login.php');
      }
   }

};


?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body style="background-color: rgb(26, 86, 154);">
        <form id="register1"method="POST">
            <h3 class="heading">Create Account</h3>
            <div id="input">
            <div>
            <p class="input-label">Name</p>
            <input class="input-item" type="text" name="name">
            </div>
            <div>
            <p class="input-label">Email</p>
            <input class="input-item" type="email" name="Email">
        </div>
        <div>
            <p class="input-label">Password</p>
            <input class="input-item" type="password" name="pass">
        </div>
            <input id="terms-check" type="checkbox" name="terms-condition" value="accept"> Remember Me<br>
            <input class="Submit-button" type="submit" value="Sign Up">
            <div class="text">Already have an account? <a href="login.php" id="login">Login</a></div>
        </div>
        </form>
    </body>
</html>