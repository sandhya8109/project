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
              $qr_data = 'https://example.com/user/' . $user_id;
              $qr_code = 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=' . urlencode($qr_data);

              // display QR code
            
              echo '<img src="' . $qr_code . '" alt="QR Code">';
              ?>
              <?php
              mysqli_query($con, "SELECT * FROM menstrual_cycle_tracker WHERE user_id='{$_SESSION['id']}'");
              ?>
            </div>
            <?php
            if (!isset($_SESSION['form_submitted'])) {
              // form has not been submitted, display the form
              ?>
              <!-- your HTML form code goes here -->



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