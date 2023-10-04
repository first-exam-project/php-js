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
    require_once "../controller/PublicController.php";
    require_once "../controller/RegionController.php";
    $publicController = new PublicController();
    $regionController = new RegionController();
    $datas = $publicController->statisticByRegion();
    $regions = $regionController->index();
    $filteredData = [];
    foreach ($datas as $data) {
        foreach ($regions as $region) {
            if ($data->region_name == $region->name) {
                $filterData[$data->region_name][] = $data;
            }
        }
    }
    ?>
    <div class="flex justify-around flex-wrap">
        <?php foreach ($regions as $region) : ?>
        <div class="relative bg-sky-500 w-[40%] overflow-x-auto">
            <h1><?php echo $region->name ?></h1>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-900 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Color
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($filterData[$region->name] as $data) : ?>
                    <tr class="bg-white dark:bg-gray-800">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        </th>
                        <td class="px-6 py-4">
                            <?php echo $data->township_name ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo $data->crime ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo $data->sentenced ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo $data->escaped ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo $data->latest_updated ?>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endforeach; ?>
    </div>
</body>

</html>