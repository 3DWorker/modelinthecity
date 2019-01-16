<?php

error_reporting(0);
require "/homez.193/".HOST."/connex/connexion.inc.php";
session_start();
$id=$_GET['id'];

header("Content-type: text/xml");

$t='<models>';

 $query="SELECT dd.id,d.legende, d.nom, d.porn, dd.pseudo, ddd.photo, d.id as imgid FROM photo d, galerie dd, book_index ddd WHERE d.galerie='X$id' and dd.id='$id' and dd.id=ddd.id";// and d.porn!='1'

$result=mysql_query($query);
// echo mysql_error();
while ($r= mysql_fetch_array($result)) {
		$legende = $r["legende"];
		$nom=$r["nom"];
		$_id=$r["id"];
$pseudo=$r[pseudo];
// if($r[photo]){$v.='<model id="'.$id.'/index/" name="'.$pseudo.'" porn="'.$r[porn].'" images="'.$r[photo].'" link="'.$r[imgid].'" />';}

if($r['porn']==1 && !$_SESSION['modelinthecity']){$_id=1;$nom="nudity.jpg";}

$v.='<model id="'.$_id.'" name="'.ucfirst($pseudo).'" porn="'.$r[porn].'" images="'.$nom.'" link="'.$r[imgid].'" />';

}

$v.='</models>';

echo $t.$u.$v;

/*
<head>
<meta http-equiv="Cache-control" content="no-cache">
<meta http-equiv="Pragma" content="no-cache, must-revalidate">
<meta http-equiv="Expires" content="-1">
<meta http-equiv="content-type" content="text/xml">
</head>
*/
?>