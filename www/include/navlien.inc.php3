<table width="130" border="0" cellpadding="1" cellspacing="0" bgcolor="#FFA722">
<TR><TD><table cellpadding=2 cellspacing=0 bgcolor=#FFFFFF border=0 width=100%><tr><td class=small align=center>
<font color=#046FBD><b><? print("$date"); ?></b></font></TD>
</TR><TR bgcolor=#CDEEFE><TD class=bleu align=center><i>LIENS</i></TD>
</TR><TR><TD class=bleu>
<a href="index.php">&nbsp;SOMMAIRE LIENS</A><br>
<?

connexion();
$query="SELECT theme FROM liencat GROUP BY theme";
$result=mysql_db_query($base, $query);
while ($r= mysql_fetch_array($result)) {
	$afftheme = $r["theme"];
	if($afftheme!="Sexy") {
		print(" <a href=\"http://www.tatoolagoon.com/services/liens/liens.php?theme=$afftheme\">&nbsp;".strtoupper($afftheme)."</A><br>");
	}
}
?>
</TD>
</TR><TR bgcolor=#CDEEFE><TD class=bleu align=center><i>PARTENAIRES</i></TD>
</TR><TR><TD class=bleu align=center>
<a href="<? print($location); ?>services/index.php?page=partenaires">Tous nos partenaires</a><p>
		<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="118" height="120">
		 <param name="movie" value="<? print($location); ?>images/votrepub.swf">
		 <param name="quality" value="high">
		 <param name="menu" value="false">
		 <embed src="<? print($location); ?>images/votrepub.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" menu="false" width="118" height="120"></embed></object>
</td></tr></table></td></tr></table>