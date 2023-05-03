<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
  header('location:logout.php');
} else {

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
              $qr_data = 'http://localhost:8081/project/login/loginsystem/index1.php/?' . $user_id;
              $qr_code = 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=' . urlencode($qr_data);

              // display QR code
            
              echo '<img src="' . $qr_code . '" alt="QR Code">';
              ?>
            </div>
            <?php
            if (!isset($_SESSION['form_submitted'])) {
              // Check if form submitted
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Get form data
                $previousPeriodDate = $_POST["previous_period_date"];
                $cycleLength = $_POST["cycle_length"];
                $periodLength = $_POST["period_length"];
                $totalLength = $cycleLength + $periodLength;
                // Perform calculations to get next period date
                $nextPeriodDate = date("Y-m-d", strtotime($previousPeriodDate . " + " . $totalLength . " days"));
                //$date=date_create($previousPeriodDate);
                //date_add($date,date_interval_create_from_date_string($totalLength + " days"));
                //$nextPeriodDate=date_format($date,"Y-m-d");
          
                // Save data to database (you can modify this to match your own database setup)
                // Replace "your_db_host", "your_db_user", "your_db_password", "your_db_name" with your actual database details
                $conn = mysqli_connect("localhost", "root", "", "chelibeti");
                if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
                }

                $userId = $_SESSION["id"]; // Assuming you have a user ID in session
                $sql = "INSERT INTO menstrual_cycle_tracker (user_id, prev_period_date, cycle_length, period_length, next_period_date) VALUES ('$userId', '$previousPeriodDate', '$cycleLength', '$periodLength', '$nextPeriodDate')";
                if (mysqli_query($conn, $sql)) {
                  $_SESSION["form_submitted"] = true; // Set form submitted flag in session
                  $_SESSION["next_period_date"] = $nextPeriodDate; // Set next period date in session
                  header("Location: process_form.php"); // Redirect to the same page
                  exit();
                } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }


              }

              // Check if user already submitted the form
              $formSubmitted = isset($_SESSION["form_submitted"]) && $_SESSION["form_submitted"] === true;
              $nextPeriodDate = isset($_SESSION["next_period_date"]) ? $_SESSION["next_period_date"] : "";
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

                  <button type="submit"
                    style="background-color: #c33764; color: #fff; border: none; padding: 10px 20px; border-radius: 5px;">
                    Save and predict next period
                  </button>
                </form>
                <style>
                  button:hover {
                    background-color: #1d2671;
                  }
                </style>

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