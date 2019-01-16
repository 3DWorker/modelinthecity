<?

$flash=true;

?><table width=100% cellspacing=0 cellpadding=0 border=0 align=center class=modules_description>
<tr><td bgcolor="#000000" valign=top><br><?

if($flash){

 if(is_integer(strpos($_SERVER['HTTP_USER_AGENT'],'Safari'))){
echo '
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="640" height="260"><param name="movie" value="portfolio.swf" />
<param name="flashvars" value="XMLUrl=portfolioXML.php?id='.$id.'" />
<param name="quality" value="high" />
<param name="loop" value="true" />
		<param name="wmode" value="transparent" />
<param name="allowfullscreen" value="true" />
<embed src="portfolio.swf" wmode="transparent" flashvars="XMLUrl=portfolioXML.php?id='.$id.'" loop="true" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="640" height="260" allowfullscreen="true" wmode="transparent">
</embed>
</object>';
 }else{
echo '<object type="application/x-shockwave-flash" width="640" height="260" id="portfolio" align="middle" data="portfolio.swf">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="allowFullScreen" value="true" />
	<param name="wmode" value="transparent" />
	<param name="FlashVars" value="XMLUrl=portfolioXML.php?id='.$id.'" />
	<param name="movie" value="portfolio.swf" /><param name="menu" value="false" /><param name="quality" value="high" /><param name="scale" value="showall" /><param name="bgcolor" value="#000000" />	<embed src="portfolio.swf" menu="false" wmode="transparent" quality="high" scale="showall" bgcolor="#000000" width="640" height="260" name="portfolio" align="middle" allowScriptAccess="sameDomain" allowFullScreen="true" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>';
	}
	
	
}else{
$syspath="../";
$location="../";

if($flash==false){

connexion();
$query="SELECT * FROM photo WHERE galerie='X$id'";
$result=mysql_query($query);
$nb = mysql_affected_rows();


$col = $colonne+1;
$colonne=100;
$compt=1;
if($nb) {	
	while ($r= mysql_fetch_array($result)) {
		$legende = str_replace("//","",$r["legende"]);
		$legende=ucfirst($legende);

		$visuel = $syspath."galerie/$id/".$r["nom"];
		$idphoto = $r["id"];
		$porn=$r[porn];
		if ($compt>$colonne) {	
			$compt=1;
			print("</TR><tr align=center valign=top>");
		}
		//if(!file_exists($visuel)){mysql_query("DELETE FROM photo where id='$idphoto'");echo "<script>location.reload();</script>";}
		$size=getimagesize("$visuel");
		//$haut = 150/$size[0]*$size[1];
		//$larg = $haut/$size[1]*$size[0];
$max=150;

if ($size[0]>$max OR $size[1]>$max) {
	if ($size[0]>$size[1]) {
		$x = $max;
		$y = ($max/$size[0])*$size[1];
	} else {
		$y = $max;
		$x = ($max/$size[1])*$size[0];
	}
} else {
	$x=$size[0];
	$y=$size[1];
}

		print("<td align=center valign=bottom><a class=none href='".$location."photo/".$idphoto."' target='_parent'>");
		
		if($porn==2){
			print("<table border=1 cellpadding=0 cellspacing=0 width=$x height=$y><tr bordercolor=\"#000\"><td align=center height=100%>/!\ This picture contains nudity !<br><br>Viewable by members only !</td></tr></table>");
				
			}else{
			print("<img src='".str_replace($syspath,$location,$visuel)."' width=$x height=$y border=1 hspace=3 vspace=3>");
			}		
		//print("<br>".$legende."</a></td>");
		print("</a></td>");
		$compt++;
	}
	$csp=$col-$compt;
	if ($csp>=1) {
	print("<td colspan=$csp >&nbsp;</td>");
	}

}}}
?>
</TD></TR></TABLE>