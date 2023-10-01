<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
    require_once "../DB.php";
    $db = new DB();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $table_name = "regions";
        $region = $db->show($table_name, $id);
        if (mysqli_num_rows($region)) {
            foreach ($region as $data) {
                $name = $data['name'];
                $id = $data['id'];
            }
        }
    }
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $table_name = "regions";
        $db->update($table_name,$_POST,$id);
        header('location:index.php');
    }
    ?>
    <div class="w-4/12 mx-auto my-10 text-base">
        <form action="edit.php" method="POST">
            <div class="mb-3">
                <label class="block mb-1 ml-1">NAME</label>

                <input placeholder="name" value="<?php echo $id ?>" type="hidden" required name="id"
                    class="border-2 focus:outline-none focus:border-blue-200 border-gray-500 rounded-lg w-full p-1 ">
                <input placeholder="name" value="<?php echo $name ?>" type="text" required name="name"
                    class="border-2 focus:outline-none focus:border-blue-200 border-gray-500 rounded-lg w-full p-1 ">
            </div>
            <div>
                <button type="submit" name="update"
                    class="text-white bg-gradient-to-r from-gray-700 via-gray-800 to-gray-900 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-300 dark:focus:ring-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">register</button>
                <a href="index.php"
                    class="text-white bg-gradient-to-r from-gray-700 via-gray-800 to-gray-900 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-300 dark:focus:ring-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Back</a>
            </div>
        </form>
    </div>
</body>

</html>