<!--<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

table { 
  border-collapse: collapse;
}
tr {
  vertical-align: bottom;
}
</style>-->
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
$query = mysqli_query($conn, "select * from yless4u.results where date > '2020-03-05 21:29:23';");  
if (mysqli_num_rows($query) > 0) {
  while ($test = mysqli_fetch_assoc($query)) {
    print 'Download'.$test['download'].'Upload'.$test['upload'].'Latency'.$test['latency']."\r";
    
  } 
} else {
  print mysqli_error($query);
  print 'Display failed';
}
/*$file = fopen("speedtest.csv", "r");
$num = 1;
while(!feof($file)) {
  $array[] = explode('","', fgets($file));
  
}
fclose($file);
print '<table style="border-collapse: separate;" >
         <tr><td style="padding-bottom:50px;width:500px;overflow-x:auto">';
print '<div style="background-color:#ddd;color:#646566;width:100%;padding-top:15px;padding-bottom:15px;border-bottom:1px solid #bbb;border-radius:20px 20px 0px 0px">Download Speed Table</div>';
print '<table style="background-color:#eee;border-collapse:collapse">';
print '<tr>';
$c = 0;
$size = count($array)/150; //number of columns for the graph
foreach (array_reverse($array) as $test) {
  
  $dl = round($test[5]*8/1000000,2);
  $ul = round($test[6]*8/1000000,2);
  $la = $test[2];
  if (!$dl == '0') {
    if ($c < round($size)-1) {
      $dl_array[] = $dl;
      $ul_array[] = $ul;
      $la_array[] = $la;
      $c++;
    } else { 
      $c = 0;
      $dl_out = array_sum($dl_array) / count($dl_array);
      $ul_out = array_sum($ul_array) / count($ul_array);
      $la_out = array_sum($la_array) / count($la_array);
       
      print '<td style="padding-top:25px"><div style="display:table-cell;width:50px;height:'.round($dl_out,2).';background-color:'.$graph_color.'"><div style="height:1px;width:50px;margin-top:'.(round($dl_out,2)-200).';background-color:'.$line.'"></div></div></td>';
      $data[] = round($dl_out,2);
      $up_array[] = round($ul_out,2);
      $la_arr[] = round($la_out,2);
      unset($ul_array);
      unset($dl_array);
      unset($la_array);
    }
    
  }
}
$la_avg = array_sum($la_arr) / count($la_arr);
print '</tr>';
print '<tr>';
foreach ($data as $d) {
  print '<td>'.$d.'</td>';
}
print '</tr>';
print '</table>';
print '</td></tr><tr><td style="padding-bottom:50px">';
print '
           <div style="background-color:#ddd;color:#646566;width:100%;padding-top:15px;padding-bottom:15px;border-bottom:1px solid #bbb;border-radius:20px 20px 0px 0px">Upload Speed Table</div>
             <div style="overflow-x:auto">';
print '      <table><tr>';
foreach ($up_array as $up) {
  print '<td style="padding-top:25px"><div style="display:table-cell;width:50px;height:'.($up*10).';margin:5px;background-color:'.$graph_color.'"><div style="height:1px;width:50px;margin-top:'.(($up-10)*10).';background-color:'.$line.'"></div></div></td>';
}
print '</tr><tr>';
foreach ($up_array as $up) {
  print '<td>'.$up.'</td>';
}
print '       </tr></table>';
print '     </div>
        </tr>
        <tr>
          <td>';
        
           print'<div style="background-color:#ddd;color:#646566;width:100%;padding-top:15px;padding-bottom:15px;border-bottom:1px solid #bbb:border-radius:20px 20px 0px 0px">Latency Test</div>
             <div style="overflow-x:auto">';
print '      <table style="background-color:#eee;"><tr>';
foreach ($la_arr as $la) {
  print '<td style="padding-top:25px"><div style="display:table-cell;width:50px;height:'.($la*5).'px;background-color:'.$graph_color.'"><div style="height:1px;width:50px;margin-top:'.(($la-$la_avg)*5).';background-color:'.$line.'"></div></div></td>';
}
print '</tr><tr>';
foreach ($la_arr as $la) {
  print '<td>'.$la.'</td>';
}
print '       </tr></table>';
print '     </div>
          </div>
        ';
print '
      </td>
      </tr>
      </table>';
#print 'Download Results: '.$dl;
#print '<br><br>Upload Results: '.$ul;
*/
?>

</html>