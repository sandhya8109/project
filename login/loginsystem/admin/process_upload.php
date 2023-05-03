<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Connect to the database
$db = new mysqli('localhost', 'root', '', 'chelibeti');

// Check for errors
if ($db->connect_error) {
  die('Connection failed: ' . $db->connect_error);
}

// Get the product information from the form
$product_name = $_POST['product-name'];
$product_description = $_POST['product-description'];
$product_location = $_POST['product-location'];

// Upload the product image
$target_dir = 'uploads/';
$target_file = $target_dir . basename($_FILES['product-image']['name']);
if (move_uploaded_file($_FILES['product-image']['tmp_name'], $target_file)) {
	
  // Image uploaded successfully
  $product_image = $target_file;
} else {
  // Image upload failed
  die('Error uploading image');
}

// Insert the product information into the database
$sql = "INSERT INTO products (name, description, location, image) VALUES ('$product_name', '$product_description', '$product_location', '$product_image')";
if ($db->query($sql) === TRUE) {
  // Product uploaded successfully
  echo 'Product uploaded successfully';
} else {
  // Product upload failed
  echo 'Error uploading product: ' . $db->error;
}

// Close the database connection
$db->close();
?>
