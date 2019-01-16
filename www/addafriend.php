<?

if(!$PHPSESSID || !$_SERVER[REMOTE_ADDR]){exit;}

require ('include/global.inc.php');
connexion();
session_start();

$pseudo=ucfirst(public_info($id,'pseudo'));

$message=strip_tags($message);
$message=ScanXss($message,4); $err_message=0;

$thecode=ScanXss($thecode);$err_thecode=0;

	  $err_check=0;
	


	  

if ($action=="send") {

sleep(1);

		$verif=1;  $ermes="";
	
$ip=$_SERVER['REMOTE_ADDR'];

if(!$message){$ermes.="/!\ Message missing<br>";$verif=0;$err_message=1;}

if($_SESSION[modelinthecity]==$id){$ermes.="/!\ You can't be friend with yourself<br>";$verif=0;$err_error=1;}

if($thecode){

$thecode_okay = (isset($_POST['thecode']) && ($_POST['thecode'] == $_SESSION["noautamationcode"]));
if(!$thecode_okay){$verif=0;$ermes.="/!\ Captcha not match<br>";$err_captcha=1; }
}

if(!$thecode){$ermes.="/!\ Captcha missing<br>";$verif=0;$err_captcha=1;}

if(!$id){$ermes.="/!\ Error<br>";$verif=0;}

	// Enregistrement dans la base
	if ($verif==1) {
	$query="SELECT * FROM friends WHERE friend_id='$_SESSION[modelinthecity]' and client_id='$id'";
$result=mysql_query($query);
if(mysql_affected_rows()<1){
$query="INSERT INTO friends SET message='$message',friend_id='$_SESSION[modelinthecity]', client_id='$id', date='".Date('Y-m-d')."',IP='". $_SERVER[REMOTE_ADDR]."', status='notread'";
$result=mysql_query($query);

echo '<html><head>
<link rel="stylesheet" type="text/css" href="http://www.modelinthecity.com/modelfolio.css">
</head><body topmargin=20 rightmargin=0 bottommargin=0 leftmargin=15>';
echo " <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\"  align=center class=information>
    <TR> 
      <TD height=\"12\" align=center>&nbsp;</td><td align=right><a href=\"#\" onclick=\"javascript:parent.removeCustomConfirm();\"><big><b>X</b></a></td>
  </TR><td align=center colspan=2><big><b>Congratulations</b></big><br><br>Your invitation has been sent!<br><br>Please be patient ... <br>You will receive a message to be allowed.<br><br></td></tr></table></body></html>";exit;
}else{echo '<html><head>
<link rel="stylesheet" type="text/css" href="http://www.modelinthecity.com/modelfolio.css">
</head><body topmargin=20 rightmargin=0 bottommargin=0 leftmargin=15>';
echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\"  align=center class=information>
    <TR> 
      <TD height=\"12\" align=center>&nbsp;</td><td align=right><a href=\"#\" onclick=\"javascript:parent.removeCustomConfirm();\"><big><b>X</b></a></td>
  </TR><td align=center colspan=2><big><b>Invitation</b></big><br><br>Already sent!<br><br>Please be patient ... <br>You will receive a message to be allowed.<br><br></td></tr></table></body></html>";exit;}

}


}


	unset($_SESSION["noautamationcode"]);
	
	include('contact_us_image.php');

?>
  
<html><head>
<link rel="stylesheet" type="text/css" href="http://www.modelinthecity.com/modelfolio.css">
</head>

<?
if(!$_SESSION[modelinthecity]){echo "<div align=center class=information width=100%><br><br>You must be logued to add a friend!<br><br>Do you want to login now?<br><br><a href=\"javascript:parent.show_page('login');\"><div class=button_blue>Login</div></a><br>or<br><br><a href=\"javascript:parent.removeCustomConfirm();\"><div class=button_blue>Continue</div><br><br></div>";exit;}
?>
<body topmargin=0 rightmargin=0 bottommargin=0 class=loginbox bgcolor=blue>
  <form method="post" action="addafriend.php?action=send">
  <input type="hidden" name="action" value="send">
  <input type="hidden" name="id" value="<?php echo $id;?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="3" bordercolor=white align=center class=loginbox>
    <TR> 
      <TD height="12" align=left><b><big>ADD ME AS FRIEND</big></b></td><td align=right><a href="#" onclick="javascript:parent.removeCustomConfirm();"><big><b>X</b></a></td>
  </TR>
 
    <TR> 
      <TD  align=center height="17" colspan=2> <br>
        <table cellpadding="0" cellspacing="3" border="0" width=100% class=loginbox>
          <tr> 
            <td align=right width="12%" height="22">Message :</td>
            <td width="21%" > 
              <textarea name="message" cols="20" rows="2" MAXLENGTH=100 <?php if($err_message){echo "style='background:yellow;';";}?>><?php echo ScanXss($message,4);?></textarea>
              </td>

          <tr valign="bottom"> 
            <td height="7" colspan="2"> 
         <div align="center">
			   
			  <img src="<?php echo $img_name;?>"><input name="refresh" value="refresh" type="image" src="images/button_refresh.gif"><br><img src="images/blank.gif" width=100% height=5>
			  Type this word :
                  <input type=text name="thecode" MAXLENGTH=16 size=8 <?php if($err_captcha){echo "style='background:yellow;';";}?>>
				  			
              </div>
            </td>
          </tr>
          <tr valign="bottom"> 
            <td colspan="2" height="24" align=center class=small>   <br>  
	               <a onclick="javascript:submit();" title="Send my invitation"><div class=button_blue_1>Send this invitation to <?php echo $pseudo;?></div></a><br>
            </td>
          </tr>
		    <?
 if(!$verif && $action) {	if ($ermes) {print("<tr><td colspan=10 width=100%><nobr><font color='#ff9900'>$ermes</font></nobr></td></tr>");}else{echo "<tr><td colspan=9 width=100%><nobr><font color='#ff9900'>Check error in yellow inputs $error</font></nobr></td></tr>";}}
?>
        </table>
      </TD>
    </TR>
</TABLE>
  </form>







