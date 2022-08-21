<?php
function badge($title,$content,$status) {
	$len = (strlen($title . $content)*9)+20;
	$offset = (strlen($title)*9)+10;
	
	
	$img = imagecreate($len, 30);
	
	$textbgcolor = imagecolorallocate($img, 30, 30, 32);
	$textcolor = $status == 0 ? imagecolorallocate($img, 70, 255, 155) : imagecolorallocate($img, 255, 95, 69);
	
	imagestring($img, 5, 5, 5, $title, $textcolor);
	imagefilledrectangle($img, $offset, 0, 2000, 30, $textcolor);
	imagestring($img, 5, $offset + 5, 5, $content, $textbgcolor);
	
	ob_start();
	imagepng($img);
}

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) {
	// Set the content-type
	header('Content-type: image/png');
	
	if (isset($_GET['t']) && isset($_GET['c'])) {
		badge($_GET['t'], $content = $_GET['c'], isset($_GET['s']) ? $_GET['s'] : 0) ;
	} else {
		badge('badge','error',1);
	}
} else if (array_key_exists(1,$argv) && array_key_exists(2,$argv) && array_key_exists(3,$argv)) {
	badge($argv[2],$argv[3],$argv[1]);
}
?>
