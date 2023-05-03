<?php
// Start the session (if not already started)
session_start();

// Check if the user is logged in
if (strlen($_SESSION['id']) == 0) {
    header('location:logout.php');
    exit();
}

// Connect to the database
$servername = "localhost";
$username = "username";
$password = "";
$dbname = "chelibeti";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind the INSERT statement
$stmt = $conn->prepare("INSERT INTO periods (user_id, start_date, end_date, cycle_length, period_length) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("issss", $user_id, $start_date, $end_date, $cycle_length, $period_length);

// Set the values of the parameters
$user_id = $_SESSION['id'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$cycle_length = $_POST['cycle_length'];
$period_length = $_POST['period_length'];

// Execute the INSERT statement
if ($stmt->execute() === TRUE) {
    echo "New period record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Period Details</title>
    <style>
        /* Style the form inputs and labels */
        input[type=text], input[type=date] {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }
        label {
            display: block;
            font-size: 18px;
            margin-bottom: 5px;
        }
        /* Style the submit button */
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            font-size: 18px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Period Details</h1>
    <form method="post" action="process_form.php">
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date"><br>

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date"><br>

       

        <input type="submit" value="Submit">
    </form>
</body>
</html>
