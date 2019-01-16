<?


//header("Content-type: image/jpeg");

    $code_min_digits    =    3;                              // min length of code to be displayed
    $code_max_digits    =    3;                              // max length of code to be displayed

    $img_dist_level     =    1;                              // level of imagedistortion (1 lowest / 10 highest)
    $img_dist_type      =    7;                              // type of imagedistortion  (0 = none / 7 = all)

    $img_name           =    "_confirmpic";                  // basic name of the image (extended w/ random #)
    $img_dir            =     'images/number_pics/'; // directory of the number-pictures (w/ trailing "/" !)
                                                             // the directory must exist and be writable!

	recursiveDelete($img_dir);
    $noautomationcode = 0;

       $img_char_w = 30;
       $img_char_h = 30;

/*
$string1 = array('1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','g','h','m','n','p','q','r','s','t','u','v','w','x','y','z');
*/
$string1 = array('ao','ab','ae','pa','pe','po','le','as','se','so','su','ex','re','ro','ra','be','bo','ni','ne','re','te','ve','ce','je','fe','ge','li','la','vi','di','le','el','ug','ho','xy','wi','wa','wo','wy','hi','ho','ha','bo','bi','te','bi','ch','tc');

$string2=array();
		
		for($i=1;$i<=$code_max_digits;$i++){
			
			$numAleat = rand(1,count($string1)-1);
		
		
			
			$string2[] =$string1[$numAleat];
			
		}
		
		shuffle($string2);
		
	$noautomationcode = strtoupper(implode('',$string2));

    srand((double)microtime()*1000000);

    $img_tmp = "" . $img_tmp.rand(1000,999999);

    $img_name = $img_dir . $img_name . $img_tmp . $img_type;


    $TheImage = CodeImage($noautomationcode,$img_char_w,$img_char_h,$img_dir,$img_type,$img_dist_level,$img_dist_type);
 ImageJpeg($TheImage,$img_name,100);
 ImageDestroy($TheImage);




// if(file_exists($_COOKIE['security_pic'])){unlink($_COOKIE['security_pic']);}

// setcookie('security_pic',$img_name);


$_SESSION["noautamationcode"]= $noautomationcode;


