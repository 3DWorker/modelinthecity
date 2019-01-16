<!--start//navgalerie-->
<?

//require "./include/global.inc.php";
if (session_is_registered("logtatoo")){
$date=Date('d-m-Y');
connexion();

}
?>
<table width="130" border="0" cellpadding="0" cellspacing="0" valign=top>
<TR><TD valign=top align=left><table cellpadding=2 cellspacing=0  border=0 width=100%><tr><td class=nav align=left>

<font size=2><? if($log){echo "&nbsp;Welcome <b>$prenom $nb_msg";}?></font></TD>

</TR><TR><TD align=center>Categories</TD>
</TR><TR><TD><a href='./index.php'>Home</a><br>
<?


connexionphoto();
$new = "New";
$query = "SELECT id,nom,payant FROM categorie WHERE valid=1 ORDER BY ordre ASC";
$result = mysql_db_query($base,$query);
while ($r=mysql_fetch_array($result)) {
	$idcat = $r["id"];
	$nomcat = $r["nom"];
$payant=$r["payant"];
$query1 = "SELECT categorie FROM galerie WHERE categorie='$idcat'";
$result1=mysql_query($query1);
$nb = mysql_affected_rows();

	//if($idcat!=12){
	   if($idcat==16 OR $idcat==17 OR $idcat==18 OR $idcat==19 OR $idcat==21 OR $idcat==22 OR $idcat==23 OR $idcat==24){ $menu = $nomcat." ".$new; }else{ $menu = $nomcat ; }
	   connexionphoto();

if($payant!=1){
	   print("<a href=\"".$location."index.php?page=galerie&categ=$idcat\">$menu&nbsp;($nb)</A><BR>");
}else{
	   print("<a href=\"".$location."index.php?page=galerie_pay&categorie=$idcat\">$menu&nbsp;($nb)</A><BR>");
}



	
}

?>
</TD>
</TR>

</table></td></tr></table>
<!--end//navgalerie-->