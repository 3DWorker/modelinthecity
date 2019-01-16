<center>
<form action="./SEARCH" method="POST">
<table width="100%" border="0" cellspacing="0" cellpadding="4"><tr>
<td colspan=4 align=left>&nbsp;<h1>QUICK SEARCH</h1></td><td><a href="#" onclick="javascript:document.forms[0].submit();"><div class=button_blue><b>SEARCH</b></div></a></td></tr><tr>
<td colspan=5>&nbsp;</td></tr><tr>
	<td width=20%>&nbsp;<b>Categories : </b></td>
	
	<td width=25%>

	<?php
	connexion();
		$option="<select name='member_category' onchange='javascript:submit();'><option value=0>Any</option>";
	$q=mysql_query("select name,id from categorie where payant!=1 order by ordre ASC");
	while($r=mysql_fetch_array($q)){
	if($member_category==$r[id]){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$r[id]."'$sel>".$r[name]."</option>";
		}		$option.="</select>";
	echo $option;
	?>

</td>

</tr><tr>

	<td>&nbsp;<b>Member Country : </b></td><td><?php


			echo "<select name='member_country' onchange='javascript:submit();'><option value=0>Any</option>";
			connexion();
			$query = "SELECT countries_name,countries_iso_code_2 FROM countries ORDER BY countries_name ASC";
			$result = mysql_query($query);	
				while($r=mysql_fetch_array($result)) {
			if($r[countries_iso_code_2]==$member_country){$sel=" selected";}else{$sel="";}
			echo "<option value='".$r[countries_iso_code_2]."'$sel>".substr($r[countries_name],0,25);				
			}
			echo "</select>";		
		?>
	
	</td></tr>


<tr>
	<td>&nbsp;<b>Member Gender : </b></td><td>
<input type=radio name="member_gender" value=1 <?php if($member_gender==1)echo "checked";?>>Male &nbsp;&nbsp;<input type=radio name="member_gender" value=2 <?php if($member_gender==2)echo "checked";?>>Female  &nbsp;&nbsp;<input type=radio name="member_gender" value=0 <?php if($member_gender==0)echo "checked";?>>Both</td><td>&nbsp;&nbsp;<b>Order by : </b></td><td>&nbsp;<input type=radio name="member_order" value=1 <?php if($member_order==1)echo "checked";?>>newer&nbsp;&nbsp;<input type=radio name="member_order" value=2 <?php if($member_order==2)echo "checked";?>>older</td>
</tr><tr><td colspan=5>&nbsp;</td></tr><tr>

<input type=hidden name=action value="Browse">
</tr></tr><tr><td colspan=5</td></tr><tr></table></form>

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

if($browse){ echo browse($browse,$order,125);}else{echo "<table class=information><tr><td>Too many results</tr></td></table>";}

}
?>
</center>

