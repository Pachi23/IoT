<!DOCTYPE html>
<html lang="cat">

<head>
    <title>IOT</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="data/JS/tailwindcss_3.2.4.js"></script>
</head>

<body>

    <div>
        <h1 class="text-center text-3xl">Values</h1>
        <table class="table-auto text-center w-auto m-auto text-lg">
            <thead>
                <tr>
                    <th class="p-2">Maximum</th>
                    <th class="p-2">Minimum</th>
                    <th class="p-2">Last</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $stats = getStats();

                    echo '<td>' . $stats['max'] . '</td>';
                    echo '<td>' . $stats['min'] . '</td>';
                    echo '<td>' . $stats['last'] . '</td>';
                    ?>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div class="m-4">
            <h1 class="text-center text-3xl">All Data</h1>
            <canvas id="allData"></canvas>
        </div>
        <div class="m-4">
            <h1 class="text-center text-3xl">Last 10 Records</h1>
            <canvas id="last10Records"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="data/JS/jquery-3.6.2.min.js"></script>
    <script type="text/javascript" src="data/JS/graphs.js"></script>
</body>

</html>