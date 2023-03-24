<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    }
    else{
      echo "<div class='alert alert-danger'>Wrong Password</div>";
    }
  }
  else{
    echo "<div class='alert alert-danger'>User Not Registered</div>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 mt-5">
        <div class="card">
          <div class="card-header">
            <h2 class="text-center">Login To Your Lease With Ease</h2>
          </div>
          <div class="card-body">
            <form action="" method="post" autocomplete="off">
              <div class="form-group">
                <label for="usernameemail">Username or Email:</label>
                <input type="text" name="usernameemail" id="usernameemail" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
              </div>
              <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
            </form>
            <div class="mt-3">
              <a href="registration.php">Create an account</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
