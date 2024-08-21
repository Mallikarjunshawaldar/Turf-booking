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
    $name = $_POST["name"];
    $email = $_POST["email"]; // Changed $_post to $_POST
    $phone = $_POST["phone"];
    $date = date("Y-m-d", strtotime($_POST["date"]));
    $time_slot = $_POST["time_slot"];
    $duration = $_POST["duration"];
    $price = $duration * 500; // Fixed rate: 980 Rs per hour

    // Check if the selected time slot is already booked
    $checkSql = "SELECT * FROM book WHERE date = '$date' AND time_slot = '$time_slot'";
    $result = $conn->query($checkSql);
    if ($result->num_rows > 0) {
        echo "<script>alert('This time slot is already booked. Please select a different time.');</script>";
    } else {
        // SQL to insert form data into database
        $sql = "INSERT INTO book (name, email, phone, date, time_slot, duration, price) VALUES ('$name', '$email', '$phone', '$date', '$time_slot', $duration, $price)";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Appointment booked successfully');</script>";
        } else {
            echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
        }
    }
}

// Fetch appointments data from the database
$sql_fetch_book = "SELECT name, date, time_slot, duration FROM book";
$result_fetch_book = $conn->query($sql_fetch_book);

// Check if fetching the data was successful
if ($result_fetch_book === false) {
    echo "Error fetching data: " . $conn->error;
} else {
    // Close database connection
    $conn->close();
}
?>

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
<title>Turf Booking</title>
<link rel="stylesheet" href="css/abooks.css">
</head>

<body>

<main>
    <h1>Booked Orders</h1>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Time Slot</th>
                    <th>Duration</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Output fetched appointments data
                if ($result_fetch_book->num_rows > 0) {
                    while($row = $result_fetch_book->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>{$row['date']}</td>";
                        echo "<td>{$row['time_slot']}</td>";
                        echo "<td>{$row['duration']} hours</td>";
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