function CodeImage($code,$img_char_w,$img_char_h,$img_dir,$img_type,$img_dist_level,$img_dist_type){

    $length = strlen(trim($code));
    clearstatcache();

$string =$code;

 	$length = strlen(trim($code));
   	clearstatcache();
	$border=4;
	
	$minAngle=-25;
	$maxAngle=+1;
	$minSize=28;
	$maxSize=28;		
	$colors=array(1,2,3);
	$font_dir="./fonts/";
	// $fonts=array($font_dir . "gothic.ttf");
	 
	// $fonts=array($font_dir . "captcha_a45z1dsds2d1.ttf");
	 $fonts=array($font_dir . "ASS.TTF");


	$img_width =  20+$img_char_w * $length;
	
		$img_height = $border/2 + $img_char_h+20;


		$img = imagecreatetruecolor($img_width, $img_height);
		
		$grey = imagecolorallocate($img, 150, 150, 150);
		$white = imagecolorallocate($img, 250, 250, 250);
		$black = imagecolorallocate($img, 0, 0, 0);
		$red = imagecolorallocate($img, 200, 0, 0);
		$green = imagecolorallocatealpha($img, 0, 255, 0, 100);
		$blue = imagecolorallocatealpha($img, 0, 0, 255, 100);
		
// $img1=imagecreatefrompng('images/bg_captcha.png');		
		imagefilledrectangle($img, 0, 0, $img_width, $img_height, $white);
		// imagecopyresampled($img,$img1,0,0,0,0,$img_width, $img_height,$img_width, $img_height);
		
		
		

$color=imagecolorallocatealpha($img,rand(1,255),rand(1,255),rand(1,255),100);$x=rand(20,80);
		imagefilledellipse($img, ceil(rand(5,145)), ceil(rand(0,35)), $x,$x, $color);
$color=imagecolorallocatealpha($img,rand(1,255),rand(1,255),rand(1,255),100);$x=rand(20,80);
		imagefilledellipse($img, ceil(rand(5,145)), ceil(rand(0,35)),$x, $x, $color);
$color=imagecolorallocatealpha($img,rand(1,255),rand(1,255),rand(1,255),100);$x=rand(20,80);
		imagefilledellipse($img, ceil(rand(5,145)), ceil(rand(0,35)), $x, $x, $color);
srand((double)microtime()*1000000);$x=rand(20,60);
		imagefilledellipse($img, ceil(rand(5,145)), ceil(rand(0,35)), $x,$x, $color);
$color=imagecolorallocatealpha($img,rand(1,255),rand(1,255),rand(1,255),100);$x=rand(20,80);
		imagefilledellipse($img, ceil(rand(5,145)), ceil(rand(0,35)),$x, $x, $color);
$color=imagecolorallocatealpha($img,rand(1,255),rand(1,255),rand(1,255),100);$x=rand(20,80);
		imagefilledellipse($img, ceil(rand(5,145)), ceil(rand(0,35)), $x, $x, $color);

	/*	
		imageline($img,rand(1,200),rand(1,50),rand(101,200),rand(26,50),$red);
		imageline($img,rand(1,200),rand(1,50),rand(101,200),rand(26,50),$green);
		imageline($img,rand(1,200),rand(1,50),rand(101,200),rand(26,50),$blue);
		
		imageline($img,rand(1,200),rand(1,50),rand(101,200),rand(26,50),$red);
		imageline($img,rand(1,200),rand(1,50),rand(101,200),rand(26,50),$green);
		imageline($img,rand(1,200),rand(1,50),rand(101,200),rand(26,50),$blue);

		imagefilledrectangle($img, 0, 0, $img_width, 0, $black);
		imagefilledrectangle($img, $img_width - 1, 0, $img_width - 1, $img_height - 1, $black);
		imagefilledrectangle($img, 0, 0, 0, $img_height - 1, $black);
		imagefilledrectangle($img, 0, $img_height - 1, $img_width, $img_height - 1, $black);


imagefilledpolygon($img, array (rand(1,100), rand(1,100),rand(1,200), rand(1,50),rand(1,200), rand(1,50), 100,rand(1,200)),4,$red);
imagefilledpolygon($img, array (rand(1,100), rand(1,100),rand(1,200), rand(1,50),110, rand(1,50), 100,10 ),4,$green);
imagefilledpolygon($img, array (rand(1,100), rand(1,100),rand(1,200), rand(1,50),110, rand(1,50), 100,10 ),4,$blue);
*/

	



	$x=-$img_char_w;
	
for($i=0;$i<strlen($string);$i++){
		
				$x += $img_char_w ;
			
			$angle = rand($minAngle,$maxAngle);
		
			$fonte = rand(0,sizeof($fonts)-1);
			
			$size = rand($minSize,$maxSize);

 $c1 = rand(1,255);
 $c2 = rand(1,255);
 $c3 = rand(1,255);
 
 $c1=2;
 $c2=2;
 $c3=2;


 $color1=imagecolorallocate($img,$c1,$c2,$c3);
 // if($i>strlen($string)-6){$color1=$grey;}

			//for($ii=0;$ii<1;$ii+=.1){
imagefttext($img, $size, -$ii-rand(0,5), $x+8, 35, $color1,$fonts[$fonte], ($string{$i}));

		//}
		}
		

		/*
		$x=-$img_char_w;
		$x += $img_char_w ;
				$angle = 0;//rand($minAngle,$maxAngle);
		
			$fonte = rand(0,sizeof($fonts)-1);
			
			$size = rand($minSize,$maxSize);
			
for($i=0;$i<10;$i+=2){
imagefttext($img, 20, $angle+$i, $x+5, 26, $color1,$fonts[$fonte], strtoupper($string));
}
*/

		
    return $img;
}
		    
			function recursiveDelete($str){
        if(is_file($str)){
            return @unlink($str);
        }
        elseif(is_dir($str)){
            $scan = glob(rtrim($str,'/').'/*');
            foreach($scan as $index=>$path){
		
                recursiveDelete($path);
            }
           // return @rmdir($str);
		   return;
        }
    }


?>