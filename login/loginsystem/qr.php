<?php
// start session
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
// check if user is logged in
if(!isset($_SESSION['id'])) {
    // redirect to login page
    header('Location: login.php');
    exit;
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
        <title>Dashboard | CHELI-BETI</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
       
             <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.1.2/tailwind.min.css" rel="stylesheet"/>  
             <link href="css/styles.css" rel="stylesheet" />
             <link href="welcome.css" rel="stylesheet" />


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.2/alpine.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/simple-jscalendar@1.4.4/source/jsCalendar.js" crossorigin="anonymous"></script>
         </head>
    <body class="sb-nav-fixed">
      <?php include_once('includes/navbar.php');?>
      <img src="qrcodes/<?php echo $_SESSION['id']; ?>.png" alt="QR Code for User <?php echo $_SESSION['id']; ?>">
        <div id="layoutSidenav">
          <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Chelibeti- QR Generator</h1>
                        <hr />
                        <ol class="breadcrumb mb-4">
         <h5><strong>Scan Here to login to your mobile</strong> </h5>
                        </ol>
                        <?php
$user_id = $_SESSION['id'];
$qr_data = 'http://localhost:8081/project/login/loginsystem/index1.php?' . $user_id;
$qr_code = 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=' . urlencode($qr_data);

// display QR code
echo '<img src="' . $qr_code . '" alt="QR Code">';
?>
</div>
</main>
</div>
</div>
</body>
</html>