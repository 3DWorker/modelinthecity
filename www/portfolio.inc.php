<?


connexion();
$query="SELECT * FROM photo WHERE galerie='X$id'";
$result=mysql_query($query);
$nb = mysql_affected_rows();

// if(!$nb){header("HTTP/1.0 404 Not Found");exit;} 

$flash=false;
?>
<table width=100% cellspacing=20  cellspacing=20 border=0 align=center valign=top>
<tr><TD valign=top>
<table width=100%><TR><TD align=left valign=top>&nbsp;<a href="<?php echo $location.$id;?>">Profile</a> > Portfolio of <?php echo public_info($id,"pseudo");?></TD></TR></table></td></tr>

<?




if($flash==false){
$col = $colonne+1;
$colonne=3;
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

		print("<td align=center><a class=none href='".$location."photo/".$idphoto."'>");
		
		if($porn==2){
			print("<table border=1 cellpadding=5 cellspacing=0 width=$x height=$y><tr bordercolor=\"#000\"><td align=center height=100%>/!\ This picture contains nudity !<br><br>Viewable by members only !</td></tr></table>");
				
			}else{
			print("<img src='".str_replace($syspath,$location,$visuel)."' width=$x height=$y border=1 hspace=3 vspace=3>");
			}		
		print("<br>".$legende."<span class=small></span></a></td>");
	
		$compt++;
	}
	$csp=$col-$compt;
	if ($csp>=1) {
		print("<td colspan=$csp >&nbsp;</td>");
	}

}}else{
?>

<TR><td valign=top>
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" wmode="transparent" wmode="opaque" width="800" height="600" id="Object1" align="middle">
            <param name="allowScriptAccess" value="sameDomain" />
            <param name="movie" value="<?php echo $location;?>portfolio.swf" />
            <param name="quality" value="high" />
            <param name="wmode" value="transparent" />
            <param name="wmode" value="opaque" /> 
            <param name="bgcolor" value="#ffffff" />
            <param name="FlashVars" value="XMLUrl=<?php echo $location;?>portfolioXML.php?id=<?php echo $id;?>">
            <embed src="<?php echo $location;?>portfolio.swf" quality="high" wmode="transparent" wmode="opaque" width="800" height="600" name="homepage" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"  FlashVars="XMLUrl=portfolioXML.php?id=<?php echo $id;?>"/>
            </object>
<?
}
?>
</TD></TR></TABLE>

