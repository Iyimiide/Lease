<?php
require 'config2.php';
if(!empty($_SESSION["id"])){
  header("Location: index2.php");
}
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
      mysqli_query($conn, $query);
      echo "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Create Your Lease With Ease Realtor Account</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
      }

      h2 {
        margin-bottom: 20px;
      }

      form {
        max-width: 500px;
        margin: 0 auto;
      }

      label {
        display: inline-block;
        width: 150px;
        margin-bottom: 10px;
      }

      input[type="text"], input[type="email"], input[type="password"] {
        width: 250px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
      }

      button[type="submit"] {
        padding: 10px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
      }

      button[type="submit"]:hover {
        background-color: #3e8e41;
      }

      a {
        display: block;
        margin-top: 20px;
        text-align: center;
        color: #333;
        text-decoration: none;
      }
    </style>
  </head>
  <body>
    <h2>Create Your Lease With Ease Reltor Account</h2>
    <form class="" action="" method="post" autocomplete="off">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" required value=""> <br>
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" required value=""> <br>
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" required value=""> <br>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required value=""> <br>
      <label for="confirmpassword">Confirm Password:</label>
      <input type="password" name="confirmpassword" id="confirmpassword" required value=""> <br>
      <button type="submit" name="submit">Register</button>
   </form>
    <br>
    <a href="login.php">Login</a>
  </body>
</html>
