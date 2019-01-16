<?php

require('include/admin_header.php');



			    function recursiveDelete($str){
        if(is_file($str)){
            return @unlink($str);
        }
        elseif(is_dir($str)){
            $scan = glob(rtrim($str,'/').'/*');
            foreach($scan as $index=>$path){
                recursiveDelete($path);
            }
            return @rmdir($str);
        }
    }
	
	
function test($id){

	//test galerie
$query="SELECT * FROM photo WHERE galerie='X$id'"; 
$result=mysql_query($query); 
$nb=mysql_affected_rows();

			if($nb<1){$err="<font color=green>base vide</font><br><br>";}

$str="../galerie/".$id;$a=0;
            $scan = glob(rtrim($str,'/').'/*');
            foreach($scan as $index=>$path){
			//echo $path."<br>";
			if($path!="../galerie/".$id."/index"){$a++;}

			}

if($a<1){$err.="dir vide<hr>";}else{$err.=$a. " files";}
	
	return $err;
	
	}//end.action
	echo $action;
	
	if($action=="delete"){
	
	$list2k=explode(";",$liste);
	for($i=0;$i<count($list2k);$i++){
$id=$list2k[$i];
if($id){
	$str="../galerie/".$id."/";
	if(recursiveDelete($str)){echo "dossier $id effacé<br>";}
if(mysql_query("DELETE FROM photo WHERE galerie='X$id'")){echo "photo effacé<br>";}
if(mysql_query("DELETE FROM galerie WHERE id='$id'")){echo "galerie effacé<br>";}
if(mysql_query("DELETE FROM book_index WHERE id='$id'")){echo "book effacé<br>";}

}
}

	}
	

usleep(5000);
$q=mysql_query("select d.id, dd.photo, dd.presentation, d.categorie, d.pseudo, d.nom, d.prenom, d.age, d.genre,d.adresse,d.ville,d.departement,d.pays,d.telephone,d.email,d.vote,d.compteur,d.valid,d.datecrea,d.dateactivity,dd.vip from galerie d, book_index dd where d.id=dd.id order by d.id DESC limit 100");
$nb=mysql_affected_rows();
while($r=mysql_fetch_array($q)){

$line.="<tr><td>". test($r[id])."<br><br><font color=red>DEL</font><br><input type=checkbox onclick=liste.value+='".$r[id].";';></td><td  align=center><a target='_blank' href='http://www.modelinthecity.com/".$r[id]."'><img src='../galerie/".$r[id]."/index/".$r[photo]."' width=100 height=140 border=0></a></td><td  align=center>".$r[id]."</td><td align=center>".$r[categorie]."</td><td align=center>".$r[pseudo]."</td><td align=center>".$r[nom]."</td><td align=center>".$r[prenom]."</td><td align=center>".$r[age]."</td><td align=center>".$r[genre]."</td><td align=center>".$r[adresse]."</td><td align=center>".$r[ville]."</td><td align=center>".$r[departement]."</td><td align=center>".$r[pays]."</td><td align=center>".$r[telephone]."</td><td align=center>".$r[email]."</td><td align=center>".$r[vote]."</td><td align=center>".$r[compteur]."</td><td align=center>".$r[valid]."</td><td align=center>".$r[datecrea]."</small></td><td align=center><small>".$r[dateactivity]."</small></td><td align=center>".$r[vip]."</td></tr>";
}


echo "<br><br><tr><td>";
echo "<table border=1 bordercolor=black cellpadding=2 cellspacing=2 width=900 align=center bgcolor=white>";
?>
<form action="members.php?action=delete" method="post">Delete : 
<input type="text" name="liste"><input type="submit">
<?
echo "<tr><small><b><td>del</td><td align=center>photo</td><td align=center>id</td><td align=center>cat</td><td align=center>pseudo</td><td align=center>nom</td><td align=center>prenom</td><td align=center>age</td><td align=center>genre</td><td align=center>adresse</td><td align=center>ville</td><td align=center>zipcode</td><td align=center>pays</td><td align=center>telephone</td><td align=center>email</td><td align=center>vote</td><td align=center>visit</td><td align=center>valid</td><td align=center>datecrea</td><td align=center>activity</td><td align=center>vip</td></b></small></tr>";

echo $line;

echo "</table>";
?>
</form></td></tr>
