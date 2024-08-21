<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admintf";

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
    $team = $_POST["size"];
    $team = $_POST["location"];

    // Check if the selected time slot is already booked
    $checkSql = "SELECT id, name, size, location FROM game";
    $result = $conn->query($checkSql);
    if ($result->num_rows > 0) {
        echo "<script>alert('There are no reords');</script>";
    } 
}

// Fetch appointments data from the database
$sql_fetch_book = "SELECT id, name, size, location FROM game";
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
<link rel="stylesheet" href="css/mgs.css">
</head>

<body>

<main>
    <h1>Manage Games</h1>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>size</th>
                    <th>location</th>
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
                        echo "<td>{$row['size']}</td>";
                        echo "<td>{$row['location']}</td>";
                        echo "<td><button class='delete-btn' data-id='{$row['id']}'>Delete</button></td>"; // Add delete button
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

<script>
    // Handle delete button click
    const deleteButtons = document.querySelectorAll('.delete-btn');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            // Send an AJAX request to delete the row with the corresponding ID
            fetch('delete_game.php?id=' + id, {
                method: 'DELETE'
            })
            .then(response => {
                if (response.ok) {
                    // Reload the page or update the table to reflect the deletion
                    location.reload();
                } else {
                    console.error('Failed to delete row');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });

</script>

<?php
session_start();
error_reporting(0);
include('include/footer.php');
?>

</body>
</html>
