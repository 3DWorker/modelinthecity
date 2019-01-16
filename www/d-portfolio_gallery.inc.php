 <br><br><table cellspacing=0 cellpadding=0 border=0 bgcolor="#f6f6f6" width=98% align=center><tr><td>
	   
	   <div id=slider>
	   <table  cellspacing=0 cellpadding=0 width="170" border=0 align="center" valign=top>	   
	   <tr><td valign=top><h1><?php echo MODELS;?></h1><br><br></td></tr>
<tr><td width=25%>
<?

$id=2;
 if(is_integer(strpos($_SERVER['HTTP_USER_AGENT'],'Safari'))){
$im='
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="120" height="170"><param name="movie" value="gallery.swf" />
<param name="flashvars" value="XMLUrl=galleryXML.php?id='.$id.'" />
<param name="quality" value="high" />
<param name="loop" value="true" />
		<param name="wmode" value="transparent" />
<param name="allowfullscreen" value="true" />
<embed src="gallery.swf" wmode="transparent" flashvars="XMLUrl=galleryXML.php?id='.$id.'" loop="true" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="120" height="170" allowfullscreen="true">
</embed>
</object>';
 }else{
$im='<object type="application/x-shockwave-flash" width="120" height="170" id="gallery" align="middle" data="gallery.swf">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="allowFullScreen" value="false" />
	<param name="FlashVars" value="XMLUrl=galleryXML.php?id='.$id.'" />
		<param name="wmode" value="transparent" />
	<param name="movie" value="gallery.swf" /><param name="menu" value="false" /><param name="quality" value="high" /><param name="scale" value="exactfit" /><param name="bgcolor" value="#ffffff" />	<embed src="gallery.swf" menu="false" wmode="transparent" quality="high" scale="exactfit" bgcolor="#ffffff" width="120" height="170" name="gallery" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>';
}
echo $im;
?>
</td></tr>
<tr><td colspan=5 align=right><br><strong><a href="<?php echo LINK_MODELS;?>"><?php printf(TEXT_VISITING_GALLERY,MODELS);?></a></strong></td></tr>
</table></div>

</td><td valign=top>
   <div id=slider>
 <table  cellspacing=0 cellpadding=0 width="170"  border=0 align="center">	   
	   <tr><td valign=top><h1><?php echo PHOTOGRAPHERS;?></h1><br><br></td></tr>
<tr><td>
<?
$id=1;
 if(is_integer(strpos($_SERVER['HTTP_USER_AGENT'],'Safari'))){
$im='
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="120" height="170"><param name="movie" value="gallery.swf" />
<param name="flashvars" value="XMLUrl=galleryXML.php?id='.$id.'" />
<param name="quality" value="high" />
<param name="loop" value="true" />
		<param name="wmode" value="transparent" />
<param name="allowfullscreen" value="true" />
<embed src="gallery.swf" wmode="transparent" flashvars="XMLUrl=galleryXML.php?id='.$id.'" loop="true" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="120" height="170" allowfullscreen="true">
</embed>
</object>';
 }else{
$im='<object type="application/x-shockwave-flash" width="120" height="170" id="gallery" align="middle" data="gallery.swf">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="allowFullScreen" value="false" />
	<param name="FlashVars" value="XMLUrl=galleryXML.php?id='.$id.'" />
		<param name="wmode" value="transparent" />
	<param name="movie" value="gallery.swf" /><param name="menu" value="false" /><param name="quality" value="high" /><param name="scale" value="exactfit" /><param name="bgcolor" value="#ffffff" />	<embed src="gallery.swf" menu="false" wmode="transparent" quality="high" scale="exactfit" bgcolor="#ffffff" width="120" height="170" name="gallery" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>';
}
echo $im;
?>
</td></tr>
<tr><td colspan=5 align=right><br><strong><a href="<?php echo LINK_PHOTOGRAPHERS;?>"><?php printf(TEXT_VISITING_GALLERY,PHOTOGRAPHERS);?></a></strong></td></tr>
</table></div>

</td><td valign=top>
   <div id=slider>
	   <table  cellspacing=0 cellpadding=0 width="170"  border=0 align="center">	   
	   <tr><td  align=top><h1><?php echo MAKEUP_ARTISTS;?></h1><br><br></td></tr>
