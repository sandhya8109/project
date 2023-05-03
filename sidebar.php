<div class="col-md-14" >

<!-- Search Widget -->
<div class="card mb-4">
  <h5 class="card-header">SEARCH </h5>
  <div class="card-body">
         <form name="search" action="search.php" method="post">
    <div class="input-group">
<input type="text" name="searchtitle" class="form-control" placeholder="Search anything" required>
      <span class="input-group-btn" >
        <button class="btn btn-secondary" style="background-color: #c33764; border-color: #c33764" type="submit" >Go!</button>
      </span>
    </form>
    </div>
  </div>
</div>

<!-- Categories Widget -->
<div class="card my-4">
  <h5 class="card-header">Categories</h5>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-6">
        <ul class="list-unstyled mb-0">
<?php $query=mysqli_query($con,"select id,CategoryName from tblcategory");
while($row=mysqli_fetch_array($query))
{
?>

          <li>
            <a href="category.php?catid=<?php echo htmlentities($row['id'])?>" style="color: #c33764;"><?php echo htmlentities($row['CategoryName']);?></a>
          </li>
<?php } ?>
        </ul>
      </div>

    </div>
  </div>
</div>

<!-- Side Widget -->
<div class="card my-4">
  <h5 class="card-header">Recent News</h5>
  <div class="card-body">
            <ul class="mb-0">
<?php
$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc limit 8");
while ($row=mysqli_fetch_array($query)) {

?>

<li >
            <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" style="color: #c33764;"><?php echo htmlentities($row['posttitle']);?></a>
          </li>
  <?php } ?>
</ul>
  </div>
</div>

</div>
