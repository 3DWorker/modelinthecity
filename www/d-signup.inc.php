<?
error_reporting(0);
// if(!$_GET['PHPSESSID'] || !$_SERVER['REMOTE_ADDR']){exit;}
$act=$_GET['act'];

$action=$_POST['action'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$pseudo=$_POST['pseudo'];
$email=$_POST['email'];
$thecode=$_POST['thecode'];

if($act=="del"){
mysql_query("delete from membre_tmp WHERE IP='".$_SERVER['REMOTE_ADDR']."' limit 1");
}

// require ('include/global.inc.php');
connexion();//echo $base;
$error="<img src='./images/alert.gif'>";
$no="<img src=images/verif_notok.gif>";
$yes="<img src=images/verif_ok.gif>";

 $change=uniqid ( rand() );



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

if(!$nom){$ermes.="/!\ ".TEXT_LASTNAME." ". ERROR_MISSING ."<br>";$verif=0;$err_nom=1;}
if(!$prenom) {$ermes.="/!\ ".TEXT_FIRSTNAME." ". ERROR_MISSING ."<br>";$verif=0;$err_prenom=1;}
if(!$pseudo) {$ermes.="/!\ ".TEXT_ALIAS." ". ERROR_MISSING ."<br>";$verif=0;$err_pseudo=1;}
if(!$email) {$ermes.="/!\ ".TEXT_EMAIL." ". ERROR_MISSING ."<br>";$verif=0;$err_email=1;}

//if(!$check){$ermes.="/!\ Agreement not checked<br>";$verif=0;$err_check=1;}


if (preg_match("/^([0-9]+)$/i",$pseudo)==true){$ermes.="/!\ " .TEXT_ALIAS." " .ERROR_NO_LETTER ." <br>";$verif=0;$err_pseudo=1;}


if($email){
// if(ValidateEmail($email)){$ermes.="/!\ ".TEXT_EMAIL." ".ERROR_NOT_VALID."<br>";$verif=0;$err_email=1;}
}
######### REFUSER HOTMAIL

// if(is_int(strpos($email, 'hotmail.'))){$ermes.="/!\ Due to many problems Hotmail or live mails are not accepted!<br>";$verif=0;$err_email=1;}
// if(is_int(strpos($email, 'live.'))){$ermes.="/!\ Due to many problems Hotmail or live mails are not accepted!<br>";$verif=0;$err_email=1;}
#######

if($email){
	// Verification de l'existance du client
	$query=mysql_query("SELECT * FROM galerie WHERE email='$email'");
	$nb=mysql_affected_rows();
	if ($nb>=1) {$verif=0; $ermes.="/!\ ".TEXT_EMAIL." ".ERROR_USED."<br>";$err_email=1;$email=""; }
	
	$q=mysql_query("SELECT datecrea FROM membre_tmp WHERE email='$email'");
	$nb=mysql_affected_rows();
	if($r=mysql_fetch_array($q)){$datesend=$r[datecrea];}
	//if ($nb>=1) {$verif=0; $ermes.="/!\ If you didn't receive the email sent to : $email<br>Date : $datesend <br> >Please Verify your spam box or click here to try again<br><br>";$err_email=1;$email=""; }
		if ($nb>=1) {$verif=0; $ermes.="/!\ ".TEXT_EMAIL." ".ERROR_USED."<br>";$err_email=1;$email=""; }
}
	
	
if($pseudo && strlen($pseudo)>3){
	$nb=0;
	$query=mysql_query("SELECT * FROM galerie WHERE LOWER(pseudo)='$pseudo'");
	$nb=mysql_affected_rows();
	mysql_error();
	$query1=mysql_query("SELECT * FROM membre_tmp WHERE pseudo='$pseudo'");
	$nb1=mysql_affected_rows();
	if (($nb+$nb1)>=1) {$verif=0;$ermes.="/!\ Alias ".ERROR_USED."<br>";$err_pseudo=1; $pseudo="";}
}else{$ermes.="/!\ ".ERROR_ALIAS_CHARS."<br>";$verif=0;$err_pseudo=1;$pseudo="";}


if($thecode){

$thecode_okay = (isset($_POST['thecode']) && (strtolower($_POST['thecode']) == strtolower($_SESSION["noautamationcode"])));
if(!$thecode_okay){$verif=0;$ermes.="/!\ Captcha ".ERROR_MATCH."<br>";$err_captcha=1; }
}



if(!$thecode){$ermes.="/!\ Captcha ". ERROR_MISSING ."<br>";$verif=0;$err_captcha=1;}




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


		$conTenuHtml= '<div align=center>' .TEXT_EMAIL_WELCOME.'<br><br>'.TEXT_EMAIL_SIGNUP.'<br><a href="http://www.modelinthecity.com/activate.php?key='.$key.'">http://www.modelinthecity.com/activate.php?key='.$key.'</a><br><br>' .TEXT_EMAIL_SIGNUP2;
		
		
		
		//Envoi du mail
		// $suBjeCt='WELCOME '.ucfirst($pseudo).', on ModelinTheCity.com';
		$suBjeCt=TEXT_EMAIL_WELCOME;
		
	//	if(is_int(strpos($email, 'hotmail.')) || is_int(strpos($email, 'live.'))){}else{
		mail_attach($email , $suBjeCt , $conTenuHtml , '',Date('l jS \of F Y h:i:s A'));
	//	}
		
		$cont=$_SERVER['REMOTE_ADDR'];
		
		mail_attach("support@modelinthecity.com" , $suBjeCt , $email."<br>".$conTenuHtml, '',Date('l jS \of F Y h:i:s A'));
		
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

   
<table width="600" border="0" cellspacing="0" cellpadding="0" align=center class=loginbox>
  <tr> 
          <td width="100%" height="24"> <br><br>
            <div align="center"><font face="Arial, Helvetica, sans-serif"  size="3"><b><?php echo TEXT_EMAIL_SENT;?></b></font></div>
          </td>
        </tr>
        <tr> 
          <td width="100%" height="74"> 
            <div align="left"> <font face="Arial, Helvetica, sans-serif" size="3"><br><br><br> <b><?php echo TEXT_HELP_SIGNUP;?></font></div>
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
  <form method="post" action="index.php?page=signup">
  <input type="hidden" name="action" value="send">
    <input type="hidden" name="categ" value="<? print $categ; ?>">
<br><br>
  <table width="600" border="0" cellspacing="0" cellpadding="10" class=loginbox align=center valign=middle>
    <TR> 
      <TD colspan=2 height="12" align=left><b><big><?php echo TEXT_SIGNUP;?></big></b><br><hr></td>
  </TR>
  	    <?
 if(!$verif && $action) {	if ($ermes) {print("<tr><td colspan=10 width=100%><nobr><font color='#ff9900'>$ermes</font></nobr></td></tr>");}else{echo "<tr><td colspan=9 width=100%><nobr><font color='#ff9900'>Check error in yellow inputs $error</font></nobr></td></tr>";}}
?>

    <TR> 
      <TD  align=center height="177" colspan=2> 
        <table cellpadding="0" cellspacing="5" border="0" width=100% class=loginbox>
          <tr> 
            <td align=right width="22%" height="22"><nobr><?php echo TEXT_LASTNAME;?> :</nobr></td>
            <td width="21%" height="22"> 
              <input type="text" class=input name="nom" size=15 maxlength=25 value="<?php echo $nom;?>" <?php if($err_nom){echo "style='background:yellow;';";}?>>
              </td>

            <td align=right colspan=3 height="22"><?php echo ALIAS;?> :</td>
            <td height="22" width="14%"> 
        
                <nobr><input type="text" class=input name="pseudo" size=10 maxlength=25 value="<?php echo $pseudo;?>" <?php if($err_pseudo){echo "style='background:yellow;';";}?>>&nbsp;<input type=submit value="<?php echo TEXT_CHECK;?>" name="submiter" title="Check availability"><?php if(!$err_pseudo && $pseudo){echo $yes;}?></nobr>

            </td>

          </tr>
          <tr> 
            <td align=right width="22%" height="38"><nobr><?php echo TEXT_FIRSTNAME;?> :</nobr></td>
            <td width="21%" height="38">
              <input type="text" class=input name="prenom"  size=15 value="<?php echo $prenom;?>" <?php if($err_prenom){echo "style='background:yellow;';";}?> >
             </td>
   
            <td align=right colspan=3 height="38"><nobr><?php echo TEXT_EMAIL;?> :</nobr></td>
            <td colspan="2" height="38" align=left>
              <input type="text" class=input name="email" size="20" value="<?php echo $email;?>" <?php if($err_email){echo "style='background:yellow;';";}?>>
             </td>
               </tr>
          <tr valign="bottom"> 
            <td height="7" colspan="9"> 
         <div align="center">
			   
			  <img src="<?php echo $img_name;?>"><input name="refresh" value="refresh" type="image" src="images/button_refresh.gif"><br><img src="images/blank.gif" width=100% height=5>
			<?php echo TEXT_CAPTCHA_ENTRY;?> :
                  <input type=text name="thecode" MAXLENGTH=16 size=8 <?php if($err_captcha){echo "style='background:yellow;';";}?>>
				  			
              </div><br><br>
            </td>
          </tr>
          <tr valign="bottom"> 
            <td colspan="9" height="24" bgcolor="<? print($bgcolortitle); ?>"> 
     
			               <br> <div align="center"> <?php echo TEXT_CONDITION;?>
     
               <br><br>
                <!--input type=hidden value="SIGNUP"  name="submiter"--> <a onclick="document.forms[0].submit();"><div class=button_blue><b><nobr>&nbsp;&nbsp; <?php echo TEXT_SIGNUP;?> &nbsp;&nbsp;</nobr></b></div></a><br><hr><?php echo TEXT_LOGO;?><br><br></div> </td>
          </tr>
	
        </table>
      </TD>
    </TR>
			  
	<!--tr><td colspan=2><?php //echo TEXT_HELP_SIGNUP;?>
	</td></tr-->
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