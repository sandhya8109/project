<?php session_start();
include_once('../includes/config.php');
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
    <title>Admin Dashboard | Cheli-Beti </title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://www.cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />
    <style>
      .morris-hover {
        position: absolute;
        z-index: 1000;
      }

      .morris-hover.morris-default-style {
        border-radius: 10px;
        padding: 6px;
        color: #666;
        background: rgba(255, 255, 255, 0.8);
        border: solid 2px rgba(230, 230, 230, 0.8);
        font-family: sans-serif;
        font-size: 12px;
        text-align: center;
      }

      .morris-hover.morris-default-style .morris-hover-row-label {
        font-weight: bold;
        margin: 0.25em 0;
      }

      .morris-hover.morris-default-style .morris-hover-point {
        white-space: nowrap;
        margin: 0.1em 0;
      }

      svg {
        width: 100%;
      }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="https://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
      crossorigin="anonymous"></script>
    <script>
      $(document).ready(function () {
        barChart();
        lineChart();
        areaChart();
        donutChart();

        $(window).resize(function () {
          window.barChart.redraw();
          window.lineChart.redraw();
          window.areaChart.redraw();
          window.donutChart.redraw();
        });
      });

      function barChart() {
        window.barChart = Morris.Bar({
          element: 'bar-chart',
          data: [
            { y: 'Jan', a: 100, b: 90, c: 30 },
            { y: 'Feb', a: 75, b: 65, c: 30 },
            { y: 'Mar', a: 50, b: 40, c: 30 },
            { y: 'Apr', a: 75, b: 65, c: 30 },
            { y: 'May', a: 50, b: 40, c: 30 },
            { y: 'Jun', a: 75, b: 65, c: 30 },
            { y: 'Jul', a: 100, b: 90, c: 30 },
            { y: 'Aug', a: 50, b: 40, c: 30 },
            { y: 'Sep', a: 75, b: 65, c: 30 },
            { y: 'Oct', a: 50, b: 40, c: 30 },
            { y: 'Nov', a: 75, b: 65, c: 30 },
            { y: 'Dec', a: 100, b: 90, c: 30 }
          ],
          xkey: 'y',
          ykeys: ['a', 'b', 'c'],
          labels: ['Age:10-25', 'Age:25-35', 'Age:35 +'],
          lineColors: ['#c33764', '#1d2671', '#c33766'],
          lineWidth: '3px',
          resize: true,
          redraw: true
        });
      }

      function lineChart() {
        window.lineChart = Morris.Line({
          element: 'line-chart',
          data: [
            { y: 'Jan', a: 100, b: 90 },
            { y: 'Feb', a: 75, b: 65 },
            { y: 'Mar', a: 50, b: 40 },
            { y: 'Apr', a: 75, b: 65 },
            { y: 'May', a: 50, b: 40 },
            { y: 'Jun', a: 75, b: 65 },
            { y: 'Jul', a: 100, b: 90 },
            { y: 'Aug', a: 50, b: 40 },
            { y: 'Sep', a: 75, b: 65 },
            { y: 'Oct', a: 50, b: 40 },
            { y: 'Nov', a: 75, b: 65 },
            { y: 'Dec', a: 100, b: 90 }
          ],
          xkey: 'y',
          ykeys: ['a', 'b'],
          labels: ['Good pads', 'Bad pads'],
          lineColors: ['#c33764', '#1d2671'],
          lineWidth: '3px',
          resize: true,
          redraw: true
        });
      }

      function areaChart() {
        window.areaChart = Morris.Area({
          element: 'area-chart',
          data: [
            { y: 'Jan', a: 100, b: 90 },
            { y: 'Feb', a: 75, b: 65 },
            { y: 'Mar', a: 50, b: 40 },
            { y: 'Apr', a: 75, b: 65 },
            { y: 'May', a: 50, b: 40 },
            { y: 'Jun', a: 75, b: 65 },
            { y: 'Jul', a: 100, b: 90 },
            { y: 'Aug', a: 50, b: 40 },
            { y: 'Sep', a: 75, b: 65 },
            { y: 'Oct', a: 50, b: 40 },
            { y: 'Nov', a: 75, b: 65 },
            { y: 'Dec', a: 100, b: 90 }
          ],
          xkey: 'y',
          ykeys: ['a', 'b'],
          labels: ['Series A', 'Series B'],
          lineColors: ['#c33764', '#1d2671'],
          lineWidth: '3px',
          resize: true,
          redraw: true
        });
      }


      function donutChart() {
        window.donutChart = Morris.Donut({
          element: 'donut-chart',
          data: [
            { label: "Total Pads", value: 50 },
            { label: "In-Store pads", value: 25 },
            { label: "Ordered pads", value: 5 },
            { label: "for Delivery", value: 10 },
            { label: "Damaged", value: 10 }
          ],
          resize: true,
          redraw: true,
        });
      }

      function pieChart() {
        var paper = Raphael("pie-chart");
        paper.piechart(
          100, // pie center x coordinate
          100, // pie center y coordinate
          90,  // pie radius
          [18.373, 18.686, 2.867, 23.991, 9.592, 0.213], // values
          {
            legend: ["Windows/Windows Live", "Server/Tools", "Online Services", "Business", "Entertainment/Devices", "Unallocated/Other"]
          }
        );
      }
    </script>
    <script>
    </script>
  </head>

  <body class="sb-nav-fixed">
    <?php include_once('includes/navbar.php'); ?>
    <div id="layoutSidenav">
      <?php include_once('includes/sidebar.php'); ?>
      <div id="layoutSidenav_content">
        <main>
          <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
              <?php
              $query = mysqli_query($con, "select id from users");
              $totalusers = mysqli_num_rows($query);
              ?>

              <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                  <div class="card-body">Total Registered Users
                    <span style="font-size:22px;">
                      <?php echo $totalusers; ?>
                    </span>
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="manage-users.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
                </div>
              </div>
              <?php
              $query1 = mysqli_query($con, "select id from users where date(posting_date)=CURRENT_DATE()-1");
              $yesterdayregusers = mysqli_num_rows($query1);
              ?>

              <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                  <div class="card-body">Yesterday Registered Users
                    <span style="font-size:22px;">
                      <?php echo $yesterdayregusers; ?>
                    </span>
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="yesterday-reg-users.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
                </div>
              </div>

              <?php
              $query2 = mysqli_query($con, "select id from users where date(posting_date)>=now() - INTERVAL 7 day");
              $last7daysregusers = mysqli_num_rows($query2);
              ?>

              <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                  <div class="card-body"> Registered Users in Last 7 Days
                    <span style="font-size:22px;">
                      <?php echo $last7daysregusers; ?>
                    </span>
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="lastsevendays-reg-users.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
                </div>
              </div>

              <?php
              $query3 = mysqli_query($con, "select id from users where date(posting_date)>=now() - INTERVAL 30 day");
              $last30daysregusers = mysqli_num_rows($query3);
              ?>

              <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                  <div class="card-body">Registered Users in Last 30 Days
                    <span style="font-size:22px;">
                      <?php echo $last30daysregusers; ?>
                    </span>
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="lastthirtyays-reg-users.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
                </div>
              </div>
            </div>


          </div>

        </main>
        <?php include_once('../includes/footer.php'); ?>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
  </body>

  </html>
<?php } ?>