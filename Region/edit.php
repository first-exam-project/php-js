<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body style="background-image: url(../images/backgroundimage.jpg);">
    <?php
    require_once "../controller/RegionController.php";
    $regionController = new RegionController();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $region = $regionController->show($id);
        if ($region) {
            $name = $region->name;
        }
    }
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $regionController->update($_POST, $id);
    }
    ?>
    <div class="w-4/12 mx-auto my-10 text-base">
        <form action="edit.php" method="POST">
            <div class="mb-3">
                <label class="block mb-1 ml-1 text-white">NAME</label>

                <input placeholder="name" value="<?php echo $id ?>" type="hidden" required name="id"
                    class="border-2 focus:outline-none focus:border-blue-200 border-gray-500 rounded-lg w-full p-1 ">
                <input placeholder="name" value="<?php echo $name ?>" type="text" required name="name"
                    class="border-2 focus:outline-none focus:border-blue-200 border-gray-500 rounded-lg w-full p-1 ">
            </div>
            <div>
                <button type="submit" name="update"
                class="text-white bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Edit</button>
                <a href="index.php"
                class="text-gray-800 text-white bg-green-400 font-medium rounded-lg text-sm px-6 py-3 text-center mr-2 mb-2">Back</a>
            </div>
        </form>
    </div>
</body>

</html>