<tr><td>
<?
$id=3;
 if(is_integer(strpos($_SERVER['HTTP_USER_AGENT'],'Safari'))){
$im='
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="120" height="170"><param name="movie" value="gallery.swf" />
<param name="flashvars" value="XMLUrl=galleryXML.php?id='.$id.'" />
<param name="quality" value="high" />
<param name="loop" value="true" />
		<param name="wmode" value="transparent" />
<param name="allowfullscreen" value="true" />
<embed src="gallery.swf" wmode="transparent" flashvars="XMLUrl=galleryXML.php?id='.$id.'" loop="true" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="120" height="170" allowfullscreen="true">
</embed>
</object>';
 }else{
$im='<object type="application/x-shockwave-flash" width="120" height="170" id="gallery" align="middle" data="gallery.swf">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="allowFullScreen" value="false" />
	<param name="FlashVars" value="XMLUrl=galleryXML.php?id='.$id.'" />
		<param name="wmode" value="transparent" />
	<param name="movie" value="gallery.swf" /><param name="menu" value="false" /><param name="quality" value="high" /><param name="scale" value="exactfit" /><param name="bgcolor" value="#ffffff" />	<embed src="gallery.swf" menu="false" wmode="transparent" quality="high" scale="exactfit" bgcolor="#ffffff" width="120" height="170" name="gallery" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>';
}
echo $im;
?>
</td></tr>
<tr><td colspan=3 align=right><br><strong><a href="<?php echo LINK_MUA;?>"><?php printf(TEXT_VISITING_GALLERY,MAKEUP_ARTISTS);?></a></strong></td></tr>
</table></div>
</td><td valign=top>
   <div id=slider>
	   <table  cellspacing=0 cellpadding=0 width="170"  border=0 align="center">	   
	   <tr><td valign=top><h1><?php echo HAIRDRESSERS;?></h1><br><br></td></tr>
<tr><td>
<?
$id=4;
 if(is_integer(strpos($_SERVER['HTTP_USER_AGENT'],'Safari'))){
$im='
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="120" height="170"><param name="movie" value="gallery.swf" />
<param name="flashvars" value="XMLUrl=galleryXML.php?id='.$id.'" />
<param name="quality" value="high" />
<param name="loop" value="true" />
		<param name="wmode" value="transparent" />
<param name="allowfullscreen" value="true" />
<embed src="gallery.swf" wmode="transparent" flashvars="XMLUrl=galleryXML.php?id='.$id.'" loop="true" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="120" height="170" allowfullscreen="true">
</embed>
</object>';
 }else{
$im='<object type="application/x-shockwave-flash" width="120" height="170" id="gallery" align="middle" data="gallery.swf">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="allowFullScreen" value="false" />
	<param name="FlashVars" value="XMLUrl=galleryXML.php?id='.$id.'" />
		<param name="wmode" value="transparent" />
	<param name="movie" value="gallery.swf" /><param name="menu" value="false" /><param name="quality" value="high" /><param name="scale" value="exactfit" /><param name="bgcolor" value="#ffffff" />	<embed src="gallery.swf" menu="false" wmode="transparent" quality="high" scale="exactfit" bgcolor="#ffffff" width="120" height="170" name="gallery" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>';
}
echo $im;
?>
</td></tr>
<tr><td colspan=3 align=right><br><strong><a href="<?php echo LINK_HAIRDRESSER;?>"><?php printf(TEXT_VISITING_GALLERY,HAIRDRESSERS);?></a></strong></td></tr>
</table></div>
</td><td valign=top>
   <div id=slider>
	   <table  cellspacing=0 cellpadding=0 width="170"  border=0 align="center" vspace="19">	   
	   <tr><td valign=top><h1><?php echo DESIGNERS;?></h1><br><br></td></tr>
<tr><td>
<?
$id=7;
 if(is_integer(strpos($_SERVER['HTTP_USER_AGENT'],'Safari'))){
$im='
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="120" height="170"><param name="movie" value="gallery.swf" />
<param name="flashvars" value="XMLUrl=galleryXML.php?id='.$id.'" />
<param name="quality" value="high" />
<param name="loop" value="true" />
		<param name="wmode" value="transparent" />
<param name="allowfullscreen" value="true" />
<embed src="gallery.swf" wmode="transparent" flashvars="XMLUrl=galleryXML.php?id='.$id.'" loop="true" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="120" height="170" allowfullscreen="true">
</embed>
</object>';
 }else{
$im='<object type="application/x-shockwave-flash" width="120" height="170" id="gallery" align="middle" data="gallery.swf">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="allowFullScreen" value="false" />
	<param name="FlashVars" value="XMLUrl=galleryXML.php?id='.$id.'" />
		<param name="wmode" value="transparent" />
	<param name="movie" value="gallery.swf" /><param name="menu" value="false" /><param name="quality" value="high" /><param name="scale" value="exactfit" /><param name="bgcolor" value="#ffffff" />	<embed src="gallery.swf" menu="false" wmode="transparent" quality="high" scale="exactfit" bgcolor="#ffffff" width="120" height="170" name="gallery" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>';
}
echo $im;
?>
</td></tr>
<tr><td colspan=3 align=right><br><strong><a href="<?php echo LINK_DESIGNERS;?>"><?php printf(TEXT_VISITING_GALLERY,DESIGNERS);?></a></strong></td></tr>
</table></div>
</td></tr><tr><td colspan=5 align=center><br><br><div id=welcome1><?php echo INTRO_BOTTOM;?></div></td></tr>
</table>

