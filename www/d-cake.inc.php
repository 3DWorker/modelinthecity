<?php



require('include/global.inc.php');

if($id){
$size=getSize("./galerie/$id/");

require("./include/piegraph.class.php");
 $disksize=disksize($_SESSION["modelinthecity"]);
$tot=5000000;
if($disksize){$tot=$disksize;}
 $v=$size;
$x=100*($tot-$v)/100;
$x1=(100*($tot+$v)/100)-$tot;

//$x1=$disksize;
//$x=$size;
 //echo "$x -- $x1";
$pie = new PieGraph(110,60, array($x,$x1),$id);

$pie->setColors(array("#CCFF65","#0022ff"),$bgcolor);

$pie->setLegends(array("Free space","Used space"));
//$pie->DisplayCreationTime();
$pie->set3dHeight(10);
$pie->display();

}

?>