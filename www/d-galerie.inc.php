<?
if (!$categ) {

echo '<table cellspacing=10 cellpadding=10 width=670 border=0 align="center"><tr><td>';
require "./test.php";
echo "</td></tr></table>";

} else { // Si une categorie est définie on affiche les galeries de la categorie
// echo '<table cellspacing=0 cellpadding=0 width=670 border=0 align="center"><tr><td>';
echo  "<table width=98% border=0 align=center><tr><td width=80% align=left><H1>".$subject." PORTFOLIOS</H1></td><td align=left valign=bottom width=20%><nobr>";


// if($categ==2){ echo "Order by <u>Date</u> | <u>Country</u> | <u>Height</u> | <u>Eyes</u> | <u>Hair</u>";}
// else{ echo "Order by <u>Date</u> | <u>Country</u>";}

echo  "</nobr></td></tr><tr><td width=100% colspan=2 align=center><br>";

echo show_gal_test($categ,1,50,$age);
 echo "</td></tr></table>";
 } 

define('DIR_FS_CATALOG','./TMP/');
function thumbimage ($image, $x="100", $y="150", $aspectratio="0", $resize="true", $cachedir="./TMP"){

$x=round($x,0);
$y=round($y,0);
     $types = array (1 => "gif", "jpeg", "png", "swf", "psd", "wbmp");
	 $not_supported_formats = array (""); // Write in capital Letters!!
     umask(0);
     !is_dir ($cachedir)
         ? mkdir ($cachedir, 0777)
         : system ("chmod 0777 ".$cachedir);

       (!isset ($x) || ereg ('^[0-9]{1,}$', $x, $regs)) &&
       (!isset ($y) || ereg ('^[0-9]{1,}$', $y, $regs)) &&
       (isset ($x) || isset ($y))
            ? true
          : DIE ($image.'['.$x.']'.'['.$y.']'.'wrong param found');

     !isset ($resize) || !ereg ('^[0|1]$', $resize, $regs)
          ? $resize = 0
          : $resize;

     !isset ($aspectratio) || !ereg ('^[0|1]$', $aspectratio, $regs)
          ? isset ($x) && isset ($y)
                 ? $aspectratio = 1
                 : $aspectratio = 0
          : $aspectratio;

if(file_exists($image)){$imagedata = getimagesize($image);}else{return false;}



!$imagedata[2] || $imagedata[2] == 4 || $imagedata[2] == 5

? DIE ($image .'panne')

: false;
 

#	 $imgtype="!(ImageTypes() & IMG_" . strtoupper($types[$imagedata[2]]) . ")";
#     if (eval($imgtype) || (in_array(strtoupper(array_pop(explode('.', basename($image)))),$not_supported_formats))) {
#     	$image = substr ($image, (strrpos (DIR_FS_CATALOG . '/', '/'))+1);
#	 	return $image;

#     }

     if (!isset ($x)) $x = floor ($y * $imagedata[0] / $imagedata[1]);


     if (!isset ($y)) $y = floor ($x * $imagedata[1] / $imagedata[0]);

     if ($aspectratio && isset ($x) && isset ($y)) {
		if ((($imagedata[1]/$y) > ($imagedata[0]/$x) )){
			 $x=ceil(($imagedata[0]/$imagedata[1])* $y);
		} else {
			 $y=ceil($x/($imagedata[0]/$imagedata[1]));
		}
     }

     $thumbfile =  '/' . basename($image);
     if (file_exists ($cachedir.$thumbfile)) {
          $thumbdata = getimagesize ($cachedir.$thumbfile);
          $thumbdata[0] == $x && $thumbdata[1] == $y
               ? $iscached = true
               : $iscached = false;
     } else {
          $iscached = false;
     }

     if (!$iscached) {
          ($imagedata[0] > $x || $imagedata[1] > $y) || (($imagedata[0] < $x || $imagedata[1] < $y) && $resize)
               ? $makethumb = true
               : $makethumb = false;
     } else {
          $makethumb = false;
     }
     if ($makethumb) {
$thumb = imagecreatetruecolor ($x, $y);
          $image = call_user_func("imagecreatefrom".$types[$imagedata[2]], $image);
        
          imagecopyresampled($thumb, $image, 0, 0, 0, 0, $x, $y, $imagedata[0], $imagedata[1]);
//imageFilterSharpen($thumb,2.5);

          if(!call_user_func("image".$types[$imagedata[2]], $thumb, $cachedir.$thumbfile,50)){return false;}

          imagedestroy ($image);
          imagedestroy ($thumb);
          $image = DIR_WS_IMAGES . 'imagecache' . $thumbfile;
     } else {
          $iscached
               ? $image = DIR_WS_IMAGES . 'imagecache' . $thumbfile
               : $image = substr ($image, (strrpos (DIR_FS_CATALOG . '/', '/'))+1);
     }

return $image;
}
function imageFilterSharpen( &$srcImage, $intSize = 1 ) {
  $intWidth = imageSX( $srcImage );
  $intHeight = imageSY( $srcImage );
  for ( $i = 0; $i < 768; $i++ ) {
   if ( $i < 255 ) {
    $arrLUT[ $i ] = 0;
   } else if ( $i < 512 ) {
    $arrLUT[ $i ] = $i - 256;
   } else {
    $arrLUT[ $i ] = 255;
   }
  }
  $tmpImage = imageCreateTruecolor($intWidth, $intHeight );
  for ( $y = 0; $y < $intHeight; $y++ ) {
   for ( $x = 0; $x < $intWidth; $x++ ) {
    $blurP = imageColorAt( $srcImage, $x, $y );
    $blurR = ( $blurP >> 16 ) & 0xFF;
    $blurG = ( $blurP >> 8 ) & 0xFF;
    $blurB = $blurP & 0xFF;
    $blurF = 1.0;
    for ( $f = 1; $f < $intSize; $f++ ) {
     if ( ( $x + $f ) < $intWidth ) {
      $blurP  = imageColorAt( $srcImage, $x + $f, $y );
      $blurR += ( ( $blurP >> 16 ) & 0xFF );
      $blurG += ( ( $blurP >> 8 ) & 0xFF );
      $blurB += ( $blurP & 0xFF );
      $blurF += 1.0;
     }
     if ( ( $x - $f ) >= 0 ) {
      $blurP  = imageColorAt( $srcImage, $x - $f, $y );
      $blurR += ( ( $blurP >> 16 ) & 0xFF );
      $blurG += ( ( $blurP >> 8 ) & 0xFF );
      $blurB += ( $blurP & 0xFF );
      $blurF += 1.0;
     }
    }
    $red = $blurR / $blurF;
    $green = $blurG / $blurF;
    $blue = $blurB / $blurF;
    imageSetPixel( $tmpImage, $x, $y, ( $red << 16 ) | ( $green << 8 ) | $blue );
   }
  }
  for ( $y = 0; $y < $intHeight; $y++ ) {
   for ( $x = 0; $x < $intWidth; $x++ ) {
    $blurP = imageColorAt( $tmpImage, $x, $y );
    $blurR = ( $blurP >> 16 ) & 0xFF;
    $blurG = ( $blurP >> 8 ) & 0xFF;
    $blurB = $blurP & 0xFF;
    $blurF = 1.0;
    for ( $f = 1; $f < $intSize; $f++ ) {
     if ( ( $y + $f ) < $intHeight ) {
      $blurP  = imageColorAt( $tmpImage, $x, $y + $f );
      $blurR += ( ( $blurP >> 16 ) & 0xFF );
      $blurG += ( ( $blurP >> 8 ) & 0xFF );
      $blurB += ( $blurP & 0xFF );
      $blurF += 1.0;
     }
     if ( ( $y - $f ) >= 0 ) {
      $blurP  = imageColorAt( $tmpImage, $x, $y - $f );
      $blurR += ( ( $blurP >> 16 ) & 0xFF );
      $blurG += ( ( $blurP >> 8 ) & 0xFF );
      $blurB += ( $blurP & 0xFF );
      $blurF += 1.0;
     }
    }
    $origP = imageColorAt( $srcImage, $x, $y );
    $origR = ( $origP >> 16 ) & 0xFF;
    $origG = ( $origP >> 8 ) & 0xFF;
    $origB = $origP & 0xFF;
    $red = $origR + ( $origR - $blurR / $blurF );
    $green = $origG + ( $origG - $blurG / $blurF );
    $blue = $origB + ( $origB - $blurB / $blurF );
    imageSetPixel( $srcImage, $x, $y, ( $arrLUT[ 256 + $red ] << 16 ) | ( $arrLUT[ 256 + $green ] << 8 ) | $arrLUT[ 256 + $blue ] );
   }
  }
  imageDestroy( $tmpImage );
 }
?>

