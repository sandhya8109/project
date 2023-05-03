<?php 
session_start();
include('login/loginsystem/includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chelibeti | Articles</title>
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="favicon.ico" type="image/png">
        <link rel="apple-touch-icon" href="favicon.ico">
        <meta name="description" content="">  
        <meta name="keywords" content=" ">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
      
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="theme-color" content="#ffffff">
        <meta name="msapplication-navbutton-color" content="#ffffff">
        <meta name="apple-mobile-web-app-status-bar-style" content="#ffffff">
         <!-- Bootstrap core CSS -->
   <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <style>
           * {
    box-sizing: border-box;
    margin: 0px;
  }
  
  body {
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
    background-color: #f1f1f1;
  }  
  /*header*/
  .brand{
    text-align: center;
     float: end;
     margin-top: 0px;
  }
  .brand a{
      text-decoration: none;
      color: #fff;
      font-family: Berlin Sans FB;
      -webkit-animation-name: example; /* Chrome, Safari, Opera */
      -webkit-animation-duration: 4s; /* Chrome, Safari, Opera */
      animation-name: branddesign;
      animation-duration: 4s;
      animation-iteration-count: 2;
  }
  @keyframes branddesign {
      0%   {color: #282e3b;}
      25%  { color: white;}
      50%  { color: #282e3b;}
      100% { color: white;}
  }
  /*sidenavigation*/
  .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: white;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
  }
  
  .sidenav a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 25px;
      display: block;
      transition: 0.3s
  }
  
  .sidenav a:hover{
      color: #ff5a1c;
      text-decoration-thickness: 3px;
  }
  .closebtn {
      font-size: 36px !important;
  }
  .main-side-container{
    display: -webkit-flex;
      display: flex;
      -webkit-flex-wrap: nowrap;
      flex-wrap: nowrap;
  }
  .main-side-container div a{
    font-size: 15pt;
  }
  .main-side-container div hr{
  height: 2px;
  width: 80%;
  border: none;
  border-radius: 7px;
  background-color:#fff;
  }
  .w-f-u{
    background-color: #00b600;
    border-radius: 5px;
  }
  .w-f-u:hover{
    color: white !important;
    box-shadow: 0px 0px 10px red;
  }
  
  .sub-side-container:first-child{
    color: red;
  }
  /* Responsive layout*/
  @media screen and (max-width: 1080px) {
    .main-side-container{
      display: -webkit-flex;
        display: flex;
        -webkit-flex-wrap: wrap;
        flex-wrap: wrap;
    }
    .main-side-container div a{
      font-size: 14pt;
    }
  }@media screen and (max-width: 863px) {
  .main-side-container div a{
      font-size: 13pt;}
    }
    @media screen and (max-width: 820px) {
      .main-side-container div a{
          font-size: 12pt;
      }
      .w-f-u{
       margin-bottom: 10px;
        margin-left: 10px;
      }
  }
  h4 {
      text-align: center;
      font-size: 60px;
      margin-top: 0px;
    }
    .svg-clock{
      width: 11px;
      fill:grey;
    }
    /* Increase the font size of the h1 element */
    .header h1 {
      font-size: 40px;
    }
    
    /* Column container */
    .row {  
      display: flex;
      flex-wrap: wrap;
    }
    
    /* Create two unequal columns that sits next to each other */
    /* Sidebar/left column */
    .side {
      flex: 30%;
      background-color: #f1f1f1;
      padding: 20px;
    }
    /* Main column */
    .main {   
      flex: 40%;
      background-color: white;
      padding: 20px;
    }
    
    /*  image */
    .imgprops {
      width: 100%;
    }
    @media screen and (max-width: 800px) {
      .side{
  flex: 50%;
      }
      .main{
        flex: 50%;
      }
      
    }
    /* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 500px) {
      .row {   
        flex-direction: column;
      }
    }
    
    /* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
    @media screen and (max-width: 400px) {
      .navbar a {
        float: none;
        width:100%;
      }
    }
    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        right:  0;
        background-color:#282e3b ;
        overflow-x: hidden;
        transition: 0.5s;
        padding:0px;
    opacity: .90;
    }
    
    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #fff;
        display: block;
        transition: 0.3s;
    
    }
    
    .sidenav a:hover, .offcanvas a:focus{
        color:red;
        text-decoration: none;
    }
    
    .closebtn {
        position: relative;
        top: 0;
        right: 25px;
        font-size: 36px !important;
         
    }
    
    #main {
        transition: margin-left .5s;
      
      color: white;
    }
    
    @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
    }
  @media screen and (max-width: 700px){
  .top-nav{
      display: none;
  }
  }
  @media screen and (max-width: 1000px){
    .top-nav{
      margin-left: 70px !important;
    }
    }
  .top-nav{
    margin-bottom: 70px;
    margin-left: 30%;
    
  }
  .nav{
    width: auto;
    height: 40px;
    border: none;
    line-height: 20px;
  }
  .top-nav a{
  text-decoration: none;
  color: #fff;
  font-family: Berlin Sans FB;
  
  }
  .top-nav a:hover{
    color: red;
  }
  .top-nav a li{
    list-style: none;
  float: left;
    font-size: 12pt ;
    margin-right: 20px;
  }
  .fa-circle{
  color: red;
  margin-left: 3px;
  }
  #c-color{
        text-transform: uppercase;
    }
   .header-box{
     background-color: #1d2330;
     height:70px;
   }
   .News-heading{
     text-decoration: navy;    
     font-size:12pt;
     display:flex;
     flex-direction:row;
   }
   .News-heading:before, .News-heading:after{
  content: "";
  flex: 1 1;
  border-bottom: 1px solid;
  margin:auto;
   }
   .News-heading:before{
     margin-right: 10px;
   }
   .News-heading:after{
     margin-left: 10px;
   }
   footer{
     background-color: #282e3b;
     margin: 0px;
   }
  
  .footer-main-container{
    display: -webkit-flex;
        display: flex;
        -webkit-flex-wrap: wrap;
        flex-wrap: wrap;
  }
  .footer-main-container div{
    margin-left: 5px;
    width: 300px;
  }
  .footer-main-container div hr{
    width: 80%;
    margin-left: 0px;
  }
  .facb:hover{
    color: rgb(62, 62, 214) !important;
  }
  .insg:hover{
    color: rgba(255, 0, 21, 0.493) !important;
  }
  .twit:hover{
    color: skyblue !important;
  }
  .teleg:hover{
    color: rgb(33, 135, 175) !important;
  }
  .footer-main-container div p{
    color: #828da670;
  }
  .footer-main-container div a{
    text-decoration: none;
    font-size: 15pt;
   color: #828da6;
   font-size: 13pt;
   line-height: 35px;
  }
  .footer-main-container div a:hover{
    color: #fff;
  }
  .sub-container:first-child{
    color: #fff;
  }
  .footer-terms{
    text-align: center;
    color:#828da6 ;
    font-size: 10pt;
  }
  .footer-terms a{
    color: #f1f1f1;
    text-decoration: none;
    font-size: 10pt;
  }
 
   .card-title-font{
     color:black;
     font-size: 15pt
   }
 .postimgtop{
  width:100%;
   height:320px;
   border-radius:5px 5px 0 0;
 }
 .postimgtop-con{
   height: auto;
 }
 .postimgtopt{
  width:100%;
   height:250px;
   border-radius:5px 5px 0 0;
 }
 .fixed-bar{
  position: fixed;
  top:0;
  width: 100%;
  z-index: 1;
 }
/*scroll to top*/
 @keyframes rotate {
   to {
     transform: rotate(2520deg);
   }
 }
 #myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color:#c33764;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #1d2671;
  animation-name: rotate;
     animation-duration: 3s;
     animation-timing-function: linear;
     animation-iteration-count: infinite;
}
        </style>
