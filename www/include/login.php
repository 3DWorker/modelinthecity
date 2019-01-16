<?php

require ('include/global.inc.php');
connexion();//echo $base;
$error="<img src='./images/verif_notok.gif'>";

if($submit=="login"){
$verif=1;
if(!$login){$verif=0;$err_Pseudo=$error;}else{$err_Pseudo="";}
if(!$mdp){$verif=0;$err_mdp=$error;}else{$err_mdp="";}

if($verif==1){
$mdp=md5($mdp);
	$q=mysql_query("SELECT id FROM galerie WHERE pseudo='$login' and password='$mdp'");


	if(mysql_affected_rows()==1){
if($r=mysql_fetch_array($q)){
session_start();
		$_SESSION["modelinthecity"]=$r['id'];
		}
	if($_SESSION["modelinthecity"]){
 

echo "<script>top.location.href='index.php?page=espace_membre&PHPSESSID=$PHPSESSID';</script>";
}
			}else{
$ermes="$error Nous ne pouvons pas vous identifier!";}

}else{$ermes="$error Le formulaire comporte des erreurs<strong>$errchamps";}
}

?>
<html><head>
<link rel="stylesheet" type="text/css" href="<?php echo $location;?>modelfolio.css">
</head>
<body  topmargin=0 leftmargin=0 rightmargin=0 bottommargin=0 class=loginbox>
<form method="post" action="login.php">
  <table width="100%" border="1" cellspacing="0" cellpadding="2" class=loginbox align=center> 
    <TR> 
      <TD height="14"><big><b>LOGIN</b></big></TD><td align=right><a href="#" onclick="javascript:parent.removeCustomConfirm();">X</a></td>
  </TR>
    <input type="hidden" name="action" value="login">
    <input type="hidden" name="categ" value="<? print $categ; ?>">
	
    <TR valign=top> 
      <TD width=100% align=center height="124" colspan=2>
	          <table width="47%" border="0" cellspacing="10" cellpadding="0" class=loginbox>
          <tr> 
            <td width="41%">
              <div align="right"><nobr>Login: </nobr></div>
            </td>
            <td width="48%">
              <input type="text" class=input name="login">
            </td>        
          </tr>
		  
          <tr>
            <td width="41%">
              <div align="right">Password :</font> </div>
            </td>
            <td width="48%">
              <input type="password"  class=input name="mdp">
              </td>
          </tr>
		  
		  <TR>		  
		  <td align=right colspan=2>		
          <input class=but type=submit name="submit" value="login"><br>
		  <?php echo $ermes;?>
		  <br><div align=left><a href="#" onclick="javascript:show_page('password_forgotten.php');"><u>Password forgotten ?</u></a>
    </td></tr>
	</table>

	
      </TD>
    </TR>

</TABLE></form>
</body>
</html>