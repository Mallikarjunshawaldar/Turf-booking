<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Turf Booking</title>
<link rel="stylesheet" href="css/aTournament.css">
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
    <form id="tournamentForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" id="image" name="image">
        </div>    
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="team">Teams:</label>
            <input type="text" id="team" name="team">
        </div>
        <div class="form-group">
            <label for="fees">Fees:</label>
            <input type="text" id="fees" name="fees">
        </div>
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" id="location" name="location">
        </div>
        
        <button type="submit" name="submit">Submit</button>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "admintf";

    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $name = $_POST['name'];
    $team = $_POST['team'];
    $fees = $_POST['fees'];
    $location = $_POST['location'];

    // File upload
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    move_uploaded_file($_FILES["image"]["name"], $target_file);

    // SQL to insert data into database
    $sql = "INSERT INTO tournament (image, name, team, fees, location) VALUES ('$image', '$name', '$team', '$fees', '$location')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("New record created successfully");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!-- JavaScript to toggle sidebar visibility and hide additional buttons when Settings button is clicked again -->
<script>

    form.addEventListener('submit', function() {
        // Show popup message after form submission
        alert("Form submitted successfully");
    });
</script>

<footer>
    <p>&copy; MATCH MARVEL</p>
</footer>

</body>
</html>
