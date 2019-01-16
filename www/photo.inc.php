<?
connexion();

if(count($G)<1){
$G=array($idphoto);

$query="SELECT galerie FROM photo WHERE id='$idphoto'";
$result=mysql_query($query);
if ($r= mysql_fetch_array($result)) {$ID = substr($r["galerie"],1,strlen($r["galerie"]));
$_id=$ID;}

$query="SELECT id FROM photo WHERE galerie='X$ID' and nom!=''";
$result=mysql_query($query);
while ($r= mysql_fetch_array($result)) {

array_push($G,$r['id']);
if($r[id]==$idphoto){$position=count($G)-1;}
}

$query="SELECT legende,nom,galerie,affichage,porn, title, description, style FROM photo WHERE id='$G[$position]'";
$result=mysql_query($query);
$nb=mysql_affected_rows();

while ($r= mysql_fetch_array($result)) {
	$nom = convertUTF8($r["nom"]);
	$legende = convertUTF8($r["legende"]);
    $visuel=$syspath."galerie/".$ID."/".$nom;
	$porn=$r[porn];
	$title=convertUTF8($r['title']);
	$description=convertUTF8($r['description']);
}
}


?>
<table width=875 cellspacing=10  cellspacing=10 border=0 align=center valign=top>
<tr><TD valign=top colspan=3>
<table width=100%><TR><TD align=left valign=top>&nbsp;<a href="<?php echo $location.$ID;?>">Profile</a> > Photo of <?php echo public_info($ID,"pseudo");?></TD></TR></table></td></tr><tr><td valign=middle align=right width="50%"><?php if($G[$position-1]!=$G[$position] && $G[$position-1]!=0){echo "<a href='".$location."photo/".$G[$position-1]."'><img src='".$location."images/button_left.png' border=0></a>";}else{echo "";}?></td><td align=center>
<?php

 
		if($porn==1 && !$_SESSION['modelinthecity']){
			print("<table border=1 cellpadding=5 cellspacing=0 width=$x height=$y><tr bordercolor=\"#000\"><td align=center width=210 height=300>This picture contains nudity<br><br>Viewable by members only !</td></tr></table>");}else{
			


//echo "<img src='".str_replace($syspath,$location,$visuel)."' width='".$x."' height='".$y."'>";
echo "<img src='". $location ."image.php?imgid=".$idphoto."' oncontextmenu='return false;'>";
}
?><br><br><div id=photo><b>Title : </b><?php echo ucfirst($title). "<br><b>Description : </b>".ucfirst($description)."<br><b>Copyright : </b>". ucfirst($legende)."<br></div><table><tr><td>";
if($G[$position-1]!=$G[$position]  && $G[$position-1]!=0){echo "<a href='".$location."photo/".$G[$position-1]."'><div class=button_blue>Previous</div></a>";}?>
</td><td>
<?php if($G[$position+1]!=$G[$position] && $G[$position+1]!=0){echo "<a href='".$location."photo/".$G[$position+1]."'><div class=button_blue>Next</div></a>";}?>
</td></tr></table>
</div>
</td><td valign=middle align=left width=50%><?php if($G[$position+1]!=$G[$position] && $G[$position+1]!=0){echo "<a href='".$location."photo/".$G[$position+1]."'><img src='".$location."images/button_right.png' border=0></a>";}else{echo "";}?></td></tr><tr><td colspan=4><table width=600 align=center><tr><td>

<?php
require("modules/module_tags.php");
?></td></tr></table>

</td></tr></table>