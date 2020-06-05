

<div class="chart-container" style="position: relative; width:80vw;height:40vh">
    <canvas id="myChart"></canvas>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
var ctx = $('#myChart')[0].getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
    
    <?php
        include 'connectdb.php';
        $graph_color = '#28b586';
        $line = 'red';
        $date = "2020-03-05 21:29:23";
/*  print 'Server Host: '.$test[0];
  print '<br>Server Code: '.$test[1];
  print '<br>Latency Test: '.$test[2];
  print '<br>Unknown: '.$test[3];
  print '<br>Unknown: '.$test[4];
  print '<br>Speedtest_Download: '.round($test[7]/1000000,2);
  print '<br>Speedtest_Upload: '.round($test[8]/1000000,2);
  print '<br><a target="_external" href="'.$test[9].'">Date/Time</a>';
  print '<br><br>'; */
        $query = mysqli_query($conn, "select * from yless4u.results where date > '2020-03-05 21:29:23' LIMIT 50;");
        if (mysqli_num_rows($query) > 0) {
            while ($test = mysqli_fetch_assoc($query)) {
                 $labels[] =  '"'.$test['date'].'",';
                 $data[] = $test['download'].',';

            }
        } else {
            print mysqli_error($query);
            print 'Display failed';
        }
?>    
        labels: [
        <?php foreach ($labels as $label) {
            print $label;
        }?>],
        datasets: [{
            label: 'Connection Speed',
            backgroundColor: 'rgb(255, 255, 100)',
            borderColor: 'rgb(190, 255, 50)',
            data: [
            <?php foreach ($data as $d) {
                print $d;
            }?>
            ],
            
        }]
    },

    // Configuration options go here
    options: {
        maintainAspectRatio: false
    }
});
</script>