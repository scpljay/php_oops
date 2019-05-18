<?php 
	/*
		I am going to use imagecrop() function of PHP
		Which is very helpfull for Crop a Image in rectangle size
		imagecrop — Crop an image to the given rectangle
		imagecrop ( resource $image , array $rect ) 

	*/

	$im = imagecreatefrompng('tower.png');
	// echo imagesx($im);
	// echo "<br>";
	// echo imagesy($im);
	// echo "<br>";
	// echo min(2000,1500,147,159);
	/* Get minimumum point for Rectangle Image */
	$size = min(imagesx($im), imagesy($im));
	if($size>500){
		$size = 500;
		$x = imagesx($im)/2;
		$y = imagesy($im)/2;
	} else{
		$x = 0;
		$y = 0;
	}
	// print_r($size);
	// exit;
	$im2 = imagecrop($im, ['x' => 600, 'y' => 500, 'width' => $size, 'height' => $size]);
	if ($im2 !== FALSE) {
	    imagepng($im2, 'tower-cropped.png');
	    imagedestroy($im2);
	    echo "<img src='tower-cropped.png'>";
	}
	imagedestroy($im);
 ?>
