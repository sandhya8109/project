<?php

session_start(); 
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

<!DOCTYPE html>
<html>
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
 <style>
    /* Form container */
.form-container {
    width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f8f8f8;
    border: 1px solid #ddd;
    border-radius: 5px;
}

/* Form title */
.form-container h2 {
    margin-top: 0;
    text-align: center;
    color: #333;
}

/* Form labels */
.form-container label {
    display: block;
    margin-bottom: 5px;
    color: #555;
}

/* Form input fields */
.form-container input[type="date"],
.form-container input[type="number"],
.form-container input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 3px;
}

/* Form submit button */
.form-container input[type="submit"] {
    background-color: #c33764;
    color: #fff;
    border: none;
    cursor: pointer;
}

/* Form submit button on hover */
.form-container input[type="submit"]:hover {
    background-color: gray;
    color:black;
}

 </style>
</head>
<body class="sb-nav-fixed">
      <?php include_once('includes/navbar.php');?>

        <div id="layoutSidenav">
          <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4"><h1 class="mt-4">Dashboard</h1>
                        <hr />
                        <ol class="breadcrumb mb-4">
         
                        </ol>

                        <div class="qr-container">

                            <div class="form-container">
        <h2>Period Tracker Form</h2>
        <?php if ($formSubmitted): ?>
            <p>Your next predicted period date: <?php echo $nextPeriodDate; ?></p>
        <?php endif; ?>
        <form action="process_form.php" method="post">
            <label for="previous_period_date">Previous Period Date</label>
            <input type="date" id="previous_period_date" name="previous_period_date" required>
            <label for="cycle_length">Cycle Length (in days)</label>
            <input type="number" id="cycle_length" name="cycle_length" required>
            <label for="period_length">Period Length (in days)</label>
            <input type="number" id="period_length" name="period_length" required>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
