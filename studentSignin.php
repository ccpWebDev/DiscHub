<?php
include_once "./classes/Adminobls.php";
include_once "./config/config.php";

$name = $uname = $pass = $class = $phone = "";
$name_err = $uname_err = $pass_err = $class_err = $phone_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter a name.";
    } else {
        $name = trim($_POST["name"]);
    }

    // Validate username
    if (empty(trim($_POST["uname"]))) {
        $uname_err = "Please enter a username.";
    } else {
        // Check if username already exists
        $sql = "SELECT id FROM tbl_student WHERE username = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST["uname"]);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $uname_err = "This username is already taken.";
                } else {
                    $uname = trim($_POST["uname"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["pass"]))) {
        $pass_err = "Please enter a password.";
    } else {
        $pass = trim($_POST["pass"]);
    }

    // Validate class
    if (empty($_POST["class"])) {
        $class_err = "Please select a class.";
    } else {
        $class = $_POST["class"];
    }

    // Validate phone
    if (empty(trim($_POST["phone"]))) {
        $phone_err = "Please enter a phone number.";
    } else {
        $phone = trim($_POST["phone"]);
    }

    // Check input errors before inserting into database
    if (empty($name_err) && empty($uname_err) && empty($pass_err) && empty($class_err) && empty($phone_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO tbl_student (name, username, password, class, phone) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssis", $param_name, $param_username, $param_password, $param_class, $param_phone);

            $param_name = $name;
            $param_username = $uname;
            $param_password = $pass; // Creates a password hash
            $param_class = $class;
            $param_phone = $phone;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: login.php");
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>
<?php
include_once "bot.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
        body {
            background-color: #070F2B;
            font-family: Arial, sans-serif;
			
        }
        
.navbar{
    background: #52686da0;
    color: white;
  }

  .navbar ul li a{
    color: #ffffff;
}
.navbar ul li a:hover{
    color: #04ffea;
    transition: .3s ease-in-out;
}
.footer {
    color: white;
    padding: 20px 0;
    left: 0;
    text-align: center;
    width: 100%;
    position: absolute;
    bottom: 0;
  }
  
 </style>

<body>
<nav class="navbar border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-white">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
        <!-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" /> -->
        <span class="self-center text-3xl font-bold whitespace-nowrap dark:text-white">DiscHub</span>
    </a>
    <button data-collapse-toggle="navbar-solid-bg" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-white dark:focus:ring-gray-600" aria-controls="navbar-solid-bg" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
      <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-white">
        <li>
          <a href="index.php" class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="container mx-auto">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb bg-gray-200 p-2 rounded-md">
            <li class="breadcrumb-item">
                <a href="#" class="text-blue-500">Register Students</a>
            </li>
        </ol>

        <!-- Form for adding students -->
        <div class="bg-white overflow-hidden shadow-md rounded-lg border border-solid border-blue-500 rounded-lg p-4"
            style="background-color: rgba(17, 42, 69, 0.07); border-radius: 16px; box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); backdrop-filter: blur(2.1px); -webkit-backdrop-filter: blur(2.1px); border: 1px solid rgba(17, 42, 69, 1);">
            <form class="max-w-md mx-auto" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="mb-4">
                    <label class="block text-white text-sm font-bold mb-2" for="name">Name:</label>
                    <input type="text" name="name" class="form-input rounded-md w-full text-black" id="name"
                        placeholder="Enter Full Name">
                    <span class="text-danger"><?php echo $name_err; ?></span>
                </div>
                <div class="mb-4">
                    <label class="block text-white text-sm font-bold mb-2" for="uname">Username:</label>
                    <input type="text" name="uname" class="form-input rounded-md w-full text-black" id="uname"
                        placeholder="Enter username">
                    <span class="text-danger"><?php echo $uname_err; ?></span>
                </div>
                <div class="mb-4">
                    <label class="block text-white text-sm font-bold mb-2" for="pass">Password:</label>
                    <input type="password" name="pass" class="form-input rounded-md w-full text-black" id="pass"
                        placeholder="Enter password">
                    <span class="text-danger"><?php echo $pass_err; ?></span>
                </div>
                <div class="mb-4">
                    <label class="block text-white text-sm font-bold mb-2" for="class">Select Semester:</label>
                    <select name="class" class="form-select rounded-md w-full text-black" id="class">
                        <option value="">Select Semester</option>
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Semester 3</option>
                        <option value="4">Semester 4</option>
                        <option value="5">Semester 5</option>
                        <option value="6">Semester 6</option>
                        <option value="7">Semester 7</option>
                        <option value="8">Semester 8</option>
                    </select>
                    <span class="text-danger"><?php echo $class_err; ?></span>
                </div>
                <div class="mb-4">
                    <label class="block text-white text-sm font-bold mb-2" for="phone">Phone:</label>
                    <input type="text" name="phone" class="form-input rounded-md w-full text-black" id="phone"
                        placeholder="Enter Phone">
                    <span class="text-danger"><?php echo $phone_err; ?></span
                    </div>
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Add Student
                    </button>
                </div>
            </form>
        </div>
    </div>
    <footer class="footer "style="background:white; color:black;">
  <p>Developed Chandan & Team</p>
    <p>&copy; 2024 SMIT. All rights reserved.</p>
    <p>Contact: smit@gmail.com | Phone: +1234567890</p>
    
</footer>
</body>

</html>
