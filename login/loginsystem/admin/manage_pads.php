<?php session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{
// for deleting user
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from users where id='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
}
}
// Assume a database connection is already established

// Check if the admin has submitted the form

// Assume a database connection is already established

// Check if the admin has submitted the form
if (isset($_POST['location'])) {
    $location = $_POST['location'];

    // Check if pads for the location already exist in the database
    $check_pads = "SELECT * FROM pads WHERE location = '$location'";
    $result = mysqli_query($con, $check_pads);

    if (mysqli_num_rows($result) > 0) {
        echo "Pads are already available for location $location.";
    } else {
        // Insert a new row for the location and pads availability
        $insert_pads = "INSERT INTO pads (location, available) VALUES ('$location', 1)";
        $result = mysqli_query($con, $insert_pads);

        // Check if the pads were successfully added
        if ($result) {
            echo "Pads added successfully for location $location!";
        } else {
            echo "Error adding pads for location $location.";
        }
    }
}

?>



?>


   ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Manage Users | Registration and Login System</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <style>
          form {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin: 20px auto;
  max-width: 400px;
}

label {
  margin-bottom: 10px;
}

select {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  font-size: 16px;
  border: none;
  border-radius: 5px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  background-color: #f5f5f5;
}

button {
  padding: 10px;
  font-size: 16px;
  border: none;
  border-radius: 5px;
  background-color: #c33764;
  color: white;
  cursor: pointer;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #3e8e41;
}

        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    </head>
    <body class="sb-nav-fixed">
      <?php include_once('includes/navbar.php');?>
        <div id="layoutSidenav">
         <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Manage Pads</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Manage Pads</li>
                        </ol>
            
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Pads Destribution section:
                            </div>
                            <div class="card-body">
                             
<form method="post">
    <label for="location">Choose a location, you wanna make pad available:</label>
    <select id="location" name="location">
      <optgroup label="Kathmandu">
        <option value="ratnapark">Ratnapark, kathmandu</option>
         <option value="Durbarmarg">Durbarmarg</option>
       </optgroup>
        <optgroup label="pokhara">
           <option value="Lekhnath">Lekhnath</option>
            <option value="Lakeside">Lakeside</option>
            <option value="Pokhara International Airport">Pokhara International Airport</option>
          </optgroup>
        <optgroup label="Lalitpur">
        <option value="balkumari"> Balkumari</option>
        <option value="sadobato">Sadobato</option>
      </optgroup>
    </select>
    <button type="submit">Add pads Available 




                            </div>
                        </div>
                    </div>
                </main>
  <?php include('../includes/footer.php');?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>