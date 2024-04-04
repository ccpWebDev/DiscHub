<?php
ob_start();
  include_once "libs/Session.php";
  $filepath = realpath(dirname(__FILE__));

  include_once ($filepath."/helpers/Format.php");

  Session::init();
  Session::checkSession();

  spl_autoload_register(function($class){
    include_once "classes/".$class.".php";
  });

  //creating object of classes

  $pc = new PostComment();
  $ex = new Exam();
  $fm = new Format();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DiscHub | Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="assets/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css">
    

    <!-- main css file -->
    <link rel="stylesheet" href="style.css">
     <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- tinymce script -->
    <script src="assets/js/tinymce/tinymce.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c35bb1de04.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
      tinymce.init({
        selector: '#writepost'
      });
    </script>
    <!-- Custom JavaScript -->
    <script src="assets/js/obls.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
.navbar {
  z-index: 100;
    list-style-type: none;
    width: 100%;   
    padding-bottom: 10px;
    background-color: white;
   position: sticky;
    margin-bottom: 40px;
   
}
.navbar ul{
margin-left: 20%;
margin-top: 20px;
text-align: center;
  display: flex;
  flex-direction: row;
}
.navbar li {
  text-align: center;
  margin-top: 10px;
  
}

.navbar li a {
    color: #11242D;
    text-align: center;
    padding: 016px;
    font-size: 16px;
    font-weight: 700;
    text-decoration: none;
}

.navbar li a:hover {
    background-color: rgba(white, white, white, 0.3);
}

.navbar li a i {
    margin-right: 5px;
}
.navbar li:hover{
  color: black;
  background:rgba(255, 255, 255, 0.418);
  border-radius: 10px;
}
.logo{
  position: absolute;
  font-size: 30px;
  left: 150px;
  top: -1px;
}
.right{
  position: absolute;
  right: 140px;
  margin-left: 200px;
}
.right1{
  position: absolute;
  top: 15px;
  right: 20px;
  padding: 5px 2px;
  color: white;
  background:red;
}
.right1:hover{
  background: black;

  transition: .5s ;
}
.hub{
  color: #070F2B;

}


</style>
</head>
<body>
        <!-- Navigation -->


              <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="navbar">
<ul >
<a href="home.php" class="flex items-center ml-3">
        <!-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" /> -->
        <span class=" text-5xl font-bold whitespace-nowrap dark:text-white">DiscHub</span>
    </a>

    <?php if(!Session::get("checkusertype")) { ?>
        <li>
          <a href="createexam.php"><i class="fa fa-tasks" aria-hidden="true"></i> Create Exam</a>
        </li>
        <li>
          <a href="examlist.php"><i class="fa fa-bar-chart" aria-hidden="true"></i> Exam Lists</a>
        </li>
        <li>
          <a href="vcall.php"><i class="fa fa-bar-chart" aria-hidden="true"></i>Host Live Class</a>
        </li>
    <?php } ?>
    <?php if(Session::get("checkusertype")) { ?>
        <li><a href="examlist.php"><i class="fa fa-tasks" aria-hidden="true"></i> Online Exam</a></li>
        <li><a href="result.php"><i class="fa fa-bar-chart" aria-hidden="true"></i> Results</a></li>

        <li><a href="./liveclass.php"><i class="fa-solid fa-video"></i> Live Class</a></li>
    <?php } ?>
         <!-- /.dropdown -->
         <?php
                if(isset($_GET['action']) && $_GET['action']=="logout"){
                        Session::destroy();
                        header("Location: login.php");
                    }
                ?>
                  <li class="right">
                   <a href="#"><i class="fa fa-user fa-fw"></i> <?php echo Session::get('username');?> (<?php echo Session::get("usertype");?>)</a>
                  </li>

                  <li  class="right1"><a href="?action=logout" ><i class="fa fa-fw fa-sign-out"></i> Logout</a></li>
</ul>
</div>