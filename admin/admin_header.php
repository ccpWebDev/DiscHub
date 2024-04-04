<?php
ob_start();
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<?php 
include "../libs/Session.php";
	Session::init();
  	Session::checkAdminSession();

$filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../libs/Database.php");
  include_once ($filepath."/../helpers/Format.php");

  spl_autoload_register(function($class){
    include_once "../classes/".$class.".php";
  });

  //creating object of classes
  $db = new Database();
  $fm = new Format();
  $ad = new Adminobls();
  $pc = new PostComment();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Panel- DiscHub-SMIT</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<style>
  body{
    background: red;
  }
</style>


<body class="bg-gray-900 text-white">
    <!-- Navigation-->
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a class="text-3xl font-bold text-white" href="index.php"><i class="fa fa-map-o" aria-hidden="true"></i> DiscHub-SMIT</a>
            <div class="lg:flex items-center hidden">
                <ul class="flex space-x-4">
                    <li><a href="index.php" class="hover:text-gray-300">Dashboard</a></li>
                    <li><a href="addstudent.php" class="hover:text-gray-300">Add Student</a></li>
                    <li><a href="viewstudent.php" class="hover:text-gray-300">View Students</a></li>
                    <li><a href="addteacher.php" class="hover:text-gray-300">Add Teacher</a></li>
                    <li><a href="viewteacher.php" class="hover:text-gray-300">View Teachers</a></li>
                    <li><a href="subject.php" class="hover:text-gray-300">Subjects</a></li>
                    <li><a href="feedback.php" class="hover:text-gray-300">Feedbacks</a></li>
                </ul>
            </div>
            <div>
                <span class="mr-4">Welcome: <strong><?php echo Session::get('username');?></strong></span>
                <?php 
    	 if(isset($_GET['action']) && $_GET['action']=="logout"){
                    Session::destroy();
                    header("Location: login.php");
                }
        ?>
                <a style="background-color: red; padding:3px 5px; border-radius:5px;" href="?action=logout" class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </div>

            
            <button class="block lg:hidden focus:outline-none" type="button" aria-label="toggle menu">
                <svg class="h-6 w-6 fill-current text-white" viewBox="0 0 24 24">
                    <path v-if="!isOpen" fill-rule="evenodd" clip-rule="evenodd"
                        d="M21.75 12.75H2.25C2.00736 12.75 1.81094 12.5536 1.81094 12.311V11.689C1.81094 11.4464 2.00736 11.25 2.25 11.25H21.75C21.9926 11.25 22.1891 11.4464 22.1891 11.689V12.311C22.1891 12.5536 21.9926 12.75 21.75 12.75Z" />
                    <path v-else fill-rule="evenodd" clip-rule="evenodd"
                        d="M14.25 12.75H2.25C2.00736 12.75 1.81094 12.5536 1.81094 12.311V11.689C1.81094 11.4464 2.00736 11.25 2.25 11.25H14.25C14.4926 11.25 14.6891 11.4464 14.6891 11.689V12.311C14.6891 12.5536 14.4926 12.75 14.25 12.75Z" />
                </svg>
            </button>
        </div>
    </nav>

    <div class="container mx-auto">
        <div class="content-wrapper">
            <!-- Content Goes Here -->
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
</body>

</html>
