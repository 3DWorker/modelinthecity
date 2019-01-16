<? // Script de recuperation de la liste des photos d'une galerie
$c="";
require '../connex/connexionphoto.inc.php';
$query  = "SELECT * FROM photo WHERE galerie='X$gal'";
$result = mysql_db_query($base,$query);
$nb = mysql_affected_rows();
$i=0;
while ($r=mysql_fetch_array($result)) {
	$p[$i]=urlencode(utf8_encode($r["nom"]));
	$l[$i]=urlencode(utf8_encode($r["legende"]));
	//echo "<img src=\".//galerie/$gal/$p[$i]\"><BR>";
	if(file_exists("$gal/$p[$i]")) {
		$size = getimagesize("$gal/$p[$i]");
		if($size[0]>$size[1]) {
			$rapport = intval(($maxsize/$size[0])*100);
		} else {
			$rapport = intval(($maxsize/$size[1])*100);
		}
		$format = intval($size[0]/$size[1]*100)/100;	
		$var.= "&p$i=$p[$i]&l$i=$l[$i]&xy$i=$rapport&format$i=$format";
		$i++;
	}
}
$var= "a=1&nbrboule=$i".$var;
echo $var;
?>