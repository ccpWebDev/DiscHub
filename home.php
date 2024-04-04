<html lang="en">
  <head>
<title>DiscHub | Home</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<style>
  .container{
    height: 500px;
    margin-top: 20px;
  }
</style>

<body>

<?php
include_once "bot.php";

include_once "header1.php";


//get user id 
 $user_id = Session::get("userid");

if (isset($_GET['delp'])) {
  $delp = $_GET['delp'];
  $deletedp = $pc->deleteUserPost($delp, $user_id);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $posted = $pc->createPost($_POST, $_FILES, $user_id);
    }
?>
    <section class="qeustion_list clearfix">
      <div class="container " style="  margin-top: 0px;">
        <div class="row ">
          <div class="col-md-8">
            <?php 
                if (isset($posted)) {
                  echo $posted;
                }
            ?>
            <?php 
                if (isset($deletedp)) {
                  echo "<span class='error'>Post deleted successfully !</span>";
                  header("Location:home.php?usid=".$user_id);
                }
            ?>
            <ul class="nav nav-pills">
               <li class="active"><a href="#section1" data-toggle="tab"><i class="fa fa-th" aria-hidden="true"></i> <strong>Recent Posts</strong></a></li>
               <?php 
              if (Session::get("checkusertype")) { 
                ?>
          <li><a  href="#section2" data-toggle="tab"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong class=" border-">Write New Post</strong></a></li>
          <?php } ?>
           </ul>

           <?php
            $per_page = 6;
            if (isset($_GET['page'])) {
              $page= $_GET['page'];
            }else{
              $page = 1;
            }
            $start_from = ($page-1)*$per_page;
          
           ?>

           <div class="tab-content">
               <div class="tab-pane fade in active" id="section1">
                   <div class="qs_list">
               <!-- subject wise post view -->
                   <?php
                      if (isset($_GET['subid'])) {
                        $subid= $_GET['subid'];
                    ?>
                       <ul class="list-group" >
                    <?php
                      //get sucject name
                         $subrows = $pc->getSubjectById($subid);
                         $result = $subrows->fetch_assoc();
                         $subname = $result['name'];
                    //get subject wise posts
                        $subpost = $pc->subjectWisePost($subid);
                        if ($subpost) {
                          $countSub = $subpost->num_rows;
                          echo "<h4 style='text-align:center;color:green'>$countSub Posts found on subject <strong>$subname</strong></h4>";
                          while ($row = $subpost->fetch_assoc()) {
                            $getcomment = $pc->getSinglePostComment($row['id']);
                          if($getcomment){
                            $countc = $getcomment->num_rows;
                          }else{
                            $countc = 0;
                          }
                    ?>
                              <li class="list-group-item">
                                <a href="singlepost.php?pid=<?php echo $row['id'];?>"><?php echo $row['title'];?></a>
                                <span class="badge"><?php echo $countc;?> answers</span><br><span class="postedby">posted by <?php echo $row['username'];?> on <?php echo $fm->formatdate($row['pdate']);?> | subject: <a href="#"><?php echo $row['name'];?></a></span>
                              </li>

                    <?php    
                        $countc = 0; 
                          }
                        }else{
                            echo "<span class='error' style='font-size:20px;text-align:center;'>No post found !</span>";
                        }
                    ?>
                 </ul>

                <?php
                    }else if(isset($_GET['usid'])) {
                        $uid= $_GET['usid'];
                ?>
              <!-- View individual posts -->
<ul class="divide-y divide-gray-200">
    <?php
    $uname = Session::get('username');
    // Get user's posts
    $upost = $pc->userPost($uid);
    if ($upost) {
        $countpost = $upost->num_rows;
        echo "<h4 class='text-center text-green-500'>$countpost Posts found of user: <strong>$uname</strong></h4>";
        while ($row = $upost->fetch_assoc()) {
            $getcomment = $pc->getSinglePostComment($row['id']);
            $countc = $getcomment ? $getcomment->num_rows : 0;
    ?>
            <li class="py-4 flex">
                <div class="flex-1">
                    <a href="singlepost.php?pid=<?php echo $row['id'];?>" class="text-lg font-semibold text-gray-900"><?php echo $row['title'];?></a>
                    <p class="text-sm text-gray-500">
                        Posted by <?php echo $row['username'];?> on <?php echo $fm->formatdate($row['pdate']);?> |
                        Subject: <a href="#" class="text-blue-500"><?php echo $row['name'];?></a>
                    </p>
                    <span class="inline-block bg-blue-100 text-blue-600 px-2 py-1 rounded-full text-xs font-semibold uppercase mr-2"><?php echo $countc;?> answers</span>
                    <a href="?delp=<?php echo $row['id'];?>" class="inline-block bg-red-500 text-white px-2 py-1 rounded-full text-xs font-semibold uppercase">Delete post</a>
                </div>
            </li>
    <?php
        }
    } else {
        echo "<p class='text-center text-red-500 text-lg'>No post found!</p>";
    }
    ?>
</ul>
<!-- End individual post showing -->


                <?php
                    }else if(isset($_GET['search'])) {
                        $key= $_GET['search'];
                ?>

              <!-- view search posts -->
                 <ul class="list-group">
                    <?php
                        $spost = $pc->searchPost($key);
                        if ($spost) {
                          $countpost = $spost->num_rows;
                          echo "<h4 style='text-align:center;color:green'>$countpost result found !</h4>";
                          while ($row = $spost->fetch_assoc()) {
                            $getcomment = $pc->getSinglePostComment($row['id']);
                          if($getcomment){
                            $countc = $getcomment->num_rows;
                          }else{
                            $countc = 0;
                          }

                    ?>
                              <li class="list-group-item">
                                <a href="singlepost.php?pid=<?php echo $row['id'];?>"><?php echo $row['title'];?></a>
                                <span class="badge"><?php echo $countc;?> answers</span><br><span class="postedby">posted by <?php echo $row['username'];?> on <?php echo $fm->formatdate($row['pdate']);?> | subject: <a href="#"><?php echo $row['name'];?></a></span>
                              </li>

                    <?php 
                          $countc = 0;    
                          }

                        }else{
                            echo "<span class='error' style='font-size:20px;text-align:center'>No post found !</span>";
                        }
                    ?>
                 </ul>
                  <!-- end search posts -->
                <?php
                    }else{
                 ?>
                 <ul class="list-group">
                  <?php
                      $allpost = $pc->getAllPost($start_from, $per_page);
                      if ($allpost->num_rows) {
                        while ($row = $allpost->fetch_assoc()) {

                          $getcomment = $pc->getSinglePostComment($row['id']);
                          if($getcomment){
                            $countc = $getcomment->num_rows;
                          }else{
                            $countc = 0;
                          }

                  ?>  
                            <li class="list-group-item">
                              <a style="font-size: 18px;" href="singlepost.php?pid=<?php echo $row['id'];?>"><?php echo $row['title'];?></a>
                              <span class="badge"><?php echo $countc; ?> answers</span><br><span class="postedby">posted by <strong><?php echo $row['username'];?></strong> on <?php echo $fm->formatdate($row['pdate']);?> | subject: <a href="#"><?php echo $row['name'];?></a></span>
                            </li>

                  <?php 
                    $countc = 0;    
                        }

                      }else{
                          echo $allpost;
                      }
                      
                  ?>
                    
                   
               </ul>
            <?php } ?>
              
             </div>
             <div class="obls_page">
            <?php
              if (!isset($_GET['subid'])) {
                
            ?>
               <ul class="pagination">
                <!--Pagination start-->
               <?php 
                  $postrows = $pc->getTotalPostRows();
                  $total_row = $postrows->num_rows;
                  $total_pages = ceil($total_row/$per_page);
                ?>
                <?php 
                echo "<li><a  href='index.php?page=1'>&lt;&lt;Previous</a></li>";

                for ($i=2; $i <$total_pages ; $i++) { 

                    echo "<li><a href='home.php?page=".$i."'>".$i."</a></li>";
                  
                }
                 
               echo "<li><a href='home.php?page=$total_pages'>Next &gt;&gt;</a></li>";

               ?>
            <!--pagination ends-->
            
            
               </ul>
            <?php } ?>
         </div>
         </div>
          <?php 
              if (Session::get("checkusertype")) {
               
          ?>
               <div class="tab-pane fade" id="section2">
                   <form action="" method="post" role="form" enctype="multipart/form-data">
                <!-- <div class="arrow"></div> -->
                   <div class="panel panel-default">
                     <div class="panel-heading"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Post your Questions/Opinions/Thoughts</div>
                      <div class="panel-body qs-panel">
                           <input type="text" style="margin-bottom:15px;" class="form-control" name="title" placeholder="post title...">
                           <textarea name="description" id="writepost" class="form-control"  placeholder="Descripion..."></textarea>
                      </div>
                      <div class="panel-footer qs-panel-footer">
                        <div class="row post-panel">
                          <div class="col-md-8">
                            <div class="form-group col-md-5">
                                <select name="subject" class="form-control pull-left input-sm">
                                  <option value="0">Select Subject</option>
                                  <?php
                                    $subs = $pc->getSubject();
                                    if (isset($subs)) {
                                      while ($row = $subs->fetch_assoc()) {
                                  ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name'];?></option>
                                  <?php
                                      }
                                    }
                                  ?>
                                </select>  
                                
                            </div>
                               <div class="col-md-7">
                                  <div class="input-group">
                                      <label class="input-group-btn">
                                        <span class="btn btn-default btn-sm">
                                          <input type="file" name="image" class="">
                                         </span>
                                      </label>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-3 col-md-offset-1">   
                              <input type="submit" name="submit" value="Post" class="form-control btn btn-primary btn-sm input-sm">                               
                          </div>
                      </div>
                    </div>
                  </div>
               </form>
              </div>
            <?php } ?>
              <!-- end of section 2 -->
           </div>
              
          </div>
          <?php
          // sidebar
          include_once "sidebar.php";
          ?>
        </div>
      </div>
      
    </section>
    
    
</body>
</html>