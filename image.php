<?php
// Create image instances
//header('Content-Type: image/gif');

//$bg = imagecreatefromgif('back.gif');
//$img = imagecreatefromgif('php-med-trans-light.gif');

//imagecopymerge($bg, $img, 0, 0, 0, 0, imagesx($bg), imagesy($bg), 65);

//imagegif($bg, null, 100);

$fortunes = array(

'People are naturally attracted to you.',
'You learn from your mistakes... You will learn a lot today.',
'If you have something good in your life, don\'t let it go!',
'What ever you\'re goal is in life, embrace it visualize it, and for it will be yours.',
'Your shoes will make you happy today.',
'You cannot love life until you live the life you love.',
'Be on the lookout for coming events; They cast their shadows beforehand.',
'Land is always on the mind of a flying bird.',
'The man or woman you desire feels the same about you.',

);

// Set the content-type
header('Content-Type: image/png');

// Create the image

$im = imagecreatefrompng('TheBlank-Fortune-cookie.png');
//$bg = imagecreatefromgif('back.gif');

// Create some colors
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, 399, 29, $white);

// The text to draw
$count = count($fortunes);



if (
		isset($_GET['num']) 
		&& is_numeric($_GET['num']) 
		&& $_GET['num'] <= $count
		) {
	$num =  $_GET['num'];
	
}else{
	$num = rand(0, $count);
}
$text = $fortunes[$num];

// Break it up into pieces 125 characters long


// Starting Y position
$y = 513;
$font_size = 10;

// Replace path by your own font path
$font = 'arial.ttf';

$lines = explode('|', wordwrap($text, 45, '|'));


// Loop through the lines and place them on the image
$y = 65;
foreach ($lines as $line)
{
	imagettftext($im, $font_size, 0, 170, $y, $black, $font, $line);

	// Increment Y so the next line is below the previous line
	$y += 23;
}

//imagettftext($im, 20, 0, 10, 20, $black, $font, $text);

// Using imagepng() results in clearer text compared with imagejpeg()
imagepng($im);
imagedestroy($im);

?>