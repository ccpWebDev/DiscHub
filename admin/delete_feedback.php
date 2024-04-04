<?php
// Include the database configuration file
include_once __DIR__ . "/../config/config.php";

// Check if the ID parameter is set
if (isset($_GET['id'])) {
    // Sanitize the ID to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // SQL query to delete the feedback record
    $sql = "DELETE FROM feedback WHERE id = '$id'";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Send a success response if deletion is successful
        echo "Feedback deleted successfully";
    } else {
        // Send an error response if deletion fails
        echo "Error deleting feedback: " . mysqli_error($conn);
    }
} else {
    // Send an error response if ID parameter is not set
    echo "Feedback ID not provided";
}
?>
<?php
include_once "./bot.php";
?>