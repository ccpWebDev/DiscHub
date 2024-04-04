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
            <a href="#" class="text-blue-500">Add Subject</a>
        </li>
    </ol>

    <!-- Form for adding subjects -->
    <div class="bg-white overflow-hidden shadow-md rounded-lg border border-solid border-blue-500 rounded-lg p-4"
        style="background-color: rgba(17, 42, 69, 0.07); border-radius: 16px; box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); backdrop-filter: blur(2.1px); -webkit-backdrop-filter: blur(2.1px); border: 1px solid rgba(17, 42, 69, 1);">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $added = $ad->addSubject($_POST);
            if ($added) {
                echo "<span class='success text-center block my-4'>Subject Added successfully</span>";
            }
        }
        ?>
        <form class="max-w-md mx-auto" action="" method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="subname">Subject Name:</label>
                <input type="text" name="subname" class="form-input rounded-md w-full text-black" id="subname"
                    placeholder="Enter Subject Name">
            </div>
            <div class="flex items-center justify-center">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    <i class="fa fa-plus-square" aria-hidden="true"></i> Add Subject
                </button>
            </div>
        </form>
    </div>

    <hr class="my-4">

    <!-- Table displaying all subjects -->
    <div class="bg-white overflow-hidden shadow-md rounded-lg border border-solid border-blue-500 rounded-lg p-4"
        style="background-color: rgba(17, 42, 69, 0.07); border-radius: 16px; box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); backdrop-filter: blur(2.1px); -webkit-backdrop-filter: blur(2.1px); border: 1px solid rgba(17, 42, 69, 1);">
        <?php 
        //delete subject
        if (isset($_GET['delsub'])) {
            $delid = $_GET['delsub'];
            $delete = $ad->daleteSubject($delid);
            if ($delete) {
                echo "<span class='success'>Subject successfully deleted!</span>";
            }
        }
        ?>
        <div class="table-responsive">
            <table class="table table-bordered w-full" id="dataTable">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Sl</th>
                        <th class="px-4 py-2">Subject Name</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i=0;
                    $getsub= $pc->getSubject();
                    while ($row = $getsub->fetch_assoc()) {
                        $i++;
                    ?>
                    <tr>
                        <td class="border px-4 py-2"><?php echo $i;?></td>
                        <td class="border px-4 py-2"><?php echo $row['name'];?></td>
                        <td class="border px-4 py-2">
                            <a href="?delsub=<?php echo $row['id'];?>"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                Delete
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include_once "admin_footer.php";
?>
