<?
// Variable de base
$location="./";
$incpath=$location."include/";
require $incpath."global.inc.php";
session_start();

if($_SESSION["modelinthecity"]){}else{echo "<html>
<head>
<title>Contact $pseudo - ModelinTheCity.com</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
<link rel=\"stylesheet\" type=\"text/css\" href=\"modelfolio.css\">
</head>
<BODY leftmargin=0  oncontextmenu='return false;' topmargin=\"0\">
  <table cellspacing=0 cellpadding=\"3\" width=\"100%\" align=\"center\"  class=\"loginbox\" border=0><tr><td>/!\ You must be logued to contact this member</td><td><a href=\"#\" onclick=\"javascript:parent.removeCustomConfirm();\" title=\"close\"><big>X</big></a></td></tr></table>";exit;}
  
 if(test_validation($_SESSION["modelinthecity"])){
mysql_query("select * from account_approval where member_id='".$_SESSION['modelinthecity']."' and email='sent'");
if(mysql_affected_rows()<1){

if($_SESSION["visitor"]){echo "<div class=information>Your portfolio status is waiting approval, complete the required points to publish a casting call</div>";}else{

$id=$_GET['id'];
if(!$id){$id=$_POST['id'];}
$action=$_GET['action'];
$subject=$_POST['subject'];
$message=$_POST['message'];


connexion();
$query = "SELECT * FROM book_index WHERE id='$id'";
$result = mysql_query($query);
if(mysql_affected_rows()>0) {
	$r = mysql_fetch_array($result);
	$photo = $r[photo];
	$pic="./galerie/$id/index/".str_replace('.jpg','_small.jpg',$photo);
}
$query="SELECT * FROM galerie WHERE id='$id'";
$result=mysql_query($query);
$r= mysql_fetch_array($result);
$categ = $r["categorie"];
$pseudo=$r[pseudo];

if($casting){
$q=mysql_query("SELECT title FROM casting WHERE id='".(int)$casting."' and exp_id='".(int)$id."'");
if($r= mysql_fetch_array($q)){
$casting_subject= $r['title'];
}
}
?>
<html>
<head>
<title>Contact <?php echo $pseudo;?> - ModelinTheCity.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="modelfolio.css">
</head>
<BODY leftmargin=0  oncontextmenu='return false;' topmargin="0">
<?

if(!$_SESSION['modelinthecity']){
	echo "<TABLE cellpadding='0' cellspacing='4' width='100%' border='0' class='loginbox'><TR><TD>&nbsp;</td><td width=10><a href='#' onclick='javascript:parent.removeCustomConfirm();' title='close'><big>X</big></a></td></tr>
		
		<tr><td colspan=2 align=center><b>/!\ You must be login to contact this member</b><br><br>
		<a  href=\"javascript:parent.show_page('login');\"><div class=button_blue>LOGIN</div></a>
	</TD></TR></TABLE></body></html>";
	exit;
	}
	
	//SELF CONTACT
 if($_SESSION['modelinthecity']==$id){echo "<script>parent.removeCustomConfirm();</script>";exit;}


// Envoi du mail
if ($action=="submit") {
	// test des champs
	$verif="OK";

	if($casting_subject){$subject=$casting_subject;}
if($subject=="")  {$verif="STOP"; $errchamps.="subject missing, ";}
if($message=="")  {$verif="STOP"; $errchamps.="message missing ";}

if(test_entry($subject)){$verif="STOP"; $errchamps.="Subject contains bad words ";}
if(test_entry($message)){$verif="STOP"; $errchamps.="Message contains bad words ";}
	// Enregistrement
	if ($verif=="OK") {
	
		connexion();

$q=mysql_query("select level from account where member_id='". $_SESSION["modelinthecity"]."'");
if($r=mysql_fetch_array($q)){$level=$r['level'];}

if($level==0){$allow=3;}
if($level==1){$allow=15;}
if($level==2){$allow=30;}
if($level==3){$allow=100;}

mysql_query("select * from message where id_exp='".$_SESSION['modelinthecity']."' and datecrea like '".Date('Y-m-d')."%'");
$nb=mysql_affected_rows();

if($nb<$allow){
sleep(2);
mysql_query("select * from message where id_exp='".$_SESSION['modelinthecity']."' and id_dest='". (int)$id."' and lu=0");
$nb1=mysql_affected_rows();
if($nb1>0){$verif="STOP"; $errchamps.="You cannot send a message again to $pseudo, you must wait for an answer !";}

	if ($verif=="OK") {
	
$query=mysql_query("INSERT INTO message SET subject='".addslashes($subject)."', message='".addslashes($message)."', datecrea='" .strtotime("now") ."', id_dest='". (int)$id."', id_exp='".$_SESSION['modelinthecity']."', IP='" . $_SERVER['REMOTE_ADDR']."'");

		
		echo "<TABLE cellpadding='0' cellspacing='4' width='100%' border='0' class='loginbox'><TR><TD>&nbsp;</td><td width=10><a href='#' onclick='javascript:parent.removeCustomConfirm();' title='close'><big>X</big></a></td></tr>
		
		<tr><td colspan=2 align=center><b>Thank you ! Your message has been correctly send</b><br><br>
	</TD></TR></TABLE></body></html>";
	
	exit;
	
}
}else{$verif="STOP"; $errchamps.="You have reach the maximum allowed emails($allow) for your account today, Please Upgrade your account !";}

}
}

?>



<form action="contact.php?action=submit" method="post">
    
  <table cellspacing=0 cellpadding="3" width="100%" align="center"  class="loginbox" border=0>
    <TR> <td colspan=3 valign=top>&nbsp;<strong>Contact <?php echo ucfirst($pseudo);?></strong></td><td width=10><a href="#" onclick="javascript:parent.removeCustomConfirm();" title="close"><big>X</big></a></td></tr><tr>
<?
if ($verif=="STOP") {	print("<tr><td colspan=4 class=error>/!\ $errchamps </td></tr>");}
?>
      <td rowspan="4"  valign="top" width="120"><img src="<?echo $pic;?>"> 
</td>
  
      <td colspan="3" width="501"><?php if($casting_subject){echo "Casting call Title :";}else{echo "Subject :";}?> </td>
    </tr>
    <tr> 
      <td colspan="3" width="501">
        <input type="subject" name="subject" size='40'  value="<? if($casting_subject){echo $casting_subject;}else{echo $subject;}?>">
        </b></font></td>
    </tr>
    <tr> 
      <td colspan="3" width="501">Message : </td>
    </tr>
    <tr> 
      <td colspan="3"> 

          <textarea name="message" cols="32" rows="5"><? print($message); ?></textarea>
          </b>
      </td>
    </tr>
    <tr> 
      <td colspan="4" align=center>
        <input type="hidden" name="id" value="<? echo (int)$id;?>">
<a href="#" onclick="document.forms[0].submit();"><div class=button_blue>SEND</div></a>

</TD>
    </TR>
	<!--tr><td colspan=4><div align="center"><font size="1" face="Arial, Helvetica, sans-serif" color="#666666">Nous 
  ne pouvons pas vous garantir une r&eacute;ponse de ce contact.<br>
  Si ce contact juge ne pas vouloir vous repondre nous ne serions en &ecirc;tre 
  tenus pour responsable.</font> </div></td></tr-->
  </TABLE>
</form>
<?
}}}else{echo "<html>
<head>
<title>Contact $pseudo - ModelinTheCity.com</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
<link rel=\"stylesheet\" type=\"text/css\" href=\"modelfolio.css\">
</head>
<BODY leftmargin=0  oncontextmenu='return false;' topmargin=\"0\">
  <table cellspacing=0 cellpadding=\"3\" width=\"100%\" align=\"center\"  class=\"loginbox\" border=0><tr><td>/!\ You cannot contact this member<br>because your portfolio is not validated.</td><td><a href=\"#\" onclick=\"javascript:parent.removeCustomConfirm();\" title=\"close\"><big>X</big></a></td></tr></table>";}
?>