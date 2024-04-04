<?php
// Start session
session_start();

// Include the database configuration file
include_once "./config/config.php";
include_once "bot.php";

// Define variables to store success message and error message
$successMessage = '';
$errorMessage = '';

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

// Check if the session variable for successful submission is set
if (isset($_SESSION['feedback_success']) && $_SESSION['feedback_success']) {
    $successMessage = "Feedback submitted successfully"; // Set success message
    // Unset the session variable to avoid displaying the success message on subsequent page loads
    unset($_SESSION['feedback_success']);
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="home.css">
</head>
<style>
    .modal {
  display: none;
  position: fixed;
  z-index: 9999;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.4);
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  color: green;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

  /* Styling for menu items */


  #navbar-solid-bg ul li a:hover {
      background-color: #3A4A53;
       /* Hover background color for menu item */
  }


  @media only screen and (max-width: 600px) {



.button {
  font-size: 10px;
  background-color: white;
  color: black;
  border: none;
  border-radius: 20px;
 
  transition: background-color 0.5s ease;
}

.button:hover {
  background-color: #0A251B;
  color: #fff;
}
.wlcm{
  font-size: 35px;
}
.slogan{
  font-size: 15px;
  margin-top: 10px;
}
.join{
  font-size: 10px;
}

}
</style>
<body>
    
<nav class="navbar border-gray-200 dark:bg-gray-800 dark:border-gray-700">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
        <!-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" /> -->
        <span class="self-center text-3xl font-bold whitespace-nowrap dark:text-white">DiscHub</span>
    </a>
    <button id="menu-toggle" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-red-700 dark:focus:ring-gray-600" aria-controls="navbar-solid-bg" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
      <ul class="flex flex-col font-medium mt-4 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0  dark:bg-gray-800  dark:border-gray-700">
        <li>
          <a href="#home" class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Home</a>
        </li>
        <li>
          <a href="#about" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
        </li>
        <li>
          <a href="#feedback" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Feedback</a>
        </li>
        <li>
          <a href="#contact" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>



 <!-- Home Section -->
 <section id="home" class="section home" style="width: 100%;">
  <div id="bubble-container">
 <div class="heading">
 <h1 class="wlcm text-white font-bold">Welcome Learners</h1>
  <p class="join text-white text-center" >Join DiscHub: Elevate Your Learning Experience</p>
  <p class="slogan text-white text-center"> <span>"</span>Share, Learn, Succeed - Let's Journey Together on DiscHub<span>"</span></p>
 </div>
    <div class="container">
   
      <div class="input-field">
        <input class="w-full sm:w-3/4 bg-white px-4 py-2 rounded-l-lg border-none" type="email" placeholder="Enter your email" autofocus>
        <button class="bg-white text-gray-800 px-4 py-2 rounded-r-lg border-none">Join</button>
      </div>
      <div class="button-container">
        <button class="button"><a href="./prelogin.php">Login</a></button>
        <button class="button"><a href="./presignin.php">Sign Up</a></button>
      </div>
    </div>
  </div>
</section>

<section>
    <!--Hero area end-->
    <div class="hero_area">
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
            </g>
        </svg>
    </div>
    <!--Hero area end-->
</section>

