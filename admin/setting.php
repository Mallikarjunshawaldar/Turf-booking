<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Turf Booking</title>
<link rel="stylesheet" href="css/agame.css">
</head>

<body>

<?php
session_start();
error_reporting(0);
include('include/sidebar.php');
?>

<!-- Settings form -->
<div class="container">
        <h1>Add new Tournaments:</h1>
        <form action="save_settings.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image">
            </div>    
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="size">Size:</label>
                <input type="text" id="size" name="size">
            </div>
            <div class="form-group">
                <label for="surface">Surface:</label>
                <input type="text" id="surface" name="surface">
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location">
            </div>
            
            <button type="submit">Add</button>
        </form>
    </div>

<?php
session_start();
error_reporting(0);
include('include/footer.php');
?>
</body>
</html>
