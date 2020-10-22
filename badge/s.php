<?php
if (isset($_GET['t']) && isset($_GET['c'])) {
$title = $_GET['t'];
$content = $_GET['c'];
$len = (strlen($title . $content)*9)+20;
$offset = (strlen($title)*9)+10;

// Set the content-type
header('Content-type: image/png');

$img = imagecreate($len, 30);

    $textbgcolor = imagecolorallocate($img, 30, 30, 32);
    $textcolor = imagecolorallocate($img, 70, 255, 155);

imagestring($img, 5, 5, 5, $title, $textcolor);
imagefilledrectangle( $img, $offset, 0, 2000, 30, $textcolor );
imagestring($img, 5, $offset + 5, 5, $content, $textbgcolor);

        ob_start();
        imagepng($img);
} else {
echo "error<br>";
echo "please set the `t` and `c` query perams to use this";
}
?>
