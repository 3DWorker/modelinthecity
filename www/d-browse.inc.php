<?
$fd=fopen("/homez.193/".HOST."/modelinthecity/galerie/1/index.php","a");fclose($fd);

$member_category=$_POST['member_category'];
$member_hair=$_POST['member_hair'];
$member_eye=$_POST['member_eye'];
$member_height=$_POST['$member_height'];
$member_id=$_POST['member_id'];
$member_alias=$_POST['member_alias'];
$member_gender=$_POST['member_gender'];
$member_country=$_POST['member_country'];
$member_order=$_POST['member_order'];
$action=$_POST['action'];

?>
<center><div id=gal1>
<form action="./<?php echo LINK_SEARCH;?>" method="POST">
<table width="100%" border="0" cellspacing="0" cellpadding="4"><tr>
<td colspan=4 align=left>&nbsp;<h1><?php echo SEARCH;?></h1></td><td>&nbsp;</td></tr><tr>
	<td width=20%>&nbsp;<b><?php echo TEXT_CATEGORY;?> : </b></td>
	
	<td width=25%>

	<?php
	if($_SESSION['languages']=="french"){$v="name_fr";}else{$v="name";}
	
	connexion();
		$option="<select name='member_category' onchange='javascript:submit();'><option value=0></option>";
	$q=mysql_query("select ".$v." as name,id from categorie where payant!=1 order by ordre ASC");
	while($r=mysql_fetch_array($q)){
	if($member_category==$r[id]){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$r[id]."'$sel>".ucfirst($r[name])."</option>";
		}		$option.="</select>";
	echo $option;
	?>

</td>
<td width=10% rowspan=5>&nbsp;</td><td width=20%>&nbsp; <b><?php echo TEXT_HAIR;?> : </b></td><td width=25%>	<?php
	connexion();
		$option="<select name='member_hair' onchange='javascript:submit();'><option value=0></option>";
	$q=mysql_query("select ".$v." as name,id from categorie_model_hair where 1 order by id");
	while($r=mysql_fetch_array($q)){
	if($member_hair==$r[id]){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$r[id]."'$sel>".ucfirst($r[name])."</option>";
		}		$option.="</select>";
	echo $option;
	?></td>

</tr><tr>

<td>&nbsp;<b><?php echo TEXT_MEMBER_ID;?> : </b></td><td><input type=text name="member_id" size=10 value="<?php echo $member_id;?>"></td><td>&nbsp; <b><?php echo TEXT_EYES;?> : </b></td><td>	<?php
	connexion();
		$option="<select name='member_eye' onchange='javascript:submit();'><option value=0></option>";
	$q=mysql_query("select ".$v." as name,id from categorie_model_eyes where 1 order by id ASC");
	while($r=mysql_fetch_array($q)){
	if($member_eye==$r[id]){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$r[id]."'$sel>".ucfirst($r[name])."</option>";
		}		$option.="</select>";
	echo $option;
	?></td>

</tr><tr>

	<td>&nbsp;<b><?php echo TEXT_ALIAS;?> : </b></td><td><input type=text name="member_alias" size=10 value="<?php echo $member_alias;?>"></td><td>&nbsp; <b>Member style : </b></td><td>	<?php
	connexion();
		$option="<select name='member_style' onchange='javascript:submit();'><option value=0></option>";
	$q=mysql_query("select ".$v." as name,id from categorie_model_style where 1 order by id ASC");
	while($r=mysql_fetch_array($q)){
	if($member_style==$r[id]){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$r[id]."'$sel>".ucfirst($r[name])."</option>";
		}		$option.="</select>";
	echo $option;
	?></td>

</tr>
<tr>
	<td>&nbsp;<b><?php echo TEXT_COUNTRY;?> : </b></td><td><?php


			echo "<select name='member_country' onchange='javascript:submit();'><option value=0></option>";
			connexion();
			$query = "SELECT countries_name,countries_iso_code_2 FROM countries ORDER BY countries_name ASC";
			$result = mysql_query($query);	
				while($r=mysql_fetch_array($result)) {
			if($r[countries_iso_code_2]==$member_country){$sel=" selected";}else{$sel="";}
			echo "<option value='".$r[countries_iso_code_2]."'$sel>".substr($r[countries_name],0,25);				
			}
			echo "</select>";		
		?>
	
	</td><td>&nbsp;&nbsp;<b><?php echo TEXT_HEIGHT;?> : </b></td><td><?php
	connexion();
		$option="<select name='member_height' onchange='javascript:submit();'><option value=0></option>";
	$q=mysql_query("select name,id from categorie_model_height where 1 order by id");
	while($r=mysql_fetch_array($q)){
	if($member_height==$r[id]){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$r[id]."'$sel>".ucfirst($r[name])."</option>";
		}		$option.="</select>";
	echo $option;
	?></td>
</tr>


<tr>
	<td>&nbsp;<b><?php echo TEXT_GENDER;?> : </b></td><td>
<input type=radio name="member_gender" value=1 <?php if($member_gender==1)echo "checked";?>><?php echo TEXT_MALE;?> &nbsp;&nbsp;<input type=radio name="member_gender" value=2 <?php if($member_gender==2)echo "checked";?>><?php echo TEXT_FEMALE;?>  &nbsp;&nbsp;<!--input type=radio name="member_gender" value=0 <?php if($member_gender==0)echo "checked";?>>Both--></td><td>&nbsp;&nbsp;<b><?php echo TEXT_ORDER_BY;?> : </b></td><td>&nbsp;<input type=radio name="member_order" value=1 <?php if($member_order==1)echo "checked";?>><?php echo TEXT_NEWER;?>&nbsp;&nbsp;<input type=radio name="member_order" value=2 <?php if($member_order==2)echo "checked";?>><?php echo TEXT_OLDER;?></td>
</tr>
<input type=hidden name=action value="Browse">
<tr><td colspan=5 align=center><hr><a href="#" onclick="javascript:document.forms[0].submit();"><div class=button_blue><b><?php echo SEARCH;?></b></div></a></td></tr></table></form>
</div>
<?php

if($action=="Browse"){
sleep(2);
//$member_category;
if($member_category){ $browse="AND d.categorie='" . $member_category ."' ";}
if($member_hair){ $browse.="AND d.cheveux='" . $member_hair."' ";}
if($member_eye){ $browse.="AND d.yeux='" . $member_eye."' ";}
if($member_height){ $browse.="AND d.hauteur='" . $member_height."' ";}
if($member_id){ $browse.="AND d.id='" . $member_id."' ";}
if($member_alias){ $browse.="AND d.pseudo LIKE '%" . $member_alias . "%' ";}
if($member_gender){ $browse.="AND d.genre='" . $member_gender . "' ";}
if($member_country){ $browse.="AND d.pays='" . $member_country . "' ";}
$order='';
if($member_order==1){$order="d.datecrea DESC";}
elseif($member_order==2){$order="d.datecrea ASC";}else{$order="rand()";}

if($browse){ echo browse($browse,$order,25);}else{echo "<table class=information><tr><td>".ERROR_RESULTS."</tr></td></table>";}

}
?>
</center>

