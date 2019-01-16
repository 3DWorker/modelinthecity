<noscript>Please active scripting in your browser security<?php exit;?></noscript>
<?


if(!$_SESSION["KeY"]){exit;}

$result=mysql_query("SELECT pseudo,email,prenom,nom FROM membre_tmp WHERE id='$_SESSION[KeY]' and pseudo!='' and email!='' and prenom!='' LIMIT 1");
if(mysql_affected_rows()<1){exit;}

if($r=mysql_fetch_array($result)){

$_pseudo=$r[pseudo];
$_email=$r[email];
$_nom=$r[nom];
$_prenom=$r[prenom];

}

if ($submiter=="Enregistrer") {

	$verif="OK";
	
$err="style='background:yellow;'";
$err_adresse="";
$err_gender="";
$err_city="";
$err_password1="";
$err_password2="";
$err_pays="";
$err_zipcode="";
$err_year="";
$err_month="";
$err_day="";
$err_telephone="";
$err_secret_question="";
$err_secret_answer="";
$_mess=0;

	// Verification des champs

	if(!$gender) {$verif="STOP"; $err_gender=$err;}
	if(!$adresse || strlen($adresse)<6) {$verif="STOP";$mess.="Address must contains at least 6 characters, ";$err_adresse=$err; }
	if(!$ville || strlen($adresse)<4) {$verif="STOP"; $mess.="City name must contains at least 4 characters, "; $err_city=$err;}
	if($password1=="") {$verif="STOP"; $err_password1=$err;}
	if($password2=="") {$verif="STOP"; $err_password2=$err;}	
	if($password1 && strlen($password1)<6 && $messno!=8) { $verif="STOP";$messno=8;$mess.="Passwords must contains at least 6 characters, ";$err_password1=$err;}	
	if($password1 && !preg_match("/[a-zA-Z0-9-!@#$%éèçâà^&*?_~£()]/",$password1) && $messno!=8){$verif="STOP"; $messno=8;$mess.="Passwords contains bad characters, ";$err_password1=$err;}
    
	 if($password1 && !preg_match("/[a-z]/",$password1)){ $_mess=1;}
	 if($password1 && !preg_match("/[A-Z]/",$password1)){$_mess+=1;}
	if($password1 && !preg_match("/[0-9]/",$password1)){$_mess+=1;}
	
if($_mess>1 && $messno!=8){$verif="STOP"; $messno=8;$mess.="Password is too weak, please use upper, lower and digit characters, ";$err_password1=$err;}
				if($password1 && preg_match("/".$pseudo."/",$password1) && $messno!=8){ $verif="STOP";$messno=8;$mess.="Password must not contains your alias, ";$err_password1=$err;}
				if($password1 && preg_match("/".$nom."/",$password1) && $messno!=8){ $verif="STOP";$messno=8;$mess.="Password must not contains your lastname, ";$err_password1=$err;}
				if($password1 && preg_match("/".$prenom."/",$password1) && $messno!=8){ $verif="STOP";$messno=8;$mess.="Password must not contains your firstname, ";$err_password1=$err;}
//echo testPassword($password1);
	if($password1!=$password2 && $verif!="STOP" && $password1 && $password2) {$verif="STOP"; $mess.="Passwords are not similar, ";$err_password1=$err;}
		
	if(!$pays) {$verif="STOP";  $err_country=$err;}
	
	if($pays=="US" && (!$state || strlen($state)<2)){$verif="STOP"; $err_state=$err;}
	if(!$zipcode || strlen($zipcode)<3) {$verif="STOP"; $mess.="City name must contains at least 3 characters, ";$err_zipcode=$err;}
	if(!$age || $age=="Year") {$verif="STOP";  $err_year=$err;}
	if(!$month || $age=="Month") {$verif="STOP";  $err_month=$err;}
	if(!$day || $age=="Day") {$verif="STOP";  $err_day=$err;}
	if(!$telephone || strlen($telephone)<6) {$verif="STOP"; $mess.="Telephone must contains at least 6 characters, "; $err_telephone=$err;}
	
	if(!$secret_question){$verif="STOP";  $err_secret_question=$err;}
	if(!$secret_answer){$verif="STOP"; $err_secret_answer=$err; }
	if($secret_answer && strlen($secret_answer)<5){$verif="STOP"; $mess.="Secret Answer must contains at least 5 characters, "; $err_secret_answer=$err;}
	
	$verif="STOP";
	
	if($verif!="STOP") {
	
	
	//echo "<table cellspacing=0 cellpadding=0 width=107% height=10><tr><td class=info>vous avez modifié votre inscription</td></tr></table>";$ff="ok";
		
				   
		connexion();
		$query1 = "INSERT INTO galerie SET age='$age', mois='$month', jour='$day', genre='$gender', adresse='$adresse', ville='$ville', pays='$pays', telephone='$telephone',departement='$zipcode', secret_question='$secret_question', etat='$state', secret_answer='".md5(secret_answer)."', password='".md5($password1)."', IP='".$_SERVER[REMOTE_ADDR]."'";
		mysql_query ($query1);
	
	//echo "<script>location.href='http://www.modelinthecity.com/index.php?page=espace_membre';</script>";
if(!mysql_error()){
echo "Thanks for your new membership";
exit;

}

}
}

