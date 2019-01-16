<?php

require ('include/global.inc.php');
connexion();//echo $base;
session_start();

if($_SESSION['languages']=="english"){
require ('include/languages/english.php');
}
elseif($_SESSION['languages']=="french"){
require ('include/languages/french.php');
}

$error=" style='background:yellow;'";



if($_POST['action']=="password_forgotten"){

$verif=1;
if(!$_POST[email]){$verif=0;$err_email=$error;}else{$err_email="";}
if(!$_POST[year]){$verif=0;$err_year=$error;}else{$err_year="";}
if(!$_POST[month]){$verif=0;$err_month=$error;}else{$err_month="";}
if(!$_POST[day]){$verif=0;$err_day=$error;}else{$err_day="";}
if(!$_POST[secret_answer]){$verif=0;$err_secret_answer=$error;}else{$err_secret_answer="";}
if(!$_POST[secret_question]){$verif=0;$err_secret_question=$error;}else{$err_secret_question="";}


if($verif==1){
//sleep(4);

	$q=mysql_query("SELECT id, pseudo, nom, prenom FROM galerie WHERE email='".trim($_POST[email])."' and secret_question='".$_POST[secret_question]."' and secret_answer='".md5(strtolower(trim($_POST[secret_answer])))."' and age='".$_POST[year]."' and mois='".$_POST[month]."' and jour='".$_POST[day]."'");
	

	if(mysql_affected_rows()>0){
if($r=mysql_fetch_array($q)){
session_start();
		$_SESSION["modelinthecity_passisokay"]=$r['id'];
		$_SESSION["modelinthecity_alias"]=$r['pseudo'];
		$_SESSION["modelinthecity_name"]=$r['nom'];
		$_SESSION["modelinthecity_first"]=$r['prenom'];
		usleep(20000);
		}
	if($_SESSION["modelinthecity_passisokay"]){

	?>
	<html><head>
<link rel="stylesheet" type="text/css" href="modelfolio.css"></head><script language="Javascript" src="include/global.inc.js"></script><body topmargin=0 leftmargin=0><form name="pwd1" method="post" action="password_forgotten.php?action=new_password"><input type="hidden" name="action" value="new_password"><table width="100%" border="0" cellspacing="2" cellpadding="2" class=loginbox align=right height=10><TR><TD height="14"><big><b><?php echo TEXT_NEW_PASSWORD;?></b></big> </TD><td align=right><a href="#" onclick="javascript:parent.parent.removeCustomConfirm();"><big><b>X</b></big></a></td></TR><TR valign=top><TD width=100% align=center colspan=2><table width="100%" border="0" cellspacing="1" cellpadding="1" class=loginbox><tr><td width="30%" align=right valign=top><nobr><?php echo TEXT_PASSWORD;?></nobr></td><td width=70%><input type="password" class='input' maxlength='15' name="new_password" id="new_password" <?php echo $err_new_password;?> onkeyup='CheckPassword(this.value,this.name);' onkeypress='CheckPassword(this.value,this.name);' onkeydown='CheckPassword(this.value,this.name);'><br><div style="background-color: transparent; margin:10px;line-height:2px;border:1 solid #777777;height:3px;width:120px"><div style="background-color: transparent;" id="progressbar"></div></div><div id="bart" style="margin:10px;line-height:5px;font-size:9px;"></div></td></tr><tr><td align=right><nobr><?php echo TEXT_RETYPE_PASSWORD;?> :</nobr></td><td><input type="password" class=input name="new_password1" maxlength='15' <?php echo $err_new_password1;?>></td></tr><tr><td>&nbsp;</td><td align=right><a onclick='document.forms["pwd1"].submit();' title="Next step"><div class=button_blue_small><b>Next >></b></div></a></td></tr></table></tr></td></table></form></body></html>	
	<?
	}
			}else{
		
$ermes=" <b>/!\ ".ERROR_IDENTIFY."</b>";}

}else{$ermes="/!\ ".ERROR_TO_CHECK;}


}elseif($_POST['action']=="new_password"){


session_start();
if(!$_SESSION["modelinthecity_passisokay"]){exit;}

	if($_POST['new_password']!=$_POST['new_password1'] && $verif!="STOP" && $_POST['new_password'] && $_POST['new_password1']) {$verif="STOP"; if(!$mess)$mess=ERROR_PASSWORD_NOT_SIMILAR. " ";$err_new_password=$error;}
	if($_POST['new_password']=="") {$verif="STOP"; $err_new_password=$error;if(!$mess)$mess="/!\ ".ERROR_TO_CHECK;}
	if($_POST['new_password1']=="") {$verif="STOP"; $err_new_password1=$error;if(!$mess)$mess="/!\ ".ERROR_TO_CHECK;}	
	if($_POST['new_password'] && strlen($_POST['new_password'])<8 && $messno!=8) { $verif="STOP";$messno=8;if(!$mess)$mess.=ERROR_PASSWORD_CHARS. " ";$err_new_password=$error;}	
	if($_POST['new_password'] && !preg_match("/[a-zA-Z0-9-!@#$%éèçâà^&*?_~£()]/",$_POST['new_password']) && $messno!=8){$verif="STOP"; $messno=8;if(!$mess)$mess.=ERROR_PASSWORD_BAD_CHARS . " ";$err_new_password=$error;}
    
	 if($_POST['new_password'] && !preg_match("/[a-z]/",$_POST['new_password'])){ $_mess=1;}
	 if($_POST['new_password'] && !preg_match("/[A-Z]/",$_POST['new_password'])){$_mess+=1;}
	if($_POST['new_password'] && !preg_match("/[0-9]/",$_POST['new_password'])){$_mess+=1;}
	

if($_mess>1 && $messno!=8){$verif="STOP"; $messno=8;if(!$mess)$mess.=ERROR_PASSWORD_WEAK. " ";$err_new_password=$error;}
				if($_POST['new_password'] && $_SESSION["modelinthecity_alias"] && preg_match("/".$_SESSION["modelinthecity_alias"]."/",$_POST['new_password']) && $messno!=8){ $verif="STOP";$messno=8;if(!$mess)$mess.=ERROR_PASSWORD_EASY. " ";$err_new_password=$error;}
				if($_POST['new_password'] && $_SESSION["modelinthecity_name"] && preg_match("/".$_SESSION["modelinthecity_name"]."/",$_POST['new_password']) && $messno!=8){ $verif="STOP";$messno=8;if(!$mess)$mess.=ERROR_PASSWORD_EASY. " ";$err_new_password=$error;}
				if($_POST['new_password'] && $_SESSION["modelinthecity_first"] && preg_match("/".$_SESSION["modelinthecity_first"]."/",$_POST['new_password']) && $messno!=8){ $verif="STOP";$messno=8;if(!$mess)$mess.=ERROR_PASSWORD_EASY. " ";$err_new_password=$error;}
//echo testPassword($_POST['new_password']);


	if($verif=="STOP"){
	?>
		<html><head>
<link rel="stylesheet" type="text/css" href="modelfolio.css"></head><script language="Javascript" src="include/global.inc.js"></script><body topmargin=0 leftmargin=0><form name="pwd2" method="post" action="password_forgotten.php?action=new_password"><input type="hidden" name="action" value="new_password"><table width="330" border="0" cellspacing="5" cellpadding="4" class=loginbox align=right><TR><TD height="14"><big><b><?php echo TEXT_NEW_PASSWORD;?></b></big> </TD><td align=right><a href="#" onclick="javascript:parent.parent.removeCustomConfirm();">X</a></td></TR>
<td class=error colspan=2><?php echo $mess;?></td></tr>
<TR valign=top><TD width=100% align=center colspan=2><table width="100%" border="0" cellspacing="1" cellpadding="2" class=loginbox><tr><td width="30%" align=right valign=top><nobr><?php echo TEXT_PASSWORD;?> : </nobr></td><td width=70% align=right><input type="password" class='input' maxlength='15' name="new_password" id="new_password" <?php echo $err_new_password;?>  onkeyup='CheckPassword(this.value,this.name);' onkeypress='CheckPassword(this.value,this.name);' onkeydown='CheckPassword(this.value,this.name);'><div style="background-color: transparent; margin:10px;line-height:2px;border:1 solid #777777;height:3px;width:120px" align=left><div style="background-color: transparent;" id="progressbar"></div></div><div id="bart" style="margin:10px;line-height:5px;font-size:9px;"></div></td></tr><tr><td align=right><nobr><?php echo TEXT_RETYPE_PASSWORD;?> : </nobr></td><td align=right><input type="password" class=input name="new_password1" maxlength='15' <?php echo $err_new_password1;?>></td></tr><tr><td>&nbsp;</td><td align=right><a onclick='document.forms["pwd2"].submit();'><div class=button_blue_small><b>Next >></b></div></a></td></tr></table></tr></td></table></form></body></html>	
	<?
	}else{
	
	if($_SESSION["modelinthecity_passisokay"] && $_POST['new_password']){
	
	mysql_query("update galerie set password='".md5($_POST['new_password'])."' where id='".$_SESSION["modelinthecity_passisokay"]."'");
	if(!mysql_error()){echo '	<html><head>
<link rel="stylesheet" type="text/css" href="modelfolio.css"></head><script language="Javascript" src="include/global.inc.js"></script><body  topmargin=0 leftmargin=0><table width="335" border="0" cellspacing="7" cellpadding="5" class=loginbox align=right><TR><TD height="14"><big><b>CREATE A NEW PASSWORD</b></big> </TD><td align=right><a href="#" onclick="javascript:parent.parent.removeCustomConfirm();"><big><b>X</b></big></a></td></TR>
<td class=information colspan=3>Your password has been correctly changed !</td></tr><tr><td><br>Close this window</td></tr></table></body></html>';}
exit;
	}
	
	}

}

if(!$_SESSION["modelinthecity_passisokay"]){
?>
<html><head>
<link rel="stylesheet" type="text/css" href="<?php echo $location;?>modelfolio.css">
</head>
<body  topmargin=0 leftmargin=0>
<form name="pwd" method="post" action="password_forgotten.php">
<input type="hidden" name="action" value="password_forgotten">	
  <table width="50%" border="0" cellspacing="2" cellpadding="2" class=loginbox>
    <TR> 
      <TD height="14"><big><b><?php echo TEXT_NEW_PASSWORD;?></b></big> </TD><td align=right><a href="#" onclick="javascript:parent.parent.removeCustomConfirm();">X</a></td>
  </TR>

    <TR valign=top> 
      <TD width=50% align=center colspan=2>    
	          <table width="47%" border="0" cellspacing="3" cellpadding="2" class=loginbox>
         <?php if($ermes){echo " <tr><td class=error colspan=2>".$ermes."</td></tr>";}?>
		 
		  <tr>
            <td width="30%" align=right><nobr><?php echo TEXT_EMAIL;?></nobr>
            </td>
            <td width=70%>
              <input type="text" class=input name="email" <?php echo $err_email;?> value="<?php echo $_POST['email'];?>">
            </td>        
          </tr>
		          <tr> 
            <td align=right><nobr><?php echo TEXT_DATEOFBIRTH;?></nobr>
            </td>
            <td><nobr>
             <?

		$option="<select name='year' ".$err_year."><option value=0>" .TEXT_YEAR ."</option>";
for($i=1910;$i<=Date('Y');$i++){
	if($_POST['year']==$i){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$i."'$sel>".$i."</option>";
}
	$option.="</select>";
	echo $option;
?>

<?

		$option="<select name='month' ".$err_month."><option value=0>" .TEXT_MONTH ."</option>";
		$M=array('select','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
for($i=1;$i<13;$i++){
	if($_POST['month']==$i){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$i."'$sel>".$M[$i]."</option>";
}
	$option.="</select>";
	echo $option;
?>

<?

		$option="<select name='day'  ".$err_day."><option value=0>" .TEXT_DAY."</option>";
for($i=1;$i<32;$i++){
	if($_POST['day']==$i){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$i."'$sel>".$i."</option>";
}
	$option.="</select>";
	echo $option;
?></nobr>
            </td>        
          </tr><tr> 
            <td colspan=2 align=right>
		<?php
		$option="<select name='secret_question' ".$err_secret_question." ><option value=0>" .TEXT_SECRET_QUESTION ."</option>";
	$q=mysql_query("select name,id from categorie_model_secret_question where 1");
	while($r=mysql_fetch_array($q)){
	if($_POST['secret_question']==$r[id]){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$r[id]."'$sel>".$r[name]."</option>";
		}		$option.="</select>";
	echo $option;
	
	?>  
    </td>        
          </TR>
		  <tr><td align=left><nobr><?php echo TEXT_SECRET_ANSWER;?> :</nobr></td><td><input class="input" type="text" name="secret_answer" value="<?php echo $_POST['secret_answer'];?>" maxlength="25"  <?php echo $err_secret_answer;?>></td>
		  <TR>		  
		  <td colspan=2><table border=0 width=100%><tr><td width=80%>&nbsp;</td>
		  <td align=right>		
          <a onclick='document.forms["pwd"].submit();'><div class=button_blue_small><b><?php echo TEXT_NEXT;?></b></div></a>		
    </td></tr></table></td></tr>
	</table>	
      </TD>
    </TR>
</TABLE></form>
</body>
</html>
<?

}?>