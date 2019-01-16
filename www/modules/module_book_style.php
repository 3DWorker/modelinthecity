<?

$id=$_GET[id];

$txt="<table border=0 cellspacing=0 cellpadding=0 class=modules_header width=100% height=8><tr><td align=left width=100%><H4>&nbsp;&nbsp;".TEXT_PORTFOLIO_STYLE."</H4></td></tr></table>";

$txt.="<table border=0 cellspacing=0 cellpadding=3 class=modules_description width=100%><tr><td>";

/*
$style=public_info($id,'style');
$st=split("-",$style);
$a=0;
for($i=0;$i<count($st);$i++){
	if($st[$i]=='on'){$i++;
	$a++;

	if(public_info($id,"categorie")==2){

	$q="SELECT name from `categorie_model_style` where id='".$i."'";

	}elseif(public_info($id,"categorie")==1){

	$q="SELECT name from `categorie_photographer_style` where id='".$i."'";

	}else{$q="";}
connexion();
if($q){
$q1=mysql_query($q);
	while($r=mysql_fetch_array($q1)){
	
	$txt.= $r["name"].", ";
	//if($a==3){$txt.="<br>";$a=0;}
	}	
	}
	}
}
*/

	$style=public_info($id,'style');
$st=split("-",$style);
$l=count($st);
if(public_info($id,'categorie')==2 || public_info($id,'categorie')==6){
if($l<40){$l=40;}
}
if(public_info($id,'categorie')==1){
if($l<46){$l=46;}
}

for($i=0;$i<$l;$i++){
	if($st[$i]=='on'){$s[($i+1)]='<img src="images/checkbox_checked.png" >';}else{$s[($i+1)]='<img src="images/checkbox_notchecked.png">';}
	}

	$txt.="<table width=100% height=50 cellpadding=5 cellspacing=10 border=0 class=modules_style><tr>";



