<?php
require('include/admin_header.php');

@setlocale(LC_TIME, 'fr_FR.UTF-8'); 
/*
$q=mysql_query("select id, datecrea, dateactivity from galerie where 1 order by id ASC");
while($r=mysql_fetch_array($q)){
echo $r[id]." => ". strtotime($r[datecrea])." " . date('d M Y', strtotime($r[datecrea]))  ."<br>";
}
*/

// error_reporting(-1);

$action=$_GET['action'];
$id=$_GET['id'];
if(!$id){$id=$_POST['id'];}
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$pseudo=$_POST['pseudo'];
$adresse=$_POST['adresse'];
$departement=$_POST['departement'];
$ville=$_POST['ville'];
$pays=$_POST['pays'];
$telephone=$_POST['telephone'];
$email=$_POST['email'];
$age=$_POST['age'];
$genre=$_POST['genre'];
$titre=$_POST['titre'];
$presentation=$_POST['presentation'];
$presentation_en=$_POST['presentation_en'];
$credit=$_POST['credit'];
$valid=$_POST['valid'];
$message=$_POST['message'];
$subject=$_POST['subject'];

?>
<tr><td bgcolor=white><hr><table cellpadding=2 cellspacing=2 width=900 align=center bgcolor=white><tr><td>
<b>CLIENTS</b>
<?php if($action!="view"){
?>
<div align=right><form action='clients.php' method='post'>Recherche : <input type=test name=search size=10><input type=submit name=action value=search></form></div>
<?
}
?>

