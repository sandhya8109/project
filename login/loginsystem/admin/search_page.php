<?php session_start();
include_once('../includes/connect.php');

if(isset($_POST['delete'])){
    $delete_id=$_POST['post_id'];
    $delete_id= filter_var($delete_id, FILTER_SANITIZE_STRING);
    $select_image= $conn->prepare("SELECT * FROM 'posts' WHERE id=?");
    $select_image-> execute([$delete_id]);
    $fetch_image = $select_image->fetch(PDO::FETCH_ASSOC);
    $fetch_delete_image = $delete_image->fetch(PDO::FETCH_ASSOC);
   if($fetch_image['image'] != ''){
      unlink('../assets/img'.$fetch_image['image']);
   }
   $delete_post = $conn->prepare("DELETE FROM `posts` WHERE id = ?");
   $delete_post->execute([$delete_id]);
   $delete_likes= $conn->prepare("DELETE FROM `likes` WHERE post_id = ?");
   $delete_likes->execute([$delete_id]);
   $delete_comments = $conn->prepare("DELETE FROM `comments` WHERE post_id = ?");
   $delete_comments->execute([$delete_id]);
   $message[] = 'post deleted successfully!';
}
?>

<DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
        <meta name="author" content="" />
<link href="../css/article.css" rel="stylesheet"/>
</head>
<body>
<?php include_once('includes/navbar.php');?>
        <div id="layoutSidenav">
         <?php include_once('includes/sidebar.php');?>
<section class="show-posts">
   <h1 class="heading">Search Your Posts</h1>
   <form action="search_page.php" method="POST" class="search-from">
      <input type="text" placeholder="search posts..." required maxlength="100" name="search_box">
      <button class="fas fa-search" type="submit" name="search_btn"></button>
   </form>
   <div class="box-container">
<?php
    if(isset($_POST['search_box']) or isset($_POST['serach_btn'])){
        $search_box= $_POST['search_box'];
   $select_posts = $conn->prepare("SELECT * FROM `posts` WHERE admin_id = ? AND title LIKE '%{$search_box}%'");
   $select_posts->execute([$admin_id]);
   if($select_posts->rowCount() > 0){
      while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
         $post_id = $fetch_posts['id'];

         $count_post_comments = $conn->prepare("SELECT * FROM `comments` WHERE post_id = ?");
         $count_post_comments->execute([$post_id]);
         $total_post_comments = $count_post_comments->rowCount();

         $count_post_likes = $conn->prepare("SELECT * FROM `likes` WHERE post_id = ?");
         $count_post_likes->execute([$post_id]);
         $total_post_likes = $count_post_likes->rowCount();

?>
<form method="post" class="box">
   <input type="hidden" name="post_id" value="<?= $post_id; ?>">
   <?php if($fetch_posts['image'] != ''){ ?>
      <img src="../uploaded_img/<?= $fetch_posts['image']; ?>" class="image" alt="">
   <?php } ?>
   <div class="status" style="background-color:<?php if($fetch_posts['status'] == 'active'){echo 'limegreen'; }else{echo 'coral';}; ?>;"><?= $fetch_posts['status']; ?></div>
      <div class="title"><?= $fetch_posts['title']; ?></div>
   <div class="posts-content"><?= $fetch_posts['content']; ?></div>
   <div class="icons">
      <div class="likes"><i class="fas fa-heart"></i><span><?= $total_post_likes; ?></span></div>
      <div class="comments"><i class="fas fa-comment"></i><span><?= $total_post_comments; ?></span></div>
   </div>
   <div class="flex-btn">
      <a href="edit_post.php?id=<?= $post_id; ?>" class="option-btn">edit</a>
      <button type="submit" name="delete" class="delete-btn" onclick="return confirm('delete this post?');">delete</button>
   </div>
   <a href="read_post.php?post_id=<?= $post_id; ?>" class="btn">view post</a>
</form>
<?php
      }
   }else{
      echo '<p class="empty">no posts added yet! <a href="add_posts.php" class="btn" style="margin-top:1.5rem;">add post</a></p>';
   }
}
?>

</div>
</section>
<script src="../js/admin_script.js"></script>      
</body>

</html>