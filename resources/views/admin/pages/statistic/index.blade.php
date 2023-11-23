@extends("admin.layouts.master")

@section("title", "Statistic")

@section('content')
    <h1 class="text-center">Post View By Day</h1>
    <div class="chart tab-pane" id="views-chart">
        <canvas class="chart" id="view-day-line-chart"></canvas>
    </div>
    <h1 class="text-center">Viewer Statistic</h1>
    <div class="chart tab-pane" id="views-stat-chart">
        <canvas id="viewer-chart"></canvas>
    </div>


@endsection

@section('js')
    <script>
        $(document).ready(function () {
            var pieChartCanvas = $('#viewer-chart').get(0).getContext('2d')
            var pieData = {
                labels: [
                    'Guest',
                    'Member',
                ],
                datasets: [
                    {
                        data: [{{ $guestViews }}, {{ $userViews }}],
                        backgroundColor: ['#f56954', '#00a65a']
                    }
                ]
            }
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,

            }
            var pieChart = new Chart(pieChartCanvas, {
                type: 'doughnut',
                data: pieData,
                options: pieOptions
            })
            let color = "#4f49d3"
            var viewByDay = $('#view-day-line-chart').get(0).getContext('2d')
            var salesGraphChartData = {
                labels: @json($postViews['labels']),
                datasets: [
                    {
                        label: 'Views',
                        fill: false,
                        borderWidth: 2,
                        lineTension: 0,
                        spanGaps: true,
                        borderColor: color,
                        pointRadius: 3,
                        pointHoverRadius: 7,
                        pointColor: color,
                        pointBackgroundColor: color,
                        data: @json($postViews['values'])
                    }
                ]
            }
            var salesGraphChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false,
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontColor: color,
                        },
                        gridLines: {
                            display: false,
                            color: color,
                            drawBorder: false,
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            stepSize: 100,
                            fontColor: color,
                        },
                        gridLines: {
                            display: true,
                            color: color,
                            drawBorder: false,
                        }
                    }]
                }
            }
            var viewByDayChart = new Chart(viewByDay, {
                type: 'line',
                data: salesGraphChartData,
                options: salesGraphChartOptions
            })
        });
    </script>
@endsection
