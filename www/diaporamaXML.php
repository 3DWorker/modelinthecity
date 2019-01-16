<?php

error_reporting(0);
require "/homez.193/".HOST."/connex/connexion.inc.php";
$id=$_GET['id'];
header("Content-type: text/xml");

$t='<models>';

$query="SELECT d.id,d.legende, d.nom, d.porn, dd.pseudo, ddd.photo FROM photo d, galerie dd, book_index ddd WHERE d.galerie='X$id' and dd.id='$id' and dd.id=ddd.id and d.porn!='1' limit 5";
$result=mysql_query($query);

while ($r= mysql_fetch_array($result)) {
		$legende = $r["legende"];
		$nom=$r["nom"];
		$_id=$r["id"];
$pseudo=$r[pseudo];
if($r[photo]){$u='<model id="'.$id.'/index/" name="'.$pseudo.'" porn="'.$r[porn].'" images="'.$r[photo].'" />';}

$v.='<model id="'.$id.'" name="'.$pseudo.'" porn="'.$r[porn].'" images="'.$nom.'" />';

}

$v.='</models>';

echo $t.$u.$v;


?>