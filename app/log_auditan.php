<?php
$agent = $_SERVER['HTTP_USER_AGENT'];

$uri = $_SERVER['REQUEST_URI'];

$ip = $_SERVER['REMOTE_ADDR'];

$ref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "-";

$asli = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : "-";

$via = isset($_SERVER['HTTP_VIA']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : "-";

$dtime = date('r');

$entry_line = "Waktu: $dtime | IP asli: $ip | Browser: $agent | URL: $uri | Referrer: $ref | Proxy: $asli | Koneksi: $via
";

$fp = fopen("log/log_auditan.txt", "a");

fputs($fp, $entry_line);

fclose($fp);
?>