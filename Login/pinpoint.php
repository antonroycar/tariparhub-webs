<?php
// Mengambil nama file gambar yang akan digunakan
$gambar = 'Lahan.jpeg';

// Membaca informasi gambar
list($width, $height) = getimagesize($gambar);

// Membuat gambar dari file
$image = imagecreatefromjpeg($gambar);

// Koordinat pinpoint (misalnya, titik tengah gambar)
$pinpointX = $width / 2;
$pinpointY = $height / 2;

// Warna pinpoint (contoh: merah)
$warnaPinpoint = imagecolorallocate($image, 255, 0, 0);

// Ukuran pinpoint
$ukuranPinpoint = 10; // Ubah sesuai kebutuhan Anda

// Menggambar pinpoint pada gambar
imagefilledellipse($image, $pinpointX, $pinpointY, $ukuranPinpoint, $ukuranPinpoint, $warnaPinpoint);

// Menampilkan gambar dengan pinpoint
header('Content-Type: image/jpeg');
imagejpeg($image);

// Membebaskan memori yang digunakan
imagedestroy($image);
?>
