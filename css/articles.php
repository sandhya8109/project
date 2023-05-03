<?php session_start();
include_once('../includes/connect.php');
error_reporting(0);
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 };
 
 include 'like_post.php';
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Articles</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../css/article_user.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    </head>
<body>
<section class="home-grid">

   <div class="box-container">

      <div class="box">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
               $count_user_comments = $conn->prepare("SELECT * FROM `comments` WHERE user_id = ?");
               $count_user_comments->execute([$user_id]);
               $total_user_comments = $count_user_comments->rowCount();
               $count_user_likes = $conn->prepare("SELECT * FROM `likes` WHERE user_id = ?");
               $count_user_likes->execute([$user_id]);
               $total_user_likes = $count_user_likes->rowCount();
         ?>
         <p> Welcome <span><?= $fetch_profile['name']; ?></span></p>
         <p>total comments : <span><?= $total_user_comments; ?></span></p>
         <p>posts liked : <span><?= $total_user_likes; ?></span></p>
         <div class="flex-btn">
            <a href="user_likes.php" class="option-btn">likes</a>
            <a href="user_comments.php" class="option-btn">comments</a>
         </div>
         <?php
            }else{
         ?>
            <p class="name">Login or register!</p>
            <div class="flex-btn">
               <a href="login.php" class="option-btn">login</a>
               <a href="signup.php" class="option-btn">Register</a>
            </div> 
         <?php
          }
         ?>
      </div>

      <div class="box">
         <p>Categories</p>
         <div class="flex-box">
            <a href="category.php?category=Menstrual Health" class="links">Menstrual Health</a>
            <a href="category.php?category=Period Products" class="links">Period Products</a>
            <a href="category.php?category=Pregnancy Care" class="links">Pregnancy Care</a>
            <a href="category.php?category=Womens Health and Hygiene" class="links">Womens Health and Hygiene</a>
            <a href="category.php?category=Maternal Health" class="links">Maternal Health</a>
            <a href="category.php?category=Aging in Women" class="links">Aging in Women</a>
            <a href="category.php?category=Diseases in women" class="links">Diseases in women</a>
            <a href="category.php?category=Cancer" class="links">Cancer</a>
            <a href="category.php?category=Skin Care" class="links">Skin Care</a>
            <a href="category.php?category=Other" class="links">Other</a>
            <a href="all_category.php" class="btn">View all</a>
         </div>
      </div>

   </div>
</section>
<section class="posts-container">

   <h1 class="heading">Latest posts</h1>

   <div class="box-container">

      <?php
         $select_posts = $conn->prepare("SELECT * FROM `posts` WHERE status = ? LIMIT 6 ");
         $select_posts->execute(['active']);
         if($select_posts->rowCount() > 0){
            while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
               
               $post_id = $fetch_posts['id'];

               $count_post_comments = $conn->prepare("SELECT * FROM `comments` WHERE post_id = ?");
               $count_post_comments->execute([$post_id]);
               $total_post_comments = $count_post_comments->rowCount(); 

               $count_post_likes = $conn->prepare("SELECT * FROM `likes` WHERE post_id = ?");
               $count_post_likes->execute([$post_id]);
               $total_post_likes = $count_post_likes->rowCount();

               $confirm_likes = $conn->prepare("SELECT * FROM `likes` WHERE user_id = ? AND post_id = ?");
               $confirm_likes->execute([$user_id, $post_id]);
      ?>
      <form class="box" method="post">
         <input type="hidden" name="post_id" value="<?= $post_id; ?>">
         <input type="hidden" name="admin_id" value="<?= $fetch_posts['admin_id']; ?>">
         <?php
            if($fetch_posts['image'] != ''){  
         ?>
         <img src="assets/img/<?= $fetch_posts['image']; ?>" class="post-image" alt="">
         <?php
         }
         ?>
         <div class="post-title"><?= $fetch_posts['title']; ?></div>
         <div class="post-content content-150"><?= $fetch_posts['content']; ?></div>
         <a href="view_post.php?post_id=<?= $post_id; ?>" class="inline-btn">Read more</a>
         <a href="category.php?category=<?= $fetch_posts['category']; ?>" class="post-cat"> <i class="fas fa-tag"></i> <span><?= $fetch_posts['category']; ?></span></a>
         <div class="icons">
            <a href="view_post.php?post_id=<?= $post_id; ?>"><i class="fas fa-comment"></i><span>(<?= $total_post_comments; ?>)</span></a>
            <button type="submit" name="like_post"><i class="fas fa-heart" style="<?php if($confirm_likes->rowCount() > 0){ echo 'color:red;'; } ?>  "></i><span>(<?= $total_post_likes; ?>)</span></button>
         </div>
      
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">no posts added yet!</p>';
      }
      ?>
   </div>

   <div class="more-btn" style="text-align: center; margin-top:1rem;">
      <a href="posts.php" class="inline-btn">View all posts</a>
   </div>

</section>

<script src="js/userscript.js"></script>

</body>
</html>