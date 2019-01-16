<?

session_start();
connexion();
error_reporting(0);

		if($_SESSION['languages']=="french"){$v="name_fr";}else{$v="name";}
		
$gender=$_POST['gender'];
$age=$_POST['age'];
$month=$_POST['month'];
$day=$_POST['day'];
$adresse=$_POST['adresse'];
$ville=$_POST['ville'];
$zipcode=$_POST['zipcode'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];
$state=$_POST['state'];
$pays=$_POST['pays'];
$telephone=$_POST['telephone'];
$secret_question=$_POST['secret_question'];
$secret_answer=$_POST['secret_answer'];

if(!$_SESSION["KeY"]){echo "Activation key not found, Please activate again !";exit;}

$result=mysql_query("SELECT pseudo,email,prenom,nom FROM membre_tmp WHERE id='$_SESSION[KeY]' and pseudo!='' and email!='' and prenom!='' LIMIT 1");
if(mysql_affected_rows()<1){echo "Temp not found";exit;}

if($r=mysql_fetch_array($result)){

$pseudo=$r[pseudo];
$email=$r[email];
$nom=$r[nom];
$prenom=$r[prenom];

}

if ($_POST['submiter']=="Enregistrer") {

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
$messno=0;


	// Verification des champs

	if(!$gender) {$verif="STOP"; $err_gender=$err;}
	
	//if(!$adresse) {$verif="STOP";$err_adresse=$err; }
	//if($adresse && strlen($adresse)<6) {$verif="STOP";$messno=1;$mess.="Address must contains at least 6 characters, ";$err_adresse=$err; }
	//if($adresse && (!preg_match('/[0-9]/',$adresse) )){ $verif="STOP";$mess.="Address must contains digits , ";$err_adresse=$err;}
		 //	if($adresse && (!preg_match('/[a-z]/',$adresse) )){ $verif="STOP";$mess.="Address must contains characters , ";$err_adresse=$err;}
	if(!$ville) {$verif="STOP"; $err_city=$err;}
	if($ville && strlen($ville)<4) {$verif="STOP"; $mess.=ERROR_CITY_CHARS ." "; $err_city=$err;} 
	
	if($ville && strlen($ville)>3 && !preg_match('/[a-zA-Z]/',$ville)){$verif="STOP"; $mess.=ERROR_CITY_CHARS ." "; $err_city=$err;} 
	
	if($password1=="") {$verif="STOP"; $err_password1=$err;}
	if($password2=="") {$verif="STOP"; $err_password2=$err;}
	if($password1 && strlen($password1)<8 && $messno!=8) { $verif="STOP";$messno=8;$mess.=ERROR_PASSWORD_CHARS ." ";$err_password1=$err;}	
	if($password1 && !preg_match("/[a-zA-Z0-9-!@#$%éèçâà^&*?_~£()]/",$password1) && $messno!=8){$verif="STOP"; $messno=8;$mess.=ERROR_PASSWORD_BAD_CHARS ." ";$err_password1=$err;}
    
	 if($password1 && !preg_match("/[a-z]/",$password1)){ $_mess=1;}
	 if($password1 && !preg_match("/[A-Z]/",$password1)){$_mess+=1;}
	if($password1 && !preg_match("/[0-9]/",$password1)){$_mess+=1;}
	
if($_mess>1 && $messno!=8){$verif="STOP"; $messno=8;$mess.=ERROR_PASSWORD_WEAK ." ";$err_password1=$err;}
				if($password1 && $pseudo && preg_match("/".$pseudo."/",$password1) && $messno!=8){ $verif="STOP";$messno=8;$mess.=ERROR_PASSWORD_EASY ." ";$err_password1=$err;}
				if($password1 && $nom && preg_match("/".$nom."/",$password1) && $messno!=8){ $verif="STOP";$messno=8;$mess.=ERROR_PASSWORD_EASY ." ";$err_password1=$err;}
				if($password1 && $prenom && preg_match("/".$prenom."/",$password1) && $messno!=8){ $verif="STOP";$messno=8;$mess.=ERROR_PASSWORD_EASY ." ";$err_password1=$err;}
//echo testPassword($password1);
	if($password1!=$password2 && $verif!="STOP" && $password1 && $password2) {$verif="STOP"; $mess.=ERROR_PASSWORD_NOT_SIMILAR ." ";$err_password1=$err;}
		
	if(!$pays) {$verif="STOP";  $err_country=$err;}	
	if($pays=="US" && !$state){$verif="STOP"; $err_state=$err;}
	
	if(!$zipcode) {$verif="STOP"; $err_zipcode=$err;$messno=7;}
	if($zipcode && strlen($zipcode)<3) {$verif="STOP"; $mess.=ERROR_ZIP_CHARS ." ";$err_zipcode=$err;$messno=7;}
		if($messno!=7 && $zipcode && (!preg_match('/[0-9]/',$zipcode) )){ $verif="STOP";$mess.=ERROR_ZIP_NO_DIGITS ." ";$err_zipcode=$err;$messno=7;}
		//if($messno!=7 && $zipcode && (!preg_match('/[a-zA-Z]/',$zipcode) )){ $verif="STOP";$mess.="Zip code must contains characters , ";$err_zipcode=$err;}
		
	if(!$age || $age=="Year") {$verif="STOP";  $err_year=$err;}
	if(!$month || $age=="Month") {$verif="STOP";  $err_month=$err;}
	if(!$day || $age=="Day") {$verif="STOP";  $err_day=$err;}
	
	if(!$telephone ) {$verif="STOP"; $err_telephone=$err;}
	if($telephone && strlen($telephone)<6) {$verif="STOP"; $mess.=ERROR_TELEPHONE_CHARS ." "; $err_telephone=$err;}
	
	if(!$secret_question){$verif="STOP";  $err_secret_question=$err;}
	
	if(!$secret_answer){$verif="STOP"; $err_secret_answer=$err; }
	if($secret_answer && strlen($secret_answer)<4){$verif="STOP"; $mess.= ERROR_SECRET_ANSWER_CHARS ." "; $err_secret_answer=$err;}
	
	
	if($verif!="STOP") {
	
	

				   
		connexion();
		mysql_query("SELECT id FROM galerie WHERE pseudo='$pseudo' or email='$email'");
		if(mysql_affected_rows()<1){
		
		$query1 = "INSERT INTO galerie SET pseudo='$pseudo', nom='$nom', prenom='$prenom',email='$email', age='$age', mois='$month', jour='$day', genre='$gender', adresse='".addslashes($adresse)."', ville='".addslashes($ville)."', pays='$pays', telephone='$telephone',departement='$zipcode', secret_question='$secret_question', etat='$state', secret_answer='".md5(strtolower(trim($secret_answer)))."', password='".md5($password1)."', IP='".$_SERVER[REMOTE_ADDR]."',valid=0, datecrea='" . strtotime("now")."'";
		mysql_query ($query1);
		
		if(!mysql_error()){
		mysql_query("DELETE FROM membre_tmp WHERE id='".$_SESSION[KeY]."'");
}
		sleep(1);
#et on cherche son id
$result3=mysql_query("SELECT id FROM galerie WHERE pseudo='$pseudo' AND email='$email' LIMIT 1");
$r=mysql_fetch_array($result3);
$_id=$r[id];
#on cree son dossier et le tour est joué
if(!is_dir("./galerie/$_id")){mkdir("./galerie/$_id");chmod("./galerie/$_id",0705);}

#creation index.php
$fd=fopen("/homez.193/".HOST."/modelinthecity/galerie/".$_id."/index.php","a");fclose($fd);

#et on le fait s'identifier
	sleep(2);

	
echo "<script>top.location.href='http://www.modelinthecity.com/index.php?page=login';</script>";
				
	}else{
	echo ERROR_MEMBER_ALREADY ." ";exit;
	}



}
}