if(public_info($id,'categorie')==2 || public_info($id,'categorie')==6){

if($_SESSION['languages']=="french"){$v="name_fr";}else{$v="name";}

	$q=mysql_query("select ".$v." as name,id from categorie_model_style where 1 order by id ASC");
	$stylename[]=0;
	while($r=mysql_fetch_array($q)){$stylename[]=$r['name'];}	
	
$txt.='
<td width=33% valign=top class=checkstyle>
<b>' .TEXT_FASHION.'</b><br><img src="images/blank.gif" width=100% height=5>
'.$s[1].' '.$stylename[1].'<br>
'.$s[2].' '.$stylename[2].'<br>
'.$s[3].' '.$stylename[3].'<br>
'.$s[4].' '.$stylename[4].'<br>
'.$s[5].' '.$stylename[5].'
</td><td width=33% valign=top class=checkstyle>
<b>' .TEXT_EDITORIAL.'</b><br><img src="images/blank.gif" width=100% height=2>
'.$s[6].' '.$stylename[6].'<br>
'.$s[7].' '.$stylename[7].'<br>
'.$s[8].' '.$stylename[8].'<br>
'.$s[9].' '.$stylename[9].'
</td><td width=33% valign=top class=checkstyle>
<b>' .TEXT_COMMERCIAL.'</b><br><img src="images/blank.gif" width=100% height=5>
'.$s[10].' '.$stylename[10].'<br>
'.$s[11].' '.$stylename[11].'<br>
'.$s[12].' '.$stylename[12].'<br>
'.$s[13].' '.$stylename[13].'<br>
'.$s[14].' '.$stylename[14].'
</td></tr><tr><td valign=top class=checkstyle>
<b>' .TEXT_ADULT_MODELING.'</b><br><img src="images/blank.gif" width=100% height=2>
'.$s[15].' '.$stylename[15].'<br>
'.$s[16].' '.$stylename[16].'<br>
'.$s[17].' '.$stylename[17].'<br>
'.$s[18].' '.$stylename[18].'<br>
<br>
<b>' .TEXT_SPECIALTIES.'</b><br><img src="images/blank.gif" width=100% height=5>
'.$s[19].' '.$stylename[19].'<br>
'.$s[20].' '.$stylename[20].'<br>
'.$s[21].' '.$stylename[21].'<br>
'.$s[22].' '.$stylename[22].'<br><br>

</td><td valign=top class=checkstyle>
<b>' .TEXT_SPECIALTIES.'</b><br><img src="images/blank.gif" width=100% height=5>
'.$s[23].' '.$stylename[23].'<br>
'.$s[24].' '.$stylename[24].'<br>
'.$s[25].' '.$stylename[25].'<br>
'.$s[26].' '.$stylename[26].'<br>
'.$s[27].' '.$stylename[27].'<br>
'.$s[28].' '.$stylename[28].'<br>
'.$s[29].' '.$stylename[29].'<br>
'.$s[30].' '.$stylename[30].'<br>
'.$s[31].' '.$stylename[31].'<br>
'.$s[32].' '.$stylename[32].'<br><br>
</td><td valign=top class=checkstyle>
<b>' .TEXT_PARTS_MODELING.'</b><br><img src="images/blank.gif" width=100% height=5>
'.$s[33].' '.$stylename[33].'<br>
'.$s[34].' '.$stylename[34].'<br>
'.$s[35].' '.$stylename[35].'<br>
'.$s[36].' '.$stylename[36].'<br>
'.$s[37].' '.$stylename[37].'<br>
<br><b>' .TEXT_SKILL.'</b><br><img src="images/blank.gif" width=100% height=5>
'.$s[38].' '.$stylename[38].'<br>
'.$s[39].' '.$stylename[39].'<br>
'.$s[40].' '.$stylename[40].'<br>';


}elseif(public_info($id,'categorie')==1){

if($_SESSION['languages']=="french"){$v="name_fr";}else{$v="name";}
	$q=mysql_query("select ".$v." as name,id from categorie_photographer_style where 1 order by id ASC");
	$stylename[]=0;
	while($r=mysql_fetch_array($q)){$stylename[]=$r['name'];}	

$txt.= '
<td width=33% valign=top class=checkstyle>
<b>' .TEXT_FASHION.'</b><br><img src="images/blank.gif" width=100% height=5>
'.$s[1].'&nbsp;'.$stylename[1].'<br>
'.$s[2].'&nbsp;'.$stylename[2].'<br>
'.$s[3].'&nbsp;'.$stylename[3].'<br>
'.$s[4].'&nbsp;'.$stylename[4].'<br>
'.$s[5].'&nbsp;'.$stylename[5].'
</td>
<td width=33% valign=top class=checkstyle>
<b>' .TEXT_SERVICE.'</b><br><img src="images/blank.gif" width=100% height=5>
'.$s[6].'&nbsp;'.$stylename[6].'<br>
'.$s[7].'&nbsp;'.$stylename[7].'<br>
'.$s[8].'&nbsp;'.$stylename[8].'<br>
'.$s[9].'&nbsp;'.$stylename[9].'<br>
'.$s[10].'&nbsp;'.$stylename[10].'<br>
</td>
<td width=33% valign=top class=checkstyle>
<b>'.TEXT_COMMERCIAL.'</b><br><img src="images/blank.gif" width=100% height=5>
'.$s[11].'&nbsp;'.$stylename[11].'<br>
'.$s[12].'&nbsp;'.$stylename[12].'<br>
'.$s[13].'&nbsp;'.$stylename[13].'<br>
'.$s[14].'&nbsp;'.$stylename[14].'<br>
'.$s[15].'&nbsp;'.$stylename[15].'<br>
'.$s[16].'&nbsp;'.$stylename[16].'
</td></tr><tr>
<td width=33% valign=top class=checkstyle>
<b>' .TEXT_SPECIALTIES.'</b><br><img src="images/blank.gif" width=100% height=5>
'.$s[17].'&nbsp;'.$stylename[17].'<br>
'.$s[18].'&nbsp;'.$stylename[18].'<br>
'.$s[19].'&nbsp;'.$stylename[19].'<br>
'.$s[20].'&nbsp;'.$stylename[20].'<br>
'.$s[21].'&nbsp;'.$stylename[21].'<br>
'.$s[22].'&nbsp;'.$stylename[22].'<br>
'.$s[23].'&nbsp;'.$stylename[23].'<br>
'.$s[24].'&nbsp;'.$stylename[24].'<br>
'.$s[25].'&nbsp;'.$stylename[25].'
</td>
<td width=33% valign=top class=checkstyle>
<b>' .TEXT_SPECIALTIES.'</b><br><img src="images/blank.gif" width=100% height=5>
'.$s[26].'&nbsp;'.$stylename[26].'<br>
'.$s[27].'&nbsp;'.$stylename[27].'<br>
'.$s[28].'&nbsp;'.$stylename[28].'<br>
'.$s[29].'&nbsp;'.$stylename[29].'<br>
'.$s[30].'&nbsp;'.$stylename[30].'<br>
'.$s[31].'&nbsp;'.$stylename[31].'<br>
'.$s[32].'&nbsp;'.$stylename[32].'<br>
'.$s[33].'&nbsp;'.$stylename[33].'
</td>
<td width=33% valign=top class=checkstyle>
<b>' .TEXT_PHOTOGRAPHY.'</b><br><img src="images/blank.gif" width=100% height=5>
'.$s[34].'&nbsp;'.$stylename[34].'<br>
'.$s[35].'&nbsp;'.$stylename[35].'<br>
'.$s[36].'&nbsp;'.$stylename[36].'<br>
'.$s[37].'&nbsp;'.$stylename[37].'<br>
'.$s[41].'&nbsp;'.$stylename[38].'<br>
'.$s[42].'&nbsp;'.$stylename[39].'<br>
'.$s[43].'&nbsp;'.$stylename[40].'<br>
'.$s[44].'&nbsp;'.$stylename[41].'<br>
'.$s[45].'&nbsp;'.$stylename[42].'<br>
'.$s[46].'&nbsp;'.$stylename[43].'
';
}
$txt.="</td></tr></table>";

$txt.="</td></tr></table>";
echo $txt;


?>