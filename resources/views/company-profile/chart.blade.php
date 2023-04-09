<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                // ['number of all users', {{ $numOfUser }}],
                ['male', {{ $male }}],
                ['female', {{ $female }}],
                ['Watch TV', 0],
                ['Sleep', 0]
            ]);

            var options = {
                title: 'Gender Chart',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="text-decoration-none text-xl text-gray-800 leading-tight">
                {{ __('Show Employee') }}
            </h2>
        </x-slot>

        <div class="row d-flex rounded justify-content-center align-items-center mt-5">
            <div class="col col-lg-6 rounded">
                <div class="card col-lg-6 rounded">
                    <span>
                        @if ($female == 0)
                            <h6>{{ 'There Is No Female Employee' }}</h6>
                        @endif
                        @if ($male == 0)
                            <h6>{{ 'There Is No Male Employee' }}</h6>
                        @endif
                    </span>
                    <div id="piechart_3d" style="width: 900px; height: 500px;" class="h-190 rounded shadow">
                    </div>

                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
