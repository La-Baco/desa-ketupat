<?php

function createPlaceholderImage($filePath, $width, $height, $bgHex, $textHex, $text) {
    $image = imagecreatetruecolor($width, $height);
    
    // Convert Hex to RGB
    list($r, $g, $b) = sscanf($bgHex, "#%02x%02x%02x");
    $bgColor = imagecolorallocate($image, $r, $g, $b);
    imagefill($image, 0, 0, $bgColor);
    
    // Add simple gradient effect
    list($tr, $tg, $tb) = sscanf($textHex, "#%02x%02x%02x");
    $textColor = imagecolorallocate($image, $tr, $tg, $tb);
    
    // Draw decorative border
    $borderColor = imagecolorallocate($image, min(255, $r + 30), min(255, $g + 30), min(255, $b + 30));
    imagesetthickness($image, 4);
    imagerectangle($image, 10, 10, $width - 10, $height - 10, $borderColor);

    // Write text using built-in font
    $font = 5; // Built-in font size
    $textWidth = imagefontwidth($font) * strlen($text);
    $textHeight = imagefontheight($font);
    $x = ($width - $textWidth) / 2;
    $y = ($height - $textHeight) / 2;
    imagestring($image, $font, $x, $y, $text, $textColor);
    
    // Save image
    $ext = pathinfo($filePath, PATHINFO_EXTENSION);
    if ($ext === 'png') {
        imagepng($image, $filePath);
    } else {
        imagejpeg($image, $filePath, 90);
    }
    imagedestroy($image);
}

$dirs = ['public/images', 'public/images/hero'];
foreach ($dirs as $d) {
    if (!file_exists($d)) {
        mkdir($d, 0777, true);
    }
}

// Hero Images
createPlaceholderImage('public/images/hero/hero-1.jpg', 1920, 1080, '#14532D', '#FFFFFF', 'DESA KETUPAT - KECAMATAN RAAS');
createPlaceholderImage('public/images/hero/hero-2.jpg', 1920, 1080, '#166534', '#FFFFFF', 'BERSAMA MEMBANGUN DESA');
createPlaceholderImage('public/images/hero/hero-3.jpg', 1920, 1080, '#0F172A', '#22C55E', 'POTENSI KELAUTAN & UMKM');
createPlaceholderImage('public/images/hero/hero-4.jpg', 1920, 1080, '#1E293B', '#FFFFFF', 'KEHIDUPAN MASYARAKAT DESA KETUPAT');

// Common Placeholders
createPlaceholderImage('public/images/logo.png', 200, 200, '#14532D', '#FFFFFF', 'DESA KETUPAT');
createPlaceholderImage('public/images/kades.jpg', 600, 800, '#166534', '#FFFFFF', 'KEPALA DESA KETUPAT');
createPlaceholderImage('public/images/kantor.jpg', 1200, 800, '#1E293B', '#22C55E', 'KANTOR DESA KETUPAT');
createPlaceholderImage('public/images/placeholder.jpg', 800, 600, '#334155', '#94A3B8', 'DESA KETUPAT');

echo "Placeholder images generated successfully!\n";
