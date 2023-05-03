<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chelibeti";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lastPeriodDate = $_POST["last_period_date"];
    $cycleLength = $_POST["cycle_length"];
    $periodLength = $_POST["period_length"];
      $id = $_SESSION['id'];

    // Check if user has already submitted the form
    $checkQuery = "SELECT * FROM menstrual_cycle_tracker where id=$id";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        // User has already submitted the form, hide the form and display output
        echo "You have already submitted the form. Here is the prediction:<br>";
        echo "Last Period Date: " . $lastPeriodDate . "<br>";
        echo "Cycle Length: " . $cycleLength . "<br>";
        echo "Period Length: " . $periodLength . "<br>";
     
    } else {
        // Insert form data into database
        $insertQuery = "INSERT INTO menstrual_cycle_tracker (id,last_period_date, cycle_length, period_length)
                        VALUES ('$id','$lastPeriodDate', '$cycleLength', '$periodLength')";

        if ($conn->query($insertQuery) === TRUE) {
            echo "Form submitted successfully!";
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }

    // Close database connection
 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Period Tracker</title>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard | CHELI-BETI</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
       
             <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.1.2/tailwind.min.css" rel="stylesheet"/>  
             <link href="css/styles.css" rel="stylesheet" />
             <link href="welcome.css" rel="stylesheet" />


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.2/alpine.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/simple-jscalendar@1.4.4/source/jsCalendar.js" crossorigin="anonymous"></script>
    <style>
    	<style>
    /* Container for the form */
.form-container {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f0f0f0;
  border: 1px solid #ddd;
  border-radius: 5px;
}

/* Form elements */
.form-container input[type="text"],
.form-container input[type="date"],
.form-container input[type="submit"] {
  display: block;
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
}

/* Submit button */
.form-container input[type="submit"] {
  background-color: #007bff;
  color: #fff;
  border: none;
  cursor: pointer;
}

/* Error message */
.form-container .error {
  color: #ff0000;
  margin-bottom: 10px;
}

</style>

    </style>
</head>

	<body class="sb-nav-fixed">
      <?php include_once('includes/navbar.php');?>

        <div id="layoutSidenav">
          <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <hr />
                        <ol class="breadcrumb mb-4">
         
                        </ol>
                        <div class="qr-container">
    
    <?php
    // Check if user has already submitted the form
    $checkQuery = "SELECT * FROM menstrual_cycle_tracker";
    $result = $conn->query($checkQuery);

    if ($result->num_rows == 0) {
        // Show form if user has not submitted the form yet
        ?>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <label for="last_period_date">Last Period Date:</label>
            <input type="date" name="last_period_date" required><br>
            <label for="cycle_length">Cycle Length (in days):</label>
            <input type="number" name="cycle_length" required><br>
            <label for="period_length">Period Length (in days):</label>
            <input type="number" name="period_length" required><br>
            <input type="submit" value="Submit">
        </form>
   

                </main>
          <?php include('includes/footer.php');?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="welcome.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>
</body>
</html>
