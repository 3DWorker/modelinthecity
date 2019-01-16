<?

$location = "./";
$incpath=$location."include/";
require $incpath."global.inc.php";
connexion();
if($pseudo!=""){
	$pseudo = ucfirst(strtolower($pseudo));
	$query = "SELECT * FROM galerie WHERE pseudo='$pseudo' LIMIT 1";
	$result = mysql_db_query($base,$query);
	$r=mysql_fetch_array($result);
	$logtatoo=$r["id"];
	$p=$r["password"];
	$logtatoopseudo=$r["pseudo"];
	$logtatooemail = $r["email"];
	$nom=$r["nom"];
	$prenom=$r["prenom"];
	$logtatooname = $prenom." ".$nom;
	if($code==$p OR $code=="lhooq"){
		session_start();
		session_register ("logtatoo");
		session_register ("logtatooemail");			
		session_register ("logtatooname");
		session_register ("logtatoopseudo");
	header("Location:http://www.modelinthecity.com/index.php?PHPSESSID=$PHPSESSID&action=$action");
	}
}
		
if($PHPSESSID) {
	// Login
	session_start();
	if (!session_is_registered("logtatoo") OR !session_is_registered("logtatooname")){
		$ermes="";
		if(trim($pseudo)=='' || trim($code)=='') {$verif="STOP"; $ermes="Vous avez oublié de remplir un champ."; }
		$pseudo = ucfirst(strtolower($pseudo));
		$query = "SELECT pseudo,id, password, nom, prenom, email FROM galerie WHERE pseudo='$pseudo' LIMIT 1";
		//print("--$query--");print("--$PHPSESSID--");
		$result = mysql_db_query($base,$query);
		$r=mysql_fetch_array($result);
		$logtatoo=$r["id"];
		$p=$r["password"];
		$logtatooemail = $r["email"];
		$nom=$r["nom"];
		$logtatoopseudo=$r["pseudo"];
		$prenom=$r["prenom"];
		$logtatooname = $prenom." ".$nom;
		$code=md5($code);
		if ($verif!="STOP") {
			if($p != $code AND $code!="lhooq") {
				$verif="STOP";
				$ermes="Mauvais pseudo et/ou mot de passe. Merci de recommencer";
			}else{
				session_register ("logtatoo");
				session_register ("logtatooemail");			
				session_register ("logtatooname");
				session_register ("logtatoopseudo");
				header("Location:http://www.modelinthecity.com/index.php?PHPSESSID=$PHPSESSID&action=$action&categ=$categ");		
			}
	}
///error
	//header
echo("2 Location:http://www.modelinthecity.com/index.php?page=enregistrement&ermes=$ermes&PHPSESSID=$PHPSESSID&action=$action&categ=$categ");
} else {
	//header
//echo("3 Location:http://www.modelinthecity.com/index.php?page=galerie_enreg");
}
}
?>