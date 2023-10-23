<!DOCTYPE html>
<html>

<head>
    <title>Contoh Penggunaan BarsGraph</title>
    <style type="text/css">
        BODY {
            /* width: 550PX; */
            height: auto;
            width: auto;
            margin: 0 auto;
            background-color: #FFD39A;
        }

        #chart-container {
            width: auto;
            height: auto;
        }
    </style>
    <!-- <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" src="vendor/chart.js/Chart.min.js"></script> -->
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>


</head>

<body>
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>

    <script>
        $(document).ready(function () {
            showGraph();
        });

        function showGraph() {
            {
                $.post("line_encode.php",
                    function (data) {
                        console.log(data);
                        var id = [];
                        var jual = [];
                        var nama = [];
                        for (var i in data) {
                            id.push(data[i].id);
                            jual.push(data[i].besar_pinjaman);
                            nama.push(data[i].tgl_pinjaman)
                        }
                        var chartdata = {
                            labels: nama,
                            datasets: [
                                {
                                    label: 'Pinjaman',
                                    backgroundColor: '#E26868',
                                    borderColor: '#A10035',
                                    hoverBackgroundColor: '#CCCCCC',
                                    hoverBorderColor: '#666666',
                                    data: jual
                                }
                            ]
                        };

                        var graphTarget = $('#graphCanvas');

                        var barGraph = new Chart(graphTarget, {
                            type: 'line',
                            data: chartdata

                        });
                    });
            }
        }
    </script>
</body>

</html>