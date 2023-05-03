<?php
include('header.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/contact.css">
    <!-- Fontawesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
           <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="../project/css/about.css">

        </head>
   <body>
    <section class = "contact-section">
      <div class = "contact-bg">
        <h3>Get in Touch with Us</h3>
        <h2>ABOUT US</h2>
        <div class = "line">
          <div></div>
          <div></div>
          <div></div>
        </div>
        <p class = "text">"Poor menstrual hygiene caused by a lack of education, persisting taboos and stigma, limited access to hygienic menstrual products and poor sanitation infrastructure undermines the educational opportunities, health and overall social status of women and girls* around the world. As a result, millions of women and girls are prevented from reaching their full potential.
          CheliBeti is a website that track your menstruation cycle and using that information we will be providing you free pad which will improve your health as well as burden to buy pad is also reduced." </p>
      </div>
</section>
<br>
<br>
	<section>
<div class="container">
  <div class="header">
    <h1>Our Team</h1>
</div>
<div class="sb-container">
	<div class="teams">
<img src="../project/pic/san.jpg" alt="">
  <div class="name">Sandhya Rimal </div>
  <div class="desig">web Developer</div>
  <div class="about">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus asperiores vitae eos, distinctio tenetur accusantium omnis officiis laudantium, facere ullam culpa recusandae quas mollitia voluptates minima cupiditate, consectetur fuga dicta?</div>
<div class="social-links">
<a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
</div>
</div>
<div class="teams">
<img src="../project/pic/panda.jpg" alt="">
  <div class="name">Anisha Shrestha </div>
  <div class="desig">web Developer</div>
  <div class="about">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus asperiores vitae eos, distinctio tenetur accusantium omnis officiis laudantium, facere ullam culpa recusandae quas mollitia voluptates minima cupiditate, consectetur fuga dicta?</div>
<div class="social-links">
<a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
</div>
</div>
<div class="teams">
<img src="../project/pic/srz.jpg"  alt="">
  <div class="name">Saroj Bashyal </div>
  <div class="desig">web Developer</div>
  <div class="about">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus asperiores vitae eos, distinctio tenetur accusantium omnis officiis laudantium, facere ullam culpa recusandae quas mollitia voluptates minima cupiditate, consectetur fuga dicta?</div>
<div class="social-links">
<a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
</div>
</div>
</div>
</div>
</section>
<?php
include('top.php');
?>
	<?php
include('footer.php');
?>
</section>
<style>
  
* {
    margin: 0;
    text-decoration: none;
    box-sizing: border-box;
	
	font-family: "Josefin Sans", sans-serif;

}
.contact-bg{
    height: 100vh;
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.8)), url(../pic/menstruation-period-calendar-women-to-check-date-cycle-illustration-vector.jpg);
    background-position: 50% 40%;
    background-repeat: no-repeat;
    background-attachment: fixed;
    text-align: center;
    color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.contact-bg h3{
    font-size: 1.3rem;
    font-weight: 400;
}
.contact-bg h2{
    font-size: 3rem;
    text-transform: uppercase;
    padding: 0.4rem 0;
    letter-spacing: 4px;
}

  
.container{
	text-align:center;
	background: #f5f5f5;
}
.header{
	padding-top: 30px;
	color:#c33764;
	font-size: 20px;
	margin: auto;
	line-height: 50px;
}
.sb-container{
	max-width: 1200px;
	margin: auto;
	padding: 30px 0;
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
}
.teams{
	margin: 10px;
	padding: 22px;
	max-width: 30%;
	cursor: pointer;
	transition:0.4s;
	box-sizing: border-box;
	border: 1px solid #444;
}
.teams:hover{
	background-color: #ddd;
border-radius: 12px;
}
.teams img{
	width: 200px;
height: 200px;
}
.name{
	padding: 12px;
	font-weight: bold;
	font-size: 16px;
	text-transform: uppercase;
}
.desig{
	font-style: italic;
	color: #c33764;
}
.about{
	margin: 20px 0;
	font-weight: lighter;
	color: #4e4e4e;
}
.social-links{
	margin: 14px;
	}
	.social-links a {
		display: inline-block;
		height:30px;
		width: 30px;
		transition: .4s;
	}
	.social-links a:hover {
transform: scale(1.5);
	}
	.social-links a i{
color:#c33764;
	}		 
	@media screen and (max-width: 600px){
		.teams{
			max-width: 100%;
		}
	}
 
  </style>
</body>
</html>