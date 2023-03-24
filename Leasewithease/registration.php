<?php
require 'config.php';

// Redirect user to index page if already logged in
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}

// Handle form submission
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];

  // Check if username or email already exists in database
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo "<script> alert('Username or Email is Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      // Insert user data into database
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
    <title>Create Your Lease With Ease Account</title>
  </head>
  <body>
    <div class="container">
      <h2>Create Your Lease With Ease Account</h2>
      <form action="" method="post" autocomplete="off">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
          <label for="confirmpassword">Confirm Password:</label>
          <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Register</button>
      </form>
      <div class="mt-3">
        Already have an account? <a href="login.php">Login here</a>
      </div>
    </div>

    <!-- Bootstrap 5 CDN for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-p1hUMJXFRxG8MeJKtCmGS+IvHyCt/hF8rI93cnHnQ1frAn50XtBA11x8oYZcpxL/" crossorigin="anonymous">
  </body>
</html>
``
