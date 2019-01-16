<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td colspan=3 align=center><div id='start'><?php echo TEXT_INTRO;?></div></td></tr>
  <tr><td colspan=3>
	<?
	if(!$_GET[np]){$np=0;}
if($np<=0 || $np>25){$np=0;}
	?>
      <table cellspacing=5 cellpadding=2 width=100%  border=0 align="center"><tr>
       <td>	   
	   <? if($np>0) {
	   ?>
	   <a href="index.php?np=<?php echo $np-1;?>"><img src="images/button_left.png" border=0></A>
	   <?}
	   ?>	   
	   </td><td valign=top align=center height="197"><div id=slider><table  cellspacing=1 cellpadding=0 width="95%"  border=0 align="center" vspace="19"><tr>
            <? 
			
$i=0;
$max=10;
$add=' LIMIT '.($np*$max).','.$max;

// $add='LIMIT 24,12';
mysql_query("SELECT d.id from book_index d, galerie dd where d.id=dd.id and dd.valid='1'");
$tot_nb=mysql_affected_rows();

	//$query = "SELECT galerie, count(affichage) as nb FROM photo WHERE porn!=2 GROUP BY `galerie` ORDER BY count(affichage) DESC $add";// ORDER BY compteur DESC 
	
	$query = "SELECT d.id from book_index d, galerie dd WHERE d.id!='' and d.vip='1' and d.id=dd.id and dd.valid='1' order by rand() limit 10";//$add
	$result = mysql_query($query);
    $nb = mysql_affected_rows();
	$a=0;
	while($r=mysql_fetch_array($result)) {$a++;
		//$idph = str_replace("X","",$r["galerie"]);
		 $idph=$r[id];

		
		$q1=mysql_query("select d.pseudo, d.compteur, dd.name, dd.lien, d.ville,d.pays,ddd.countries_name, ddd.countries_iso_code_2 from galerie d, categorie dd, countries ddd where d.id='$idph' and dd.id=d.categorie AND ddd.countries_iso_code_2=d.pays");
		
		if($r1=mysql_fetch_array($q1)) {
		$pseudo=ucfirst(strtolower($r1[pseudo]));
		$count=$r1[compteur];
		$categorie="<strong>" . ucfirst($r1[name]) ."</strong>";
		$country=ucfirst($r1['countries_name']);
		$city=ucfirst($r1['ville']);
		$flag="<img src='images/flags/small/". strtolower($r1['countries_iso_code_2']).".png'>";
		$lien=$r1['lien'];
	if(!$lien){$lien=$idph;}
		}
		
		$i++;
		
		//echo $idph."<BR>";
		
		$query3 = "SELECT photo FROM book_index WHERE id='$idph' LIMIT 1";
		$result3 = mysql_query($query3);
		$r3 = mysql_fetch_array($result3);
		$nomp = $r3["photo"];
	$nomp = "./galerie/$idph/index/".str_replace('.jpg','_small.jpg',$nomp); 
		{	
			if(file_exists($nomp) && $nomp!="//" && $nomp!="" && $nomp!= "./TMP/") {
print"<td align=center valign=middle width=65><a href='http://www.modelinthecity.com/".$idph."' target='_self' onmouseover='document.getElementById(\"desc_".$a."\").style.visibility=\"visible\";' onmouseout='document.getElementById(\"desc_".$a."\").style.visibility=\"hidden\";'><img id='pic' src=\"$nomp\"  border=1 vspace=7 hspace=7><br><div class=desc id='desc_".$a."'><b>".public_book_info($idph,'category_name')."</b><br>".ucfirst(strtolower($city)).", <br><b>$country</b><br>$flag</b></div></a></td>";

if($i==$max/2 && $si!=1){ $si=1;echo "</tr>
<tr><td colspan=".($max/2)."><div id=welcome>".TEXT_INTRO_MIDDLE."</div></td></tr>
<tr>";$i=0;}

			}else{echo "Sorry an error occured $idph<br>";	}			
		} 
	} 
?>
</table></div>

</td><td>
		<?php 
		////button newt
		if($nb>$max){echo '<a href="index.php?np='. ($np+1) .'"><img src="images/button_right.png" border=0></A>';}
		?>
		</td></tr></table></td></tr>
		
		<tr><td valign=top align=center width=33%>&nbsp;</td><td align=center width=50%>
	  <table cellspacing=5 cellpadding=2 width=100%  border=0 align="center"><tr><td>	   
	   <? if($np>0) {
	   ?>
	   <a href="index.php?np=<?php echo $np-1;?>"><img src="images/button_left.png" border=0></A>
	   <?}
	   ?>	   
	   </td> </tr><tr><td colspan=3 align=center><div id=welcome1><?php echo INTRO_BOTTOM;?></div></td></tr>
  </table></td><td width=25% valign=top>&nbsp;</td></tr></table>
<?php
/*
<script>
 var x= document.getElementById('start').width;
document.write('<div align=right style="position:absolute;left:'+x+200+'px;top:170px;"><img src="images/grand-opening.png"></div>');
</script>
*/
?>