<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <!--tr> 
    <td colspan=3> 
	<table cellspacing="10" cellpadding="0"><tr><td>
	<a href="#" onclick="javascript:show_page('signup');" style="cursor:pointer;">
      <table cellspacing=0 cellpadding=0 width=300 border=2 align="left" class="transparent">
        <tr valign=top bordercolor=white> 
          <td valign=top align=center height=40>
            <img src="images/pretty_model_girl.jpg" border=0></a></td><td valign=middle align=center><biG>Welcome Folks !<br><br>Sign up &<br>Create your own book online</big>
          </td></tr>
      </table></a>
	  
	  </td><td>
	  
	        <table cellspacing=0 cellpadding=0 width=300 border=2 align="left" class="transparent">
        <tr valign=top bordercolor=white> 
          <td valign=top align=center height=40> <a href="index.php?page=enregistrement" class=none><a href="index.php?page=enregistrement" class=none><big>Quick Quizz !</big><br><big><i>Are you a model in the city ?</i></big><br><table cellpadding=0 cellspacing=0><tr><td><input type=radio name=quizz>Indeep</td></tr><tr><td><input type=radio name=quizz>No, Sniff ... But I want to be !</td></tr><tr><td><input type=radio name=quizz>Shut up !<br><br></td></tr></table></a>
          </td></tr>
      </table>
	  
	  </td></tr></table>
	  
    </td>
  </tr-->
  <tr>
  <td colspan=3 align=center><div id='start'><strong>ModelinTheCity.com provide new services for the <strong>Models</strong>.<br><h1>Model Portfolios. Meet Professional Models<br>Photographers & Modeling Agencies.</h1><br>Create your <strong>Model portfolio</strong> for free !</div></td></tr>
  <tr> 
    <td colspan=3> 
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
	   
	   </td> <td valign=top align=center height="197">
		<div id=slider>
          <table  cellspacing=1 cellpadding=0 width="95%"  border=0 align="center" vspace="19"><tr>
            <? 
			/*
			    function recursiveDelete($str){
        if(is_file($str)){
            return @unlink($str);
        }
        elseif(is_dir($str)){
            $scan = glob(rtrim($str,'/').'/*');
            foreach($scan as $index=>$path){
                recursiveDelete($path);
            }
            return @rmdir($str);
        }
    }
*/
			
$i=0;
$max=10;
$add=' LIMIT '.($np*$max).','.$max;

// $add='LIMIT 24,12';
mysql_query("SELECT id from book_index where 1 ");
$tot_nb=mysql_affected_rows();

	//$query = "SELECT galerie, count(affichage) as nb FROM photo WHERE porn!=2 GROUP BY `galerie` ORDER BY count(affichage) DESC $add";// ORDER BY compteur DESC 
	
	$query = "SELECT id from book_index WHERE id!='' and vip='1' order by rand() limit 5";//$add
	$result = mysql_query($query);
    $nb = mysql_affected_rows();
	$a=0;
	while($r=mysql_fetch_array($result)) {$a++;
		//$idph = str_replace("X","",$r["galerie"]);
		 $idph=$r[id];

		
		$q1=mysql_query("select d.pseudo, d.compteur,dd.name, d.ville,d.pays,ddd.countries_name, ddd.countries_iso_code_2 from galerie d, categorie dd, countries ddd where d.id='$idph' and dd.id=d.categorie AND ddd.countries_iso_code_2=d.pays");
		
		if($r1=mysql_fetch_array($q1)) {
		$pseudo=ucfirst(strtolower($r1[pseudo]));
		$count=$r1[compteur];
		$categorie="<strong>" . ucfirst($r1[name]) ."</strong>";
		$country=ucfirst($r1['countries_name']);
		$city=ucfirst($r1['ville']);
		$flag="<img src='images/flags/small/". strtolower($r1['countries_iso_code_2']).".png'>";
		}
		
		$i++;
		
		//echo $idph."<BR>";
		
		$query3 = "SELECT photo FROM book_index WHERE id='$idph' LIMIT 1";
		$result3 = mysql_query($query3);
		$r3 = mysql_fetch_array($result3);
		$nomp = $r3["photo"];

		//echo $nomp."<BR>";
	//$nomp = "./TMP/$nomp"; 
	$nomp = "./galerie/$idph/index/".str_replace('.jpg','_small.jpg',$nomp); 
		{
			
			
	
			if(file_exists($nomp) && $nomp!="//" && $nomp!="" && $nomp!= "./TMP/") {


print"<td align=center valign=middle width=65><a href='http://www.modelinthecity.com/".$idph."' target='_self' onmouseover='document.getElementById(\"desc_".$a."\").style.visibility=\"visible\";' onmouseout='document.getElementById(\"desc_".$a."\").style.visibility=\"hidden\";'><img id='pic' src=\"$nomp\"  border=1 vspace=7 hspace=7><br><div class=desc id='desc_".$a."'><b>$categorie<br>in $city, <br><b>$country</b><br>$flag</b></div></a></td>";

if($i==$max/2){echo "</tr><tr>";$i=0;}

			}else{echo "Sorry an error occured $idph<br>";

			//recursiveDelete("./galerie/".$idph."/");
			//mysql_query("delete from photo where galerie='X$idph'");
			}
			
		} 
?> <?
	} 

