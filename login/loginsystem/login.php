<?php
session_start();
require_once('includes/config.php');
if (isset($_SESSION['id'])) {
  if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM menstrual_cycle_tracker WHERE user_id='{$_SESSION['id']}'")) > 0) {
    header("Location:welcome.php");
  } else {
    header("Location:process_form.php");
  }
  exit();
}
if (isset($_GET['verification'])) {
  if (mysqli_num_rows(mysqli_query($con, "SELECT  id,fname FROM users WHERE code='{$_GET['verification']}'")) > 0) {
    $query = mysqli_query($con, "UPDATE users SET code='' WHERE code='{$_GET['verification']}'");

    if ($query) {
      echo "<script>alert('Now you can login : Account verification has been  completed.');</script>";
    }
  } else {
    header("Location:login.php");
  }
}
// Code for login 
if (isset($_POST['login'])) {

  $email = mysqli_real_escape_string($con, $_POST['uemail']);
  $password = mysqli_real_escape_string($con, ($_POST['password']));

  $sql = "SELECT id,fname,code FROM users WHERE email='{$email}' AND password='{$password}'";
  $result = mysqli_query($con, $sql);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    if (empty($row['code'])) {
      $_SESSION['id'] = $row['id'];
      $_SESSION['name'] = $row['fname'];
      $_SESSION["loggedin"] = true;
      $_SESSION['SESSION_EMAIL'] = $email;
      // Redirect to the home page
      if (isset($_SESSION['id'])) {
        if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM menstrual_cycle_tracker WHERE user_id='{$_SESSION['id']}'")) > 0) {
          header("Location:welcome.php");
        } else {
          header("Location:process_form.php");
        }
        exit();
      }
      header("Location: welcome.php");
      exit();
    } else {
      echo "<script>alert('First verify your account and try again.');</script>";
    }
  } else {
    echo "<script>alert('Invalid Email or Password .');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/signin.css">
  <link rel="stylesheet" href="../../js/index.js">
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
    crossorigin="anonymous"></script>
</head>

<body>
  <img class="wave" src="../../pic/login.png">
  <div class="container">
    <div class="img">
      <img src="../../pic/j.png">
    </div>
    <div class="login-content">
      <form method="post">
        <img src="../../pic/undraw_Female_avatar_efig.png">
        <h2 class="title">Welcome</h2>

        <div class="input-div one">
          <div class="i">
            <i class="fas fa-user"></i>
          </div>
          <div class="div">
            <input type="text" name="uemail" class="input" required placeholder="Enter your Email Here..">
          </div>
        </div>
        <div class="input-div pass">
          <div class="i">
            <i class="fas fa-lock"></i>
          </div>
          <div class="div">
            <input type="password" name="password" class="input" required placeholder="Password">
          </div>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
          </label>
          <a href="password-recovery.php">Forgot Password?</a>
          <input type="submit" class="btn" name="login" value="login">
          <a href="signup.php">
            <p>Don't have an account? Register!</p>
          </a>
      </form>
    </div>
  </div>
  <script type="text/javascript" src="../../js/signin.js"></script>
</body>

</html>