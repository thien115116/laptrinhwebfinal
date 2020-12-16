<!DOCTYPE html>
<html>
<head>
<title>Creating Dynamic Data Graph using PHP and Chart.js</title>
<style type="text/css">
BODY {
    width: 550PX;
}

#chart-container {
    width: 100%;
    height: auto;
}
</style>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/Chart.min.js"></script>


</head>
<body>
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>

    </div>

    <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
           // {
                //$.post("data.php",
                
                //$.get("thongkechung",
                $.ajax({
                    url:'thongkedaotrang',
                    success: function(data1)
                      {
                           // console.log(data1);
                            $.each(data1, function(k, v){
                                console.log(v.data);
                                s = '<hr><div><h2>'+ v.tendaotrang +'</h2></div>';
                                s +='<canvas id="graphCanvas_' + k+'"  ></canvas>';
                                id='graphCanvas_'+k;
                                //alert(s);
                                $('#chart-container').append(s);
                                    createChart(v.data, id);
                            });
                            
                      }
                    }
                );
            

        }


        function createChart(data, id)
                            {
                                console.log(data);
                                 var name = [];
                                var marks = [];

                                for (var i in data) 
                                {
                                    name.push(data[i].name);
                                    marks.push(data[i].value);
                                }

                                var chartdata = {
                                    labels: name,
                                    datasets: [
                                        {
                                            label: 'Số lượng:',
                                            backgroundColor: '#49e2ff',
                                            borderColor: '#46d5f1',
                                            hoverBackgroundColor: '#CCCCCC',
                                            hoverBorderColor: '#666666',
                                            data: marks
                                        }
                                    ]
                                };

                                var graphTarget = $("#" + id);

                                var barGraph = new Chart(graphTarget, {
                                    type: 'bar',
                                    data: chartdata
                                });
                            }
        </script>

</body>
</html>