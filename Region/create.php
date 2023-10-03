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
    require_once "../controller/RegionController.php";
    $regionController = new RegionController();
    if (isset($_POST['create'])) {
        $regionController->store($_POST);
    }
    ?>
    <div class="w-4/12 mx-auto my-10 text-base">
        <form action="create.php" method="POST">
            <div class="mb-3">
                <label class="block mb-1 ml-1">NAME</label>
                <input placeholder="name" type="text" required name="name"
                    class="border-2 focus:outline-none focus:border-blue-200 border-gray-500 rounded-lg w-full p-1 ">
            </div>
            <div>
                <button type="submit" name="create"
                    class="text-white bg-gradient-to-r from-gray-700 via-gray-800 to-gray-900 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-300 dark:focus:ring-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">register</button>
                <a href="index.php"
                    class="text-white bg-gradient-to-r from-gray-700 via-gray-800 to-gray-900 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-300 dark:focus:ring-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Back</a>
            </div>
        </form>
    </div>
</body>

</html>