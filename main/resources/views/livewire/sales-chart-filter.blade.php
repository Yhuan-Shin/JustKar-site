<div>
    <div class="form-group" wire:ignore>
        <label for="period">Select Period:</label>
        <select wire:model="selectedPeriod" id="period" class="form-control">
            <option value="day">Day</option>
            <option value="week">Week</option>
            <option value="month">Month</option>
            <option value="year">Year</option>
        </select>
    </div>

    <div id="piechart_3d" style="width: 100%; height: 500px;"></div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Product Name', 'Total Sales'],
                @foreach($labels as $index => $label)
                    ['{{ $label }}', {{ $data[$index] }}],
                @endforeach
            ]);

            var options = {
                title: 'Sales Data ({{ ($selectedPeriod) }})',
                pieHole: 0.4,
            };

        var options = {
          title: 'Sales Data ({{($selectedPeriod) }})', 
          is3D: true,
        };
            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }

    </script>
</div>

