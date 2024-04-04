
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
</head>

<body>
    <!-- Navigation -->
    <div class="navbar">
    <a href="home.php" class="logo">
                DiscHub
            </a>
        <ul>
           
         
            
           </li>
            <!-- Menu items -->
            <li><a href="examlist.php"><i class="fa fa-tasks" aria-hidden="true"></i> Online Exam</a></li>
            <li><a href="result.php"><i class="fa fa-bar-chart" aria-hidden="true"></i> Results</a></li>
            <li><a href="./liveclass.php"><i class="fa-solid fa-video"></i> Live Class</a></li>
            <!-- Logout -->
            <li class="logout"><a href="home.php"><i class="fa fa-fw fa-sign-out"></i> Logout</a></li>
        </ul>
    </div>

    <div class="container mx-auto mt-3 rounded">
        <h1 class="text-3xl font-semibold mb-4">Latest Link</h1>
        <?php
        // Include your database connection configuration
        include './config/config.php';

        // Fetch the last submitted link from the database
        $sql = "SELECT id, subject_name, link, sent_at FROM sent_link ORDER BY id DESC LIMIT 3";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id = $row["id"];
            $subject = $row["subject_name"];
            $link = $row["link"];
            $sent_at = $row["sent_at"];

            // Display the last submitted link
            echo "<div id='linkContent' class='bg-white rounded shadow p-4 mb-4'>";
            echo "<p class='text-lg'><span class='font-semibold'>ID:</span> $id</p>";
            echo "<p class='text-lg'><span class='font-semibold'>Subject:</span> $subject</p>";
            echo "<p class='text-lg'><span class='font-semibold'>Sent At:</span> $sent_at</p>";
            echo "<p class='link'><span class='font-semibold'>Link:</span> <a href='$link' class='text-blue-500 underline' target='_blank'>$link</a></p>";

            // Add 'Join now' button
            echo "<button id='joinButton' class='bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded mt-2'>Join now</button>";
            echo "</div>";

            // Display iframe to show the link content
            echo "<iframe name='iframe' id='iframe' class='border-0 w-full h-screen hide'></iframe>";
        } else {
            echo "<p>No links submitted yet.</p>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var linkContent = document.getElementById('linkContent');
            var iframe = document.getElementById('iframe');

            // Hide iframe by default
            iframe.classList.add('hide');

            // Listen for click on 'Join now' button
            document.getElementById('joinButton').addEventListener('click', function (e) {
                e.preventDefault(); // Prevent default link behavior

                // Show the iframe
                iframe.classList.remove('hide');
                // Hide the fetched link content
                linkContent.classList.add('hide');

                // Set iframe source to the link value
                iframe.src = linkContent.querySelector('a').getAttribute('href');
            });
        });
    </script>
</body>

</html>
