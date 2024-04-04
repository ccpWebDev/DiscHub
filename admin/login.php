<?php
ob_start();

  include "../libs/Session.php";
  Session::init();
  Session::checkAdminLogin();

  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../libs/Database.php");
  include_once ($filepath."/../helpers/Format.php");

  spl_autoload_register(function($class){
    include_once "../classes/".$class.".php";
  });

  //creating object of classes

  $admin = new Adminobls();

?>

<?php
//code for cache-control
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
  include_once "./bot.php";
?>
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['adminlogin'])) {
        $adminlogin = $admin->adminLogin($_POST);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login | DiscHub</title>
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

        input[type='submit'] {
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

        input[type='submit']:hover {
            background-color: #265073;
            border-color: #45a049;
			color: white;
        }

        .footer-text {
            margin-top: 30px;
            text-align: center;
            color: #777;
        }
    </style>
</head>
<body>

<div class="login-container mx-auto">
    <h2 class="login-header">DiscHub SMIT</h2>
    <div class="login-panel">
        <form accept-charset="UTF-8" role="form" action="" method="POST">
            <div class="form-group">
                <input class="form-control" id="username" placeholder="Username" name="uname" type="text" required>
            </div>
            <div class="form-group">
                <input class="form-control" id="password" placeholder="Password" name="pass" type="password" required>
            </div>
            <div class="form-group">
            <input type="submit" value="Login" name="adminlogin">
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


<!--  <form action="" method="POST" class="login-form">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="uname" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="pass" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="submit" value="Login" name="adminlogin">
            </div>
        </form> -->