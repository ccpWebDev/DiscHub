<?php include_once "admin_header.php"; ?>
<?php
include_once "./bot.php";
?>

<div class="container mx-auto">
    <!-- Breadcrumbs -->
    <ol class="breadcrumb bg-gray-200 p-2 rounded-md">
        <li class="breadcrumb-item">
            <a href="#" class="text-blue-500">Showing Students info</a>
        </li>
    </ol>

    <!-- Example DataTables Card -->
    <div class="bg-white overflow-hidden shadow-md rounded-lg border border-solid border-blue-500 rounded-lg p-4"
        style="background-color: rgba(17, 42, 69, 0.07); border-radius: 16px; box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); backdrop-filter: blur(2.1px); -webkit-backdrop-filter: blur(2.1px); border: 1px solid rgba(17, 42, 69, 1);">
        <div class="p-4 bg-gray-800 text-white">
            <i class="fa fa-table"></i> All Students
        </div>
        <div class="p-4">
            <?php 
            //delete student
            if (isset($_GET['delstd'])) {
                $delid = $_GET['delstd'];
                $delete = $ad->daleteStudent($delid);
                if ($delete) {
                    echo "<span class='success'>Student deleted successfully !</span>";
                }
            }
            ?>
            <div class="overflow-x-auto">
                <table class="table-auto w-full" style="background-color: rgba(17, 42, 69, 0.07);">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Sl</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Username</th>
                            <th class="px-4 py-2">Password</th>
                            <th class="px-4 py-2">Semisters</th>
                            <th class="px-4 py-2">Phone</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i=0;
                        $getstd = $ad->getTotalStudentRows();
                        while ($row = $getstd->fetch_assoc()) {
                            $i++;
                        ?>
                        <tr>
    <td class="border px-4 py-2"><?php echo $i;?></td>
    <td class="border px-4 py-2"><?php echo $row['name'];?></td>
    <td class="border px-4 py-2"><?php echo $row['username'];?></td>
    <td class="border px-4 py-2"><?php echo $row['password'];?></td>
    <td class="border px-4 py-2">
        <?php 
            $class = $row['class'];
            $suffix = '';

            if ($class % 10 == 1) {
                $suffix = 'st';
            } elseif ($class % 10 == 2) {
                $suffix = 'nd';
            } elseif ($class % 10 == 3) {
                $suffix = 'rd';
            } else {
                $suffix = 'th';
            }

            echo $class . $suffix;
        ?>
    </td>
    <td class="border px-4 py-2"><?php echo $row['phone'];?></td>
    <td class="border px-4 py-2">
        <a href="editstudent.php?stid=<?php echo $row['id'];?>" class="bg-blue-500 text-white px-2 py-1 rounded-md">Edit</a>
        <a href="?delstd=<?php echo $row['id'];?>" class="bg-red-500 text-white px-2 py-1 rounded-md">Delete</a>
    </td>
</tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include_once "admin_footer.php"; ?>
