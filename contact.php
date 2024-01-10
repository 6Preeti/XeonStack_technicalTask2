<?php

@include 'db.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $contact = mysqli_real_escape_string($conn, $_POST['contact']);
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

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body style="background-color: rgb(26, 86, 154);">
        <form id="register1"method="POST">
            <h3 class="heading">Contact Us</h3>
            <div id="input">
            <div>
                <p class="input-label">Name</p>
                    <input class="input-item" type="text" name="name">
            </div>
            <div>
                <p class="input-label">Contact</p>
                    <input class="input-item" type="text" name="contact">
            </div>
            <div>
            <p class="input-label">Email</p>
            <input class="input-item" type="email" name="Email">
        </div>
        <br>
            <input class="Submit-button" type="submit" value="Submit">
        </div>
        </form>
    </body>
</html>