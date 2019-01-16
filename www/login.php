<?php

require ('include/global.inc.php');

session_start();
if($_SESSION['languages']=="english"){
require ('include/languages/english.php');
}
elseif($_SESSION['languages']=="french"){
require ('include/languages/french.php');
}
connexion();//echo $base;
$error="<img src='./images/verif_notok.gif'>";

$submiter=$_POST['submiter'];

if(!isset($_SESSION['REFERER'])){session_start();$_SESSION['REFERER']=$_SERVER[HTTP_REFERER];}

if($submiter=="login"){

$login=$_POST['login'];
$mdp=$_POST['mdp'];



$verif=1;
if(!$login){$verif=0;$err_Pseudo=$error;}else{$err_Pseudo="";}
if(!$mdp){$verif=0;$err_mdp=$error;}else{$err_mdp="";}

if($verif==1){

	$q=mysql_query("SELECT id, valid FROM galerie WHERE email='".$login."' and password='".md5($mdp)."'");


	if(mysql_affected_rows()==1){
if($r=mysql_fetch_array($q)){
session_start();
if(!$r['valid']){$_SESSION["visitor"]="1";}
		$_SESSION["modelinthecity"]=$r['id'];
		}
	if($_SESSION["modelinthecity"]){
	@setcookie('login', $login, time()+3600*24*30*3);
 
//if($_SESSION['REFERER'] && !is_int(strpos($_SESSION['REFERER'],'confirm'))){echo "<script>top.location.href='".$_SESSION['REFERER']."';</script>";}else{

if(test_validation($_SESSION['modelinthecity'])==false){
echo "<script>top.location.href='http://www.modelinthecity.com/index.php?page=admin_portfolio_index';</script>";}else{
echo "<script>top.location.href='http://www.modelinthecity.com';</script>";
}
// echo "<script>parent.location.reload();</script>";
// }


}
			}else{
$ermes=$error . " " . ERROR_IDENTIFY;}

}else{$ermes=$error . " " . ERROR_IDENTIFY;}
}

?>
<html><head>
<link rel="stylesheet" type="text/css" href="<?php echo $location;?>modelfolio.css">
</head>
<script>
function relink(){//alert(parent.removeCustomConfirm());
// if(!parent.removeCustomConfirm()){
parent.show_page('password_forgotten');
// }
}
</script>
<body  topmargin=0 leftmargin=0 rightmargin=0 bottommargin=0>
<form  method="post" action="login.php"><!--input type=hidden name=referer value="<?php //if($referer){echo $referer;}else{echo $_SESSION['REFERER'];};?>"-->
  <table width="300" border="0" cellspacing="0" cellpadding="0" class=loginbox align=center> 
    <TR> 
      <TD height="14"><big><b><?php echo TEXT_LOGIN;?></b></big></TD><td align=right><a href="#" onclick="javascript:parent.removeCustomConfirm();">X</a></td>
  </TR>
    <input type="hidden" name="action" value="login">
    <input type="hidden" name="categ" value="<? print $categ; ?>">
	
    <TR valign=top> 
      <TD width=100% align=center height="124" colspan=2>
	          <table width="47%" border="0" cellspacing="10" cellpadding="0" class=loginbox>
          <tr> 
            <td width="41%">
              <div align="right"><nobr><?php echo TEXT_EMAIL;?></nobr></div>
            </td>
            <td width="48%">
              <input type="text" class="input" name="login" <?php if($_COOKIE['login']){echo "value='".$_COOKIE['login']."'";} ?>>
            </td>        
          </tr>
		  
          <tr>
            <td width="41%">
              <div align="right"><nobr><?php echo TEXT_PASSWORD;?></nobr></div>
            </td>
            <td width="48%">
              <input type="password" class="input" name="mdp">
              </td>
          </tr>
		  
		  <TR>		  
		  <td align=right colspan=2>	<input type="hidden" name="submiter" value="login">	<a onclick="document.forms[0].submit();"><div class="button_blue_small"><b>Login</b></div></a>
          <!--input class=but type=submit name="submit" value="login"--><br>
		  <?php echo $ermes;?>
		  <br><div align=left><a href="#" onclick="javascript:parent.show_page('password_forgotten');"><u><?php echo TEXT_PASSWORD_FORGOTTEN;?></u></a>
    </td></tr>
	</table>

	
      </TD>
    </TR>

</TABLE></form>

</body>
</html>