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

    <!-- Custom JavaScript -->
    <script src="assets/js/obls.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      
      body {
  background-color: #111827;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  margin: 0;
  padding: 0;
  color: black;
}

.navbar{
    background: white;
    color: black;
    height: 70px;
  }
  .navbar ul{
    display: flex;
    float: right;
  }
  .navbar ul li{
    margin-top: 10px;
    margin-right: 20px;
  }
  .navbar ul li a{
    color: black;
    font-size: 18px;
    text-decoration: none;
    list-style: none;
    font-weight: 700;
}
.navbar ul li a:hover{
    color: blue;
    transition: .3s ease-in-out;
}
.self-center:hover{
    color: #04ffea;
    transition: .3s ease-in-out;
}

.logo{
    font-size: 30px;
    font-weight: 700;
    margin-left: 100px;
    text-decoration: none;
    list-style: none;
    
}
.logo:hover{
    color: #04ffea;
    transition: .3s ease-in-out;
}
.logout{
    background: red;
    padding: 2px 5px;
    border-radius: 5px;
}
.logout:hover{
    color: #04ffea;
}

/* Hide by default */
        .hide {
            display: none;
        }

        /* Position iframe over fetched data */
        #iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        @media only screen and (max-width: 768px) {
            .navbar ul li a{
    color: black;
    font-size: 10px;
    text-decoration: none;
    list-style: none;
    font-weight: 700;
}
.navbar{
    background: white;
    color: black;
    height: 90px;
  }
  .navbar ul{
    margin-left: 2px;
    display: flex;
    float: right;
  }
        }
    </style>

    <!-- Navigation -->
    <div class="navbar">
    <a href="home.php" class="logo">
                DiscHub
            </a>
        <ul>
           
         
          
            <!-- Menu items Teacher -->
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


       <!-- Menu items Teacher -->
            <?php if(Session::get("checkusertype")) { ?>
        <li><a href="examlist.php"><i class="fa fa-tasks" aria-hidden="true"></i> Online Exam</a></li>
        <li><a href="result.php"><i class="fa fa-bar-chart" aria-hidden="true"></i> Results</a></li>

        <li><a href="./liveclass.php"><i class="fa-solid fa-video"></i> Live Class</a></li>
    <?php } ?>
            <?php
                if(isset($_GET['action']) && $_GET['action']=="logout"){
                        Session::destroy();
                        header("Location: login.php");
                    }
                ?>
            <li class="right">
                   <a href="#"><i class="fa fa-user fa-fw"></i> <?php echo Session::get('username');?> (<?php echo Session::get("usertype");?>)</a>
                  </li>

            <!-- Logout -->
            <li class="logout"><a href="?action=logout"><i class="fa fa-fw fa-sign-out"></i> Logout</a></li>
        </ul>
    </div>


    <script type="text/javascript">
      tinymce.init({
        selector: '#writepost'
      });
    </script>
