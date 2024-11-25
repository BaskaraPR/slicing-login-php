<?php
session_start();

// Generate random numbers and an operation
$num1 = rand(1, 9);
$num2 = rand(1, 9);
$operations = ['+', '-', '*'];
$operation = $operations[array_rand($operations)];
$problem = "$num1 $operation $num2";

// Compute the solution
switch ($operation) {
    case '+':
        $solution = $num1 + $num2;
        break;
    case '-':
        $solution = $num1 - $num2;
        break;
    case '*':
        $solution = $num1 * $num2;
        break;
}
$_SESSION['captcha_solution'] = $solution;

// Create the CAPTCHA image
header('Content-Type: image/png');
$width = 150;
$height = 50;
$image = imagecreatetruecolor($width, $height);

// Colors
$background_color = imagecolorallocate($image, 220, 220, 220); // Light gray
$text_color = imagecolorallocate($image, 0, 0, 0);             // Black
$line_color = imagecolorallocate($image, 50, 50, 50);          // Dark gray

// Fill background
imagefilledrectangle($image, 0, 0, $width, $height, $background_color);

// Add wavy lines
for ($i = 0; $i < 2; $i++) {
    $x1 = rand(0, $width / 2);
    $x2 = rand($width / 2, $width);
    $y1 = rand(0, $height);
    $y2 = rand(0, $height);
    imageline($image, $x1, $y1, $x2, $y2, $line_color);
}

// Add distorted text (character by character)
$font_size = 20;
$font = __DIR__ . '/Arial.ttf'; // Ensure Arial.ttf is present in the same directory
for ($i = 0; $i < strlen($problem); $i++) {
    $angle = rand(-15, 15); // Mild distortion
    $x = 10 + ($i * 30);    // Adjust spacing between characters
    $y = rand(30, 40);      // Randomize vertical position slightly
    imagettftext($image, $font_size, $angle, $x, $y, $text_color, $font, $problem[$i]);
}

// Add minimal dots (noise)
for ($i = 0; $i < 50; $i++) {
    $dot_color = imagecolorallocate($image, rand(0, 50), rand(0, 50), rand(0, 50));
    imagesetpixel($image, rand(0, $width), rand(0, $height), $dot_color);
}

// Output the image
imagepng($image);
imagedestroy($image);
?>
