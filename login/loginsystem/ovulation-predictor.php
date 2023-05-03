<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Create a PDO connection
$dsn = 'mysql:host=localhost;dbname=chelibeti';
$username = 'root';
$password = '';

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

// Function to retrieve user's location from the database
 $user_id = $_SESSION["id"]; 
function getUserLocation($user_id, $conn) {
    // SQL query to retrieve user's location from the "users" table
    $query = "SELECT location FROM users WHERE user_id = ?";
    
    // Prepare the query
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $user_id, PDO::PARAM_INT);
    
    // Execute the query
    $stmt->execute();
    
    // Fetch the result
    $location = $stmt->fetchColumn();
    
    // Close the statement
    $stmt->closeCursor();
    
    // Return the user's location
    return $location;
}

// Function to check if pads are available in a location
function checkPadsAvailability($location, $conn) {
    // SQL query to check pads availability in the "pads" table
    $query = "SELECT COUNT(*) FROM pads WHERE location = ? AND available = 1";
    
    // Prepare the query
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $location, PDO::PARAM_STR);
    
    // Execute the query
    $stmt->execute();
    
    // Fetch the result
    $count = $stmt->fetchColumn();
    
    // Close the statement
    $stmt->closeCursor();
    
    // If pads are available, return true; otherwise, return false
    return $count > 0;
}

// Example usage
 $user_id = $_SESSION["id"]; // User ID of the user whose location and period date you want to retrieve

$location = getUserLocation($user_id);
 $query = "SELECT COUNT(*) FROM menstrual_cycle_tracker WHERE user_id = ?";
    
    // Prepare the query
    $stmt = $conn->prepare($query);
    $stmt->bindParam( $user_id, PDO::PARAM_STR);
    
    // Execute the query
    $stmt->execute();

$period_date = "2023-04-24"; // Replace with the actual date of user's next period
$days_until_period = floor((strtotime($period_date) - time()) / (60 * 60 * 24)); // Calculate days until next period

if ($days_until_period <= 7 && checkPadsAvailability($location)) {
    // If user's next period date is within 7 days and pads are available in user's location, show request button
    echo '<form action="pad_request.php" method="post">';
    echo '<input type="hidden" name="user_id" value="' . $user_id . '">';
    echo '<input type="submit" name="request_pad" value="Request Pad">';
    echo '</form>';
}
?>

?>
