<?php
include_once "bot.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DiscHub | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> 

<style>
    body {
  background-color: #111827;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  margin: 0;
  padding: 0;
}
.section {
  min-height: 75vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  position: relative;
  scroll-margin-top: 60px; /* Adjust for navbar height */
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
.self-center:hover{
    color: #04ffea;
    transition: .3s ease-in-out;
}

.container {
    margin-top: 100px;
    position: relative;
    align-items: center;
    border-radius: 12px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    padding: 40px;
    text-align: center;
    justify-self: center;
    margin-left: 5%;
  }

  .btn-container {
    margin-top: 5rem;
    align-items: center;
    display: flex;
    margin-left: 5%;
    justify-content: space-around;
  }

  .btn {
    padding: 1rem 2rem;
    border-radius: 8px;
    background-color: transparent;
    color: #ffffff;
    font-size: 1.2rem;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.3s ease;
    border: 2px solid #ffffff;
    outline: none;
  }

  .btn:hover {
    background-color: #ffffff;
    color: #4f46e5;
  }
  .contact{
        height: 0px;
        margin-top: px;
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

.footer {
    color: white;
    padding: 20px 0;
    text-align: center;
    width: 100%;
    position: relative;
    bottom: 0;
  }
  

</style>
<body>
<nav class="navbar border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
        <!-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" /> -->
        <span class="self-center text-3xl font-bold whitespace-nowrap dark:text-white">DiscHub</span>
    </a>
    <button data-collapse-toggle="navbar-solid-bg" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-solid-bg" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
      <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
        <li>
          <a href="index.php" class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<section id="home" class="section home">
<div id="bubble-container">
  <div class="container">

  <h1 class="text-5xl font-bold text-white mb-4">Welcome to DiscHub</h1>
  <p class="text-lg mb-8 text-white">Please select your role to continue:</p>

  <div class="btn-container">
    <a href="./login.php">
        <button class="btn">User Login</button>
    </a>

    <a href="./admin/login.php">
        <button class="btn">Admin Login</button>
    </a>
</div>
</div>
</div>
</div>
</section>

<footer class="footer "style="background:white; color:black;">
  <p>Developed Chandan & Team</p>
    <p>&copy; 2024 SMIT. All rights reserved.</p>
    <p>Contact: smit@gmail.com | Phone: +1234567890</p>
    
</footer>
<audio id="sound">
  <source src="./audio/bubbles-003-6397_jGh2YsM9.mp3" type="audio/mp3">
  Your browser does not support the audio element.
</audio>
</body>
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
</html>