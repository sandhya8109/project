<?php 
  session_start();
  require 'includes/config.php';
   if (isset($_SESSION['id'])) {
          $userLoggedIn = $_SESSION['id'];
          $result = mysqli_query($con,"SELECT * FROM poll");
          
            echo "<table border='1' id='customers'>
            <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>feedback</th>
            <th>Suggestions</th>
            </tr>";

            while($row = mysqli_fetch_array($result))
            {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['feedback'] . "</td>";
            echo "<td>" . $row['suggestions'] . "</td>";
            echo "</tr>";
            }
            echo "</table>";                                                                    
}
  else {
  //header("Location: index.php");
  }




   ?>
    
<!DOCTYPE html>
<html lang="en" >

<head>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 85%;
  margin-left: 230px;
  margin-top: 80px;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:nth-child(odd){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #c33764;
  color: white;
}
.block {
  display: block;
  width: 100%;
  border: none;
  background-color: #4CAF50;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
}

.block:hover {
  background-color: #ddd;
  color: black;
}
</style>
  <meta charset="UTF-8">
  <title>Feedback</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

  <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

   
      <link rel="stylesheet" href="assets/css/style.css">

  
</head>


<body class="sb-nav-fixed">
      <?php include_once('includes/navbar.php');?>
        <div id="layoutSidenav">
         <?php include_once('includes/sidebar.php');?>
 <!-- Left Sidebar End -->
 <div id="layoutSidenav_content">

  
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  
  
</body>

</html>