?>	

<form action="index.php?page=confirm" method="POST" enctype="multipart/form-data" target="_self">
<table width="100%" border="1" cellspacing="0" cellpadding="7" height=10>

<tr> <td colspan=4> <h1>FURFILL YOUR MEMBERSHIP INFORMATIONS</h1>


	</TD></TR>
<tr bgcolor="<? print($bgcolortitle); ?>"><td colspan=4 align=center><big><b>Personnal informations</b></BIG>&nbsp;(*)&nbsp;<img src='./images/secure.gif' title='Confidential information(*)'><br><small>(*)These informations are stickly confidential (Not city & country) and will not be disclosed for any reasons. We ensure a high level to protect your personal informations but Modelinthecity.com will never be responsable in case of theft or theft of your personal and confidential informations or for any other reasons.</small></td></tr>

        <tr> <td colspan=4 class=error> 
<?
	
	if ($verif=="STOP") {$mess=substr($mess,0,strlen($mess)-2);
		print("Please check for the errors in yellow !<br> $mess");
	}
	
	?>

	</TD></TR>
	
	<tr bgcolor='<? print($bgcolor); ?>'> 
	

	
	<td><b>Lastname</b></td>
	<td>&nbsp;
		<?
echo $_nom;		
		?>
	</td>
<td><b>&nbsp;<nobr>Firstname</nobr></b></td>
	<td>&nbsp;
<?php echo $_prenom;?>

