<?php
require('include/admin_header.php');
	
	$action=$_GET['action'];
	$exp_id=$_POST['exp_id'];
	if(!$exp_id){$exp_id=$_GET['exp_id'];}
?>
<tr><td>

CASTING CALL APPROVAL
<hr><br>

<?php

if($action=="refused" && $exp_id){
$approb="";
for($i=1;$i<10;$i++){
$approb.=$_POST['approb'][$i]."-";
}

mysql_query("update casting set valid='2', approb='$approb' where exp_id='". (int)$exp_id."'");

}elseif($action=="approved" && $exp_id){
mysql_query("update casting set valid='1' where exp_id='". (int)$exp_id."'");

}


$data="";$a=0;
$q=mysql_query("select d.id, d.title, d.description, d.city,d.date, d.start_date, d.end_date, d.amount, ddd.type, dd.name, d.adult, d.valid, d.country, d.IP, d.approb from casting d, categorie dd, casting_type ddd where d.exp_id='".$exp_id."'  and d.category=dd.id and d.type=ddd.id");

$q1=mysql_query("select nom, prenom, email from galerie where id='".$exp_id."' ");
if($r1=mysql_fetch_array($q1)){
$nom= $r1['nom'] ." ". $r1['prenom'] ."  ".$r1[email];
}

// $q=mysql_query("select title, type, adult from casting where exp_id='".$exp_id."'");

while($r=mysql_fetch_array($q)){
$a++;
$app=$r['approb'];
if($r['country']){ $q1=mysql_query("select countries_name from countries where countries_iso_code_2='".$r['country']."'");
if($r1=mysql_fetch_array($q1)){$countries_name=$r1['countries_name'];}}

$valid=$r['valid'];
if($valid==1){$data.="<div style='background:#ccff00;color:white;padding:4px;width:70px;font-weight:bold;'>APPROVED</div>";}



$data.="Submitted the ".Date('d F Y \a\t\ h:i:s',$r[date]) ."<br>
By IP : ".$r[IP] ."<br>" .$nom ."<br>";

if($r['adult']==2){$data.="<div style='background:red;color:white;width:50px;font-weight:bold;float:left'>ADULT</div>&nbsp;";}

$data.="<big><strong>".ucfirst($r['title']). "</strong></big><br><strong>".$r['type']."</strong> casting call for a <strong>".$r['name']."</strong><br>".$r[description]."<br>";

if($countries_name){$data.="<b>Location : " .$countries_name.", ". $r[city]."<br>";}

if($r['start_date'] && !$r['end_date']){$data.="Date : ". Date('d F Y', $r[start_date]);}
if($r['start_date'] && $r['end_date']){$data.="Date range: ". Date('d F Y', $r[start_date]). " to ".Date('d F Y', $r[end_date])."</b>" ;}
if(!$r['start_date'] && $r['end_date']){$data.="Ended date : ". Date('d F Y', $r[end_date]);}
if($a>1){$data.="<hr><br>";}
}
if(mysql_error()){echo mysql_error();}elseif($data && (!$valid || $valid==1)){echo $data;}elseif($data && $valid==2){echo "<div style='background:red;color:white;padding:4px;width:70px;font-weight:bold;'>REFUSED</div>" . $data;}
?>
<br><br><div style="border:4px dashed red;  border-radius:4px;-moz-border-radius:4px;;padding:16px;float:left">
<form action='casting_call_approval.php?action=refused' method=post><input type=hidden name=exp_id value="<?php echo $exp_id;?>">
	  <?
	
	$q=mysql_query("select name,id from casting_approb where 1 order by id");
	$i=0;	$_approb=explode('-',$app);
	while($r=mysql_fetch_array($q)){$i++;
	if($_approb[($i-1)]=="on"){$add= "checked";}else{$add="";}
	$option.=$r[name]." : <input type=checkbox name='approb[$i]' $add><br>";
		}	
	echo $option;

?><br>
<input type="submit" value="REFUSE">
</form></div>
<div style="background:#ccff00;border-radius:8px;padding:16px;float:left">
<input type="button" onclick="location.href='casting_call_approval.php?action=approved&exp_id=<?php echo $exp_id;?>';" value="APPROVED">

</td></Tr>