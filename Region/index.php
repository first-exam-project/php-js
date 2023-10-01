<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Region</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php        
         require_once("../DB.php");
         $db = new DB();
         $table_name = "regions";
         $regions = $db->index($table_name);
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $db->delete($table_name,$id);
            header("location:index.php");
        }
    ?>
    <div class="w-8/12 mx-auto my-10">
        <table class="w-full text-sm text-left text-blue-900 dark:text-blue-900">
            <thead class="text-sm text-white bg-gray-600 border-b border-gray-400 dark:text-white">
                <tr>
                    <th class="px-6 py-3">
                        ID
                    </th>
                    <th class="px-6 py-3">
                        NAME
                    </th>
                    <th class="px-6 py-3">
                        EMAIL
                    </th>
                    <th>
                        <a href="create.php">CREATE</a>
                    </th>
                </tr>
            </thead>
            <tbody class="text-sm text-black bg-sky-300 border-b border-gray-400 dark:text-white">
                <?php
                    foreach ($regions as $region) : 
                    ?>
                <tr>
                    <td class="px-6 py-3">
                        <?php echo $region['id']; ?>
                    </td>
                    <td class="px-6 py-3">
                        <?php echo $region['name']; ?>
                    </td>
                    <td>
                        <a href="edit.php?id=<?php echo $region['id']; ?>"
                            class="text-white bg-gradient-to-r from-rose-500 via-rose-600 to-rose-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-rose-100 dark:focus:ring-rose-600 font-medium rounded-lg text-sm px-2 py-1.5 text-center mr-2 mb-2">EDIT</a>
                        <a href="index.php?id=<?php echo $region['id']; ?>"
                            class="text-white bg-gradient-to-r from-rose-500 via-rose-600 to-rose-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-rose-100 dark:focus:ring-rose-600 font-medium rounded-lg text-sm px-2 py-1.5 text-center mr-2 mb-2">DELETE</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>