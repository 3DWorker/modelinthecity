<?php

error_reporting(0);
require "/homez.193/".HOST."/connex/connexion.inc.php";
$id=$_GET['id'];
header("Content-type: text/xml");

$t='<models>';

$query="SELECT d.id, dd.photo from book_index dd, galerie d where d.categorie='".(int)$id."' and d.valid='1' and d.id=dd.id and dd.photo!=''";
$result=mysql_query($query);

while ($r= mysql_fetch_array($result)) {
		//$legende = $r["legende"];
		//$nom=$r["nom"];
$_id=$r["id"];
//$pseudo=$r[pseudo];

$size=getimagesize('/homez.193/".HOST."/modelinthecity/galerie/'.$_id.'/index/'.str_replace('.jpg','_small.jpg',$r[photo]));
 //if($size[0]<$size[1]){
$u.='<model id="'.$_id.'" name="'.$pseudo.'" porn="'.$r[porn].'" images="'.str_replace('.jpg','_small.jpg',$r[photo]).'" />';
}
//}

$v='</models>';

echo $t.$u.$v;


?>