?> 
          </table></div><br>
		  <div id=welcome>CREATE YOUR <strong>MODEL PORTFOLIO</STRONG><br><br><center><a href="#" onclick="location.href='index.php?page=signup';"><div class=button_blue><font color=white>SIGN UP</font></div></a> <br>IT'S TOTALLY FREE !!!</center></div>
        </td><td>
		<?php 
		////button newt
		if($tot_nb>$max){echo '<a href="index.php?np='. ($np+1) .'"><img src="images/button_right.png" border=0></A>';}
		?>
		</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td valign=top align=center width=33%><br>&nbsp;</td><td align=center width=50%>
	  <table cellspacing=5 cellpadding=2 width=100%  border=0 align="center"><tr>
       <td>
	   
	   <? if($np>0) {
	   ?>
	   <a href="index.php?np=<?php echo $np-1;?>"><img src="images/button_left.png" border=0></A>
	   <?}
	   ?>
	   
	   </td> <td valign=top align=center height="197">
		<div id=slider>
          <table  cellspacing=1 cellpadding=0 width="95%"  border=0 align="center" vspace="19"><tr>
            <? 
			/*
			    function recursiveDelete($str){
        if(is_file($str)){
            return @unlink($str);
        }
        elseif(is_dir($str)){
            $scan = glob(rtrim($str,'/').'/*');
            foreach($scan as $index=>$path){
                recursiveDelete($path);
            }
            return @rmdir($str);
        }
    }
*/
			
$i=0;
$max=10;
$add=' LIMIT '.($np*$max).','.$max;

// $add='LIMIT 24,12';
mysql_query("SELECT id from book_index where 1 ");
$tot_nb=mysql_affected_rows();

	//$query = "SELECT galerie, count(affichage) as nb FROM photo WHERE porn!=2 GROUP BY `galerie` ORDER BY count(affichage) DESC $add";// ORDER BY compteur DESC 
	
	$query = "SELECT id from book_index WHERE id!='' and vip='1' order by rand() limit 5";//$add
	$result = mysql_query($query);
    $nb = mysql_affected_rows();
	$a=0;
	while($r=mysql_fetch_array($result)) {$a++;
		//$idph = str_replace("X","",$r["galerie"]);
		 $idph=$r[id];

		
		$q1=mysql_query("select d.pseudo, d.compteur,dd.name, d.ville,d.pays,ddd.countries_name, ddd.countries_iso_code_2 from galerie d, categorie dd, countries ddd where d.id='$idph' and dd.id=d.categorie AND ddd.countries_iso_code_2=d.pays");
		
		if($r1=mysql_fetch_array($q1)) {
		$pseudo=ucfirst(strtolower($r1[pseudo]));
		$count=$r1[compteur];
		$categorie="<strong>" . ucfirst($r1[name]) ."</strong>";
		$country=ucfirst($r1['countries_name']);
		$city=ucfirst($r1['ville']);
		$flag="<img src='images/flags/small/". strtolower($r1['countries_iso_code_2']).".png'>";
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


print"<td align=center valign=middle width=65><a href='http://www.modelinthecity.com/".$idph."' target='_self' onmouseover='document.getElementById(\"desc".$a."\").style.visibility=\"visible\";' onmouseout='document.getElementById(\"desc".$a."\").style.visibility=\"hidden\";'><img id='pic' src=\"$nomp\"  border=1 vspace=7 hspace=7><br><div class=desc id='desc".$a."'><b>$categorie<br>in $city, <br><b>$country</b><br>$flag</b></div></a></td>";

if($i==$max/2){echo "</tr><tr>";$i=0;}

			}else{echo "Sorry an error occured $idph<br>";

			//recursiveDelete("./galerie/".$idph."/");
			//mysql_query("delete from photo where galerie='X$idph'");
			}			
		} 
	} 

?> 
          </table></div></td></tr>
		    <tr>
  <td colspan=3 align=center><div id=welcome1><h2>Professional portfolios for Models  Photographers  Stylists  Make-up  Stylists  Modeling Agencies.</h2><br>Create your professional <strong>model portfolio</strong> for free !<br>Receive notification about a <strong>casting</strong> you found or proposed.<br>Find a Paid Work</div></td></tr>
  </table>



    </td>
	<td width=25% valign=top>&nbsp;</td>
  </tr>
</table>
<?php
/*
<script>
 var x= document.getElementById('start').width;
document.write('<div align=right style="position:absolute;left:'+x+200+'px;top:170px;"><img src="images/grand-opening.png"></div>');
</script>
*/
?>
