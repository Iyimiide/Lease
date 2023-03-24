<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Create Your Lease With Ease Account</title>
    <style>
      body {
        background-color: #f5f5f5;
        font-family: Arial, sans-serif;
      }
      
      h2 {
        text-align: center;
        margin-top: 50px;
        font-size: 36px;
        color: #333;
      }
      
      form {
        margin: 0 auto;
        width: 400px;
        padding: 40px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
      
      label {
        display: block;
        font-size: 16px;
        color: #333;
        margin-bottom: 10px;
      }
      
      input[type="text"],
      input[type="email"],
      input[type="password"] {
        display: block;
        width: 100%;
        padding: 10px;
        font-size: 16px;
        margin-bottom: 20px;
        border: none;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
      }
      
      button[type="submit"] {
        display: block;
        width: 100%;
        padding: 10px;
        font-size: 16px;
        margin-top: 20px;
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }
      
      button[type="submit"]:hover {
        background-color: #222;
      }
      
      a {
        display: block;
        margin-top: 20px;
        text-align: center;
        color: #333;
        font-size: 16px;
      }
      
      a:hover {
        color: #222;
      }
      
      .alert {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #e74c3c;
        color: #fff;
        font-size: 16px;
        margin-bottom: 20px;
        border-radius: 5px;
      }
    </style>
  </head>
  <body>
    <h2>Create Your Lease With Ease Account</h2>
    <form class="" action="" method="post" autocomplete="off">
      <?php
      if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
        if(mysqli_num_rows($duplicate) > 0){
          echo
          "<div class='alert'>Username or Email Has Already Taken</div>";
        }
        else{
          if($password == $confirmpassword){
            $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
            mysqli_query($conn, $query);
            echo
            "<div class='alert'>Registration Successful</div>";
          }
          else{
            echo
            "<div class='alert'>Password Does Not Match</div>";
