<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tf";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"]; // Changed $_post to $_POST
    $message = $_POST["message"];
    $time = $_POST["time"];

    // Check if the selected time slot is already booked
    $checkSql = "SELECT * FROM c_message";
    $result = $conn->query($checkSql);
    if ($result->num_rows > 0) {
        echo "<script>alert('there are no records');</script>";
    } else {
        // SQL to insert form data into database
        $sql = "INSERT INTO c_message (id, name, email, message, time) VALUES ('$id', '$name', '$email', '$message', '$time')";

        if ($conn->query($sql) === TRUE) {
            echo "there are no records";
        } else {
            echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
        }
    }
}

// Fetch appointments data from the database
$sql_fetch_book = "SELECT id, name, email, message, time FROM c_message";
$result_fetch_book = $conn->query($sql_fetch_book);

// Check if fetching the data was successful
if ($result_fetch_book === false) {
    echo "Error fetching data: " . $conn->error;
} else {
    // Close database connection
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Turf Booking</title>
<link rel="stylesheet" href="css/amess.css">
</head>

<body>

<?php
session_start();
error_reporting(0);
include('include/sidebar.php');
?>

<main>
    <h1>Message Box</h1>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Output fetched appointments data
                if ($result_fetch_book->num_rows > 0) {
                    while($row = $result_fetch_book->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['message']}</td>";
                        echo "<td>{$row['time']} hours</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No booked orders found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</main>

<footer>
    <p>&copy; MATCH MARVEL</p>
</footer>


</body>
</html>