?>	
<html><head>
<link rel="stylesheet" type="text/css" href="modelfolio.css">
</head>
<form action="index.php?page=confirm" method="POST" enctype="multipart/form-data" ><br><br>
<table width=450 border="0" cellspacing="0" cellpadding="7" height=10 bgcolor=white class=loginbox align=center valign=absmiddle>

<tr> <td colspan=2><b><big><?php echo TEXT_FINALIZE_MEMBERSHIP;?></big></b><br><hr>
	</TD></TR>
       
<?
	
	if ($verif=="STOP") {
	//$mess=substr($mess,0,strlen($mess)-2);
		print " <tr> <td colspan=2 class=error> <b>". ERROR_TO_CHECK ."</b><br> " .$mess."</TD></TR>";
	}
		?>

	<!--tr> <td colspan=4 height=3>&nbsp;</td></tr>
	<tr> 
	
	<td><b>Lastname</b></td>
	<td>&nbsp;
		<?
//echo $nom;		
		?>
	</td>
<td><b>&nbsp;<nobr>Firstname</nobr></b></td>
	<td>&nbsp;
<?php //echo $prenom;?>

</td>

	</tr-->
	
		<tr> 

	
	<td align=right><b><?php echo TEXT_GENDER;?> : </b></td>
	<td>
	<?php

		$option="<select name='gender'  ".$err_gender."><option value=0>".TEXT_SELECT." ".TEXT_GENDER."</option>";
	$q=mysql_query("select ".$v." as name,id from categorie_model_gender where 1");
	while($r=mysql_fetch_array($q)){
	if($gender==$r[id]){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$r[id]."'$sel>".$r[name]."</option>";
		}		$option.="</select>";
	echo $option;
	?>
	</td>
	
	</tr><tr>
	
<td align=right><b>&nbsp;<nobr><?php echo TEXT_DATEOFBIRTH;?> : </nobr></b></td>
	<td>
<?

		$option="<select name='age' ".$err_year."><option value=0>". TEXT_YEAR ."</option>";
for($i=1910;$i<=Date('Y');$i++){
	if($age==$i){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$i."'$sel>".$i."</option>";
}
	$option.="</select>";
	echo $option;
?>
&nbsp;
<?

		$option="<select name='month' ".$err_month."><option value=0>". TEXT_MONTH ."</option>";
		$M=array('','1295478000','1298156400','1300575600','1303250400','1305842400','1308520800','1311112800','1313791200','1316469600','1319061600','1321743600','1324335600');
for($i=1;$i<13;$i++){
	if($month==$i){$sel=" selected";}else{$sel="";}

	$option.="<option value='".$i."'$sel>".strftime('%b',$M[$i])."</option>";
}
	$option.="</select>";
	echo $option;
?>
&nbsp;
<?

		$option="<select name='day' ".$err_day."><option value=0>". TEXT_DAY ."</option>";
for($i=1;$i<32;$i++){
	if($day==$i){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$i."'$sel>".$i."</option>";
}
	$option.="</select>";
	echo $option;
?> **
</td>

	</tr>
	
	
	<tr> 

	<td align=right><b><?php echo TEXT_ADDRESS;?> : </b></td>
	<td>

		<?
print("<input type='text' size='30' name='adresse' maxlength='40' value=\"" . stripslashes($adresse) ."\" onchange='javascript:submit();' ".$err_adresse.">");

?>
		

	</td>	
	
	</tr><!--tr>
<td><b>&nbsp;<nobr>E-mail address</nobr></b></td>
	<td>&nbsp;
<?php echo $email;?></td>

	</tr-->

	<tr> 
	
	<td align=right><b><?php echo TEXT_CITY;?> :</b></td>
	<td><nobr>
		<?

print("<input class=input type=text value=\"" . stripslashes($ville)."\" size=20 maxlength=35 name='ville' ".$err_city."> ". TEXT_ZIP. " : ");
					
print("<input class=input type=text value=\"" .stripslashes($zipcode)."\" size=5 maxlength=8 name='zipcode' ".$err_zipcode."> * ");

if($pays=="US"){

//print(", <input class=input type=text value=\"$state\" size=1 maxlength=2 name='state'  onchange='javascript:submit();' ".$err_state.">&nbsp;&nbsp;");

		$option="State : <select name='state'  ".$err_state."><option value=0></option>";
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
	
	</tr>
	<tr> 
	<td align=right><b><?php echo TEXT_COUNTRY;?> : </b></td>
	<td>
		<?


			print("<select name='pays'  ".$err_country."><option value=0>".TEXT_SELECT." ".TEXT_COUNTRY."</option>");
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
	</tr><tr>
	
<td align=right><b><?php echo TEXT_TELEPHONE;?> : </b></span></td>
	<td>
		<?

			print("<input class=input type=text size=30 name=telephone  value=\"$telephone\"   size=9 maxlength=15 onchange='javascript:submit();' ".$err_telephone."> *");
	
		?>
	</td>
	</tr>
	<tr>
	
	<td align=right><b><?php echo TEXT_SECRET_QUESTION;?> : </b></span></td>
	<td>
		<?php
	
		$option="<select name='secret_question' ".$err_secret_question."><option value=0>".TEXT_SELECT." ".TEXT_SECRET_QUESTION."</option>";
	$q=mysql_query("select ".$v." as name,id from categorie_model_secret_question where 1");
	while($r=mysql_fetch_array($q)){
	if($secret_question==$r[id]){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$r[id]."'$sel>".$r[name]."</option>";
		}		$option.="</select>";
	echo $option;
	
	?></td></tr><tr><td align=right><b><?php echo TEXT_SECRET_ANSWER;?> : </b></td><td>
	
	<?php echo "<input class='input' type='text' size='35' name='secret_answer'  value=\"".stripslashes($secret_answer)."\" size='9' maxlength='25' onchange='javascript:submit();' " .$err_secret_answer.">";?>
	
	</td>
	</tr>
	<tr> 
	
	<td align=right><b><nobr><?php echo TEXT_PASSWORD;?> : </nobr></b></td>
	<td valign=top><table cellspacing=0 cellpadding=0><tr><td>
		<?
			print("<input type='password' size='20' id='password1' name='password1' onkeyup='CheckPassword(this.value);' onkeypress='CheckPassword(this.value);' onkeydown='CheckPassword(this.value);' value='".$password1."'   maxlength='15' ".$err_password1." onfocus='this.value=\"\";'>");
		?></td><td>&nbsp;</td><td align=left valign=top>
		<div style="background-color: transparent; margin:10px;line-height:4px;border:1px solid #777777;height:8px;width:120px"><div  id="progressbar"></div></div><div id="bart" style="margin:10px;font-size:9px;"></div>
	</td></tr></table></td>
	
	</tr><tr>
	
<td align=right><b><nobr><?php echo TEXT_RETYPE_PASSWORD;?> : </nobr></b></span></td>
	<td><nobr>
	<?	
	print("<input type='password' size='20'  name='password2' value='".$password2."'  maxlength='15' ".$err_password2." onfocus='this.value=\"\";'>");
	?></nobr>
	</td>
	</tr>
	<tr><td colspan=2>&nbsp;</td></tr>
	
	<tr bgcolor="<? print($bgcolortitle); ?>"><td colspan=2 align=center><?php echo TEXT_CONFIRM_NOTICE;?></td></tr>
	
	<tr bgcolor="<? print($bgcolortitle); ?>"> 
	<td colspan=2 align=center>
<input type=hidden name="submiter" value="Enregistrer">
<a href="#" onclick="document.forms[0].submit();"><div class=button_blue_long><?php echo TEXT_SIGNUP;?></div></a><br><hr><?php echo TEXT_LOGO;?>

</td></tr></table>
<?
/*

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
	 
	 if( (password.match(/w{2}/) || password.match(/w{3}/) || password.match(/w{4}/) || password.match(/w{5}/) || password.match(/w{6}/) )&& score>0) {
	 
	 if(score<2){ score-=1;}else{score-=2;}
	 
	 }

   if (password.match(/.[!,@,#,$,%,é,è,ç,â,à,^,&,*,?,_,~,-,£,(,)]/)) score+=1;  
   
   if(score>5)score=5;
   document.getElementById('progressbar').style.height='8px';
   document.getElementById('progressbar').style.backgroundColor=color[score];
   document.getElementById('progressbar').style.width=parseInt(24*score)+'px';
document.getElementById('progressbar').style.padding="0px;";

	document.getElementById('bart').innerHTML=strength[score];

 }  
</script>
 */
 ?>
<script language="Javascript">
var _0xe524=["\x70\x61\x73\x73\x77\x6F\x72\x64\x31","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x76\x61\x6C\x75\x65","\x6C\x65\x6E\x67\x74\x68","\x20","","\x72\x65\x70\x6C\x61\x63\x65","\x27","\x22","\x5C","\x2F","\x56\x65\x72\x79\x20\x57\x65\x61\x6B","\x23\x66\x66\x30\x30\x30\x30","\x23\x66\x66\x33\x33\x30\x30","\x57\x65\x61\x6B","\x23\x66\x66\x39\x39\x30\x30","\x4D\x65\x64\x69\x75\x6D","\x23\x66\x66\x66\x66\x30\x30","\x53\x74\x72\x6F\x6E\x67","\x23\x39\x39\x63\x63\x30\x30","\x56\x65\x72\x79\x20\x53\x74\x72\x6F\x6E\x67","\x23\x33\x32\x63\x64\x33\x32","\x6D\x61\x74\x63\x68","\x68\x65\x69\x67\x68\x74","\x73\x74\x79\x6C\x65","\x70\x72\x6F\x67\x72\x65\x73\x73\x62\x61\x72","\x38\x70\x78","\x62\x61\x63\x6B\x67\x72\x6F\x75\x6E\x64\x43\x6F\x6C\x6F\x72","\x77\x69\x64\x74\x68","\x70\x78","\x70\x61\x64\x64\x69\x6E\x67","\x30\x70\x78\x3B","\x69\x6E\x6E\x65\x72\x48\x54\x4D\x4C","\x62\x61\x72\x74"];function init(){var _0x354fx2=document[_0xe524[1]](_0xe524[0]);if(_0x354fx2){CheckPassword(_0x354fx2[_0xe524[2]]);} ;} ;function CheckPassword(_0x354fx4){for(var _0x354fx5=0;_0x354fx5<_0x354fx4[_0xe524[3]];_0x354fx5++){_0x354fx4=_0x354fx4[_0xe524[6]](_0xe524[4],_0xe524[5],_0x354fx5);_0x354fx4=_0x354fx4[_0xe524[6]](_0xe524[7],_0xe524[5],_0x354fx5);_0x354fx4=_0x354fx4[_0xe524[6]](_0xe524[8],_0xe524[5],_0x354fx5);_0x354fx4=_0x354fx4[_0xe524[6]](_0xe524[9],_0xe524[5],_0x354fx5);_0x354fx4=_0x354fx4[_0xe524[6]](_0xe524[10],_0xe524[5],_0x354fx5);} ;document[_0xe524[1]](_0xe524[0])[_0xe524[2]]=_0x354fx4;var _0x354fx6= new Array();var _0x354fx7= new Array();_0x354fx6[0]=_0xe524[11];_0x354fx7[0]=_0xe524[12];_0x354fx6[1]=_0xe524[11];_0x354fx7[1]=_0xe524[13];_0x354fx6[2]=_0xe524[14];_0x354fx7[2]=_0xe524[15];_0x354fx6[3]=_0xe524[16];_0x354fx7[3]=_0xe524[17];_0x354fx6[4]=_0xe524[18];_0x354fx7[4]=_0xe524[19];_0x354fx6[5]=_0xe524[20];_0x354fx7[5]=_0xe524[21];var _0x354fx8=0;if(_0x354fx4[_0xe524[3]]>6){_0x354fx8+=1;} ;if(_0x354fx4[_0xe524[3]]>7){_0x354fx8+=1;} ;if(_0x354fx4[_0xe524[3]]>12){_0x354fx8+=1;} ;if(_0x354fx4[_0xe524[22]](/\d+/)){_0x354fx8+=1;} ;if(_0x354fx4[_0xe524[22]](/[a-z]/)){_0x354fx8+=1;} ;if(_0x354fx4[_0xe524[22]](/[A-Z]/)){_0x354fx8+=1;} ;if((_0x354fx4[_0xe524[22]](/w{2}/)||_0x354fx4[_0xe524[22]](/w{3}/)||_0x354fx4[_0xe524[22]](/w{4}/)||_0x354fx4[_0xe524[22]](/w{5}/)||_0x354fx4[_0xe524[22]](/w{6}/))&&_0x354fx8>0){if(_0x354fx8<2){_0x354fx8-=1;} else {_0x354fx8-=2;} ;} ;if(_0x354fx4[_0xe524[22]](/.[!,@,#,$,%,é,è,ç,â,à,^,&,*,?,_,~,-,£,(,)]/)){_0x354fx8+=1;} ;if(_0x354fx8>5){_0x354fx8=5;} ;document[_0xe524[1]](_0xe524[25])[_0xe524[24]][_0xe524[23]]=_0xe524[26];document[_0xe524[1]](_0xe524[25])[_0xe524[24]][_0xe524[27]]=_0x354fx7[_0x354fx8];document[_0xe524[1]](_0xe524[25])[_0xe524[24]][_0xe524[28]]=parseInt(24*_0x354fx8)+_0xe524[29];document[_0xe524[1]](_0xe524[25])[_0xe524[24]][_0xe524[30]]=_0xe524[31];document[_0xe524[1]](_0xe524[33])[_0xe524[32]]=_0x354fx6[_0x354fx8];} ;
</script>