</head>

<body>
<?php include('header.php');?>
                 
            <br><br>  <div class="row">
            <div class="side">
                 
                 <div class="imgprops" style="height:auto;">
                <!-- Sidebar Widgets Column -->
<?php include('sidebar.php');?>
               </div>
                 <div class="imgprops" style="height:auto;">
                <!-- Blog Post -->   
  <?php 
        if (isset($_GET['pageno'])) {
         $pageno = $_GET['pageno'];
     } else {
         $pageno = 1;
     }
     $no_of_records_per_page = 5;
     $offset = ($pageno-1) * $no_of_records_per_page;


     $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
     $result = mysqli_query($con,$total_pages_sql);
     $total_rows = mysqli_fetch_array($result)[0];
     $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=2 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>
<h6 style="border-top: 2px solid white; color: c33764;  font-family: Berlin Sans FB;">
<svg viewBox="0 0 512 512" class="svg-clock" ><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"/></svg> <?php echo time_elapsed_string($row['postingdate']);?>      

</h6>         
<div class="card mb-4">
<img class="postimgtopt" src="login/loginsystem/admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
         <div class="card-body" >
           <h2 class="card-title-font"><?php echo htmlentities($row['posttitle']);?></h2>
              
    
           <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>"  style="background-color: #c33764; border-color: #c33764" class="btn btn-primary">Read More &rarr;</a>
         </div>
       
       </div>
<?php } ?>
               </div>
                 </div>
                <div class="main">
                <h5 class="categorytitlediff" > <a href="article.php?catid=6" style="color: #c33764"class="News-heading">ARTICLES</a></h5>
                  <div class="imgprops" style="height:auto;">
                
      <!-- Blog Post -->
   <?php 
   
     if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 5;
        $offset = ($pageno-1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>
  <h6 style="border-top: 2px solid #aaa; color: #c33764;  font-family: Berlin Sans FB;">
  <svg viewBox="0 0 512 512" class="svg-clock" ><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"/></svg> <?php echo time_elapsed_string($row['postingdate']);?>      

<span style="float:right" ><i>Category : </i> <a style="color:#c33764" href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a> </span>
</h6>         
<div  class=" postimgtop-con">
 <img class="postimgtop" src="login/loginsystem/admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">

            <div class="card-body" >
            <h2 class="card-title-font"><?php echo htmlentities($row['posttitle']);?></h2>              
       
              <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" style="background-color: #c33764; border-color: #c33764" class="btn btn-primary">Read More &rarr;</a>
            </div>
          
          </div>
<?php } ?>

