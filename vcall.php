<?php
    // Include your database connection configuration
    include './config/config.php';

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Prepare and bind parameters
        $stmt = $conn->prepare("INSERT INTO sent_link (subject_name, link, sent_at) VALUES (?, ?, NOW())");
        $stmt->bind_param("ss", $subject_name, $link);

        // Set parameters and execute
        $subject_name = $_POST['subject'];
        $link = $_POST['link'];
        $stmt->execute();

        // Close statement
        $stmt->close();

        // Output success message
        echo "<script>alert('Link successfully submitted!');</script>";
    }
    ?>
    <?php
include_once "bot.php";
?>

<!DOCTYPE html>
<html>

<head>
    <script src='https://8x8.vc/vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/external_api.js' async></script>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #070F2B;
            font-family: Arial, sans-serif;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
            display: flex;
            align-items: center;
            padding: 0 4%;
            z-index: 1000;
            background-color: rgba(18, 55, 42, 0.5); /* Glassmorphism effect */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Glassmorphism effect */
        }

        .navbar img {
            height: 40px;
        }

        .navbar ul {
            display: flex;
            list-style-type: none;
            margin-left: auto;
        }

        .navbar li {
            margin-left: 20px;
        }

        .navbar a {
            color: white;
            font-size: 18px;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .navbar a:hover {
            color: #04f0fc;
        }

        #jaas-container {
            width: 1000px; /* Adjusted width */
            height: 600px;
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            margin-top: 65px; /* Adjust margin-top based on navbar height */
            margin-left: auto;
            margin-right: auto;
        }

        .form-container {
            width: 300px; /* Adjusted width */
            margin-top: 65px; /* Adjust margin-top based on navbar height */
            margin-left: 50px; /* Adjust margin as needed */
            float: left;
        }

        .form-container input[type="text"],
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-container input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>


    <script type="text/javascript">
        window.onload = () => {
            const api = new JitsiMeetExternalAPI("8x8.vc", {
                roomName: "vpaas-magic-cookie-e1740ab3acf2401eac030d51a4732ef6/SampleAppInstitutionalReservationsAlterSharply",
                parentNode: document.querySelector('#jaas-container'),
                // Make sure to include a JWT if you intend to record,
                // make outbound calls or use any other premium features!
                // jwt: "eyJraWQiOiJ2cGFhcy1tYWdpYy1jb29raWUtZTE3NDBhYjNhY2YyNDAxZWFjMDMwZDUxYTQ3MzJlZjYvNDczNjFlLVNBTVBMRV9BUFAiLCJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiJqaXRzaSIsImlzcyI6ImNoYXQiLCJpYXQiOjE3MTE2MDg5MTksImV4cCI6MTcxMTYxNjExOSwibmJmIjoxNzExNjA4OTE0LCJzdWIiOiJ2cGFhcy1tYWdpYy1jb29raWUtZTE3NDBhYjNhY2YyNDAxZWFjMDMwZDUxYTQ3MzJlZjYiLCJjb250ZXh0Ijp7ImZlYXR1cmVzIjp7ImxpdmVzdHJlYW1pbmciOmZhbHNlLCJvdXRib3VuZC1jYWxsIjpmYWxzZSwic2lwLW91dGJvdW5kLWNhbGwiOmZhbHNlLCJ0cmFuc2NyaXB0aW9uIjpmYWxzZSwicmVjb3JkaW5nIjpmYWxzZX0sInVzZXIiOnsiaGlkZGVuLWZyb20tcmVjb3JkZXIiOmZhbHNlLCJtb2RlcmF0b3IiOnRydWUsIm5hbWUiOiJUZXN0IFVzZXIiLCJpZCI6Imdvb2dsZS1vYXV0aDJ8MTExNjQ5MDI1MTA3OTQwNzU4NDgyIiwiYXZhdGFyIjoiIiwiZW1haWwiOiJ0ZXN0LnVzZXJAY29tcGFueS5jb20ifX0sInJvb20iOiIqIn0.J5xPvDPr0jiIe7KFs1hH_vp9iffofv9E0QpUHK5aZ8lF_VYbRM8BJl_2aHAaAzoFOnKUtJLPGDmSfzc9DdGW66n7OgDoECRcyFAKEvvZFu8g6e4L89ZdJ9b6xAoZosSIX19OMJep2X4kkKRor2RGW1JtENwRK-KISEDGjrTwLlPQufdSiNKDYnROFwyqVtY38kirrSm8ar_3CjcpjCiDDC6_Z4s3ix9DI7T5VwPy00VaszBHDfWIJZvoUZg8QHdK9JMwIQLMIdgzq03Gfel597pC2DMOSNzvqiTTlNwCme0duIFjy-22WaNxk1CHC9Fv3OEFTKZbFOYPjdrf04j_3w"
            });
        }
    </script>
</head>

<body>
    <nav class="navbar fixed top-0 left-0 w-full h-16 flex items-center justify-between px-4 bg-opacity-50 bg-blue-900 shadow">
        <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
            <!-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" /> -->
            <span class="self-center text-3xl font-bold whitespace-nowrap dark:text-white">DiscHub</span>
        </a>
        <ul class="hidden sm:flex space-x-4">
            <li><a href="./home.php" class="text-white text-[20px] sm:text-[10px]">back</a></li>

        </ul>
        <i class="menu-icon sm:block fas fa-bars text-white text-2xl ml-auto mr-4 cursor-pointer"></i>
    </nav>

    <div class="form-container">
        <form id="submissionForm" method="post">
            <label for="subject" class="text-white">Subject:</label><br>
            <input type="text" id="subject" name="subject" required><br>
            <label for="link" class="text-white">Link:</label><br>
            <textarea id="link" name="link" rows="4" required></textarea><br>
            <input type="submit" value="Submit">
        </form>
    </div>

    <div id="jaas-container"></div>


</body>

</html>
