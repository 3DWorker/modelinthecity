<?php
require('include/admin_header.php'); 
echo "<table width=900 align=center border=1><tr><td>";
// error_reporting(-1);
$action=$_GET['action'];
$member_id=$_GET['id'];
$article_id=$_GET['article_id'];
$act=$_GET['act'];
$admin_message=$_POST['admin_message'];

switch($action){

case "approuve" :
mysql_query("delete from article_approval where member_id='".$member_id."'");
mysql_query("update wall set status='1' where member_id='".$member_id."' and id='".$article_id."'");
echo "article approuvé !!!";
break;

case "refuse":
if(!$act){
echo "<form action='wall.php?id=".$member_id."&article_id=".$article_id."&action=refuse&act=why' method=post>
Message de refus :<br><textarea cols=50 rows=5 name=\"admin_message\">La cause du refus est due à </textarea><br><input type=submit value=envoyer>";
}else{
mysql_query("update wall set status='4', admin_message='". addslashes($admin_message)."' where member_id='".$member_id."' and id='".$article_id."'");
mysql_query("delete from article_approval where member_id='".$member_id."'");
echo "article refusé !!!";
}

break;

case "view" :########## READ LE WALL

$q=mysql_query("select id,title,message,image,date,justify, member_id from wall where id='".$article_id."' and member_id='".$member_id."'");
while($r=mysql_fetch_array($q)){
$img=explode(';',$r['image']);
$just=explode(';',$r['justify']);
$i=0;$add="";$images="";
foreach($img as $val){
$q2=mysql_query("select image from wall_image where id='".$val."'");
while($r2=mysql_fetch_array($q2)){$i++;
if($just[($i-1)]=="1"){$add="float:left;";}elseif($just[($i-1)]=="2"){$add1="align='center'";}elseif($just[($i-1)]=="3"){$add="float:right;";}//else{$add="left";}
$images.="<div style='".$add."padding:4px;' $add1><img src='../../galerie/". $r['member_id']."/press/".$r2['image']."'></div>";}}

$data.="<table align=center width=770 border=0 bgcolor='#DFE1E6' cellpadding=5 cellspacing=5 style='border-radius:8px;-moz-border-radius:8px;;-webkit-border-radius:8px;padding:8px;'>
<tr><td colspan=3><table width=100% cellpadding=0 cellspacing=0 border=0 ><tr><td width=33% align=left><b>FROM : <a href='".$location.$r['member_id']."' target='_blank'>" . ucfirst(public_info($r['member_id'],'pseudo')) ."</b></td><td width=33% align=center><nobr><font size=1><b>POSTED  : " . str_replace('CEST','',strftime("%A %e %B",$r['date'])) ."</b></font></nobr></td><td width=33% align=right><a href='wall.php?id=".$member_id."&article_id=".$article_id."&action=approuve'><u>APPOUVE</u></a> | <a href='wall.php?id=".$member_id."&article_id=".$article_id."&action=refuse'><u>REFUSE</u></a></td></tr></table></td></tr>
<tr><td colspan=2><table bgcolor='#ffffff' border=0 style='border:0px;border-radius:8px;-moz-border-radius:8px;-webkit-border-radius:8px;padding:4px;'><tr><td rowspan=2 width=5% valign=top ></td>";
$data.="<td align=left width=95% height='10%' style='float:both;padding-left:4px;font-size:17px;'><strong>" .stripslashes(ucfirst(strtolower($r['title'])))."</strong></td></tr>";
$data.="<tr><td colspan=2 valign=top height='90%' align=left>".$images."<div style='float:both;padding:4px;font-size:15px;'>" . stripslashes(str_replace(chr(10),'<br>',$r['message'])) ."</div></td></tr></table>  </td></tr>";


$q1=mysql_query("select title,message,image,date, member_id,image,justify from wall where parent_id='".$r[id]."' and status='1' order by date ASC");
while($r1=mysql_fetch_array($q1)){
$img=explode(';',$r1['image']);
$just=explode(';',$r1['justify']);
$i=0;$add="";$images="";
foreach($img as $val){
$q2=mysql_query("select image from wall_image where id='".$val."'");
while($r2=mysql_fetch_array($q2)){$i++;
if($just[($i-1)]=="1"){$add="float:left;";}elseif($just[($i-1)]=="2"){$add1="align='center'";}elseif($just[($i-1)]=="3"){$add="float:right;";}//else{$add="left";}
$images.="<div style='".$add."padding:4px;' $add1><img src='../../galerie/". $r['member_id']."/press/".$r2['image']."'></div>";}}

$data.= "<tr><td bgcolor=''>&nbsp;</td><td>";
$data.="<table border=0 bgcolor='#ffffff' cellspacing=0 style='border-radius:8px;-moz-border-radius:8px;-webkit-border-radius:8px;padding:2px;'><tr><td colspan=2><table width=100% border=0><tr><td width=50% align=left><b>". TEXT_FROM." : <a href='".$location.$r1['member_id']."' target='_blank'>" . ucfirst(public_info($r1['member_id'],'pseudo')) ."</b></td><td width=50% align=right><nobr><font size=1><b>" . TEXT_POSTED .' : ' . str_replace('CEST','',strftime("%A %e %B",$r1['date'])) ."</b></font></nobr></td></tr></table></td></tr>
<tr><td rowspan='2' width='5%' valign='top' align='left'>&nbsp;&nbsp;<a href='".$location.$r1['member_id']."' target='_blank'></td>";
$data.="</tr><tr><td align='left' valign='top' width='100%'>".$images."<div style='float:both;padding:4px;font-size:15px;'>" . stripslashes(ucfirst(strtolower($r1['message']))) ."</div></td></tr></table>";
}
$data.= "</td></tr>";
$data.="</table><br><br>";
}
echo $data;
break;

}

echo "</td></tr></table>";
?>