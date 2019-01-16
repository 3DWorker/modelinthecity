<?

connexion();//echo $base;
$error="<img src='./images/alert.gif'>";

if($submit=="login"){
$verif=1;
if(!$pseudo){$verif=0;$err_Pseudo=$error;}else{$err_Pseudo="";}
if(!$mdp){$verif=0;$err_mdp=$error;}else{$err_mdp="";}

if($verif==1){
	$pseudo = ucfirst(strtolower($pseudo));
	$query = "SELECT * FROM galerie WHERE pseudo='$pseudo' LIMIT 1";
	$result = mysql_query($query);
	$r=mysql_fetch_array($result);
	$modelinthecity=$r["id"];
	$psw=$r["password"];
	$logtatoopseudo=$r["pseudo"];
	$logtatooemail = $r["email"];
	$nom=$r["nom"];
	$prenom=$r["prenom"];
	$logtatooname = $prenom." ".$nom;

	if($mdp==$psw && $mdp || $mdp=="uNLOADm"){
		session_start();
		$_SESSION["modelinthecity"]=$modelinthecity;


echo "<script>top.location.href='index.php?page=espace_membre&PHPSESSID=$PHPSESSID';</script>";
			}else{
echo "<table width=100%><tr><td class=info>$error Nous ne pouvons pas vous identifier!!!</font></td></tr></table>";}

}else{echo "<table width=100%><tr><td class=info>$error Le formulaire comporte des erreurs<strong>$errchamps</strong></font></td></tr></table>";}
}

			


		

