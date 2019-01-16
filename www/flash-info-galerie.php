<? // Script de recuperation des infos membre d'une galerie
$location="../";
require '../include/global.inc.php';
connexionphoto();
$query  = "SELECT * FROM galerie WHERE id='$id_info'";
$result = mysql_db_query($base,$query);
if(mysql_affected_rows()>0) {
	$r=mysql_fetch_array($result);
	$categ = $r["categorie"];
	$user_id = $r["user_id"];
	connexion();
	infos_membres($user_id);
	if ($categ!=2) {
		$pseudo = "$prenom $nom";
	}
		/*
	$adresse = $r["adresse"];
	$ville = $r["ville"];
	$departement = $r["departement"];
	
	$email = $r["email"];
	$url = $r["url"];
	$portrait = $r["portrait"];
	*/
	$pseudo = urlencode(utf8_encode($pseudo));
	$pays = urlencode(utf8_encode($pays));
	$presentation = urlencode(utf8_encode(strip_tags(trim(stripslashes($r["presentation"])))));
	$stylegal=explode("-",$r["style"]);
	$stnb= count($stylegal);
	for($i=0; $i<$stnb; $i++) {
		$style.= "&style$i=".urlencode(utf8_encode($stylegal[$i]));
	}
	$mensuration=explode("-",$r["mensuration"]);
	$msnb= count($mensuration);
	for($i=0; $i<$msnb; $i++) {
		$mensu.= "&mensuration$i=".urlencode(utf8_encode($mensuration[$i]));
	}
	$compteur = $r["compteur"];
	connexionphoto();
	$query2="UPDATE galerie SET compteur=compteur+1 WHERE id=$id";
	mysql_db_query($base, $query2);
	$date = $r["datecrea"]; datex(2); $datecrea = $date;	
$var= "a=1&categ=$categ&pseudo=$pseudo&age=$ddn&genre=$genre&departement=$cp&pays=$pays&presentation=$presentation&stnb=$stnb$style&msnb=$msnb$mensu&compteur=$compteur&datecrea=$datecrea";
echo $var;
}

?>