<?php 
           function time_elapsed_string($datetime, $full = false){
             $now = new DateTime;
             $ago = new DateTime($datetime);
             $diff = $now->diff($ago);

             $diff->w = floor($diff->d / 7);
             $diff->d -= $diff->w * 7;

             $string = array(
               'y' => 'year',
               'm' => 'month',
               'w' => 'week',
               'd' => 'day',
               'h' => 'hour',
               'i' => 'minute',
               's' => 'second',
             );
             foreach( $string as $k => &$v){
               if ($diff->$k) {
                 $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
               } else {
                 unset($string[$k]);
               }
               
             }
             if(!$full) $string = array_slice($string, 0, 1);
             return $string ? implode(', ', $string) . ' ago' : 'just now';
           }
           ?>

                </div>
                 
                 </div>
                 <div class="side">
                  <h5 class="categorytitlediff" > <a href="category.php?catid=6" style="color: #c33764"class="News-heading">TRENDING ARTICLES</a></h5>
                  <div class="imgprops" style="height:auto;">
          

                      <!-- Blog Post -->   
   <?php 
         if (isset($_GET['pageno'])) {
          $pageno = $_GET['pageno'];
      } else {
          $pageno = 1;
      }
      $no_of_records_per_page = 5;
      $offset = ($pageno-1) * $no_of_records_per_page;


      $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
      $result = mysqli_query($con,$total_pages_sql);
      $total_rows = mysqli_fetch_array($result)[0];
      $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=6 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>
<h6 style="border-top: 2px solid white; color: #c33764;  font-family: Berlin Sans FB;">
<svg viewBox="0 0 512 512" class="svg-clock" ><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"/></svg> <?php echo time_elapsed_string($row['postingdate']);?>      

</h6>         
<div class="card mb-4">
<img class="postimgtopt" src="login/loginsystem/admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
          <div class="card-body" >
            <h2 class="card-title-font"><?php echo htmlentities($row['posttitle']);?></h2>
               
     
            <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" style="background-color: #c33764; border-color: #c33764" class="btn btn-primary">Read More &rarr;</a>
          </div>
        
        </div>
<?php } ?>


                </div>
                 
                  <div class="imgprops" style="height:auto;">
                
                    <!-- Blog Post -->   
   <?php 
         if (isset($_GET['pageno'])) {
          $pageno = $_GET['pageno'];
      } else {
          $pageno = 1;
      }
      $no_of_records_per_page = 5;
      $offset = ($pageno-1) * $no_of_records_per_page;


      $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
      $result = mysqli_query($con,$total_pages_sql);
      $total_rows = mysqli_fetch_array($result)[0];
      $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=3 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>
<h6 style="border-top: 2px solid white; color: c33764;  font-family: Berlin Sans FB;">
<svg viewBox="0 0 512 512" class="svg-clock" ><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"/></svg> <?php echo time_elapsed_string($row['postingdate']);?>      

</h6>         
<div class="card mb-4">
<img class="postimgtopt" src="login/loginsystem/admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
          <div class="card-body" >
            <h2 class="card-title-font"><?php echo htmlentities($row['posttitle']);?></h2>
               
     
            <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" style="background-color: #c33764; border-color: #c33764"class="btn btn-primary">Read More &rarr;</a>
          </div>
        
        </div>
<?php } ?>

                </div>
              
                  <div class="imgprops" style="height:auto;">
                 <!-- Blog Post -->   
   <?php 
         if (isset($_GET['pageno'])) {
          $pageno = $_GET['pageno'];
      } else {
          $pageno = 1;
      }
      $no_of_records_per_page = 5;
      $offset = ($pageno-1) * $no_of_records_per_page;


      $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
      $result = mysqli_query($con,$total_pages_sql);
      $total_rows = mysqli_fetch_array($result)[0];
      $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=5 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>
<h6 style="border-top: 2px solid white; color: #c33764;  font-family: Berlin Sans FB;">
<svg viewBox="0 0 512 512" class="svg-clock" ><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"/></svg> <?php echo time_elapsed_string($row['postingdate']);?>      

</h6>         
<div class="card mb-4">
<img class="postimgtopt" src="login/loginsystem/admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
          <div class="card-body" >
            <h2 class="card-title-font"><?php echo htmlentities($row['posttitle']);?></h2>
               
     
            <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" style="background-color: #c33764; border-color: #c33764"class="btn btn-primary">Read More &rarr;</a>
          </div>
        
        </div>
<?php } ?>
                </div><br>           
                  
                </div>
   
              </div> 
            
           
</div>
&nbsp;
&nbsp;
 <!-- Pagination -->
 <ul class="pagination justify-content-center mb-4" style="margin: 0px">
        <li class="page-item"><a href="?pageno=1"  class="page-link">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Next</a>
        </li>
        <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
    </ul>


    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

              <footer>
                <!-- Footer -->
      <?php include('footer.php');?>

               </footer>
               <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>