</td>

	</tr>
	
		<tr bgcolor='<? print($bgcolor); ?>'> 

	
	<td><b>Gender</b></td>
	<td>&nbsp;
	<?php

		$option="<select name='gender' onchange='javascript:submit();' ".$err_gender."><option value=0>Select your gender</option>";
	$q=mysql_query("select name,id from categorie_model_gender where 1");
	while($r=mysql_fetch_array($q)){
	if($gender==$r[id]){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$r[id]."'$sel>".$r[name]."</option>";
		}		$option.="</select>";
	echo $option;
	?>
	</td>
<td><b>&nbsp;<nobr>Date of birth</nobr></b></td>
	<td>&nbsp;
<?

		$option="<select name='age' onchange='javascript:submit();' ".$err_year."><option value=0>Year</option>";
for($i=1910;$i<=Date('Y');$i++){
	if($age==$i){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$i."'$sel>".$i."</option>";
}
	$option.="</select>";
	echo $option;
?>
&nbsp;
<?

		$option="<select name='month' onchange='javascript:submit();' ".$err_month."><option value=0>Month</option>";
for($i=1;$i<13;$i++){
	if($month==$i){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$i."'$sel>".$i."</option>";
}
	$option.="</select>";
	echo $option;
?>
&nbsp;
<?

		$option="<select name='day' onchange='javascript:submit();' ".$err_day."><option value=0>Day</option>";
for($i=1;$i<32;$i++){
	if($day==$i){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$i."'$sel>".$i."</option>";
}
	$option.="</select>";
	echo $option;
?>
</td>

	</tr>
	
	
	<tr bgcolor='<? print($bgcolor); ?>'> 

	<td><b>Address</b></td>
	<td>&nbsp;

		<?
print("<input type=text size=30 name=adresse  value=\"$adresse\" STYLE=\"font-size: 12px\" onchange='javascript:submit();' ".$err_adresse.">");

?>
		

	</td>
<td><b>&nbsp;<nobr>E-mail address</nobr></b></td>
	<td>&nbsp;
<?php echo $_email;?></td>

	</tr>

	<tr bgcolor='<? print($bgcolor); ?>'> 
	
	<td><b><nobr>City, Zipcode, <?php if($pays=="US"){ echo "state";}?></nobr></b></td>
	<td><nobr>&nbsp;
		<?

					print("<input class=input type=text value=\"$ville\" size=20 name='ville' STYLE=\"font-size: 12px\" onchange='javascript:submit();' ".$err_city.">&nbsp;,&nbsp;");
					
print("<input class=input type=text value=\"$zipcode\" size=5 maxlength=8 name='zipcode' STYLE=\"font-size: 12px\" onchange='javascript:submit();' ".$err_zipcode.">&nbsp;");

if($pays=="US"){

//print(", <input class=input type=text value=\"$state\" size=1 maxlength=2 name='state' STYLE=\"font-size: 12px\" onchange='javascript:submit();' ".$err_state.">&nbsp;&nbsp;");

		$option="<select name='state' onchange='javascript:submit();' ".$err_state."><option value=0></option>";
	$q=mysql_query("select zone_code from zones where zone_country_id='223'");
	while($r=mysql_fetch_array($q)){
	if($state==$r[zone_code]){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$r[zone_code]."'$sel>".$r[zone_code]."</option>";
		}		$option.="</select>";
	echo $option;


	}
		?>
</nobr>
	</td> 
<td><b>Telephone</b></span></td>
	<td>&nbsp;
		<?

			print("<input class=input type=text size=30 name=telephone  value=\"$telephone\" STYLE=\"font-size: 12px\"  size=9 maxlength=15 onchange='javascript:submit();' ".$err_telephone.">");
	
		?>
	</td>
	</tr>
	<tr bgcolor='<? print($bgcolor); ?>'> 
	<td><b>Country</b></td>
	<td>&nbsp;
		<?


			print("<select name='pays' onchange='javascript:submit();' ".$err_country."><option value=0>Select your country</option>");
			connexion();
			$query = "SELECT countries_name,countries_iso_code_2 FROM countries ORDER BY countries_name ASC";
			$result = mysql_query($query);
	
				while($r=mysql_fetch_array($result)) {
			

			if($r[countries_iso_code_2]==$pays){$sel=" selected";}else{$sel="";}


			print("<option value='".$r[countries_iso_code_2]."'$sel>".substr($r[countries_name],0,25));
				
			}
			print("</select>");	
	
		?>
	
	</td>
	<td><b><nobr>Secret question</nobr><br><br><nobr>Secret answer</nobr></b></span></td>
	<td>&nbsp;
		<?php
	
		$option="<select name='secret_question' onchange='javascript:submit();' ".$err_secret_question."><option value=0>Select your secret question</option>";
	$q=mysql_query("select name,id from categorie_model_secret_question where 1");
	while($r=mysql_fetch_array($q)){
	if($secret_question==$r[id]){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$r[id]."'$sel>".$r[name]."</option>";
		}		$option.="</select>";
	echo $option;
	
	?><br><br>&nbsp;
	
	<?php echo "<input class='input' type='text' size='35' name='secret_answer'  value='".$secret_answer."' size='9' maxlength='25' onchange='javascript:submit();' " .$err_secret_answer.">";?>
	
	</td>
	</tr>
	<tr bgcolor='<? print($bgcolor); ?>'> 
	
	<td><b><nobr>Password</nobr></b></td>
	<td valign=top>&nbsp;   
		<?
			print("<input type='text' size='20' id='password1' name='password1' onkeyup='CheckPassword(this.value);' onkeypress='CheckPassword(this.value);' onkeydown='CheckPassword(this.value);' value='".$password1."'   maxlength='15' ".$err_password1.">");
		?>
		<div style="background-color: transparent; margin:10px;line-height:2px;border:1 solid #777777;height:3px;width:120px"><div style="background-color: transparent;" id="progressbar"> </div></div><div id="bart" style="margin:10px;line-height:2px;font-size:9px;"></div>
	</td> 
<td><b><nobr>Confim your password</nobr></b></span></td>
	<td><nobr>&nbsp;
	<?	
	print("<input class=input type=text size=20 name='password2' value='".$password2."'  maxlength=15 ".$err_password2.">");
	?></nobr>
	</td>
	</tr>
	
	<tr bgcolor="<? print($bgcolortitle); ?>"> 
	<td colspan=4 align=center><br><br>

<input type=hidden name="submiter" value="Enregistrer">
<input type="submit" value="Create my membership">

</td></tr></table>
<script language="Javascript">

function init(){
var pwd=document.getElementById('password1');
if(pwd){CheckPassword(pwd.value);}
}


function CheckPassword(password){  

for(var i=0;i<password.length;i++){
password=password.replace(" ","",i);
password=password.replace("'","",i);
password=password.replace("\"","",i);
password=password.replace("\\","",i);
password=password.replace("/","",i);
}
document.getElementById('password1').value=password;

     var strength = new Array(); 
	 var color= new Array();
	 strength[0] = "Very Weak";  color[0]="#ff0000";
     strength[1] = "Very Weak";  color[1]="#ff3300";
     strength[2] = "Weak";  color[2]="#ff9900";
     strength[3] = "Medium";  color[3]="#ffff00";
     strength[4] = "Strong";  color[4]="#99cc00";
     strength[5] = "Very Strong";  color[5]="#32cd32";
    
     var score = 0;  

      if (password.length > 6)  score+=1;  
      if (password.length > 7)  score+=1;  
	  
     if (password.length > 12)  score+=1;  

     if (password.match(/\d+/)) { score+=1;} 

     if (password.match(/[a-z]/)) score+=1;  
	 if( password.match(/[A-Z]/)) score+=1;
	 
	 if( (password.match(/[a-z]{2}/) || password.match(/[a-z]{3}/) || password.match(/[a-z]{4}/) || password.match(/[a-z]{5}/) || password.match(/[a-z]{6}/) )&& score>0) score-=1;
	 if( (password.match(/[a-z]{2}/) || password.match(/[a-z]{3}/) || password.match(/[a-z]{4}/) || password.match(/[a-z]{5}/) || password.match(/[a-z]{6}/) )&& score>3) score-=2;
	 	 if( (password.match(/[a-z]{2}/) || password.match(/[a-z]{3}/) || password.match(/[a-z]{4}/) || password.match(/[a-z]{5}/) || password.match(/[a-z]{6}/) )&& score>4) score-=2;
   if (password.match(/.[!,@,#,$,%,é,è,ç,â,à,^,&,*,?,_,~,-,£,(,)]/)) score+=1;  
   
   if(score>5)score=5;
   document.getElementById('progressbar').style.height=2;
   document.getElementById('progressbar').style.background=color[score];
   document.getElementById('progressbar').style.width=parseInt(24*score);

	document.getElementById('bart').innerHTML=strength[score];

 }  

</script>