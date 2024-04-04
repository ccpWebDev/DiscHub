<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_obls";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user input from POST request
$userInput = $_POST['query']; // Corrected variable name from 'q' to 'query'

// Query database for response
$sql = "SELECT response FROM user_queries WHERE query = '$userInput'";
$result = $conn->query($sql);

// Check if query returned any results
if ($result->num_rows > 0) {
    // Output response
    $row = $result->fetch_assoc();
    echo $row['response'];
} else {
    // If no matching response found, provide a default reply
    echo "I'm sorry, I couldn't understand your query.";
}

$conn->close();
?>