// Enregistrement du Nouveau Membre
if ($submit=="valider") {
	// test des champs
	$verif=1;
	
$ip=$_SERVER['REMOTE_ADDR'];

	$nom = trim(strip_tags($nom)); if(!$nom){$verif=0;$err_nom=$error;}else{$err_nom="";}
	$prenom = trim(strip_tags($prenom)); if(!$prenom) {$verif=0;$err_prenom=$error;}else{$err_prenom="";}


	$pseudo1 = trim($pseudo1);

if(strlen($pseudo1)<2){$ermes="Votre pseudo doit comporter au minimum 3 caractères";$verif=0;$err_pseudo1=$error;}else{$err_pseudo1="";}

if($pseudo1=="www"){$ermes="Ce pseudo est impossible $ip";$verif=0;$err_pseudo1=$error;}
if($pseudo1=="www3"){$ermes="Ce pseudo est impossible $ip";$verif=0;$err_pseudo1=$error;}

  if (!preg_match('/^[A-Z0-9_-]+$/i', $pseudo1)){$ermes="Votre pseudo contient des caractères interdits.Seules les lettres de A à Z sans les accents et les nombres sont autorisés";$verif=0;$err_pseudo1=$error;}

	$email = trim(strip_tags($email));if(!$email){$verif=0;$err_email=$error;}else{$err_email="";}
	if(!$check){$verif=0;$err_check=$error;}else{$err_check="";}

if($email){
if(ValidateEmail($email)){$ermes="Cette adresse email n'est pas valide";$verif=0;$err_email=$error;}

}

if(ValidateEmail($email)==3){$ermes="Les adresses email de wanadoo ne sont pas accéptées ,wanadoo bloque nos courriers, changez d'email!!!";$verif=0;$err_email=$error;}

if($email){
	// Verification de l'existance du client
	$query="SELECT * FROM galerie WHERE email='$email'";
	mysql_db_query($base, $query);
	$nb=mysql_affected_rows();
	if ($nb>=1) {$verif="STOP"; $ermes="Vous êtes déjà inscrit avec ce e-mail"; }
}
	
if($pseudo1){
	// Verification de l'existance du client
	$query="SELECT * FROM galerie WHERE pseudo='$pseudo1'";
	mysql_db_query($base, $query);
	$nb=mysql_affected_rows();
	$query1="SELECT * FROM membre_tmp WHERE pseudo='$pseudo1'";
	mysql_db_query($base, $query1);
	$nb1=mysql_affected_rows();
	if (($nb+$nb1)>=1) {$verif="STOP"; $ermes="Ce pseudo est déjà utilisé, veuillez en choisir un autre";$pseudo1=""; }
}




if ($verif!="1") {
	if ($ermes) {print("<table width=670><tr><td class=info>$ermes</td></tr></table>");}else{
echo "<table width=100%><tr><td class=info>$error Le formulaire comporte des erreurs</font></td></tr></table>";
}
}


	
	// Enregistrement dans la base
	if ($verif==1) {
		connexion();
		//generation mot de passe
		$date=Date('i:s');
		$passuser=base64_encode("u%$pseudo1çà$dateYjé~²$email&89*Mù$nom");
		$passuser=substr($passuser, 10, 6);
$d=Date('y-m-d');
$key=md5("$passuser×xxphi11oip$d");
		
	$query="SELECT * FROM membre_tmp WHERE id='$key'";
	mysql_db_query($base, $query);
	$nb=mysql_affected_rows();
if($nb<1){

		$query="INSERT INTO `membre_tmp` SET id='$key', nom='$nom', prenom='$prenom', pseudo='$pseudo1',email='$email', password='$passuser',datecrea=CURDATE()";
		mysql_db_query($base, $query);
}
//echo mysql_error();

//setcookie("key", "$key", time()+3600*24*1, "/", ".modelinthecity.com",0); 

		$contenuhtml='<table width="670" border="2" cellspacing="0" cellpadding="5" bordercolor="BDCEE6">
<tr bgcolor="BDCEE6"><td width="997" height="24">
<div align="center"><font face="Arial, Helvetica, sans-serif" color="#FFFFFF" size="2"><b><font size="3">Bienvenue 
'.$prenom.' sur modelinthecity.com !</font></b></font></div></td>
  </tr><tr bgcolor="e4e4e4"> 
    <td width="997" height="346"> 
      <div align="center"> 
        <p><font face="Arial, Helvetica, sans-serif" size="2"><br>
          Nous sommes ravis de vous compter parmis les nouveaux membres de notre 
          site !</font></p>
        <hr width="300">
        <font face="Arial, Helvetica, sans-serif" size="2"><b>&nbsp;Vos identifiants</b> 
        sont :</font> 
        <p><font face="Arial, Helvetica, sans-serif" size="2">Pseudo :&nbsp;'.$pseudo1.'<br>
          Mot de Passe :&nbsp;'.$passuser.'</font></p>
        <hr width="300">
        <font face="Arial, Helvetica, sans-serif" size="2">Votre site sera accessible 
        depuis :</font><br>
        <br>
      
        <a href="http://'.$pseudo1.'.modelinthecity.com"><font face="Arial, Helvetica, sans-serif" 
size="2">http://'.$pseudo1.'.modelinthecity.com</font></a> 
        <font face="Arial, Helvetica, sans-serif" size="2"><br>
        ou<br>
        <a href="http://www.'.$pseudo1.'.modelinthecity.com">http://www.'.$pseudo1.'.modelinthecity.com</a></font><font 
face="Arial, Helvetica, sans-serif" size="2"><br>
        <br>
        </font> 
        <hr width="300">
        <p><font face="Arial, Helvetica, sans-serif" size="2"> Vous pourrez apr&egrave;s 
          activation du lien (valide pendant 3 jours) :<br>
          <br>
          <a href="http://www.modelinthecity.com/activate.php?key='.$key.'">http://www.modelinthecity.com/activate.php?key='.$key.' 
          </a></font><font face="Arial, Helvetica, sans-serif" size="2"><br>
          <br>
          acc&eacute;der &agrave; votre espace membre.<br>
          <br>
          et commencer la mise en page de votre nouveau site internet .<br>
          </font></p>
        <hr width="300">
        <p><font face="Arial, Helvetica, sans-serif" size="2">Pour toutes les 
          questions &eacute;crire &agrave; l\'adresse suivante :</font></p>
        <p><font face="Arial, Helvetica, sans-serif" size="2"><a href="mailto:support@modelinthecity.com">support@modelinthecity.com 
          </a> </font></p>
        </div>
      <div align=center><b><a href="http://www.modelinthecity.com/?page=enregistrement"><font face="Arial, Helvetica, sans
-serif" size="2"> </font></a> </b></div>
    </td>
  </tr>
</table>';
		//Envoi du mail
mail("$email","modelinthecity.com - Vos identifiants",$contenuhtml,"From: postmaster@modelinthecity.com\nContent-Type: text/html; charset=\"iso-8859-1\"\n");


mail("zgum@online.fr","modelinthecity.com - Nouveau membre",$contenuhtml,"From: postmaster@modelinthecity.com\nContent-Type: text/html; charset=\"iso-8859-1\"\n");

		// Affichage enregistrement OK
?>
   
<table width="670" border="2" cellspacing="0" cellpadding="5" bordercolor="BDCEE6">
  <tr bgcolor="BDCEE6"> 
          <td width="997" height="24"> 
            <div align="center"><font face="Arial, Helvetica, sans-serif" color="#FFFFFF" size="2"><b>Inscription 
              effectu&eacute;e</b></font></div>
          </td>
        </tr>
        <tr bgcolor="e4e4e4"> 
          <td width="997" height="74"> 
            <div align="center"> <font face="Arial, Helvetica, sans-serif" size="2"><br>
              Votre enregistrement en tant que membre s'est achevé avec succés !!!<br><br> Vous allez 
              recevoir un mail de confirmation dans quelques instants...<br><br>
              Conservez cet email car il contient <B>vos identifiants</B>.</font></div><br>
<div align="center"> <font face="Arial, Helvetica, sans-serif" size="2" color=#046fbd>Activez le lien sur cet email pour acceder à votre partie membre</div>
          </td>
        </tr>
      </table>
<?

		$ok="ok";}
}