<!-- About -->
<section id="about" class="section about bg-white text-black ">
        <!-- Add wave SVG here -->
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold mb-4">About DiscHub</h2>
            <p>Welcome to DiscHub, the ultimate note sharing platform designed specifically for SMIT degree engineering college students. At DiscHub, we believe in the power of collaboration and knowledge sharing to enhance the academic journey of every student.</p>
            <p>Our platform provides a seamless experience for students to access, share, and collaborate on notes, study materials, and resources related to their courses. Whether you're looking for lecture notes, study guides, or practice exams, DiscHub has you covered.</p>
            <p>Join our vibrant community of learners, where you can connect with peers, exchange ideas, and elevate your learning experience. Together, let's unlock the potential of collective wisdom and empower each other to succeed academically.</p>
        </div>
    </section>

    <!-- Feedback -->
    <section id="feedback" class="section feedback ">
    <div class="container mx-auto px-4 flex flex-wrap   items-center justify-center">
        <div class="sm:w-1/2 mb-4 sm:mb-0">
            <div class="feedcard ">
            <h2 class="text-4xl font-bold  mb-4">We Value Your Feedback!</h2>
            <p>Please take a moment to provide us with your feedback. Your input is crucial for our future improvement.</p>
        </div>
        </div>
        <div class="form-container w-full sm:w-1/2 bg-white p-8 rounded-lg shadow-md" style="margin-top: 20px;"> <!-- Add margin-top style here -->
            <h2 class="text-4xl font-bold mb-4">Feedback</h2>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="text" name="email" id="email" class="mb-4 w-full px-4 py-2 border border-gray-300 rounded-md text-black" placeholder="Enter your email/contact detail">
                <textarea name="feedback" id="feedbackTextarea" class="mb-4 w-full px-4 py-2 border border-gray-300 rounded-md text-black" rows="5" placeholder="Enter your feedback"></textarea>
                <button type="submit" id="submitFeedbackBtn" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300">Submit Feedback</button>
            </form>
            <!-- Display success message if form submitted successfully -->
            <?php if (!empty($successMessage)): ?>
            <p style="color: green;"><?php echo $successMessage; ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>

      <!-- Contact Section -->
  <section id="contact" class="section contact  text-white">
  <div class="container mx-auto px-4 flex flex-wrap   items-center justify-center">
          <!-- Contact Details Column -->
          <div class="w-full sm:w-1/2 mb-4 sm:mb-0">
                <div class="contact-text">
                    <h2 class="text-4xl font-bold mt-5 mb-4">Contact Us</h2>
                    <p>Sanjayn Memorial institute of Technology ,Chandipadara</p>
                    <p>Berhampur, Ganjam, Odisha, 761003</p>
                    <p>Email: smit@gmail.com</p>
                    <p>Phone: +1234567890</p>
                </div>
            </div>
                    <!-- Map -->
          <div class="form-container w-full sm:w-1/2  rounded-lg shadow-md" style="margin-top: 20px;"> <!-- Add margin-top style here -->
          <div class="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.122381680789!2d84.86353447507024!3d19.40711754149451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a3d54035f7aaaab%3A0xecfa0f78fdbbd28c!2sSMIT%20Degree%20Engineering%20College%20%2CChandipadar!5e0!3m2!1sen!2sin!4v1710253864594!5m2!1sen!2sin"  width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" allowfullscreen=""></iframe>
        </div>
        </div>
    </div>
    </section>
</body>
<footer class="footer">
  <p>Developed Chandan & Team</p>
    <p>&copy; 2024 SMIT. All rights reserved.</p>
    <p>Contact: smit@gmail.com | Phone: +1234567890</p>
    
</footer>

<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <p><?php echo $successMessage; ?></p>
  </div>
</div>

<audio id="sound">
  <source src="./audio/bubbles-003-6397_jGh2YsM9.mp3" type="audio/mp3">
  Your browser does not support the audio element.
</audio>

<script>
  const bubbleContainer = document.getElementById('bubble-container');
  const homeSection = document.getElementById('home');
  const menuIcon = document.querySelector('.menu-icon');
  const menu = document.getElementById('menu');
  const closeMenu = document.getElementById('closeMenu');
  const sound = document.getElementById('sound'); // Get the audio element

  function createBubble(event) {
    if (event.target.closest('#home')) { // Check if cursor is within the home section
      const bubble = document.createElement('div');
      bubble.classList.add('bubble');
      bubble.style.left = event.clientX + 'px';
      bubble.style.top = event.clientY + 'px';
      bubble.style.width = Math.random() * 20 + 10 + 'px'; // Random width between 10px and 30px
      bubble.style.height = bubble.style.width; // Make bubble circular
      bubbleContainer.appendChild(bubble);
      setTimeout(() => {
        bubble.remove();
      }, 5000); // Remove bubble after 5 seconds

      // Play the sound
      sound.currentTime = 0; // Rewind to the beginning
      sound.play();
    }
  }

  document.addEventListener('mousemove', createBubble);

  // Toggle menu visibility
  menuIcon.addEventListener('click', () => {
    menu.classList.toggle('hidden');
  });

  closeMenu.addEventListener('click', () => {
    menu.classList.add('hidden');
  });
</script>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the page is loaded and success message is not empty, show the modal
window.onload = function() {
  if ("<?php echo $successMessage; ?>" !== '') {
    modal.style.display = "block";
  }
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<script>
  // Get the menu toggle button and menu container
  const menuToggle = document.getElementById('menu-toggle');
  const menuContainer = document.getElementById('navbar-solid-bg');

  // Toggle menu visibility
  menuToggle.addEventListener('click', () => {
    menuContainer.classList.toggle('hidden');
  });
</script>

</html>