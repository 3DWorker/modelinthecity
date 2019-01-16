<?
error_reporting(0);
if(!$PHPSESSID || !$_SERVER['REMOTE_ADDR']){exit;}

require ('include/global.inc.php');
connexion();//echo $base;
$error="<img src='./images/alert.gif'>";
$no="<img src=images/verif_notok.gif>";
$yes="<img src=images/verif_ok.gif>";

 $change=uniqid ( rand() );

//if(file_exists($_COOKIE['security_pic'])){unlink($_COOKIE['security_pic']);}


$nom=ScanXss($nom,2); $err_nom=0;
$prenom=ScanXss($prenom,2); $err_prenom=0;
$pseudo=ScanXss($pseudo); $err_pseudo=0;
$email=ScanXss($email,1); 	$err_email=0;	
$thecode=ScanXss($thecode);$err_thecode=0;

	  $err_check=0;
	

	  $nom=ucfirst($nom);
	  $prenom=ucfirst($prenom);
	  
session_start();

if ($action=="send") {

sleep(1);


//echo $_SESSION["noautamationcode"];


		$verif=1;  $ermes="";
	
$ip=$_SERVER['REMOTE_ADDR'];

if(!$nom){$ermes.="/!\ Lastname missing<br>";$verif=0;$err_nom=1;}
if(!$prenom) {$ermes.="/!\ Firstname missing<br>";$verif=0;$err_prenom=1;}
if(!$pseudo) {$ermes.="/!\ Alias missing<br>";$verif=0;$err_pseudo=1;}
if(!$email) {$ermes.="/!\ E-mail address missing<br>";$verif=0;$err_email=1;}

//if(!$check){$ermes.="/!\ Agreement not checked<br>";$verif=0;$err_check=1;}


if (preg_match("/^([0-9]+)$/i",$pseudo)==true){$ermes.="/!\ Alias must contains letters also<br>";$verif=0;$err_pseudo=1;}


if($email){
if(ValidateEmail($email)){$ermes.="/!\ This E-mail Address is not valid<br>";$verif=0;$err_email=1;}
}


if($email){
	// Verification de l'existance du client
	$query=mysql_query("SELECT * FROM galerie WHERE email='$email'");
	$nb=mysql_affected_rows();
	if ($nb>=1) {$verif=0; $ermes.="/!\ E-mail address already used<br>";$err_email=1;$email=""; }
	mysql_query("SELECT * FROM membre_tmp WHERE email='$email'");
	$nb=mysql_affected_rows();
	if ($nb>=1) {$verif=0; $ermes.="/!\ E-mail address already used<br>";$err_email=1;$email=""; }
}
	
	
if($pseudo && strlen($pseudo)>3){
	$nb=0;
	$query=mysql_query("SELECT * FROM galerie WHERE LOWER(pseudo)='$pseudo'");
	$nb=mysql_affected_rows();
	mysql_error();
	$query1=mysql_query("SELECT * FROM membre_tmp WHERE pseudo='$pseudo'");
	$nb1=mysql_affected_rows();
	if (($nb+$nb1)>=1) {$verif=0;$ermes.="/!\ Alias already used<br>";$err_pseudo=1; $pseudo="";}
}else{$ermes.="/!\ Alias must contains at least 4 chars<br>";$verif=0;$err_pseudo=1;$pseudo="";}


if($thecode || $_POST['thecode']){

$thecode=strtolower($_POST['thecode']);

$thecode_okay = (isset($_POST['thecode']) && ($thecode == $_SESSION["noautamationcode"]));
if(!$thecode_okay){$verif=0;$ermes.="/!\ Captcha not match<br>";$err_captcha=1; }
}



if(!$thecode){$ermes.="/!\ Captcha missing<br>";$verif=0;$err_captcha=1;}




	// Enregistrement dans la base
	if ($verif==1) {

		connexion();
		//generation mot de passe
		$date=Date('i:s');
	$string1 = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','0','1','2','3','4','5','6','7','8','9',
	'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
$string2=array();		
		for($i=1;$i<=12;$i++){			
			$numAleat = rand(1,count($string1)-1);				
			$string2[] =$string1[$numAleat];			
		}		
		shuffle($string2);		
	$passuser = implode('',$string2);
	$passuser_md5=md5($passuser);
$d=Date('y-m-d');
$key=md5("$passuser×xxm11ooidp$de04l8H6ihJnsKtx0h5Ye98czaiaT89i". uniqid ( rand() ));
		$ccokie=md5(md5(base64_encode($key)));
	$query=mysql_query("SELECT * FROM membre_tmp WHERE id='$key'");
	$nb=mysql_affected_rows();
if($nb<1){



 $query=mysql_query("INSERT INTO `membre_tmp` SET id='$key', IP='$_SERVER[REMOTE_ADDR]', cookie='$PHPSESSID', nom='$nom', prenom='$prenom', pseudo='$pseudo',email='$email',datecrea=NOW()");

}


 @setcookie($_SERVER[REMOTE_ADDR],$PHPSESSID,  time()+3600*24*1, "/", ".modelinthecity.com",0); 


sleep(1);


		$conTenuHtml= '<a href="http://www.modelinthecity.com/activate.php?key='.$key.'">http://www.modelinthecity.com/activate.php?key='.$key.'</a>';
		//Envoi du mail
		$suBjeCt='WELCOME '.ucfirst($pseudo).', on ModelinTheCity.com';
		
		mail_attach($email , $suBjeCt , $conTenuHtml , "images/01011001-0T9F-78G7-17PW-57ZV.png",Date('l jS of F Y h:i:s A'));
		

		
		$fd=fopen('control/signin_file.txt','a+');
		fputs($fd, '
		[EMAIL]'.$email.'
		[PSEUDO]'.$pseudo.'
		[SUBJECT]'.$suBjeCt.'
		[CONTENU]'.$conTenuHtml.'
		[DATE]'.Date('l jS of F Y h:i:s A').'
		[IP]'.$_SERVER[REMOTE_ADDR].'
		[SESSION]'.$PHPSESSID.'
		[KEY]'.$key.'
		--------------------');
		fclose($fd);
		


		// Affichage enregistrement OK
	
?>

   
<table width="100%" border="0" cellspacing="0" cellpadding="0" class=loginbox>
  <tr> 
          <td width="100%" height="24"> 
		     <div align=right><a href="#" onclick="javascript:parent.removeCustomConfirm();"><big><b>X</b></a></div><br>
            <div align="center"><font face="Arial, Helvetica, sans-serif"  size="3"><b>E-MAIL SENT !</b></font></div>
          </td>
        </tr>
        <tr> 
          <td width="100%" height="74"> 
            <div align="center"> <font face="Arial, Helvetica, sans-serif" size="3"><br>
             <br><br> <b>You will receive an e-mail of confirmation within few minutes ...
<br><br><br>Please activate the link in this e-mail to conclude your membership !</b></font><br><br><br><font color=orange face="Arial, Helvetica, sans-serif" size="3"><b>/!\ If you don't receive this e-mail within 10 minutes,<br>please check your spambox and allow the domain ModelinThecity.com to mail you.</b></font></div>
          </td>
        </tr>
      </table>
<?

		$ok="ok";}
}




if(!$ok){

if($err=="date"){
echo "<table width=100%><tr><td class=info>Votre clé d'activation a expirée, veuillez vous réinscrire.</td></tr></table>";}

if($err=="inscript"){
echo "<table width=100%><tr><td class=info>Un membre existe déjà avec ces coordonnées, veuillez vous réinscrire.</td></tr></table>";}



	unset($_SESSION["noautamationcode"]);
	
	include('contact_us_image.php');

?>
  
<html><head>
<link rel="stylesheet" type="text/css" href="http://www.modelinthecity.com/modelfolio.css">
</head>
<body topmargin=0 rightmargin=0 bottommargin=0>
  <form method="post" action="signup.php">
  <input type="hidden" name="action" value="send">
    <input type="hidden" name="categ" value="<? print $categ; ?>">

  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f6f6f6" align=center valign=middle>
    <TR> 
      <TD height="12" align=left><b><big>SIGNUP</big></b></td><td align=right><a href="#" onclick="javascript:parent.removeCustomConfirm();"><big><b>X</b></a></td>
  </TR>
  	    <?
 if(!$verif && $action) {	if ($ermes) {print("<tr><td colspan=10 width=100%><nobr><font color='#ff9900'>$ermes</font></nobr></td></tr>");}else{echo "<tr><td colspan=9 width=100%><nobr><font color='#ff9900'>Check error in yellow inputs $error</font></nobr></td></tr>";}}
?>
    <TR> 
      <TD  align=center height="177" colspan=2> <br>
        <table cellpadding="0" cellspacing="5" border="0" width=100% class=loginbox>
          <tr> 
            <td align=right width="22%" height="22">Lastname :</td>
            <td width="21%" height="22"> 
              <input type="text" class=input name="nom" size=15 maxlength=25 value="<?php echo $nom;?>" <?php if($err_nom){echo "style='background:yellow;';";}?>>
              </td>

            <td align=right colspan=3 height="22">Alias :</td>
            <td height="22" width="14%"> 
        
                <nobr><input type="text" class=input name="pseudo" size=10 maxlength=25 value="<?php echo $pseudo;?>" <?php if($err_pseudo){echo "style='background:yellow;';";}?>>&nbsp;<input type=submit value="check" name="submiter" title="Check availability"><?php if(!$err_pseudo && $pseudo){echo $yes;}?></nobr>

            </td>
            <td height="22" colspan="3" align=left>&nbsp;</td>
          </tr>
          <tr> 
            <td align=right width="22%" height="38">Firstname :</td>
            <td width="21%" height="38">
              <input type="text" class=input name="prenom"  size=15 value="<?php echo $prenom;?>" <?php if($err_prenom){echo "style='background:yellow;';";}?> >
             </td>
   
            <td align=right colspan=3 height="38"><nobr>E-mail :</nobr></td>
            <td colspan="2" height="38">
              <input type="text" class=input name="email" size="20" value="<?php echo $email;?>" <?php if($err_email){echo "style='background:yellow;';";}?>>
             </td>
               </tr>
          <tr valign="bottom"> 
            <td height="7" colspan="9"> 
         <div align="center">
			   
			  <img src="<?php echo $img_name;?>"><input name="refresh" value="refresh" type="image" src="images/button_refresh.gif"><br><img src="images/blank.gif" width=100% height=5>
			  Type this word :
                  <input type=text name="thecode" MAXLENGTH=16 size=8 <?php if($err_captcha){echo "style='background:yellow;';";}?>>
				  			
              </div>
            </td>
          </tr>
          <tr valign="bottom"> 
            <td colspan="9" height="24"> 
     
			               <br> <div align="center"> 
      By clicking the “SIGNUP" button, I certify that I have read and agree to the <a href="./conditions.php" target="_blank">ModelinThecity Terms of service.</A>
               <br>
                <!--input type=hidden value="SIGNUP"  name="submiter"--> <a onclick="document.forms[0].submit();"><div class=button_blue><b><nobr>&nbsp;&nbsp; SIGN UP &nbsp;&nbsp;</nobr></b></div></a></div>
            </td>
          </tr>
	
        </table>
      </TD>
    </TR>
</TABLE>
  </form>

 

<? 
}

function ValidateEmail($e,$v=-1) {
  global $verbose;
  /*
   Return codes:
   0: appears to be a valid email
   1: didn't match pattern of a valid email
   2: looks valid by the pattern, but no DNS records found
  
   Try several things to make sure it is most likely valid:
   1.  preg_match it to make sure it looks valid
   2a. If that passes, check for an MX entry for the domain
   2b. If no MX, check for any DNS entry for the domain
  */
  if ($v==-1) { $v=$verbose; }
  if (!preg_match("/^[a-z0-9.+-_]+@([a-z0-9-]+(.[a-z0-9-]+)+)$/i",
		  $e, $grab)) {
    return 1;
  }
  # $grab[0] is the whole address
  # $grab[1] is the domain
  $domain = $grab[1];
$yy=$grab[0];
#
//if($domain=="wanadoo.fr"){return 3;}
  if ($domain != gethostbyname($domain)) {
  if (getmxrr($domain,$yy)) {
    // MX record found
    return 0;
  } else {
    // Domain exists and resolves correctly
    return 0;
  }
} else {
  // Domain does not exist
  return 2;
}

}


?>