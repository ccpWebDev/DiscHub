<?php 
include_once "admin_header.php";
include_once "./bot.php";


?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  .table-responsive{
    background: rgba(17, 42, 69, 0.07);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(2.1px);
-webkit-backdrop-filter: blur(2.1px);
border: 1px solid rgba(17, 42, 69, 1);
padding: 0px 10px;

  }
  .search{
        width: 800px;
        border-radius: 10px;
        padding: 5px 30px;
        color: black;
    }
</style>
<body>

<div class="container mx-auto">
    <!-- Breadcrumbs -->
    <ol class="breadcrumb bg-gray-800 text-white">
        <li class="breadcrumb-item">
            <a href="#" class="text-white">Dashboard</a>
        </li>
    </ol>
    <!-- Icon Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <div class="col-span-1 mb-4">
            <div class="bg-blue-500 text-white p-2 h-full">
                <div class="flex items-center justify-between">
                    <div class="text-2xl">
                    <i class="fa fa-fw fa-comments"></i>
              </div>
              <?php
                $getallpost = $pc->getTotalPostRows();
                $allpost = $getallpost->num_rows;
              ?>
              <div class="mr-4"><?php echo $allpost;?> Posts !</div>
            </div>
            <a href="index.php" class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-span-1 mb-4">
            <div class="bg-green-500 text-white p-4 h-full">
                <div class="flex items-center justify-between">
                    <div class="text-2xl">
                    <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <?php
                $getstd = $ad->getTotalStudentRows();
                $allstd = $getstd->num_rows;
              ?>
              <div class="mr-5"><?php echo $allstd; ?> Students !</div>
            </div>
            <a href="viewstudent.php" class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-span-1 mb-4">
            <div class="bg-red-500 text-white p-4 h-full">
                <div class="flex items-center justify-between">
                    <div class="text-2xl">
                    <i class="fa fa-fw fa-support"></i>
              </div>
               <?php
                $gettch = $ad->getTotalTeacherRows();
                $alltch = $gettch->num_rows;
              ?>
              <div class="mr-5"><?php echo $alltch; ?> Teachers !</div>
            </div>
            <a href="viewteacher.php" class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>


    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> All Posts</div>
        <div class="card-body">
          <?php 
            //delete posts
              if (isset($_GET['delpage'])){
                  $delid = $_GET['delpage'] ;
                  $delete = $ad->daletePost($delid);
                  if ($delete) {
                    echo "<span class='success'>Post deleted successfully !</span>";
                  }
              }
          ?>


<!-- search -->
<div class="flex justify-center mb-4">
        <input type="text" id="searchInput" placeholder="Search..." class="search">
        <button onclick="searchFeedback()" class="ml-2 bg-blue-500 text-white rounded-md py-2 px-4">Search</button>
    </div>


    <div class="table-responsive">
    <table class="table" style="background-color: rgba(255, 255, 255, 0.15);" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Title</th>
                <th>Posted by</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 0;
            $posts = $ad->getAllPost();
            while ($row = $posts->fetch_assoc()) {
                $i++;
                ?>
                <tr>
                    <td style="border: 1px solid white;"><?php echo $i; ?></td>
                    <td style="border: 1px solid white;"><?php echo $fm->textShorten($row['title'], 250); ?></td>
                    <td style="border: 1px solid white;"><?php echo $row['username']; ?></td>
                    <td style="border: 1px solid white;"><?php echo $fm->formatDate($row['pdate']); ?></td>
                    <td style="border: 1px solid white;"><a href="?delpage=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
                <?php 
            } 
            ?>
        </tbody>
    </table>
</div>



        </div>
      </div>
</div>

<script>
    function searchFeedback() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.querySelector("table");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            for (var j = 0; j < td.length; j++) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break; // Break the inner loop to avoid showing multiple times
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

</script>
    <!-- /.container-fluid-->
    <?php
include_once "admin_footer.php";
?>