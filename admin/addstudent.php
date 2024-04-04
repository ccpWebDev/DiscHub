<?php 
include_once "admin_header.php";
?>
<?php
include_once "./bot.php";
?>
<div class="container mx-auto">
    <!-- Breadcrumbs -->
    <ol class="breadcrumb bg-gray-200 p-2 rounded-md">
        <li class="breadcrumb-item">
            <a href="#" class="text-blue-500">Register Students</a>
        </li>
    </ol>

    <!-- Form for adding students -->
    <div class="bg-white overflow-hidden shadow-md rounded-lg border border-solid border-blue-500 rounded-lg p-4"
        style="background-color: rgba(17, 42, 69, 0.07); border-radius: 16px; box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); backdrop-filter: blur(2.1px); -webkit-backdrop-filter: blur(2.1px); border: 1px solid rgba(17, 42, 69, 1);">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $added = $ad->addStudent($_POST);
            if ($added) {
                echo "<span class='success text-center block my-4'>Student Added successfully</span>";
            }
        }
        ?>
        <form class="max-w-md mx-auto" action="" method="POST">
            <div class="mb-4">
                <label class="block text-white text-sm font-bold mb-2" for="name">Name:</label>
                <input type="text" name="name" class="form-input rounded-md w-full text-black" id="name"
                    placeholder="Enter Full Name">
            </div>
            <div class="mb-4">
                <label class="block text-white text-sm font-bold mb-2" for="uname">Username:</label>
                <input type="text" name="uname" class="form-input rounded-md w-full text-black" id="uname"
                    placeholder="Enter username">
            </div>
            <div class="mb-4">
                <label class="block text-white text-sm font-bold mb-2" for="pass">Password:</label>
                <input type="password" name="pass" class="form-input rounded-md w-full text-black" id="pass"
                    placeholder="Enter password">
            </div>
            <div class="mb-4">
                <label class="block text-white text-sm font-bold mb-2" for="class">Select Semister:</label>
                <select name="class" class="form-select rounded-md w-full text-black" id="class">

                    <option value="1"> Semister 1</option>
                    <option value="2">Semister 2</option>
                    <option value="3">Semister 3</option>
                    <option value="4">Semister 4</option>
                    <option value="4">Semister 5</option>
                    <option value="4">Semister 6</option>
                    <option value="4">Semister 7</option>
                    <option value="4">Semister 8</option>

                </select>
            </div>
            <div class="mb-4">
                <label class="block text-white text-sm font-bold mb-2" for="phone">Phone:</label>
                <input type="text" name="phone" class="form-input rounded-md w-full text-black" id="phone"
                    placeholder="Enter Phone">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Add Student
                </button>
            </div>
        </form>
    </div>
</div>

<?php
include_once "admin_footer.php";
?>
