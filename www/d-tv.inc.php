<table width=98% border=0  align=center><tr><td align=left valign=top colspan=4><H1><?php echo TEXT_FASHIONTV;?></H1></td></tr>
<tr><td align=left valign=top>
<?

$cat="<table border=0>";
$q=mysql_query("select title,id from tv_categorie where lang='fr' order by id ASC");
while($r=mysql_fetch_array($q)){
$cat.="<tr><td colspan=2><nobr><h1>".$r['title']."</h1></nobr></td></tr>";
$q1=mysql_query("select title, link, host, id from tv where parent_id='".$r['id']."' and valid='1'");
while($r1=mysql_fetch_array($q1)){

$title=str_replace(chr(32),'_',trim($r1[title]));
$title=str_replace('\'','',$title);

if($r1[host]==1){$tube="<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' width='96' height='53' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0'><param name='autoplay' value=true><param name='movie' value='http://www.youtube.com/v/". $r1['link']."'></param><param name='allowScriptAccess' value='always'></param><embed src='http://www.youtube.com/v/".$r1['link']."' type='application/x-shockwave-flash' allowscriptaccess='always' width='96' height='53' wmode='transparent'></embed></object>";
}
elseif($r1[host]==2){$tube="<iframe frameborder='0' width='96' height='53' src='http://www.dailymotion.com/embed/video/". $r1['link']."' onclick='javascript:return false;'></iframe>";}
elseif($r1[host]==0){$tube="<iframe frameborder='0' width='96' height='53' src='". $r1['link']."'></iframe>";}

$cat.="<tr><td>".$tube."</td><td><strong>".$r1[title] . "</strong></td></tr><tr><td colspan=2 align=right valign=top><table width=100% border=0 cellpaddin=0 cellspacing=0 style='margin-top:-5px;'><tr><td width=90%><hr></td><td width=10%><a href='".$location.LINK_FASHIONTV."/".$title."/".$r1[id]."' title=\"".$r1[title] . "\"><img src='".$location."/images/icon_play_video.png' border=0></a></td></tr></table></td></tr>";

}

}
$cat.="</table>";


$tv_id=$_GET['tv_id'];

if(!$tv_id){$tv_id=rand(1,17);}

if($tv_id){
$q2=mysql_query("select title, link, host, presentation from tv where id='".$tv_id."' and valid='1'");
if($r2=mysql_fetch_array($q2)){

if($r2[host]==1){$tube="<div style=\"width:620px;float:left;\"><br><br><div style=\"font-weight:bold;font-size:17px;\">".$r2['title']."</div><br><object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' width='600' height='360' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0'><param name='autoplay' value=true><param name='movie' value='http://www.youtube.com/v/". $r2['link']."&autoplay=1&rel=0'></param><param name='allowScriptAccess' value='always'></param><embed src='http://www.youtube.com/v/".$r2['link']."&autoplay=1&rel=0' type='application/x-shockwave-flash' allowscriptaccess='always' width='600'  height='360' wmode='transparent'></embed></object><br><br><div id='fashionTV_presentation'>". stripslashes(str_replace(chr(10),'<br>', $r2['presentation'])) ."</div></div>";

}elseif($r2[host]==2){$tube="<div style=\"width:620px;float:left;\"><br><br><div style=\"font-weight:bold;font-size:17px;\">".$r2['title']."</div><br>
<iframe frameborder='0' width='600' height='360' src='http://www.dailymotion.com/embed/video/". $r2['link']."'></iframe></div><br>";}
elseif($r2[host]==0){$tube="<div style=\"width:620px;float:left;\"><br><br><div style=\"font-weight:bold;font-size:17px;\">".$r2['title']."</div><br>
<iframe frameborder='0' width='600' height='360' src='". $r2['link']."'></iframe></div><br>";}
}
echo $tube;

}else{
?>
<div style="width:620px;float:left;"><br><br><div style="font-weight:bold;font-size:17px;"></div><br><object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' width='600' height='360' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0'><param name='autoplay' value=true><param name='movie' id="fashionTV_link1"></param><param name='allowScriptAccess' value='always'></param><embed id="fashionTV_link2" type='application/x-shockwave-flash' allowscriptaccess='always' width='600' height='360' wmode="transparent"></embed></object></div>
<?
}
?>
<div style="width:180px;float:left;"><?php echo $cat;?></div>

</td></tr></table>

