<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
  header('location:logout.php');
} else {


  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  // Connect to your database
  $dbHost = 'localhost'; // Replace with your database host
  $dbUser = 'root'; // Replace with your database username
  $dbPass = ''; // Replace with your database password
  $dbName = 'chelibeti'; // Replace with your database name
  $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $userId = $_SESSION["id"];
  // Retrieve the predicted date from the database
  $sql = "SELECT next_period_date FROM menstrual_cycle_tracker
 where user_id=$userId"; // Replace with your table name and column name
  $result = mysqli_query($conn, $sql);
  if ($result) {
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $predictedDate = $row['next_period_date'];

      // Compare the predicted date with the current date
      $currentDate = date('Y-m-d');
      $dateDifference = strtotime($predictedDate) - strtotime($currentDate);
      $daysDifference = floor($dateDifference / (60 * 60 * 24));

      // Check if the predicted date is within the next 7 days
      if ($daysDifference <= 7 && $daysDifference >= 0) {
        // Display a JavaScript pop-up notification
        echo "<script>alert('Be Alert , You period date is Near ');</script>";
      }
    } else {
      echo "<script>alert('Plaease fill the form in period Deatils section to get notification of next period date');</script >";
    }
  } else {
    echo "Error: " . mysqli_error($conn);
  }
  $currentDate = date("Y-m-d");

  // Update next_period_date for users whose period_date has passed
  $sql = "SELECT user_id,next_period_date FROM menstrual_cycle_tracker WHERE next_period_date < '$currentDate'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $userId = $row['user_id'];

      $nextPeriodDate = $row['next_period_date'];

      // Calculate next_period_date after completing recent period date
      $nextPeriodDate = date("Y-m-d", strtotime($nextPeriodDate . " +1 month"));
      $nextPeriodDate = date("Y-m-d", strtotime($nextPeriodDate . " +1 day"));

      // Update next_period_date in the database
      $updateSql = "UPDATE menstrual_cycle_tracker SET next_period_date = '$nextPeriodDate' WHERE user_id = $userId";
      if (mysqli_query($conn, $updateSql)) {
        echo "Next period date updated for user with ID $userId. New next_period_date: $nextPeriodDate<br>";
      } else {
        echo "Error updating next_period_date for user with ID $userId: " . mysqli_error($conn) . "<br>";
      }
    }
  } else {
    echo "No users found whose period_date has passed.";
  }


  // Close database connection
  mysqli_close($conn);
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard | CHELI-BETI</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.1.2/tailwind.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link href="welcome.css" rel="stylesheet" />


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.2/alpine.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/simple-jscalendar@1.4.4/source/jsCalendar.js" crossorigin="anonymous"></script>



  </head>

  <body class="sb-nav-fixed">
    <?php include_once('includes/navbar.php'); ?>

    <div id="layoutSidenav">
      <?php include_once('includes/sidebar.php'); ?>
      <div id="layoutSidenav_content">
        <main>
          <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <hr />
            <ol class="breadcrumb mb-4">

            </ol>
            <div class="qr-container">
              <?php
              $user_id = $_SESSION['id'];
              $qr_data = 'https://example.com/user/' . $user_id;
              $qr_code = 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=' . urlencode($qr_data);

              // display QR code
            
              echo '<img src="' . $qr_code . '" alt="QR Code">';
              ?>
            </div>
            <?php
            if (!isset($_SESSION['form_submitted'])) {
              // form has not been submitted, display the form
              ?>
              <!-- your HTML form code goes here -->
              <section id="form-section">

                <h1>Menstrual Cycle Tracker</h1>
                <form method="post" action="process_form.php">
                  <label for="last_period_date">Date of last period:</label>
                  <input type="date" name="last_period_date" id="last_period_date" required><br>

                  <label for="cycle_length">Average menstrual cycle length (in days):</label>
                  <input type="number" name="cycle_length" id="cycle_length" min="1" required><br>

                  <label for="period_length">Average period length (in days):</label>
                  <input type="number" name="period_length" id="period_length" min="1" required><br>

                  <input type="submit" value="Save and predict next period">
                </form>

              </section>


              <?php
            } else {
              // form has been submitted, display the results
              echo "Thanks for you details , Your predicted next period date is: " . $_SESSION['next_period_date'];
            }
            ?>

          </div>
        </main>
        <?php include('includes/footer.php'); ?>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"></script>
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