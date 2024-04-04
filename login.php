<?php
// Code for cache-control
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache"); 
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
header("Cache-Control: max-age=2592000");
include_once "bot.php";
?>



<?php
ob_start();

$filepath = realpath(dirname(__FILE__));
include "libs/Session.php";
Session::init();
Session::checkLogin();

spl_autoload_register(function($class){
  include_once "classes/".$class.".php";
});

$user = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $userlogin = $user->userLogin($_POST);
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teachers/Students Login</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #070F2B;
            font-family: Arial, sans-serif;
			
        }

        .login-container {
            max-width: 400px;
            margin-top: 100px;
        }

        .login-header {
            margin-bottom: 30px;
            text-align: center;
            color: white;
            font-size: 24px;
			font-weight: 700;
			letter-spacing: 2px;
        }

        .login-panel {
            padding: 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 30px;
        }

        .form-control {
            height: 50px;
            border-radius: 25px;
            border: 1px solid #ddd;
            padding: 0 20px;
            width: 100%;
        }

        .btn-login {
            background-color: #2D9596;
            border-color: #4CAF50;
            height: 50px;
            border-radius: 25px;
            font-size: 18px;
            font-weight: bold;
            transition: all 0.3s ease;
            width: 50%;
			margin-left: 20%;
        }

        .btn-login:hover {
            background-color: #265073;
            border-color: #45a049;
			color: white;
        }

        .footer-text {
            margin-top: 30px;
            text-align: center;
            color: #777;
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
    </style>
</head>
<body>

<nav class="navbar fixed top-0 left-0 w-full h-16 flex items-center justify-between px-4 bg-opacity-50 bg-blue-900 shadow">
<a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
        <!-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" /> -->
        <span class="self-center text-3xl font-bold whitespace-nowrap dark:text-white">DiscHub</span>
    </a>
        <ul class="hidden sm:flex space-x-4">
            <li><a href="./index.php" class="text-white text-[20px] sm:text-[10px]">Home</a></li>
           
        </ul>
        <i class="menu-icon sm:block fas fa-bars text-white text-2xl ml-auto mr-4 cursor-pointer"></i>
    </nav>


<div class="login-container mx-auto">
    <h2 class="login-header">DiscHub</h2>
    <div class="login-panel">
        <?php if (isset($userlogin)) { ?>
            <div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $userlogin; ?>
            </div>
        <?php } ?>
        <form accept-charset="UTF-8" role="form" action="" method="POST">
        <div class="form-group">
			    	    	<select name="user_type" class="form-control form-control-lg">
							  <option value="std">Student</option>
							  <option value="tch">Teacher</option>
							</select>
			    	    </div>
            <div class="form-group">
                <input class="form-control" placeholder="Username" name="uname" type="text" required>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Password" name="pass" type="password" required>
            </div>
            <div class="form-group">
                <button class="btn btn-login" type="submit" name="login">Login</button>
            </div>
        </form>
    </div>
</div>

<div class="footer-text mt-6">
    Developed by &copy; Chandan & Team <script>document.write( new Date().getFullYear() );</script>
</div>

</body>
</html>

<?php
ob_end_flush();
?>
