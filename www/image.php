<?

require "/homez.193/".HOST."/connex/connexion.inc.php";

$idphoto=$_GET['imgid'];

$query="SELECT nom, galerie FROM photo WHERE id='$idphoto'";
$result=mysql_query($query);
if ($r= mysql_fetch_array($result)) {
$gallery = substr($r["galerie"],1,strlen($r["galerie"]));
$nom=$r['nom'];
}

$visuel="/homez.193/".HOST."/modelinthecity/galerie/" . $gallery . "/". $nom;

if(file_exists($visuel)){
$size=getimagesize("$visuel");
$max=650;
$min=500;

if ($size[0]>$max OR $size[1]>$max) {
	if ($size[0]>$size[1]) {
		$x = $max;
		$y = ($max/$size[0])*$size[1];
	} else {
		$y = $max;
		$x = ($max/$size[1])*$size[0];
	}
	}
	elseif ($size[0]<$min OR $size[1]<$min) {
	if ($size[0]>$size[1]) {
		$x = $min;
		$y = ($min/$size[0])*$size[1];
	} else {
		$y = $min;
		$x = ($min/$size[1])*$size[0];
	}
} else {
	$x=$size[0];
	$y=$size[1];
}
$image = ImageCreatetruecolor($x,$y);


$white = ImageColorAllocate ($image, 255, 255, 255);
$black = ImageColorAllocate ($image, 0, 0, 0);

imagefilledrectangle($image,0,0,$x,$y,$white);



	    $img= imagecreatefromjpeg($visuel);
		$image2x = imagesx($img);
       	$image2y = imagesy($img);	
		
		  imagecopyresampled($image, $img,0, 0, 0, 0, $x, $y, $image2x, $image2y);
		  
		   $rgb = imagecolorat($image,$x/2 ,10);
$r = ($rgb >> 16) & 0xFF;
$g = ($rgb >> 8) & 0xFF;
$b = $rgb & 0xFF;
		//(R+R+B+G+G+G)/6
 $lum = ($r+$r+$b+$g+$g+$g)/6;
if($lum>170){  $logo_file="/homez.193/".HOST."/modelinthecity/images/logo_protect1.png";}else{ $logo_file="/homez.193/".HOST."/modelinthecity/images/logo_protect.png";}


$font_file = '/homez.193/".HOST."/modelinthecity/fonts/arial.ttf';



	    $logoprotect= imagecreatefrompng($logo_file);
		$image2x = imagesx($logoprotect);
       	$image2y = imagesy($logoprotect);	
		
		 imagecopyresampled($image, $logoprotect,$x/2 -$image2x/2, 10, 0, 0, $image2x, $image2y, $image2x, $image2y);		
		 imagecopyresampled($image, $logoprotect,($x/2 -$image2x/2), ($y-$image2y-10), 0, 0, $image2x, $image2y, $image2x, $image2y);
		 
		// imagefttext($image, 30, 0, 20, 45, $black, $font_file, "hellloeelkdkks",array());
		 
		 
		 //top
@imageline($image,0,0,$x,0,$black);
//left
@imageline($image,0,$y,0,0,$black);
//bottom
@imageline($image,0,$y-1,$x,$y-1,$black);
//right
@imageline($image,$x-1,$y,$x-1,0,$black);

 //header('Content-Type: image/wbmp');
 header('Content-Type: image/jpeg');
imageJPEG($image,'',80);
imagedestroy($image);
}

?>