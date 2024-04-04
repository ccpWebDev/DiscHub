<?php 
include_once "admin_header.php";

?>
<?php
include_once "./bot.php";
?>
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Update Students Info</a>
        </li>
    </ol>

    <?php
    if (isset($_GET['stid'])){
        $stid = $_GET['stid'];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $updated = $ad->updateStudent($_POST, $stid);
        if ($updated) {
            echo "<span class='success text-center block my-4'>Student info updated successfully</span>";
        }
    }

    $single = $ad->getSingleStudentRows($stid);
    if ($single) {
        while ($row = $single->fetch_assoc()) {
    ?>
    <form class="max-w-md mx-auto" action="" method="POST">
        <div class="mb-4">
            <label class="block text-white text-sm font-bold mb-2" for="name">Name:</label>
            <input type="text" name="name" class="form-input rounded-md w-full text-black" id="name"
                value="<?php echo $row['name'];?>">
        </div>
        <div class="mb-4">
            <label class="block text-white text-sm font-bold mb-2" for="uname">Username:</label>
            <input type="text" name="uname" class="form-input rounded-md w-full text-black" id="uname"
                value="<?php echo $row['username'];?>">
        </div>
        <div class="mb-4">
            <label class="block text-white text-sm font-bold mb-2" for="pass">Password:</label>
            <input type="password" name="pass" class="form-input rounded-md w-full text-black" id="pass"
                value="<?php echo $row['password'];?>">
        </div>
        <div class="mb-4">
            <label class="block text-white text-sm font-bold mb-2" for="class">Select Semister:</label>
            <select name="class" class="form-select rounded-md w-full text-black" id="class">
               
               <?php
                $cls = $row['class'];
                ?>
                <option value="1" <?php if ($row['class'] == 1) {
                    echo "selected";
                }
                ?> >Semister 1</option>

                <option value="2" <?php if ($row['class'] == 2) {
                    echo "selected";
                }?> >Semister 2</option>

                <option value="3" <?php if ($row['class'] == 3) {
                    echo "selected";
                }?> >Semister 3</option>

                <option value="4" <?php if ($row['class'] == 4) {
                    echo "selected";
                }?> >Semister 4</option>


                <option value="5" <?php if ($row['class'] == 5) {
                    echo "selected";
                }?> >Semister 5</option>


                <option value="6" <?php if ($row['class'] == 6) {
                    echo "selected";
                }?> >Semister 6</option>


                <option value="7" <?php if ($row['class'] == 7) {
                    echo "selected";
                }?> >Semister 7</option>


                <option value="8" <?php if ($row['class'] == 8) {
                    echo "selected";
                }?> >Semister 8</option>
            </select>



        </div>
        <div class="mb-4">
            <label class="block text-white text-sm font-bold mb-2" for="phone">Phone:</label>
            <input type="text" name="phone" class="form-input rounded-md w-full text-black" id="phone"
                value="<?php echo $row['phone'];?>">
        </div>
        <div class="flex items-center justify-between">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Update Student
            </button>
        </div>
    </form>
    <?php
        }
    }
    ?>
</div>
<!-- /.container-fluid-->
<?php
include_once "admin_footer.php";
?>
