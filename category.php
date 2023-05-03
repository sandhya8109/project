<?php 
session_start();
error_reporting(0);
include('login/loginsystem/includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

  <head>

  <link rel="shortcut icon" href="favicon.ico" type="image/png">
        <link rel="apple-touch-icon" href="favicon.ico">
        <meta name="description" content="-UPDATED-Front page is your one-stop Nigerian media platform that gives you update and keep you updated on trending news,  politics,  Entertainment,  health, sports and so much more.">  
        <meta name="keywords" content="News, trending, media, magazine, gossip, celebrities, lessons ,references,examples,tips, videos, beginners, free">
        <meta property="og:url" content="http://www.Front-page.com">
        <meta property="og:image" content="http://www.Front-page.com/image-name.jpg">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="style.css">
        <meta name="msapplication-navbutton-color" content="#ffffff">
        <meta name="apple-mobile-web-app-status-bar-style" content="#ffffff">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">

    <title>CheliBeti | Category</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">

  </head>

  <body>
  <?php include('header.php');?>
   <div class="row">
                
          <div class="main">
                <div class="imgprops" style="height:auto;">
         
  <!-- Blog Post -->
  <?php 
        if($_GET['catid']!= ''){
$_SESSION['catid']=intval($_GET['catid']);
}
  

     if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 8;
        $offset = ($pageno-1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId='".$_SESSION['catid']."' and tblposts.Is_Active=1 order by tblposts.id desc LIMIT $offset, $no_of_records_per_page");

$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
echo "No record found";
}
else {
while ($row=mysqli_fetch_array($query)) {


?>
<h1 class="News-heading"><?php echo htmlentities($row['category']);?> </h1>
          <div class="card mb-4">
       <img class="postimgtopt" src="login/loginsystem/admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
            <div class="card-body">
              <h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>
           
              <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" style="background-color:#c33764; border-color:#c33764;" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on <?php echo htmlentities($row['postingdate']);?>
           
            </div>
          </div>
<?php } ?>
               </div>
                 
                 </div>
                <div class="side">
                 
                  <div class="imgprops" style="height:auto;">
                 <!-- Sidebar Widgets Column -->
<?php include('sidebar.php');?>
                </div>
                 <div class="imgprops" style="height:auto;"></div>
                 <div class="imgprops" style="height:auto;"></div>
              </div> 
            
           
</div>

  <!-- Pagination -->

  <ul class="pagination justify-content-center mb-4">
        <li class="page-item"><a href="?pageno=1"  class="page-link">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Next</a>
        </li>
        <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
    </ul>
<?php } ?>



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

    <!-- Footer -->
      <?php include('footer.php');?>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 
</head>
  </body>

</html>
