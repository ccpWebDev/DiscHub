<?php
// Start session
session_start();

// Include the database configuration file
include_once "./config/config.php";

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

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home Page</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome -->
<link rel="stylesheet" href="land.css">
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

/* Waves Animation start*/
.waves {
  position: absolute;
  width: 100%;
  min-height: 100px;
  max-height: 150px;
  top:-150px;
  left: 0;
}



body {
  background-color: #111827;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  margin: 0;
  padding: 0;
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

.menu-icon {
  display: none; /* Hide menu icon by default */
  cursor: pointer;
}

.slogan {
  font-size: 30px;
  font-weight: 500;
}

.slogan span {
  color: aqua;
}

.input-field {
  width: 100%;
  background-color: white;
  padding: 10px;
  border: none;
  border-radius: 20px;
  margin: 20px auto;
  display: flex;
  align-items: center;
  max-width: 700px;
  color: #000;
}

.input-field input {
  border: none;
  background: none;
  outline: none;
  padding-left: 10px;
  font-size: 16px;
  color: #000;
}

.input-field button {
  background-color: #0A251B;
  color: #ffffff;
  border: none;
  border-radius: 20px;
  padding: 8px 50px;
  margin-left: 30px;
  cursor: pointer;
  transition: background-color 0.5s ease;
}

.input-field button:hover {
  background-color: #04f7ff;
  color: rgb(0, 0, 0);
}

.button-container {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

.button {
  background-color: white;
  color: black;
  border: none;
  border-radius: 20px;
  padding: 8px 20px;
  margin: 0 40px; /* Added margin */
  cursor: pointer;
  transition: background-color 0.5s ease;
}

.button:hover {
  background-color: #0A251B;
  color: #fff;
}

.section {
  align-items: center;
  justify-content: center;
  position: relative;
  scroll-margin-top: 60px; /* Adjust for navbar height */
}

.feedback {
  display: flex;
  height: 200px;

}
.footer {

  color: white;
  padding: 20px 0;
  text-align: center;
  width: 100%;
  position: relative;
  bottom: 0;
}

.form-container {
  max-width:100%;
  height: 100%;
  padding-top: 20px;
  background-color: white;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.feedback-text {
  background-color: #76ABAE;
  color: white;
  padding: 20px;
  border-radius: 10px;
}

.form-container textarea {
  width: 100%;
  height: 150px;
  margin-bottom: 10px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  resize: none;
}

.form-container input[type="text"] {
  width: 100%;
  margin-bottom: 10px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.form-container button {
  padding: 10px 20px;
  background-color: #12372A;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.form-container button:hover {
  background-color: #0A251B;
}

  .contact{
    background: rgb(2,0,36);
  background: linear-gradient(180deg, rgba(2,0,36,1) 0%, rgba(17,24,39,1) 35%, rgba(8,32,84,1) 86%);
  }

.contact-text {
  color: white;
  padding: 20px;
}

.map {
  padding: 20px;
}

.map-container {
  position: relative;
  overflow: hidden;
  padding-top: 56.25%; /* Aspect ratio 16:9 */
}

.map-container iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
.bubble {
  position: absolute;
  background-color: rgba(255, 255, 255, 0.7); /* Adjust opacity as needed */
  width: 10px; /* Adjust size as needed */
  height: 10px; /* Adjust size as needed */
  border-radius: 50%;
  pointer-events: none;
  animation: float 10s linear infinite, fade-out 10s linear forwards;
  opacity: 1;
}

@keyframes float {
  0% {
    transform: translateY(0) rotate(0deg);
  }
  50% {
    transform: translateY(-100vh) rotate(360deg);
  }
  100% {
    transform: translateY(0) rotate(720deg);
  }
}

@keyframes fade-out {
  0% {
      opacity: 1;
  }
  100% {
      opacity: 0;
  }
}



.heading {
  text-align: center;
  align-items: center;
  justify-content: center;
}

.wlcm {
  text-align: center;
  font-size: 60px;
  font-weight: 700;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

</style>
</head>
<body>


<nav class="navbar fixed top-0 left-0 w-full h-16 flex items-center justify-between px-4 bg-opacity-50 bg-blue-900 shadow">
        <img src="logo.png" alt="Logo" class="h-10">
        <ul class="hidden sm:flex space-x-4">
            <li><a href="#home" class="text-white text-[20px] sm:text-[10px]">Home</a></li>
            <li><a href="#about" class="text-white">About</a></li>
            <li><a href="#feedback" class="text-white">Feedback</a></li>
            <li><a href="#contact" class="text-white">Contact</a></li>
        </ul>
        <i class="menu-icon sm:block fas fa-bars text-white text-2xl ml-auto mr-4 cursor-pointer"></i>
    </nav>


<section id="home" class="section home">
  <div id="bubble-container">
 <div class="heading">
 <h1 class="wlcm">Welcome Learners</h1>
  <p >Join DiscHub: Elevate Your Learning Experience</p>
  <p class="slogan"> <span>"</span>Share, Learn, Succeed - Let's Journey Together on DiscHub<span>"</span></p>
 </div>
    <div class="container">
   
      <div class="input-field">
        <input class="w-full sm:w-3/4 bg-white px-4 py-2 rounded-l-lg border-none" type="email" placeholder="Enter your email" autofocus>
        <button class="bg-white text-gray-800 px-4 py-2 rounded-r-lg border-none">Join</button>
      </div>
      <div class="button-container">
        <button class="button"><a href="./prelogin.php">Login</a></button>
        <button class="button"><a href="./admin/addteacher.php">Sign Up</a></button>
      </div>
    </div>
  </div>
</section>


    <section id="about" class="section about bg-white text-black">
        <!-- Add wave SVG here -->
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold mb-4">About DiscHub</h2>
            <p>Welcome to DiscHub, the ultimate note sharing platform designed specifically for SMIT degree engineering college students. At DiscHub, we believe in the power of collaboration and knowledge sharing to enhance the academic journey of every student.</p>
            <p>Our platform provides a seamless experience for students to access, share, and collaborate on notes, study materials, and resources related to their courses. Whether you're looking for lecture notes, study guides, or practice exams, DiscHub has you covered.</p>
            <p>Join our vibrant community of learners, where you can connect with peers, exchange ideas, and elevate your learning experience. Together, let's unlock the potential of collective wisdom and empower each other to succeed academically.</p>
        </div>
    </section>


    <!-- Feedback Section -->
    <section id="feedback" class="section feedback bg-[cyan] py-16">
        <div class="container mx-auto px-4 flex flex-wrap items-center justify-center">
            <div class="w-full sm:w-1/2 mb-4 sm:mb-0">
                <h2 class="text-4xl font-bold mb-4">We Value Your Feedback!</h2>
                <p>Please take a moment to provide us with your feedback. Your input is crucial for our future improvement.</p>
            </div>
            <div class="form-container w-full sm:w-1/2 bg-white p-8 rounded-lg shadow-md">
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
  <section id="contact" class="section contact bg-gradient-to-r from-blue-800 to-blue-900 text-white py-16">
        <div class="container mx-auto px-4 flex flex-wrap items-center justify-center">
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
            <!-- Map Column -->
            <div class="w-full sm:w-1/2">
                <div class="map-container relative overflow-hidden" style="padding-top: 56.25%;">
                    <!-- Insert your map embed code here -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.122381680789!2d84.86353447507024!3d19.40711754149451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a3d54035f7aaaab%3A0xecfa0f78fdbbd28c!2sSMIT%20Degree%20Engineering%20College%20%2CChandipadar!5e0!3m2!1sen!2sin!4v1710253864594!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>


<footer class="footer sm:text-[10px]">
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

</body>
</html>
