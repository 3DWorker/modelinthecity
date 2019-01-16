<?
// Variable de base
$location="./";
$incpath=$location."include/";
require $incpath."global.inc.php";
session_start();

echo $_SESSION['modelinthecity'];

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
?>
<html>
<head>
<title>Contact <?php echo $pseudo;?> - ModelinTheCity.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="modelfolio.css">
</head>
<BODY leftmargin=0  oncontextmenu='return false;' topmargin="0">
<?


// Envoi du mail
if ($submit) {
	// test des champs
	$verif="OK";

	
if($subject=="")  {$verif="STOP"; $errchamps.="sujet, ";}
if($message=="")  	 {$verif="STOP"; $errchamps.="message.";}

	// Enregistrement
	if ($verif=="OK") {
	
		connexion();


$query="INSERT INTO message SET expnom='$expnom', expemail='$expemail', expurl='$urlcontact', subject='$subject',message='$message', datecrea=CURDATE(), id_dest='$id', id_exp='$logtatoo'";  
 	


mysql_query($query);echo mysql_error();
		
		
		print("<TABLE cellpadding=0 cellspacing=4 border=0><TR><TD>");
		

		// Chargement de la page suivante et stop
		bandotitre("Contact : $pseudo",2); 
		?> 
<div align=center><font face=arial color=white size=2><b>
		Votre message à bien été envoyé à <? print $pseudo_; ?></b></font>
		</div>
		<P align=center>
		<a href="javascript:window.close()">Fermer cette Fenêtre</a>
		<?
		fintable();
		print("</TD></TR></TABLE></body></html>");
		exit;
	}
}

?>



<form action="contact.php" method="post">
    
  <table cellspacing=0 cellpadding="3" width="100%" align="center"  class="loginbox" border=1>
    <TR> <td colspan=3 height=25>&nbsp;&nbsp;<strong>Contact <?php echo ucfirst($pseudo);?></strong></td><td width=10><a href="#" onclick="javascript:parent.removeCustomConfirm();" title="close">X</a></td></tr><tr>
      <td rowspan="4"  valign="top" width="120"><img src="<?echo $pic;?>" vspace="0" hspace="0"> 
        <br>
        <?


if ($verif=="STOP") {
	print("<div class=error>Vous n'avez pas rempli les champs suivants :<br> $errchamps</div><BR>");
}

?></td>
  
      <td colspan="3" width="501">Subject : </td>
    </tr>
    <tr> 
      <td colspan="3" width="501">
        <input type="subject" name="subject" size='40'  value="<? echo $subject;?>">
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


</body>
</html>