<?
$id=$_GET[id];
$flash=1;
if(!$flash){$im="<img src='galerie/".$id."/index/" . public_book_info($id,"photo")."' border=0>";}else{

//echo $_SERVER['HTTP_USER_AGENT'];

 if(is_integer(strpos($_SERVER['HTTP_USER_AGENT'],'Safari'))){
$im='
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="400" height="300"><param name="movie" value="diaporama.swf" />
<param name="flashvars" value="XMLUrl=diaporamaXML.php?id='.$id.'" />
<param name="quality" value="high" />
<param name="loop" value="true" />
		<param name="wmode" value="transparent" />
<param name="allowfullscreen" value="true" />
<embed src="diaporama.swf" wmode="transparent" flashvars="XMLUrl=diaporamaXML.php?id='.$id.'" loop="true" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="400" height="300" allowfullscreen="true">
</embed>
</object>';
 }else{



$im='<object type="application/x-shockwave-flash" width="400" height="300" id="diaporama" align="middle" data="diaporama.swf">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="allowFullScreen" value="false" />
	<param name="FlashVars" value="XMLUrl=diaporamaXML.php?id='.$id.'" />
		<param name="wmode" value="transparent" />
	<param name="movie" value="diaporama.swf" /><param name="menu" value="false" /><param name="quality" value="high" /><param name="scale" value="exactfit" /><param name="bgcolor" value="#ffffff" />	<embed src="diaporama.swf" menu="false" wmode="transparent" quality="high" scale="exactfit" bgcolor="#ffffff" width="400" height="300" name="diaporama" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>';
}
}


$txt="<table border=0 cellspacing=0 cellpadding=3 class=modules_header width=100%><tr><td align=left width=100% >&nbsp;&nbsp;<H1>" .TEXT_PORTFOLIO_BOOK."</H1></td></tr></table>";

$txt.="<table border=0 cellspacing=0 cellpadding=0 class=modules_description width=100%>";
$txt.= "<tr><td width=8>&nbsp;</td><td id='book_presentation' width=100%><div style='float:left;'>".$im."</div>". str_replace('\\','',str_replace(chr(10),'<br>',public_book_info($id,"presentation"))). "</td></tr>";
$txt.= "</table>";
echo $txt;
?>


