<?

// Choix de la categorie
switch ($categ) :
	case"1" : $nomcateg="Photographes"; $select="nom, prenom"; $ordre="nom"; break;
	case"2" : $nomcateg="Modèles"; $select="pseudo"; $ordre="pseudo"; break;
	case"3" : $nomcateg="Maquilleurs"; $select="nom, prenom"; $ordre="nom"; break;
	case"4" : $nomcateg="Coiffeurs"; $select="nom, prenom"; $ordre="nom"; break;
	case"5" : $nomcateg="Stylistes"; $select="nom, prenom"; $ordre="nom"; break;
	case"6" : $nomcateg="Graffiti"; $select="nom, prenom"; $ordre="nom"; break;
	case"7" : $nomcateg="Chiens"; $select="nom, prenom"; $ordre="nom"; break;
	case"8" : $nomcateg="Comédiens"; $select="nom, prenom"; $ordre="nom"; break;
	case"9" : $nomcateg="Familles"; $select="nom, prenom"; $ordre="nom"; break;
	case"11" : $nomcateg="Artistes"; $select="nom, prenom"; $ordre="nom"; break;
	case"12" : $nomcateg="Coquine"; $select="nom, prenom"; $ordre="nom"; break;//$select="pseudo"; $ordre="pseudo"; break;
	case"13" : $nomcateg="Chats"; $select="nom, prenom"; $ordre="nom"; break;
	case"14" : $nomcateg="Mariage"; $select="nom, prenom"; $ordre="nom"; break;
	case"16" : $nomcateg="Danseurs / Danseuses"; $select="nom, prenom"; $ordre="nom"; break;
	case"17" : $nomcateg="Musiciens"; $select="nom, prenom"; $ordre="nom"; break;
	case"18" : $nomcateg="Sportifs"; $select="nom, prenom"; $ordre="nom"; break;
	case"19" : $nomcateg="Etudiants"; $select="nom, prenom"; $ordre="nom"; break;
	case"21" : $nomcateg="Hotesses"; $select="nom, prenom"; $ordre="nom"; break;
	case"22" : $nomcateg="Estheticiennes"; $select="nom, prenom"; $ordre="nom"; break;
	case"23" : $nomcateg="Parfumeurs"; $select="nom, prenom"; $ordre="nom"; break;
	case"24" : $nomcateg="Vacances"; $select="nom, prenom"; $ordre="nom"; break;
      case"20" : $nomcateg="Musiciens"; $select="nom, prenom"; $ordre="nom"; break;
	default : $categ="";
endswitch;

	connexion();
?>
<table cellspacing=0 cellpadding=0 width=670 border=0 align="center"><tr><td>

