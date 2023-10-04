<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>

<body class="bg-black">
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
            if ($data->region_id == $region->id) {
                $filterData[$region->name][] = $data;
            }
        }
    }
    // die(var_dump($filterData));
    ?>
    <div class="opacity-30 -z-50 fixed top-0 h-screen w-screen"
        style="background-image: url(../images/backgroundimage.jpg);"> </div>

    <nav class="border-b border-b-teal-400 bg-[#002E35] sticky top-0 flex">
        <h1 class="w-3/4 text-cyan-500 font-semibold p-3">Myanmar Criminal Statistics Chart</h1>
        <div class="flex justify-between text-cyan-500 w-1/4 p-3">
            <span>settings</span>
            <span>notifications</span>
            <span>profile</span>
        </div>
    </nav>
    <div class="flex w-full">
        <side-bar class="w-[15%]">
            <button id="crimeButton" class="text-cyan-500 my-6 mx-12 font-semibold">Crimes</button>
            <button id="dropdownBtn" class="text-cyan-500 hidden block  mx-16 font-semibold">Crimes by Regions</button>
        </side-bar>
        <div class="w-[85%] my-2">
            <div class="w-full flex justify-end my-6 text-cyan-500">
                <div class="flex">
                    <span class="material-symbols-outlined">equalizer</span>
                    <span class="px-2">Show crime statistic by region</span>
                </div>
                <div class="flex">
                    <span class="material-symbols-outlined">download</span>
                    <span class="px-2">Export PDF</span>
                </div>
            </div>
            <div class="flex my-16 justify-around flex-wrap">
                <?php foreach ($regions as $region) : ?>
                <div class="w-[49%] my-3    border border-blue-500 rounded-lg ">
                    <div class="flex text-cyan-500 font-semibold border-b p-6 border-b-blue-500 w-full">
                        <h1 class="w-1/5"><?php echo $region->name ?></h1>
                        <div class="flex w-4/5 ">
                            <input type="text"
                                class="outline-none border border-orange-400 mx-3 rounded-lg bg-transparent">
                            <p class="my-1">Row per page
                                <span class="border border-blue-500 px-1.5  py-1.5 mx-2">10</span>
                            </p>

                            <span class="border border-blue-500">
                                <span class="material-symbols-outlined">
                                    keyboard_double_arrow_left
                                </span>
                            </span>
                            <span class="border border-blue-500 px-1.5">10</span>
                            <span class="border border-blue-500 px-1.5">10</span>
                            <span class="border border-blue-500 ">
                                <span class="material-symbols-outlined">
                                    keyboard_double_arrow_right
                                </span>
                            </span>


                        </div>
                    </div>
                    <div class="p-4 ">
                        <table class="text-sm w-full rounded-lg border border-blue-500">
                            <thead class="text-xs text-gray-900 border-b border-b-blue-500  dark:text-gray-400">
                                <tr class="border-b border-b-blue-500 ">
                                    <th scope="col" class="px-6 py-3 border-r border-r-blue-500">
                                        Township
                                    </th>
                                    <th scope="col" class="px-6 py-3 border-r border-r-blue-500">
                                        Crime
                                    </th>
                                    <th scope="col" class="px-6 py-3 border-r border-r-blue-500">
                                        Sentenced
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Escaped
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($filterData[$region->name] as $data) : ?>
                                <tr class="border-b border-b-blue-500 text-white">

                                    <td class="px-6 py-3 border-r border-r-blue-500">
                                        <?php echo $data->township_name ?>
                                    </td>
                                    <td class="px-6 py-3 border-r border-r-blue-500">
                                        <?php echo $data->crime ?>
                                    </td>
                                    <td class="px-6 py-3 border-r border-r-blue-500">
                                        <?php echo $data->sentenced ?>
                                    </td>
                                    <td class="px-6 py-3 border-r border-r-blue-500">
                                        <?php echo $data->escaped ?>
                                    </td>

                                </tr>
                            </tbody>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script src="../Public//script.js"></script>
</body>

</html>