<?
if(!$action){
$q=mysql_query("select id, pseudo, nom, prenom, datecrea, dateactivity, valid from galerie where 1 order by id ASC");
$nb=mysql_affected_rows();

$txt="<form action=clients.php method=post><table width=100%><tr><td bgcolor='#cccccc'>id</td><td bgcolor='#cccccc'>Nom</td><td bgcolor='#cccccc'>Prenom</td><td bgcolor='#cccccc'>Pseudo</td><td bgcolor='#cccccc'>Datecrea</td><td bgcolor='#cccccc'>Activite</td><td bgcolor='#cccccc'>Valid</td></tr>";

while($r=mysql_fetch_array($q)){

if($r[valid]==1){$add="bgcolor='#66ff00'";}else{$add="bgcolor='#ff0000'";}
$txt.="<tr style='cursor:pointer;' onclick=`document.location.href='clients.php?action=view&id=".$r[id]."';` onmouseover=\"this.style.background='#f6f6f6';\" onmouseout=\"this.style.background='#ffffff';\"><td>".$r[id]."</td><td>".$r[nom]."</td><td>".$r[prenom]."</td><td>" . $r[pseudo] ."</td><td>" . date('d F Y', $r['datecrea']) . "</td><td><small>". date('d F Y H:i:s', $r['dateactivity']) ."</small></td><td $add width=10>&nbsp;</td></tr>";
}
$txt.="</table></form>";

echo $txt;
/*

$q=mysql_query("select id, photo, presentation, d.categorie, d.pseudo, d.nom, d.prenom, d.age, d.genre,d.adresse,d.ville,d.departement,d.pays,d.telephone,d.email,d.vote,d.compteur,d.valid,d.datecrea,d.dateactivity,dd.vip from galerie d, book_index dd where d.id=dd.id order by d.id DESC limit 100");
*/

}
else{
 switch ($action) {
 
 case 'view' :
 
 echo "<table border=0 width=100% cellpadding=2 cellspacing=2 width=900 align=center bgcolor=white><tr><td width=50% valign=top><tr><td colspan=3 align=center><a href='clients.php?action=view&act=contact&id=".$id."'>Contacter ce membre</a></td></Tr>";

 if($_GET['act']=="contact"){
 
 echo "<tr><td colspan=3> <form action='clients.php?action=view&act=contacter&id=".$id."' method='post'><table border=0 width=100% bgcolor='#ececec' cellspacing=5 style='border-radius:8px;-moz-border-radius:8px;'><tr><td width=40% align=right>Subject : </td><td><input type=text name=subject></td></tr><tr><td align=right>Message :</td><td><textarea cols=35 rows=6 name='message'></textarea><br><br><input type=submit value='envoyer'></td></tr></table></form></td></Tr>";
 }
  if($_GET['act']=="contacter" && $id && $message && $subject){
mysql_query("insert into message set id_dest='".$id."', id_exp='7', subject='".addslashes($subject)."', message='" .addslashes($message)."', datecrea='" .strtotime("now")."'");
  
 echo "Message envoyé";

 }
 
 $q=mysql_query("select d.id, d.nom, d.prenom,d.pseudo, d.adresse, d.departement, d.ville, d.pays,d.telephone, d.email, d.age, d.genre, d.valid, dd.photo, d.datecrea, d.dateactivity, dd.titre,dd.presentation,dd.presentation_en, dd.credit from galerie d, book_index dd where d.id='$id' and d.id=dd.id ");
  if(mysql_affected_rows()>0){
 }else{
 
  $q=mysql_query("select id, nom, prenom,pseudo, adresse, departement, ville, pays, telephone, email, age, genre, datecrea, dateactivity, IP from galerie  where id='$id'");
 }
 while($r=mysql_fetch_array($q)){ 
$list=array('IP'=>$r[IP],'valid'=>$r[valid], 'datecrea' => date('d F Y', $r['datecrea']) , 'dateactivity' => date('d F Y H:i:s', $r['dateactivity']) , 'id'=>$r[id], 'nom'=>$r[nom], 'prenom'=>$r[prenom], 'pseudo'=>$r[pseudo], 'adresse'=>$r[adresse], 'departement'=>$r[departement], 'ville'=>$r[ville], 'pays'=>$r[pays], 'telephone'=>$r[telephone], 'email'=>$r[email], 'age'=>$r[age], 'genre'=>$r[genre], 'titre'=>stripslashes($r[titre]), 'presentation'=>stripslashes($r[presentation]),'presentation_en'=>stripslashes($r[presentation_en]), 'credit'=>stripslashes($r[credit]));
$photo=$r[photo];
$id=$r[id];
$pseudo=$r[pseudo];
 } 
 echo "<form action='clients.php?action=modify' method='post'><table cellpadding=5 cellspacing=4 border=0><tr>
 <td rowspan=".count($list)." valign=top><a href='http://www.modelinthecity.com/$id' title='Voir son book' target='_blank'><img src='../galerie/".$id."/index/".$photo."' width=100 height=140 border=1><br>$pseudo</a></td>";
 foreach($list as $key=>$val){
 if($key=="id"){$ad="disabled";echo "<input type=hidden name=id value=$id>";}else{$ad="";}
 if(strlen($val)>32){
 echo "<td>".ucfirst($key)." : </td><td><textarea rows=10 cols=35 name='".$key."'>".$val."</textarea></td></tr>";
 }else{
echo "<td>".ucfirst($key)." : </td><td><input type='text' name='".$key."' value=\"".$val."\" size=28 $ad></td></tr>";
}

}
  echo "</tr><td colspan=5 align=right><input type='submit' value='modify'></td></tr></table>";
  
  echo "</td><td width=1 bgcolor=black>&nbsp;</td><td valign=top width=50%>";
  echo "Disk : ".round((getSize("../galerie/".$id."/")/1024),0)." Ko<br>";
   $q=mysql_query("select id, nom, legende, porn from photo where galerie='X$id'");
   echo "<table border=1><tr>";$a=0;$b=0;
    while($r=mysql_fetch_array($q)){ $a++;$b++;
	$file="../galerie/".$id."/".$r[nom];
	$s=getimagesize($file);
	if($s[0]<$s[1]){$as="width=100";}else{$as="height=100";}
	
		if($r[porn]==1){$porn="Porn <input type='checkbox' name='porn[" .$r['id']."]' checked>";}else{$porn="Porn <input type='checkbox' name='porn[".$r['id']."]'>";}

	
  echo "<td align=center valign=middle>$porn<br><img src='".$file."' $as><br>".$r[legende]."</td>";
  if($a==3){$a=0;echo "</tr><tr>";}
  }
  echo "</table>";
  
  echo "</td></tr></table></form>";
 break;
 
 case 'modify' :
 if($id){
 
echo "modifiy";
 
mysql_query("update galerie set nom='$nom', prenom='$prenom',pseudo='$pseudo', adresse='$adresse', departement='$departement', ville='$ville', pays='$pays', telephone='$telephone', email='$email',age='$age', genre='$genre', valid='$valid' where id='$id'");

mysql_query("select * from account_approval where member_id='".$id."' and email='sent'");
if(mysql_affected_rows()>0){
mysql_query("delete from account_approval where member_id='".$id."' and email='sent'");
}

if($presentation){mysql_query("update book_index set presentation='".addslashes($presentation)."' where id='$id'");}
if($presentation_en){mysql_query("update book_index set presentation_en='".addslashes($presentation_en)."' where id='$id'");}
if($titre){mysql_query("update book_index set titre='" .addslashes($titre)."' where id='$id'");}
if($credit){mysql_query("update book_index set credit='". addslashes($credit)."' where id='$id'");}



   $q=mysql_query("select id from photo where galerie='X$id'");
    while($r=mysql_fetch_array($q)){mysql_query("UPDATE photo set porn='0' where id='". $r[id]."'");}
	
foreach($_POST['porn'] as $key=>$val){
mysql_query("UPDATE photo set porn='1' where id='". $key."'");
}

 }

 if(!mysql_error()){ echo "<script>location.href='clients.php?action=view&id=".$id."';</script>";}
 echo "updated";
 break;
 
 case 'search' :
 
 echo "not implemented";
 
 break;

}
}
?>
</td></tr></table>