<?php session_start();
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('includes/config.php');


//Code for Registration 
if(isset($_POST['submit']))
{
    $fname=mysqli_real_escape_string($con,$_POST['fname']);
    $lname=mysqli_real_escape_string($con,$_POST['lname']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $contact=mysqli_real_escape_string($con,$_POST['contact']);
    $location=mysqli_real_escape_string($con,$_POST['location']);
    $code=bin2hex(random_bytes(16));
$sql=mysqli_query($con,"select id from users where email='$email'");
$row=mysqli_num_rows($sql);
if($row>0)
{
    echo "<script>alert('{$email} - This email address has been already exists');</script>";
} else{
    $msg=mysqli_query($con,"insert into users(fname,lname,email,password,contactno,location,code) values('$fname','$lname','$email','$password','$contact','$location','$code')");

if(($msg) && sendMail($_POST['email'], $code))
{
    echo "<script>alert('Registered successfully');</script>";
    echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
}
}
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../../css/signin.css">
   <link rel="stylesheet" href="../../js/index.js">
   <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="localhost:8082/user/create">
   <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.confirmpassword.value)
{
alert(' Password and Confirm Password field does not match');
document.signup.confirmpassword.focus();
return false;
}
return true;
} 

</script>
</head>
<body>
 <img class="wave" src="../../pic/login.png">
 <div class="container">
  <div class="img">
   <img src="../../pic/j.png">
  </div>
  <div class="login-content">
        <form method="post" name="signup" onsubmit="return checkpass();">
    <img src="../../pic/undraw_Female_avatar_efig.png">
    <h2 class="title">Register Now</h2>
                <div class="row mb-3">
<div class="col-md-6">
<div class="form-floating mb-3 mb-md-0">
<input class="form-control" id="fname" name="fname" type="text" placeholder="Enter your first name" required />
<label for="inputFirstName">First name</label>
</div>
</div>
                                                
<div class="col-md-6">
<div class="form-floating">
<input class="form-control" id="lname" name="lname" type="text" placeholder="Enter your last name" required />
 <label for="inputLastName">Last name</label>
</div>
</div>
</div>


<div class="form-floating mb-3">
<input class="form-control" id="email" name="email" type="email" placeholder="chelibeti@example.com" required />
<label for="inputEmail">Email address</label>
</div>
 

<div class="form-floating mb-3">
<input class="form-control" id="contact" name="contact" type="text" placeholder="1234567890" required pattern="[0-9]{10}" title="10 numeric characters only"  maxlength="10" required />
<label for="inputcontact">Contact Number</label>
</div>

<div class="form-floating mb-3">
<input class="form-control" id="location" name="location" type="text" placeholder="Where's your location?" required />
<label for="inputcontact">Location</label>
</div>
        


<div class="row mb-3">
<div class="col-md-6">
 <div class="form-floating mb-3 mb-md-0">
<input class="form-control" id="password" name="password" type="password" placeholder="Create a password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required/>
<label for="inputPassword">Password</label>
</div>
</div>
                                                

<div class="col-md-6">
<div class="form-floating mb-3 mb-md-0">
<input class="form-control" id="confirmpassword" name="confirmpassword" type="password" placeholder="Confirm password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required />
<label for="inputPasswordConfirm">Confirm Password</label>
</div>
</div>
</div>
                                            

<div class="mt-4 mb-0">
<div class="d-grid"><button type="submit" class="btn btn-primary btn-block" name="submit">Register</button></div>

                                        
                               
                                   
 <div class="small"><a href="login.php">Have an account? Go to login</a></div>
  <div class="small"><a href="../../index.php">Back to Home</a></div>

                                    </div>
                                </div>
                            </div>
                        </div>
</body>
</html>