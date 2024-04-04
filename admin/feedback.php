<?php
include_once "./admin_header.php";
include_once "./admin_footer.php";
// Start session
// Include the database configuration file
include_once __DIR__ . "/../config/config.php";

// Define variables to store success message and error message
$successMessage = '';
$errorMessage = '';

// Define pagination variables
$recordsPerPage = 8;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $recordsPerPage;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email and feedback are set in the POST request
    if (isset($_POST['email']) && isset($_POST['feedback'])) {
        // Sanitize user input to prevent SQL injection
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);
        
        // Get current date and time
        $currentDateTime = date("Y-m-d H:i:s");

        // SQL query to insert email, feedback, and current date/time into the database
        $sql = "INSERT INTO feedback (email, feedback_text, created_at) VALUES ('$email', '$feedback', '$currentDateTime')";

        // Check if the query is executed successfully
        if (mysqli_query($conn, $sql)) {
            // Set session variable to indicate successful submission
            $_SESSION['feedback_success'] = true;
            // Redirect to prevent form resubmission on page refresh
            header("Location: ".$_SERVER['REQUEST_URI']);
            exit();
        } else {
            $errorMessage = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        // Handle the case when email or feedback is not set in the POST request
        $errorMessage = "Email or feedback is missing";
    }
}

// Fetch feedback data from the database with pagination
$sql = "SELECT * FROM feedback LIMIT $offset, $recordsPerPage";
$result = mysqli_query($conn, $sql);

// Check if the delete_feedback form is submitted
if (isset($_POST['delete_feedback']) && isset($_POST['delete_id'])) {
    // Sanitize input to prevent SQL injection
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

    // SQL query to delete feedback record
    $delete_sql = "DELETE FROM feedback WHERE id = '$delete_id'";

    // Execute the delete query
    if (mysqli_query($conn, $delete_sql)) {
        // Redirect to prevent form resubmission
        header("Location: ".$_SERVER['PHP_SELF']."?page=".$page);
        exit();
    } else {
        $errorMessage = "Error deleting feedback: " . mysqli_error($conn);
    }
}

// Count total records
$totalRecordsQuery = "SELECT COUNT(*) as total FROM feedback";
$totalRecordsResult = mysqli_query($conn, $totalRecordsQuery);
$totalRecords = mysqli_fetch_assoc($totalRecordsResult)['total'];

// Calculate total pages
$totalPages = ceil($totalRecords / $recordsPerPage);
?>
<?php
include_once "./bot.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Feedback Management</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<style>
    .search{
        width: 800px;
        border-radius: 10px;
        padding: 5px 30px;
    }
</style>
<body>

<div class="container mx-auto px-4">
    <h2 class="text-4xl font-bold mb-4 text-center mt-87">User Feedback</h2>
    <!-- Search Bar -->
    <div class="flex justify-center mb-4">
        <input type="text" id="searchInput" placeholder="Search..." class="search">
        <button onclick="searchFeedback()" class="ml-2 bg-blue-500 text-white rounded-md py-2 px-4">Search</button>
    </div>
    <!-- Feedback Table -->
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Sl No.</th>
                <th class="px-4 py-2">Contact</th>
                <th class="px-4 py-2">Feedback Message</th>
                <th class="px-4 py-2">Date and Time</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                $count = ($page - 1) * $recordsPerPage + 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td class="border px-4 py-2"><?php echo $count++; ?></td>
                        <td class="border px-4 py-2"><?php echo $row['email']; ?></td>
                        <td class="border px-4 py-2"><?php echo $row['feedback_text']; ?></td>
                        <td class="border px-4 py-2"><?php echo $row['created_at']; ?></td>
                        <td class="border px-4 py-2">
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF'].'?page='.$page; ?>">
                               <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                               <button type="submit" name="delete_feedback" class="bg-red-500 text-white rounded-md py-1 px-3">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="5" class="border px-4 py-2 text-center">No feedback available</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <!-- Pagination -->
    <div class="flex justify-center mt-4">
        <ul class="flex space-x-2">
            <?php if ($page > 1): ?>
                <li><a href="?page=<?php echo $page - 1; ?>" class="bg-blue-500 text-white rounded-md py-2 px-4">Previous</a></li>
            <?php endif; ?>
            <?php if ($totalPages > 1): ?>
                <?php if ($page <= 3): ?>
                    <?php for ($i = 1; $i <= min(3, $totalPages); $i++): ?>
                        <li><a href="?page=<?php echo $i; ?>" class="bg-blue-500 text-white rounded-md py-2 px-4<?php echo $page === $i ? ' font-bold' : ''; ?>"><?php echo $i; ?></a></li>
                    <?php endfor; ?>
                    <?php if ($totalPages > 3): ?>
                        <li><span class="px-4 py-2">...</span></li>
                    <?php endif; ?>
                <?php elseif ($page >= $totalPages - 2): ?>
                    <li><span class="px-4 py-2">...</span></li>
                    <?php for ($i = max(1, $totalPages - 5); $i <= $totalPages; $i++): ?>
                        <li><a href="?page=<?php echo $i; ?>" class="bg-blue-500 text-white rounded-md py-2 px-4<?php echo $page === $i ? ' font-bold' : ''; ?>"><?php echo $i; ?></a></li>
                    <?php endfor; ?>
                <?php else: ?>
                    <li><span class="px-4 py-2">...</span></li>
                    <?php for ($i = max(1, $page - 1); $i <= min($totalPages, $page + 1); $i++): ?>
                        <li><a href="?page=<?php echo $i; ?>" class="bg-blue-500 text-white rounded-md py-2 px-4<?php echo $page === $i ? ' font-bold' : ''; ?>"><?php echo $i; ?></a></li>
                    <?php endfor; ?>
                    <li><span class="px-4 py-2">...</span></li>
                <?php endif; ?>
            <?php endif; ?>
            <?php if ($page < $totalPages): ?>
                <li><a href="?page=<?php echo $page + 1; ?>" class="bg-blue-500 text-white rounded-md py-2 px-4">Next</a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>

<script>
    function searchFeedback() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.querySelector("table");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            for (var j = 0; j < td.length; j++) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break; // Break the inner loop to avoid showing multiple times
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

</script>

</body>
</html>
