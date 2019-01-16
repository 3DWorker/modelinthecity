<table width=100% cellspacing=20  cellspacing=20 border=0 align=center valign=top>
<tr><TD valign=top>
<table width=100%><TR><TD align=left valign=top>&nbsp;<a href="<?php echo $location.$id;?>">Profile</a> > <a href="<?php echo $location.'portfolio/'.$id;?>">Portfolio</A> > <a href="index.php?page=details&img_id=<?php echo $img_id;?>&id=<?php echo $id;?>">Photo</a></TD></TR></table>
</td></tr>


<?
connexion();
$query="SELECT nom,legende FROM photo WHERE id='$img_id'";
$result=mysql_db_query($base, $query);
$nb = mysql_affected_rows();

if($nb) {	
	while ($r= mysql_fetch_array($result)) {
		$legende = $r["legende"];
		$visuel = $syspath."galerie/$id/".$r["nom"];
		$idphoto = $r["id"];

		$size=getimagesize("$visuel");
		$width=$size[0];
		$height=$size[1];
		
		$maxW=650;
		$maxH=600;
	if($width>$height){
	$ratio=$width/$height;
	$width=$maxW;$height=$width/$ratio;}elseif($width<$height){
	$ratio=$height/$width;
	$height=$maxH;$width=$height/$ratio;
	}elseif($width==$height){$width=$maxW;$height=$maxW;}



		print("<td align=center><img src='".str_replace($syspath,$location,$visuel)."' width='".$width."' height='".$height."' border='1' hspace='3' vspace='3'><br><span class=small>". strip_tags($legende)."</span></td>");	

	}

}
?>
<tr><td>
<div  class="static_bar">Tags</div>
<br><a href="index.php?page=galerie_aff&action=addatag&id=<?php echo $id;?>&actiontag=1"><div class="button_blue">Add a tag</div></a><br>
<?php


if($logtatoo){


 if($action=="addatag"){
$si = new securityImage();


if($newtag && $si->isValid()!=1){echo "/!\ Wrong code.";}

 if($newtag && $si->isValid()==1){

$table_query = "CREATE TABLE IF NOT EXISTS tags (
  tag_id int(11) NOT NULL,
  client_id int(11) NOT NULL,
  tag_text varchar(48) collate latin1_general_ci NOT NULL default '',
  date datetime NOT NULL,
  PRIMARY KEY  (tag_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;";

mysql_db_query($base, $table_query);

$date=Date('Y-m-d');

$query="SELECT * FROM tags WHERE client_id='$logtatoo' and tag_id='$id' and date='$date'";
$result=mysql_db_query($base, $query);
if(mysql_affected_rows()<4){
$query="INSERT INTO tags SET tag_text='$newtag',client_id='$logtatoo', tag_id='$id', date='".Date('Y-m-d')."',IP='". $_SERVER[REMOTE_ADDR]."'";
$result=mysql_db_query($base, $query);
echo "Your tag is sent!";
}else{echo "/!\ Only 3 tags by day";}

}

else{
echo "<form action='index.php?page=galerie_aff&action=addatag&id=".$id."' method=post><textarea cols=30 rows=2 name=newtag>". $newtag ."</textarea><br>";

echo $si->showFormImage();echo "&nbsp;<input type=image src='./images/hip_reload.gif' onclick='submit();'><br>".$si->showFormInput();

echo  $_SECURITY_IMAGE_CHECK_ERROR." <br><input type=submit value='tag'  name=actiontag>";
}


}//End.action


}//End.logtatoo

elseif($actiontag){if($logtatoo!=$id){echo "/!\ You must be <a href=\"index.php?page=login\">logued in</A> to add a tag";}else{echo "/!\You cannot add a tag on yourself, unless ...";}}




## reading tags

$query="SELECT d.tag_text,d.client_id FROM tags d, book_index dd WHERE d.tag_id='$id' and dd.id='$id'";
$result=mysql_db_query($base, $query);
while($r=mysql_fetch_array($result)){

$client_id=$r[client_id];

$q="SELECT d.pseudo, dd.photo from galerie d,book_index dd where d.id='$client_id' and dd.id=d.id";

$q1=mysql_db_query($base, $q);

if($r1=mysql_fetch_array($q1)){

$pseudo=$r1[pseudo];
$photo=$r1[photo];
}

$q2="SELECT d.nom from categorie d,galerie dd where dd.id='$client_id' and dd.categorie=d.id";

$q3=mysql_db_query($base, $q2);

if($r3=mysql_fetch_array($q3)){

$categ=$r3[nom];

}


$tag_text=$r[tag_text];

$_tag[]=array('client_id'=>$client_id, 'pseudo'=>$pseudo, 'categ'=>$categ, 'photo' =>$photo, 'text'=>$tag_text);


}



echo '<br><br><table border=0 width=100% bgcolor="#f6f6f6">';

for($i=0;$i<count($_tag);$i++){

echo '<tr><td width="10%" align=center><a href="index.php?page=galerie_aff&id='.$_tag[$i][client_id].'">' . $_tag[$i][pseudo] . '<br><img src="galerie/' . $_tag[$i][client_id] . '/index/' . $_tag[$i][photo] . '" width="45" height="63" border=0 title="Visit the portfolio of ' . $_tag[$i][pseudo] . '"><br>' . $_tag[$i][categ] . '</a></td><td width="90%">&nbsp;'.$_tag[$i][text].'</td></tr><tr><td bgcolor="#ffffff" height=7 colspan=2>&nbsp;</td></tr>';
}
echo '</table>';


?><table><tr><td><img src="images/bubble.png" border=0></td><td>&nbsp;<b>From: hellboy</b><br>&nbsp;Hey girl, this is a wonderful book !!!</td></tr></table>
</td></tr>
</table>
</TD></TR></TABLE>

