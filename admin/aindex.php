<?php
session_start();
error_reporting(0);
include('include/sidebar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="css/aindex.css">
    
</head>
<body>
    
    <!-- Content -->
    <div class="content-container">
        <div class="content" id="content">
            <img class="logo" src="images/logo.png" alt="center">
            <h2>Welcome, Admin page</h2>
        </div>
    </div>
    
    <!-- footer -->
    <footer>
        <h4>&copy; MATCH MARVEL</h4>
        <div class="footer-content">
            <a href="../login.php">USER</a>
            <div>
                <p>name: abcd</p>
                <p>Contact Us: 1234567890</p>
                <p>Email: abcd@gmail.com</p>
            </div>
        </div>
    </footer>
</body>
</html>