<?
if (!$categ) { 

require "./test.php";
echo "</td></tr></table>";

} else { // Si une categorie est définie on affiche les galeries de la categorie

$query="SELECT id FROM galerie WHERE categorie='$categ'";
$result=mysql_query($query);
$nb = mysql_affected_rows();
?>
<TR><TD colspan=6 align=center class=gal>Les albums <? print("$nomcateg- $nb galeries"); ?></TD></TR>
<? if ($categ==15) { print("<TR bgcolor=#$bgcolor><TD colspan=6 align=center><img src=\"images/commissfr.gif\"></TD></TR>"); } 

// Nouvelles Galeries
?>
<TR><TD align=left valign=middle width=50>
<a class=none href="index.php?page=enregistrement&categ=<? print($categ.$affp); ?> "><img  class=none src="../images/newgal.gif" border=0></a>
</TD>



<?
$ii=1;
$query="SELECT id,pseudo,nom,compteur,datecrea FROM galerie WHERE categorie=$categ AND valid>0 ORDER BY datecrea DESC";//rand()";
$result=mysql_query($query);
while ($r= mysql_fetch_array($result)) {
	$id = $r[0];
	$pseudo = trim($r[1]);
        $visuel=$r[2];
$compteur=$r[3];
$date=$r[4];

## on casque
$query1="SELECT site FROM book_index WHERE id='$id' LIMIT 1";
$result1=mysql_query($query1);
$rr1= mysql_fetch_array($result1);
$pay=$rr1[0];

 
$query28="SELECT nom FROM photo WHERE galerie='M$id' LIMIT 1"; 
$result28=mysql_db_query($base, $query28); 
$rr28= mysql_fetch_array($result28);
if($rr28[0]){$pay=2;}

##


$query1="SELECT photo FROM book_index WHERE id='$id' LIMIT 1";
$result1=mysql_query($query1);
$rr= mysql_fetch_array($result1);
$file=$rr[0];

$ii++;

//$name=substr($nom.' '.$prenom,0,20);
	
	$vignettefolder="./galerie/$id/index/";
$tmpfolder="./TMP/";
#add
 thumbimage($vignettefolder.$file);



	if (!file_exists($tmpfolder.$file)) {$file="./vide.gif";}

	//print("<TD align=center valign=bottom nowrap><a href=\"index.php?page=galerie_aff&id=$id$affp&pseudo=$pseudo\" target=_blank>");

## casque

if($pay>=2){
	print("<TD width=105 height=175 align=center valign=bottom nowrap><a href=\"http://$pseudo.modelinthecity.com\" target='_blank'>");//galerie_aff&id=$id
}else{
	print("<TD width=105 height=175 align=center valign=bottom nowrap><a href=\"index.php?page=galerie_aff&id=$id&categ=$categ\" target='_blank'>");//
}
##
$i=$i+1;

	print("<img  src=\"$tmpfolder$file\"  width=100 height=150 border=0 hspace=0 vspace=0 alt='$compteur visites $id'>");

	print "<br>$pseudo</a><BR>";

	

////phil
$es=$colonne;
for($i=0;$i<2000;$i++){
if($ii==$i*$es){echo'</tr><TR bgcolor="#f6f6f6">';}
}


	
}
?>

</TR>

<!--TR><TD colspan=6 align=center class=bleu><? if($nb>50){echo"TOP 5 : Les albums les plus visités";}?></TD></TR-->
<TR>
<?

if($ii>50){
$ii=0;

$query="SELECT id,pseudo,nom,compteur,datecrea FROM galerie WHERE categorie=$categ AND valid>0 ORDER BY compteur DESC limit 5";//rand()";
$result=mysql_query($query);

while ($r= mysql_fetch_array($result)) {
	$id = $r[0];
	$pseudo = trim($r[1]);
        $visuel=$r[2];
$compteur=$r[3];
$date=$r[4];

$query1="SELECT photo FROM book_index WHERE id='$id' LIMIT 1";
$result1=mysql_query($query1);
$rr= mysql_fetch_array($result1);
$file=$rr[0];
$ii++;
$tmpfolder="./TMP/";


	
	
	
	if (!file_exists($tmpfolder.$file)) {$tmpfolder.$file="./vide.gif";}
if (file_exists($tmpfolder.$file)) {

$T=getimagesize($tmpfolder.$file);
$much=25;


}

	//print("<TD align=center valign=bottom nowrap><a href=\"index.php?page=galerie_aff&id=$id$affp&pseudo=$pseudo\" target=_blank>");
	$i=$i+1;

	//print("<img src=\"$tmpfolder$file\" width=100 height=150 border=0 hspace=2 vspace=2>");
	//print("<br>$pseudo</a><BR>");



////phil
$es=6;
for($i=0;$i<2000;$i++){
if($ii==$i*$es){echo'</tr><TR bgcolor="#f6f6f6">';}
}


	
}
}
?>

</TR><td>
<?
if($yy==yy){//kedal
// Moteur de recherche

if (!file_exists('recherche'.$categ.'.inc.php')) {$categ=2;}
if (file_exists('recherche'.$categ.'.inc.php') && $nb) {
	?>
	<TR bgcolor="#<? print($subtcolor); ?>"><TD colspan=6 align=center class=bleu>Rechercher un album</TD></TR>
	<TR bgcolor="#<? print($bgcolor); ?>"><TD colspan=6>
	<table><TR><TD>
	<form method="post" action="index.php?page=recherche<? print($affp); ?>" name=formulaire>
<?
require 'recherche'.$categ.'.inc.php';
?>
</FORM></TD></TR></table>

<?

}}
?>


</TD></TR></table>
<? } 

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

