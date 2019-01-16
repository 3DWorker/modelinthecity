<table width="860" border="0" cellspacing="0" cellpadding="0"><tr><td align=center width=100% valign=top>
      <table id=index cellspacing=10 cellpadding=2 width=100%  border=0 align="center" valign=top><tr>
       <td align=center width=180 valign=top height=50%><br><big><b><?php echo TEXT_WALL;?></b></big><br><br><?php echo show_cat(1, LINK_WALL);?><br><br><?php echo TEXT_INDEX_BLOG;?>
	   <br><a href="<?php echo $location.LINK_WALL;?>">>>Plus d'infos</a>
	   </td><td align=center rowspan=2 valign=top><div id='start'><?php echo TEXT_INTRO_END;?></div><br>
	   <table  cellspacing=0 cellpadding=0 width="95%"  border=0 align="center"><tr>
            <? 
		// error_reporting(-1);	
	
	$query = mysql_query("SELECT d.id from book_index d, galerie dd WHERE d.id!='' and d.id=dd.id and dd.valid='1' and dd.categorie='2' order by rand() limit 10");
	while($r=mysql_fetch_array($query )) { $idph[]=$r[id];}
		$query = mysql_query("SELECT d.id from book_index d, galerie dd WHERE d.id!='' and d.id=dd.id and dd.valid='1' and dd.categorie='1' order by rand() limit 6");
	while($r=mysql_fetch_array($query )) { $idph[]=$r[id];}
		$query = mysql_query("SELECT d.id from book_index d, galerie dd WHERE d.id!='' and d.id=dd.id and dd.valid='1' and dd.categorie='3' order by rand() limit 5");
	while($r=mysql_fetch_array($query )) { $idph[]=$r[id];}
		$query = mysql_query("SELECT d.id from book_index d, galerie dd WHERE d.id!='' and d.id=dd.id and dd.valid='1' and dd.categorie='4' order by rand() limit 4");
	while($r=mysql_fetch_array($query )) { $idph[]=$r[id];}
	echo mysql_error();
	$i=0;
	for($a=0;$a<count($idph);$a++){ 	$i++;
		
		$q1=mysql_query("select d.pseudo, d.compteur, dd.name, dd.lien, d.ville,d.pays,ddd.countries_name, ddd.countries_iso_code_2 from galerie d, categorie dd, countries ddd where d.id='".$idph[$a]."' and dd.id=d.categorie AND ddd.countries_iso_code_2=d.pays");
		
		if($r1=mysql_fetch_array($q1)) {
		$pseudo=ucfirst(strtolower($r1[pseudo]));
		$count=$r1[compteur];
		$categorie="<strong>" . ucfirst($r1[name]) ."</strong>";
		$country=ucfirst($r1['countries_name']);
		$city=ucfirst($r1['ville']);
		$flag="<img src='images/flags/small/". strtolower($r1['countries_iso_code_2']).".png' border=0>";
		$lien=$r1['lien'];
	if(!$lien){$lien=$idph[$a];}
		}
		$query3 = "SELECT photo FROM book_index WHERE id='$idph[$a]' LIMIT 1";
		$result3 = mysql_query($query3);
		$r3 = mysql_fetch_array($result3);
		$nomp = $r3["photo"];
	$nomp = "./galerie/".$idph[$a]."/index/".str_replace('.jpg','_small.jpg',$nomp); 
		{	
			if(file_exists($nomp) && $nomp!="//" && $nomp!="" && $nomp!= "./TMP/") {
echo "<td align=center valign=middle><a href='http://www.modelinthecity.com/".TEXT_PORTFOLIO."' target='_self' onmouseover='document.getElementById(\"desc_".$a."\").style.visibility=\"visible\";' onmouseout='document.getElementById(\"desc_".$a."\").style.visibility=\"hidden\";'><img id='pic' src=\"$nomp\"  border=1 vspace=0 hspace=0 width=90 height=116><br><div class=desc id='desc_".$a."'><b>".TEXT_PORTFOLIO."<br>".public_book_info($idph[$a],'category_name')."</b><br>".ucfirst(strtolower($city)).", <br><b>$country</b><br>$flag</b></div></a></td>";

//if($i==$max/2 && $si!=1){ $si=1;echo "</tr><tr><td colspan=".($max/2)."><div id=welcome>".TEXT_INTRO_MIDDLE."</div></td></tr><tr>";$i=0;}
if($i==5){echo "</tr><tr>";$i=0;}
			}else{echo "Sorry an error occured ".$idph[$a]."<br>";	}		
		}
	}	echo mysql_error();
