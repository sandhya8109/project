<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
    
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
       
             <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.1.2/tailwind.min.css" rel="stylesheet"/>  
             <link href="css/styles.css" rel="stylesheet" />
             <link href="welcome.css" rel="stylesheet" />


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.2/alpine.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/simple-jscalendar@1.4.4/source/jsCalendar.js" crossorigin="anonymous"></script>
        <script>
            <script>
  // Check if the URL has the success parameter
  const urlParams = new URLSearchParams(window.location.search);
  const successParam = urlParams.get('success');
  if (successParam === '1') {
    // Scroll to the form section
    document.querySelector('#form-section').scrollIntoView({ behavior: 'smooth' });
  }

  // Reload the page every 5 seconds
  setInterval(() => {
    location.reload();
  }, 5000);
</script>
        </script>
        <style>
            .qr-container {
            position: fixed;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
            margin-right: 20px; /* adjust as needed */
        }
            body {
    font-family: Arial, sans-serif;
}

h1 {
    text-align: center;
}

form {
    max-width: 400px;
    margin: 0 auto;
}

label {
    display: block;
    margin-bottom: 10px;
}

input[type="date"],
input[type="number"] {
    width: 100%;
    padding: 5px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
    margin-bottom: 20px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #3e8e41;
}

.error {
    color: red;
    font-size: 14px;
    margin-top: 5px;
}


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
