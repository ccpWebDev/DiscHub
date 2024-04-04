<?php 
include_once "admin_header.php";
?>
<?php
include_once "./bot.php";
?>
<div class="container mx-auto">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Update Teacher Info</a>
        </li>
    </ol>

    <?php
   // Initialize $tcid
   $tcid = null;
   if (isset($_GET['tcid'])){
	   $tcid = $_GET['tcid'];
   }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $updated = $ad->updateTeacher($_POST, $tcid);
        if ($updated) {
            echo "<span class='success text-center block my-4'>Teacher info updated successfully</span>";
        }
    }

    $single = $ad->getSingleTeacherRows($tcid);
    if ($single) {
        while ($row = $single->fetch_assoc()) {
    ?>
    <form class="w-full max-w-lg mx-auto" action="" method="POST">
        <div class="mb-4">
            <label for="name" class="block text-white text-sm font-bold mb-2">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo $row['name'];?>" class="form-input rounded-md w-full">
        </div>
        <div class="mb-4">
            <label for="uname" class="block text-white text-sm font-bold mb-2">Username:</label>
            <input type="text" name="uname" id="uname" value="<?php echo $row['username'];?>" class="form-input rounded-md w-full">
        </div>
        <div class="mb-4">
            <label for="pass" class="block text-white text-sm font-bold mb-2">Password:</label>
            <input type="password" name="pass" id="pass" value="<?php echo $row['password'];?>" class="form-input rounded-md w-full">
        </div>
        <div class="mb-4">
            <label for="degree" class="block text-white text-sm font-bold mb-2">Degree:</label>
            <input type="text" name="degree" id="degree" value="<?php echo $row['degree'];?>" class="form-input rounded-md w-full">
        </div>
        <div class="mb-4">
            <label for="phone" class="block text-white text-sm font-bold mb-2">Phone:</label>
            <input type="text" name="phone" id="phone" value="<?php echo $row['phone'];?>" class="form-input rounded-md w-full">
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Teacher</button>
        </div>
    </form>
    <?php
        }
    }
    ?>
</div>

<?php
include_once "admin_footer.php";
?>
