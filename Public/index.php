<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="background-image : url(../images//backgroundimage.jpg);">
<?php
    require_once("../controller/PublicController.php");
    $publicController = new PublicController();
    $data = $publicController->statisticByRegion();
    ?>
    <nav class="border-b border-b-teal-400 flex">
        <h1 class="w-3/4 text-cyan-500 font-semibold p-3">Myanmar Criminal Statistics Chart</h1>
        <div class="flex justify-between text-cyan-500 w-1/4 p-3">
            <span>settings</span>
            <span>notifications</span>
            <span>profile</span>
        </div>
    </nav>
    <div class="flex">
        <side-bar class="w-1/4">
            <button id="crimeButton" class="text-cyan-500 my-6 mx-12 font-semibold">Crimes</button>
            <button  id="dropdownBtn" class="text-cyan-500 hidden block  mx-16 font-semibold">Crimes by Regions</button>
        </side-bar>
        <div class="w-3/4 my-6">
            <div class="flex justify-end">
                <p class="text-cyan-500 font-lg font-semibold">Show crime statistic by regions</p>
                <p class="text-cyan-500 mx-4 font-lg font-semibold">Export PDF</p>
            </div>
            <?php foreach($data as $d) : ?>
            <div>
            <table class="w-1/2 font-semibold text-cyan-500 text-left border border-cyan-500 text-blue-900">
            <h1><?php $d->name ?></h1>
            <thead class="text-sm  border-b border-cyan-500">
                <tr>
                    <th class="px-6 py-3 border-r border-r-cyan-500">
                        Township
                    </th>
                    <th class="px-6 py-3 border-r border-r-cyan-500">
                        Crime
                    </th>
                    <th class="px-6 py-3 border-r border-r-cyan-500">
                        Sentenced
                    </th>
                    <th class="px-6 py-3 border-r border-r-cyan-500">
                        Escaped
                    </th>
                </tr>
            </thead>
            <tbody>
                <td><?php echo $d->township_name ?> </td>
                <td><?php echo $d->crime ?> </td>
                <td><?php echo $d->sentenced ?> </td>
                <td><?php echo $d->escaped ?> </td>
            </tbody>
        </table>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="../Public/script.js"></script>
</body>
</html>