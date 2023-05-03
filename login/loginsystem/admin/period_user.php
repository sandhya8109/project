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
        <style>
            /* Styles for the table */
table {
  border-collapse: collapse;
  width: 100%;
  margin-bottom: 1rem;
}

th, td {
  text-align: left;
  padding: 0.5rem;
  border: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
  font-weight: bold;
}

/* Styles for the table on small screens */
@media only screen and (max-width: 600px) {
  table {
    font-size: 14px;
  }

  th, td {
    padding: 0.25rem;
  }

  th {
    font-size: 16px;
  }
}

        </style>
        <link href="../css/styles.css" rel="stylesheet" />
        <style>
            /* Center the form and button */
form {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin: auto;
  margin-top: 50px;
  max-width: 400px;
}

button {
  margin-top: 20px;
  padding: 10px;
  background-color: #c33764;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: all 0.3s ease;
}

/* Add hover effect to the button */
button:hover {
  background-color: #3e8e41;
}

/* Add media queries for smaller screens */
@media screen and (max-width: 600px) {
  form {
    margin-top: 20px;
    max-width: 100%;
    padding: 0 10px;
  }
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
                        <h1 class="mt-4">Manage users period Date</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Period date notify</li>
                        </ol>
            
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Nearest Period date user list
                            </div>
                            <div class="card-body">
                                 <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            
                                  <th>First Name</th>
                                  <th> Last Name</th>
                                  <th> Email Id</th>
                                   <th>Contact no.</th>
                                  <th>Predicted Date</th>
                                 
                                
                                </thead>
                                    <tfoot>
                                        <tr>
                                        
                                  <th>First Name</th>
                                  <th> Last Name</th>
                                  <th> Email Id</th>
                                  <th>Contact no.</th>
                                  <th>Predicted Date</th>
                                  
                                 
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                
                                           
                                           <?php
$current_date = date('Y-m-d');

// Set the threshold date for the next period
$threshold_date = date('Y-m-d', strtotime('+7 days'));
$cnt=1;
// Query the users whose next period date is near and join the two tables
$sql = "SELECT users.id, users.fname, users.lname,users.contactno,users.email, menstrual_cycle_tracker.next_period_date 
        FROM users
        JOIN menstrual_cycle_tracker ON users.id = menstrual_cycle_tracker.user_id
        WHERE menstrual_cycle_tracker.next_period_date BETWEEN '$current_date' AND '$threshold_date'";
$result = mysqli_query($con, $sql);

// Check if the query was successful
if (!$result) {
    die('Error: ' . mysqli_error($con));
}

// Display the list of users in the admin panel

while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['fname'] . '</td>';
    echo '<td>' . $row['lname'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
     echo '<td>' . $row['contactno'] . '</td>';
    echo '<td>' . $row['next_period_date'] . '</td>';
    echo '</tr>';

}
echo '</table>';
if (isset($_POST['notify'])) {
    // Get the current date
    $current_date = date('Y-m-d');

    // Set the threshold date for the next period
    $threshold_date = date('Y-m-d', strtotime('+7 days'));

    // Query the users whose next period date is near
    $sql = "SELECT user_id, next_period_date FROM menstrual_cycle_tracker WHERE next_period_date BETWEEN '$current_date' AND '$threshold_date'";
    $result = mysqli_query($con, $sql);

    // Check if the query was successful
    if (!$result) {
        die('Error: ' . mysqli_error($conn));
    }

    // Loop through the result set and notify each user
    while ($row = mysqli_fetch_array($result)) {
        $user_id = $row['user_id'];
        $next_period_date = $row['next_period_date'];
        $message = "Your next period is coming soon. Pads are available in your location.";
        // TODO: Implement code to send notification to the user with $user_id and $message
        // For example, you could use a push notification service or send an email to the user
    }

    // Set a success message
    $success_message = "Notifications have been sent to all users whose period date is near.";
}

// Close the database connection
mysqli_close($con);
?>

<!-- Display the form and button -->
<form method="post">
    <button type="submit" id="notifyBtn" name="notify">Send Notification</button>
    <div id="popup" class="hide"></div>
</form>

<?php
// Display the success message, if set
if (isset($success_message)) {
    echo '<p>' . $success_message . '</p>';
}
?>
                                   
                                    </tbody>
                                </table>
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