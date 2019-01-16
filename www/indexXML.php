<?php

error_reporting(0);
require "/homez.193/".HOST."/connex/connexion.inc.php";
$id=$_GET['id'];
$link=trim($_GET['clink']);
header("Content-type: text/xml");

if($id==1){$ar=array(35,77,91,130,128,155,132);$link="FLASH_MODE";}
if($id==2){$ar=array(82,83,84,85);$link="ACTUALITES_MODE_DE_MA_VILLE";}
if($id==3){$ar=array(111,110,112,113,117,118,119,120,126,127,128,129,141,140,139,138,142,143,144,145,146,147,148,150,156,157,158,159,160);$link="GALERIE_DES_LOOKS";}
$t='<models>';
for($i=0;$i<count($ar);$i++){

$query="SELECT image, member_id from wall_image where id='".$ar[$i]."'";
$result=mysql_query($query);

if($r= mysql_fetch_array($result)) {

$_id=$r["member_id"];

$size=getimagesize('/homez.193/".HOST."/modelinthecity/galerie/'.$_id.'/press/'.$r[image]);

$u.='<model id="'.$_id.'" name="'.$pseudo.'" porn="'.$r[porn].'" images="press/'.$r[image].'" link="'.$link.'" />';
}
}

$v='</models>';

echo $t.$u.$v;


?>