?>
</table>
	   <br><div id='start'><?php echo TEXT_INTRO;?></div><br><center><a  href="#" onclick="location.href='<?php echo $location;?>index.php?page=signup';"><div id="button_subscribe"><?php echo TEXT_SIGNUP;?></div></a></center>
	   </td><td align=center width=180 valign=top><br><big><b><?php echo TEXT_LOOK;?></b></big><br><br><?php echo show_cat(3,LINK_LOOK);?><br><?php echo TEXT_INDEX_MODELINTHECITY;?><br><a href="<?php echo $location.LINK_LOOK;?>">>>Plus d'infos</a></td> </tr>
	   <td valign=top height=50%><br><big><b><?php echo TEXT_WHATS_UP_IN_MY_CITY;?></b></big><br><br><?php echo show_cat(2,LINK_WHATS_UP_IN_MY_CITY);?><br>Paris New York Москва Milano London<br><a href="<?php echo $location.LINK_WHATS_UP_IN_MY_CITY;?>">>>Plus d'infos</a>
	   </td><td valign=top><br><big><b><?php echo TEXT_FASHIONTV;?></b></big><br><br>
	   <?
	   /*
	   <object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' width='147' height='117' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0'>
<param name='autoplay' value=true></param>
<param name='loop' value=1></param>
<param name='movie' value='http://www.youtube.com/v/p_Oi5YT9LMk?autoplay=1&rel=0&fs=1&loop=1&fs=1&sound=0'></param>
<param name="showinfo" value=0></param>
<param name='allowScriptAccess' value='always'></param>
<embed src='http://www.youtube.com/v/p_Oi5YT9LMk?autoplay=1&rel=0&fs=1&loop=1&sound=0' type='application/x-shockwave-flash' allowscriptaccess='always' width='147'  height='117' wmode='transparent' allowfullscreen="true"></embed></object>
*/
?>
<a href="<?php echo $location.LINK_FASHIONTV;?>"><img src="<?php echo $location."images/fashionTV.gif";?>" border=0></a>
<br><br><?php echo TEXT_INDEX_TV;?>
<br><br><a href="<?php echo $location.LINK_FASHIONTV;?>">>>Plus d'infos</a></td>

</tr></table>

</td></tr></table>
<?php

function show_cat($id,$link){

if($id==4){$w=147;$h=77;}else{$w=150;$h=210;}

 if(is_integer(strpos($_SERVER['HTTP_USER_AGENT'],'Safari'))){
$im='
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="'.$w.'" height="'.$h.'"><param name="movie" value="index_categories.swf" />
<param name="flashvars" value="XMLUrl=indexXML.php?id='.$id.'&clink='.$link.'" />
<param name="quality" value="high" />
<param name="loop" value="true" />
		<param name="wmode" value="transparent" />
<param name="allowfullscreen" value="true" />
<embed src="index_categories.swf" wmode="transparent" flashvars="XMLUrl=indexXML.php?id='.$id.'&clink='.$link.'" loop="true" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="'.$w.'" height="'.$h.'" allowfullscreen="true">
</embed>
</object>';
 }else{
$im='<object type="application/x-shockwave-flash" width="'.$w.'" height="'.$h.'" id="gallery" align="middle" data="index_categories.swf">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="allowFullScreen" value="false" />
	<param name="FlashVars" value="XMLUrl=indexXML.php?id='.$id.'&clink='.$link.'" />
		<param name="wmode" value="transparent" />
	<param name="movie" value="index_categories.swf" /><param name="menu" value="false" /><param name="quality" value="high" /><param name="scale" value="exactfit" /><param name="bgcolor" value="#ffffff" />	<embed src="index_categories.swf" menu="false" wmode="transparent" quality="high" scale="exactfit" bgcolor="#ffffff" width="'.$w.'" height="'.$h.'" name="gallery" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>';
}
return $im;
}