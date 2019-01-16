<?
$rub="galerie";
$congratulation="";
session_start();
if($_SESSION["modelinthecity"]){}else{exit;}
if($_SESSION['languages']=="french"){$v="name_fr";}else{$v="name";}

	
mysql_query("select * from account_approval where member_id='".$_SESSION['modelinthecity']."' and email='sent'");
if(mysql_affected_rows()<1){

$categorie=$_POST['categorie'];
$eyes=$_POST['eyes'];
$hair=$_POST['hair'];
$hauteur=$_POST['hauteur'];
$poitrine=$_POST['poitrine'];
$taille=$_POST['taille'];
$hanche=$_POST['hanche'];
$pointures=$_POST['pointures'];
$hair_style=$_POST['hair_style'];


if ($_POST['submiter']=="Enregistrer") {



$style="";
for($i=1;$i<49;$i++){
$style.=$_POST['a'][$i]."-";
}
//echo $style;
	$verif="OK";


	// Verification des champs



	if(!$categorie) {$verif="STOP"; $mess.="category, "; }


	if($categorie==2){
if(!$eyes) {$verif="STOP"; $mess.="Eyes, ";}
if(!$hair) {$verif="STOP"; $mess.="Hair, ";}
if(!$hauteur) {$verif="STOP"; $mess.="Height, ";}
if(!$poitrine) {$verif="STOP";$mess.="Bust, "; }
if(!$taille) {$verif="STOP"; $mess.="waist, ";}
if(!$hanche) {$verif="STOP"; $mess.="Hips, ";}
if(!$pointures) {$verif="STOP"; $mess.="Shoes, ";}
if(!$hair_style) {$verif="STOP"; $mess.="Hair length, ";}

	}
	
	if($verif!="STOP") {
	
	
	//echo "<table cellspacing=0 cellpadding=0 width=107% height=10><tr><td class=info>vous avez modifié votre inscription</td></tr></table>";$ff="ok";
		
				   
		connexion();
		$query1 = "UPDATE galerie SET categorie='$categorie',style='$style', hauteur='$hauteur',poitrine='$poitrine',taille='$taille',hanche='$hanche',cheveux='$hair',confection='$dress',pointures='$pointures',yeux='$eyes',hair_style='$hair_style' WHERE id='$_SESSION[modelinthecity]'";
		mysql_query ($query1);
	
	
//$congratulation= "Your informations have been updated";


}
}else{


$categorie=public_info($_SESSION[modelinthecity],'categorie');
$hair=public_info($_SESSION[modelinthecity],'hair');
$eyes=public_info($_SESSION[modelinthecity],'eyes');

$hauteur=public_info($_SESSION[modelinthecity],'hauteur');
$pointures=public_info($_SESSION[modelinthecity],'pointures');
$hanche=public_info($_SESSION[modelinthecity],'hanche');
$taille=public_info($_SESSION[modelinthecity],'taille');
$poitrine=public_info($_SESSION[modelinthecity],'poitrine');
$hair_style=public_info($_SESSION[modelinthecity],'hair_style');
}


?>	
<form action="index.php?page=admin_portfolio_style" method="POST" enctype="multipart/form-data" target="_self">
	<input type=hidden name="hair" value="<?php echo $hair;?>">
		<input type=hidden name="eyes" value="<?php echo $eyes;?>">
			<input type=hidden name="hauteur" value="<?php echo $hauteur;?>">
				<input type=hidden name="pointures" value="<?php echo $pointures;?>">
					<input type=hidden name="hanche" value="<?php echo $hanche;?>">
						<input type=hidden name="taille" value="<?php echo $taille;?>">
							<input type=hidden name="poitrine" value="<?php echo $poitrine;?>">
								<input type=hidden name="hair_style" value="<?php echo $hair_style;?>">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class=admin_table><tr><td colspan=2>
<table width="100%" border="0" cellspacing="0" cellpadding="7">
        <tr> <td colspan=2 <?
	
	if ($verif=="STOP") {$mess=substr($mess,0,strlen($mess)-2);
		print("class=error>All field are required : $mess.");
	}else{echo ">".$congratulation;}
	
	?></td></TR><tr><td align=center><b><?php echo TEXT_SELECT." ". TEXT_CATEGORY;?> : </b> 
	<?php
		$option="<select name='categorie' onchange='javascript:submit();'><option value=0>".TEXT_SELECT." ". TEXT_CATEGORY."</option>";
				
	$q=mysql_query("select ".$v." as name,id from categorie where valid=1 order by ordre ASC");
	while($r=mysql_fetch_array($q)){
	if($categorie==$r[id]){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$r[id]."'$sel>".$r[name]."</option>";
		}		$option.="</select>";
	echo $option;
	?>
</td>
	</tr>
	<? if ($categorie==2 || $categorie==6) { ?>
<tr id=admin_table_info><td colspan=2 align=center><font color=white><?php echo TEXT_MEASURMENT;?></font></td></tr>
<tr id="admin_table_info_in"><td  width=770 align=left"><table cellspacing="2" cellpadding="3" border="0" width="760">
	<tr><td><?php echo TEXT_HEIGHT;?></TD><TD>&nbsp;
	
	<?php
		$option="<select name='hauteur' onchange='javascript:submit();'><option value=0>Select your size</option>";
					
	$q=mysql_query("select name,id from categorie_model_height where 1 order by id ASC");
	while($r=mysql_fetch_array($q)){
	if($hauteur==$r[id]){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$r[id]."'$sel>".$r[name]."</option>";
		}		$option.="</select>";
	echo $option;
	?>
	
	</TD><td><?php echo TEXT_BUST;?></TD><TD>&nbsp;
	
		<?php
		$option="<select name='poitrine' onchange='javascript:submit();'><option value=0>Select your size</option>";

	$q=mysql_query("select name,id from categorie_model_bust where 1 order by id ASC");
	while($r=mysql_fetch_array($q)){
	if($poitrine==$r[id]){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$r[id]."'$sel>".$r[name]."</option>";
		}		$option.="</select>";
	echo $option;
	?>
	
	</TD>
	</TR>
	<tr>
	<TD><?php echo TEXT_WAIST;?></TD><TD>&nbsp;	
	<?php
		$option="<select name='taille' onchange='javascript:submit();'><option value=0>Select your size</option>";

	$q=mysql_query("select name,id from categorie_model_waist where 1 order by id ASC");
	while($r=mysql_fetch_array($q)){
	if($taille==$r[id]){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$r[id]."'$sel>".$r[name]."</option>";
		}		$option.="</select>";
	echo $option;
	?>
	</TD><td><?php echo TEXT_HIPS;?></TD><TD>&nbsp;
				<?php
		$option="<select name='hanche' onchange='javascript:submit();'><option value=0>Select your size</option>";

	$q=mysql_query("select name,id from categorie_model_hips where 1 order by id ASC");
	while($r=mysql_fetch_array($q)){
	if($hanche==$r[id]){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$r[id]."'$sel>".$r[name]."</option>";
		}		$option.="</select>";
	echo $option;
	?>
	
	</TD></TR>
		<tr><TD><?php echo TEXT_SHOES;?></TD><TD>&nbsp;
						<?php
		$option="<select name='pointures' onchange='javascript:submit();'><option value=0>Select your size</option>";

	$q=mysql_query("select name,id from categorie_model_shoes where 1 order by id ASC");
	while($r=mysql_fetch_array($q)){
	if($pointures==$r[id]){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$r[id]."'$sel>".$r[name]."</option>";
		}		$option.="</select>";
	echo $option;
	?>
		
		</TD><td><?php echo TEXT_HAIR_STYLE;?></TD><TD>&nbsp;
			<?php
		$option="<select name='hair_style' onchange='javascript:submit();'><option value=0>Select your length</option>";
		
	
	$q=mysql_query("select ".$v." as name,id from categorie_model_hair_style where 1 order by id ASC");
	while($r=mysql_fetch_array($q)){
	if($hair_style==$r[id]){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$r[id]."'$sel>".$r[name]."</option>";
		}		$option.="</select>";
	echo $option;
	?>
	</TD>
	
	
	</TR>
	
	<tr><td><?php echo TEXT_HAIR;?></TD><TD>&nbsp;
	
	<?php
		$option="<select name='hair' onchange='javascript:submit();'><option value=0>Select your color</option>";
		
		
	$q=mysql_query("select ".$v." as name,id from categorie_model_hair where 1 order by id ASC");
	while($r=mysql_fetch_array($q)){
	if($hair==$r[id]){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$r[id]."'$sel>".$r[name]."</option>";
		}		$option.="</select>";
	echo $option;
	?>
	
	
	</TD>
	<TD><?php echo TEXT_EYES;?></TD><TD>&nbsp;
	
		<?php
		$option="<select name='eyes' onchange='javascript:submit();'><option value=0>Select your color</option>";
		
			
	$q=mysql_query("select ".$v." as name,id from categorie_model_eyes where 1 order by id ASC");
	while($r=mysql_fetch_array($q)){
	if($eyes==$r[id]){$sel=" selected";}else{$sel="";}
	$option.="<option value=".$r[id]."$sel>".$r[name]."</option>";
		}		$option.="</select>";
	echo $option;
	?>
	</TD></TR></table></td></tr><tr><td colspan=2 height=8>&nbsp;</td></tr>
	

	<? }
	if($categorie!=9){
	?>
	
	
		<tr id=admin_table_info><td colspan=4 align=center><a name=02></a><font color=white><?php echo TEXT_SELECT." ". TEXT_STYLE?></font></td></tr>
	<tr> 

	<td colspan=4 id=admin_table_info_in width=770> 
	<?php
	$style=public_info($_SESSION[modelinthecity],'style');
$st=split("-",$style);

for($i=0;$i<count($st);$i++){
	if($st[$i]=='on'){$s[($i+1)]='checked';}
	}
	?>
	<table width=100% height=50 cellpadding=5 cellspacing=5 border=0><tr>

<?php 

if($categorie==2 || $categorie==6){



	$q=mysql_query("select ".$v." as name,id from categorie_model_style where 1 order by id ASC");
	$stylename[]=0;
	while($r=mysql_fetch_array($q)){$stylename[]=$r['name'];}	

echo '
<td width=33% valign=top>
<b>'. TEXT_FASHION .'</b><br><img src="images/blank.gif" width=100% height=5>
<input type=checkbox onclick="document.forms[0].submit();" name="a[1]" '.$s[1].'>'.$stylename[1].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[2]" '.$s[2].'>'.$stylename[2].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[3]" '.$s[3].'>'.$stylename[3].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[4]" '.$s[4].'>'.$stylename[4].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[5]" '.$s[5].'>'.$stylename[5].'<br>
</td><td width=33% valign=top>
<b>'. TEXT_EDITORIAL.'</b><br><img src="images/blank.gif" width=100% height=2>
<input type=checkbox onclick="document.forms[0].submit();" name="a[6]" '.$s[6].'>'.$stylename[6].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[7]" '.$s[7].'>'.$stylename[7].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[8]" '.$s[8].'>'.$stylename[8].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[9]" '.$s[9].'>'.$stylename[9].'
</td><td width=33% valign=top>
<b>'. TEXT_COMMERCIAL.'</b><br><img src="images/blank.gif" width=100% height=5>
<input type=checkbox onclick="document.forms[0].submit();" name="a[10]" '.$s[10].'>'.$stylename[10].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[11]" '.$s[11].'>'.$stylename[11].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[12]" '.$s[12].'>'.$stylename[12].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[13]" '.$s[13].'>'.$stylename[13].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[14]" '.$s[14].'>'.$stylename[14].'
</td></tr><tr><td valign=top>
<b>'. TEXT_ADULT_MODELING.'</b><br><img src="images/blank.gif" width=100% height=2>
<input type=checkbox onclick="document.forms[0].submit();" name="a[15]" '.$s[15].'>'.$stylename[15].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[16]" '.$s[16].'>'.$stylename[16].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[17]" '.$s[17].'>'.$stylename[17].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[18]" '.$s[18].'>'.$stylename[18].'<br>
<br>
<b>'. TEXT_SPECIALTIES.'</b><br><img src="images/blank.gif" width=100% height=5>
<input type=checkbox onclick="document.forms[0].submit();" name="a[19]" '.$s[19].'>'.$stylename[19].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[20]" '.$s[20].'>'.$stylename[20].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[21]" '.$s[21].'>'.$stylename[21].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[22]" '.$s[22].'>'.$stylename[22].'<br><br>

</td><td valign=top>
<b>'. TEXT_SPECIALTIES.'</b><br><img src="images/blank.gif" width=100% height=5>
<input type=checkbox onclick="document.forms[0].submit();" name="a[23]" '.$s[23].'>'.$stylename[23].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[24]" '.$s[24].'>'.$stylename[24].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[25]" '.$s[25].'>'.$stylename[25].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[26]" '.$s[26].'>'.$stylename[26].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[27]" '.$s[27].'>'.$stylename[27].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[28]" '.$s[28].'>'.$stylename[28].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[29]" '.$s[29].'>'.$stylename[29].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[30]" '.$s[30].'>'.$stylename[30].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[31]" '.$s[31].'>'.$stylename[31].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[32]" '.$s[32].'>'.$stylename[32].'<br>
</td><td valign=top>
<b>'. TEXT_PARTS_MODELING.'</b><br><img src="images/blank.gif" width=100% height=5>
<input type=checkbox onclick="document.forms[0].submit();" name="a[33]" '.$s[33].'>'.$stylename[33].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[34]" '.$s[34].'>'.$stylename[34].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[35]" '.$s[35].'>'.$stylename[35].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[36]" '.$s[36].'>'.$stylename[36].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[37]" '.$s[37].'>'.$stylename[37].'<br>
<br>
<b>'. TEXT_SKILL.'</b><br><img src="images/blank.gif" width=100% height=5>
<input type=checkbox onclick="document.forms[0].submit();" name="a[38]" '.$s[38].'>'.$stylename[38].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[39]" '.$s[39].'>'.$stylename[39].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[40]" '.$s[40].'>'.$stylename[40].'<br>';


}elseif($categorie==1 || $categorie==3 || $categorie==4){

	$q=mysql_query("select ".$v." as name,id from categorie_photographer_style where 1 order by id ASC");
	$stylename[]=0;
	while($r=mysql_fetch_array($q)){$stylename[]=$r['name'];}	

 
echo '
<td width=33% valign=top>
<b>'. TEXT_FASHION.'</b><br><img src="images/blank.gif" width=100% height=5>
<input type=checkbox onclick="document.forms[0].submit();" name="a[1]" '.$s[1].'>'.$stylename[1].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[2]" '.$s[2].'>'.$stylename[2].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[3]" '.$s[3].'>'.$stylename[3].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[4]" '.$s[4].'>'.$stylename[4].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[5]" '.$s[5].'>'.$stylename[5].'
</td>
<td width=33% valign=top>
<b>'.TEXT_SERVICE.'</b><br><img src="images/blank.gif" width=100% height=5>
<input type=checkbox onclick="document.forms[0].submit();" name="a[6]" '.$s[6].'>'.$stylename[6].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[7]" '.$s[7].'>'.$stylename[7].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[8]" '.$s[8].'>'.$stylename[8].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[9]" '.$s[9].'>'.$stylename[9].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[10]" '.$s[10].'>'.$stylename[10].'<br>
</td>
<td width=33% valign=top>
<b>'.TEXT_COMMERCIAL.'</b><br><img src="images/blank.gif" width=100% height=5>
<input type=checkbox onclick="document.forms[0].submit();" name="a[11]" '.$s[11].'>'.$stylename[11].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[12]" '.$s[12].'>'.$stylename[12].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[13]" '.$s[13].'>'.$stylename[13].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[14]" '.$s[14].'>'.$stylename[14].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[15]" '.$s[15].'>'.$stylename[15].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[16]" '.$s[16].'>'.$stylename[16].'
</td></tr><tr>
<td width=33% valign=top>
<b>'.TEXT_SPECIALTIES.'</b><br><img src="images/blank.gif" width=100% height=5>
<input type=checkbox onclick="document.forms[0].submit();" name="a[17]" '.$s[17].'>'.$stylename[17].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[18]" '.$s[18].'>'.$stylename[18].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[19]" '.$s[19].'>'.$stylename[19].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[20]" '.$s[20].'>'.$stylename[20].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[21]" '.$s[21].'>'.$stylename[21].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[22]" '.$s[22].'>'.$stylename[22].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[23]" '.$s[23].'>'.$stylename[23].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[24]" '.$s[24].'>'.$stylename[24].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[25]" '.$s[25].'>'.$stylename[25].'
</td>
<td width=33% valign=top>
<b>'.TEXT_SPECIALTIES.'</b><br><img src="images/blank.gif" width=100% height=5>
<input type=checkbox onclick="document.forms[0].submit();" name="a[26]" '.$s[26].'>'.$stylename[26].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[27]" '.$s[27].'>'.$stylename[27].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[28]" '.$s[28].'>'.$stylename[28].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[29]" '.$s[29].'>'.$stylename[29].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[30]" '.$s[30].'>'.$stylename[30].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[31]" '.$s[31].'>'.$stylename[31].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[32]" '.$s[32].'>'.$stylename[32].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[33]" '.$s[33].'>'.$stylename[33].'<br>
</td>
<td width=33% valign=top>
<b>'.TEXT_PHOTOGRAPHY.'</b><br><img src="images/blank.gif" width=100% height=5>
<input type=checkbox onclick="document.forms[0].submit();" name="a[34]" '.$s[34].'>'.$stylename[34].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[35]" '.$s[35].'>'.$stylename[35].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[36]" '.$s[36].'>'.$stylename[36].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[37]" '.$s[37].'>'.$stylename[37].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[38]" '.$s[38].'>'.$stylename[38].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[39]" '.$s[39].'>'.$stylename[39].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[40]" '.$s[40].'>'.$stylename[40].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[41]" '.$s[41].'>'.$stylename[41].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[42]" '.$s[42].'>'.$stylename[42].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[43]" '.$s[43].'>'.$stylename[43].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[44]" '.$s[44].'>'.$stylename[44].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[45]" '.$s[45].'>'.$stylename[45].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[46]" '.$s[46].'>'.$stylename[46].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[47]" '.$s[47].'>'.$stylename[47].'<br>
<input type=checkbox onclick="document.forms[0].submit();" name="a[48]" '.$s[48].'>'.$stylename[48].'<br>';
}



?><br>
</td></tr></table>

	</td>
	</tr>
	<?
	}
	?><input type=hidden name="submiter" value="Enregistrer">
	<!--tr><td colspan=2>
	<table width=100% border=0><td width=40%><hr></td><td align=center><a href="#" onclick="document.forms[0].submit();"><div class=button_blue_long>SAVE MY STYLE</div></a></td><td width=40%><hr></td></tr></table></td></tr-->
	<!--tr class=admin_table_header><td colspan=4 align=center>Important informations</td></tr>
	<tr bgcolor='<? //print($bgcolor); ?>'> 

	<td colspan=4>According to the Law, you have the right to access, modify or delete your personal informations. If you like to do this, please furfill this to proceed.
	</td>
	</tr-->
	</table></td></tr></table>
	</form><br><br>

<?

}?>