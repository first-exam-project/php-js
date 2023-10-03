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
    require_once "../DB.php";
    $db = new DB();
    if (isset($_POST['create'])) {
        $table_name = "regions";
        $db->store($table_name, $_POST);
        header("location:index.php");
    }
    ?>
    <div class="w-4/12 mx-auto my-10 text-base">
        <form action="create.php" method="POST">
            <div class="mb-3">
                <label class="block mb-1 ml-1">NAME</label>
                <input placeholder="Region Name" type="text" required name="name"
                    class="border-2 focus:outline-none focus:border-blue-200 border-gray-500 rounded-lg w-full p-1 ">
            </div>
            <div>
                <button type="submit" name="create"
                    class="text-white bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Create</button>
                <a href="index.php"
                    class="text-gray-800 text-white bg-green-400 font-medium rounded-lg text-sm px-6 py-3 text-center mr-2 mb-2">Back</a>
            </div>
        </form>
    </div>

</body>

</html>