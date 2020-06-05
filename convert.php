<?php
  include "connectdb.php";
  $speedtest = fopen('/var/www/html/yless4u/speedtest.csv','r');
  while (! feof($speedtest)) {
    $speed[] = explode('","',fgets($speedtest));
  }
  foreach($speed as $test) {
/*  $dlround($test[5]*8/1000000,2);
  $ul = round($test[6]*8/1000000,2);
  $la = $test[2]; */
    if (isset($test[5])) {
      print $array[] =  round($test[5]*8/1000000,2).",".round($test[6]*8/1000000,2).",".$test[2]."\n";  
      $query = mysqli_query($conn, "insert into yless4u.results (download,upload,latency) VALUES (".round($test[5]*8/1000000,2).",".round($test[6]*8/1000000,2).",".$test[2].");");
      print mysqli_error($conn);
    }
   
  }
  fclose($speedtest);
?>