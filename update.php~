<?php
  $speedtest = shell_exec('speedtest -f csv -s 15778');
  $explode = explode('","',$speedtest);
  $implode = '';
  foreach ($explode as $key => $e) {
    if ($key == 9) {
      
    } else {
      $implode = $implode.$e.'","';
    }
  }
  print $implode;
  $speedtest = $implode.date('m-d-Y h:i:s').'"'.PHP_EOL;
  $file = fopen('/var/www/html/yless4u/speedtest.csv','a');
  fwrite($file, $speedtest);
  fclose($file);
?>