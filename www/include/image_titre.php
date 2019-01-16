<?
header("Content-type: image/gif");
$im = imagecreate (610,55);
$title = stripslashes($title);
$colt = imagecolorallocate($im, 216,104,179);
$black = imagecolorallocate($im, 0,0,0);
$grey = imagecolorallocate($im, 66,66,66);
$white = imagecolorallocate($im, 255,255,255);

$t=$t." : ";
imagefill ( $im, 0, 0, $white);

ImageTTFText($im, 10, 0, 3, 12, $grey, $font, $info);


/*$size = imagepsbbox ( $info, $font, 10, 0, 25, 0);
$pos_info = 609-($size[2]-$size[0]);
imagepstext($im, $info, $font, 10, $grey, $white, $pos_info, 12,0,25,0,16);
imagepsfreefont($font);

$font =  imagepsloadfont("../../services/fonts/FTBI.PFB");
imagepsencodefont( $font, "../../services/fonts/isolatin1.enc" );

imagepstext($im, $t, $font, 15, $grey, $white, 0, 22,0,25,0,16);
$size = imagepsbbox ( $t, $font, 15, 0, 25, 0);
$pos = $size[3]-$size[1]+36;

imagepstext($im, $title, $font, 30, $colt, $white, 0, $pos);
imagepsfreefont($font);
*/
$pos+=2;
imageline ($im, 0, $pos, 609, $pos, $colt);

imagegif($im);
imagedestroy($im);
?>