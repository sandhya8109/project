


<?php 
session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
    
?>
<?php
// start session
session_start();

// connect to database
$db_host = 'localhost';
$db_name = 'chelibeti';
$db_user = 'root';
$db_pass = '';

$db = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);

// check if form is submitted
if (isset($_POST['submit'])) {
  // get form data
  $name = $_POST['name'];
  $description = $_POST['description'];
  $location = $_POST['location'];
  $image = $_FILES['image'];

  // handle image upload
  $image_name = $image['name'];
  $image_tmp_name = $image['tmp_name'];
  $image_size = $image['size'];
  $image_error = $image['error'];
  $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
  $allowed_exts = array('jpg', 'jpeg', 'png', 'gif');

  if (in_array($image_ext, $allowed_exts)) {
    if ($image_error === 0) {
      if ($image_size <= 1000000) {
        $image_new_name = uniqid('', true) . '.' . $image_ext;
        $image_dest = 'uploads/' . $image_new_name;
        move_uploaded_file($image_tmp_name, $image_dest);

        // save data to database
        $stmt = $db->prepare("INSERT INTO pads (name, description, location, image) VALUES (:name, :description, :location, :image)");
        $stmt->execute(array(':name' => $name, ':description' => $description, ':location' => $location, ':image' => $image_new_name));

        // redirect to success page
        header('Location: success.php');
        exit();
      } else {
        $error_msg = 'Error: Image size should be less than or equal to 1MB.';
      }
    } else {
      $error_msg = 'Error: There was a problem uploading your image.';
    }
  } else {
    $error_msg = 'Error: Only JPG, JPEG, PNG, and GIF files are allowed.';
  }

  // display error message
  echo $error_msg;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Dashboard | Registration and Login System </title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
   <?php include_once('includes/navbar.php');?>
        <div id="layoutSidenav">
          <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row"><form method="post" enctype="multipart/form-data">
  <label for="name">Pad Name:</label>
  <input type="text" id="name" name="name" required><br><br>
  
  <label for="description">Pad Description:</label>
  <textarea id="description" name="description" required></textarea><br><br>
  
  <label for="location">Pad Location:</label>
  <select id="location" name="location">
    <option value="location1">Location 1</option>
    <option value="location2">Location 2</option>
    <option value="location3">Location 3</option>
  </select><br><br>

  <label for="image">Pad Image:</label>
  <input type="file" id="image" name="image" accept="image/*" required><br><br>

  <input type="submit" name="submit" value="Add Pad">
</form>
