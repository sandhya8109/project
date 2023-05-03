<?php 

session_start(); 
include_once('includes/config.php');

// Code for login 
if(isset($_POST['login']))
{
$password=mysqli_real_escape_string($con,$_POST['password']);
$dec_password = $_POST['password'];
$useremail=mysqli_real_escape_string($con,$_POST['uemail']);
$ret= mysqli_query($con,"SELECT id,fname, password FROM users WHERE email='$useremail'");
$num=mysqli_fetch_array($ret);
if ($num > 0 && password_verify($dec_password, $num['password']))
{

 $_SESSION['id']=$num['id'];
 $_SESSION['name']=$num['fname'];
 session_start();
    $_SESSION["loggedin"] = true;

    // Redirect to the home page
    header("Location: welcome.php");
    exit();
} 

else {
    // Show an error message if the credentials are invalid
  echo "<script>alert('Invalid username or password');</script>";
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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
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
           		    	<input type="password"  name="password" class="input" required placeholder="Password">
            	   </div>
		     	</div>
				 <div class="checkbox">
				 <label>
				  <input type="checkbox" checked="checked" name="remember"> Remember me
				</label>
            	<a href="password-recovery.php">Forgot Password?</a>
            	<input type="submit" class="btn" name="login" value="login">
				<a href="signup.php"><p>Don't have an account? Register!</p></a>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="../../js/signin.js"></script>
	<style>
		*{
	padding: 0;
	margin: 0;
	box-sizing: border-box;
}

body{
    font-family: 'Poppins', sans-serif;
    overflow: hidden;
}

.wave{
	position: fixed;
	bottom: 0;
	left: 0;
	height: 100%;
	z-index: -1;
}

.container{
    width: 100vw;
    height: 100vh;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-gap :7rem;
    padding: 0 2rem;
}

.img{
	display: flex;
	justify-content: flex-end;
	align-items: center;
}

.login-content{
	display: flex;
	justify-content: flex-start;
	align-items: center;
	text-align: center;
}

.img img{
	width: 500px;
}

form{
	width: 360px;
}

.login-content img{
    height: 100px;
}

.login-content h2{
	margin: 15px 0;
	color: #333;
	text-transform: uppercase;
	font-size: 2.9rem;
}

.login-content .input-div{
	position: relative;
    display: grid;
    grid-template-columns: 7% 93%;
    margin: 25px 0;
    padding: 5px 0;
    border-bottom: 2px solid #d9d9d9;
}

.login-content .input-div.one{
	margin-top: 0;
}

.i{
	color: #d9d9d9;
	display: flex;
	justify-content: center;
	align-items: center;
}

.i i{
	transition: .3s;
}

.input-div > div{
    position: relative;
	height: 45px;
}

.input-div > div > h5{
	position: absolute;
	left: 10px;
	top: 50%;
	transform: translateY(-50%);
	color: #999;
	font-size: 18px;
	transition: .3s;
}

.input-div:before, .input-div:after{
	content: '';
	position: absolute;
	bottom: -2px;
	width: 0%;
	height: 2px;
	background-color: #c33764;
	transition: .4s;
}

.input-div:before{
	right: 50%;
}

.input-div:after{
	left: 50%;
}

.input-div.focus:before, .input-div.focus:after{
	width: 50%;
}

.input-div.focus > div > h5{
	top: -5px;
	font-size: 15px;
}

.input-div.focus > .i > i{
	color: #c33764;
}

.input-div > div > input{
	position: absolute;
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	border: none;
	outline: none;
	background: none;
	padding: 0.5rem 0.7rem;
	font-size: 1.2rem;
	color: #555;
	font-family: 'poppins', sans-serif;
}

.input-div.pass{
	margin-bottom: 4px;
}

a{
	display: block;
	text-align: right;
	text-decoration: none;
	color: #999;
	font-size: 0.9rem;
	transition: .3s;
}

a:hover{
	color: #c33764;
}
.checkbox{
	display: block;
	text-align: left;
	text-decoration: none;
	color: #999;
	font-size: 0.9rem;
	transition: .3s;
}
p{
	text-align: center;
}
 p:hover{
	color: #c33764;
 }
.btn{
	display: block;
	width: 100%;
	height: 50px;
	border-radius: 25px;
	outline: none;
	border: none;
	background-image: linear-gradient(to right, #c33764,#c33764, #1D2671);
	background-size: 200%;
	font-size: 1.2rem;
	color: #fff;
	font-family: 'Poppins', sans-serif;
	text-transform: uppercase;
	margin: 1rem 0;
	cursor: pointer;
	transition: .5s;
}
.btn:hover{
	background-position: right;
}


@media screen and (max-width: 1050px){
	.container{
		grid-gap: 5rem;
	}
}

@media screen and (max-width: 1000px){
	form{
		width: 290px;
	}

	.login-content h2{
        font-size: 2.4rem;
        margin: 8px 0;
	}

	.img img{
		width: 400px;
	}
}

@media screen and (max-width: 900px){
	.container{
		grid-template-columns: 1fr;
	}

	.img{
		display: none;
	}

	.wave{
		display: none;
	}

	.login-content{
		justify-content: center;
	}
}

</style>
</body>
</html>