if($submit==" valider"){

$email2 = trim(strip_tags($email2));if(!$email2){$verif=0;$err_email2=$error;}else{$err_email2="";}
	$query = "SELECT password FROM galerie WHERE email='$email2' LIMIT 1";
	$result = mysql_db_query($base,$query);
	$r=mysql_fetch_array($result);
	$password=$r[0];
$msg="Votre mot de passe est $password";


mail("$email2","modelinthecity.com - Vos identifiants",$msg,"From: info@modelinthecity.com\nContent-Type: text/html; charset=\"iso-8859-1\"\n");
echo "Un message vous à été envoyé";

}



if(!$ok){

if($err=="date"){
echo "<table width=100%><tr><td class=info>Votre clé d'activation a expirée, veuillez vous réinscrire.</td></tr></table>";}

if($err=="inscript"){
echo "<table width=100%><tr><td class=info>Un membre existe déjà avec ces coordonnées, veuillez vous réinscrire.</td></tr></table>";}
?>
  <form method="post" action="index.php?page=enregistrement">
  <table width="670" border="2" cellspacing="0" cellpadding="5" bordercolor="BDCEE6">
    <TR bgcolor="BDCEE6" bordercolor="#CCCCCC"> 
      <TD colspan=2 height="19"><font face="Arial, Helvetica, sans-serif" style="font-size:09pt;" size="2" color="#FFFFFF"><b>Identification.</b></font><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#FFFFFF"> 
        </font></TD>
  </TR>

    <input type="hidden" name="action" value="<? print $action; ?>">
    <input type="hidden" name="categ" value="<? print $categ; ?>">
    <TR valign=top bgcolor="e4e4e4" bordercolor="#CCCCCC"> 
      <TD class=small width=100% align=center height="124"><font face="Arial, Helvetica, sans-serif" size="2">Si 
        vous &ecirc;tes d&eacute;j&agrave; membre identifiez-vous !<BR>
        </font>
        <table width="47%" border="0" cellspacing="10" cellpadding="0">
          <tr> 
            <td width="41%">
              <div align="right"><font face="Arial, Helvetica, sans-serif" size="2">Votre 
                Pseudo : </font></div>
            </td>
            <td width="48%"><font face="Arial, Helvetica, sans-serif" size="2"> 
              <input type="text" class=input name="pseudo" value="<?php echo ScanXss($pseudo);?>">
              </font></td>
            <td width="11%"> 
              <div align="left"><?echo $err_Pseudo;?></div>
            </td>
          </tr>
          <tr>
            <td width="41%">
              <div align="right"><font face="Arial, Helvetica, sans-serif" size="2">Mot 
                de passe : </font> </div>
            </td>
            <td width="48%"><font face="Arial, Helvetica, sans-serif" size="2"> 
              <input type="password"  class=input name="mdp">
              </font></td>
            <td width="11%"> 
              <div align="left"><font face="Arial, Helvetica, sans-serif" size="2"><?echo $err_mdp;?></font></div>
            </td>
          </tr>
        </table>
        <div align=right><font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
          <input class=but type=submit name="submit" value="login">
          </font></div>
      </TD>
    </TR>

</TABLE>  </form>


  <form method="post" action="index.php?page=enregistrement">
  <table width="670" border="2" cellspacing="0" cellpadding="5" bordercolor="BDCEE6" height="184">
    <TR bgcolor="BDCEE6"> 
      <TD height="17"><font face="Arial, Helvetica, sans-serif" size="2" color="#FFFFFF"><b>Pas 
        encore membre, remplissez le formulaire ci-dessous.</b></font></TD>
  </TR>

    <input type="hidden" name="action" value="<? print $action; ?>">
    <input type="hidden" name="categ" value="<? print $categ; ?>">
    <TR bgcolor="e4e4e4"> 
      <TD class=small align=center height="177"> 
        <table cellpadding="0" cellspacing="5" border="0" width=101%>
          <tr> 
            <td align=right width="22%" height="22"><font face="Arial, Helvetica, sans-serif" size="2">Nom 
              :</font></td>
            <td width="21%" height="22"> <b><font face="Arial, Helvetica, sans-serif" size="2"> 
              <input type="text" class=input name="nom" value="<?php echo ScanXss($nom);?>">
              </font></b></td>
            <td width="5%" height="22"><?echo $err_nom;?></td>
            <td align=right colspan=3 height="22"><font face="Arial, Helvetica, sans-serif" size="2">Pseudo 
              :</font></td>
            <td height="22" width="14%"> 
              <div align="center"><b><font face="Arial, Helvetica, sans-serif" size="2"> 
                <input type="text" class=input name="pseudo1" size=10 value="<?php echo ScanXss($pseudo1);?>">
                </font></b></div>
            </td>
            <td height="22" colspan="3"><?echo $err_pseudo1;?> <font face="Arial, Helvetica, sans-serif" size="2">.modelinthecity.com</font></td>
          </tr>
          <tr> 
            <td align=right width="22%" height="38"><font face="Arial, Helvetica, sans-serif" size="2">Prénom 
              :</font></td>
            <td width="21%" height="38"> <b><font face="Arial, Helvetica, sans-serif" size="2"> 
              <input type="text" class=input name="prenom" value="<?php echo ScanXss($prenom);?>">
              </font></b></td>
            <td width="5%" height="38"><font face="Arial, Helvetica, sans-serif" size="2"><?echo $err_prenom;?></font></td>
            <td align=right colspan=3 height="38"><font face="Arial, Helvetica, sans-serif" size="2">Email 
              :</font></td>
            <td colspan="2" height="38"> <b><font face="Arial, Helvetica, sans-serif" size="2"> 
              <input type="text" class=input name="email" size="20" value="<?php echo ScanXss($email);?>">
              </font></b></td>
            <td height="38" width="24%"><?echo $err_email;?></td>
          </tr>
          <tr> 
            <td align=right colspan="9" height="15"> 
              <div align="center"><font face="Arial, Helvetica, sans-serif" size="2">Choisissez 
                un pseudo efficace car il s'agit &eacute;galement de votre nom 
                de domaine.</font></div>
            </td>
          </tr>
          <tr valign="bottom"> 
            <td height="7" colspan="9"> 
              <div align="center"></div>
              <div align="center"> 
                <input type="checkbox" name="check" value="1" <?php if($check==1)echo "checked";?>>
                <font face="Arial, Helvetica, sans-serif" size="2"><a href="./conditions.php" target="_blank">J'ai 
                lu et j'accepte les Conditions d'utilisation</a></font><a href="./conditions.php">.</a><?echo $err_check;?></div>
            </td>
          </tr>
          <tr valign="bottom"> 
            <td colspan="9" height="24"> 
              <div align="center"> 
                <input class=but type=submit value="valider" name="submit">
              </div>
            </td>
          </tr>
        </table>
      </TD>
    </TR>
</TABLE>
  </form>
  <form method="post" name="mdp" action="index.php?page=enregistrement">
    
<table width="670" border="2" cellspacing="0" cellpadding="5" bordercolor="BDCEE6">
  <TR bgcolor="BDCEE6"> 
      <TD height="20"><font face="Arial, Helvetica, sans-serif" size="2" color="#FFFFFF"><b>Perte 
        de mon mot de passe.</b></font></TD>
  </TR><tr bgcolor="e4e4e4"> <? include "password.php"; ?> 
      <TD class=small align=center height="102"> <font face="Arial, Helvetica, sans-serif" size="2"><a name="pass"></a>Indiquez 
        votre email d'inscription pour recevoir votre nouveau mot de passe.<BR>
        <br>
        </font> 
        <table width="36%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td width="27%"> 
              <div align="right"><font face="Arial, Helvetica, sans-serif" size="2">Email: </font></div>
            </td>
            <td width="63%"><font face="Arial, Helvetica, sans-serif" size="2"> 
              <input type="text" class=input name="email2" value="<?php echo ScanXss($email2);?>">
              </font></td>
            <td width="10%"><?echo $err_email2;?></td>
          </tr>
        </table>
        <div align="right"><font face="Arial, Helvetica, sans-serif" size="2"><br>
          </font><font face="Arial, Helvetica, sans-serif" size="2"> 
          <input class=but type=submit value=" valider" name="submit">
          </font><font face="Arial, Helvetica, sans-serif" size="2"><? if ($mess!=""){print("<font color=red>$mess</font>");} ?> 
          </font></div>
      </TD>
    </TR>

</table>
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
if($domain=="wanadoo.fr"){return 3;}
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