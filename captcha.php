<?php
// Mulai session untuk menyimpan jawaban captcha
session_start();

// Generate angka random untuk operasi matematika
$num1 = rand(1, 9);
$num2 = rand(1, 9);
$captchaAnswer = $num1 * $num2;

// Simpan jawaban ke dalam session
$_SESSION['captcha_answer'] = $captchaAnswer;

// Buat gambar kosong
$width = 120;
$height = 40;
$image = imagecreate($width, $height);

// Warna latar belakang dan teks
$backgroundColor = imagecolorallocate($image, 255, 255, 255); // Putih
$textColor = imagecolorallocate($image, 0, 0, 0); // Hitam
$lineColor = imagecolorallocate($image, 100, 100, 100); // Abu-abu

// Tambahkan beberapa garis untuk mengaburkan captcha
for ($i = 0; $i < 5; $i++) {
    imageline($image, rand(0, $width), rand(0, $height), rand(0, $width), rand(0, $height), $lineColor);
}

// Tambahkan teks captcha ke gambar
$captchaText = "$num1 * $num2";
imagestring($image, 5, 30, 10, $captchaText, $textColor);

// Kirim gambar ke browser
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
?>
