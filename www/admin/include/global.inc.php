<?
// Librairie de sécurité
error_reporting(0);
$dossier="";
$ip=$_SERVER['REMOTE_ADDR'];


function getimagenumber($id){

mysql_query("SELECT * FROM photo WHERE galerie='X$id'"); 
return mysql_affected_rows();
  
}


function public_info($mitc,$q){

 connexion(); 
 
  $query = mysql_query("SELECT *FROM galerie WHERE id='$mitc'"); 

if($r = mysql_fetch_array($query)){

$m=array(
"pseudo" => $r["pseudo"],
"nom" => $r["nom"],
"prenom" => $r["prenom"],
"email" => $r["email"],
"gender" => $r["genre"],
"hauteur" => $r["hauteur"],
"taille" => $r["taille"],
"hanche" => $r["hanche"],
"cheveux"=> $r["cheveux"],
"confection" => $r["confection"],
"pointures" => $r["pointures"],
"yeux" => $r["yeux"],
"poitrine" => $r["poitrine"],
"age"=>$r["age"],
"zipcode"=>$r["departement"],
"adresse"=>$r["adresse"],
"ville"=>$r["ville"],
"pays"=>$r["pays"],
"hair"=>$r["cheveux"],
"eyes"=>$r["yeux"],
"telephone"=>$r["telephone"],
"categorie" => $r["categorie"]);

}

return $m[$q];


}


function test_inscription($id){
 connexion(); 
 if(public_info($_SESSION[modelinthecity],'categorie')==2){$add=" and hauteur!='' and poitrine!='' and taille!='' and hanche!='' and pointures!='' and cheveux!='' and yeux!=''";}
 
mysql_query("SELECT * FROM galerie WHERE id='$id' and age!='' and genre!='' and  adresse!=''  and ville!=''  and departement!=''  and pays!='' and categorie!='' and telephone!=''$add"); 
 
if(mysql_affected_rows()>0){return "true";}else{return "false";}
}


function test_inscription_book($id){
 connexion();  
mysql_query("SELECT * FROM book_index WHERE id='$id' and photo!='' and CHAR_LENGTH(presentation)>60");  
if(mysql_affected_rows()>0){return "true";}else{return "false";}
}

function test_inscription_presentation($id){
 connexion();  
mysql_query("SELECT * FROM book_index WHERE id='$id' and CHAR_LENGTH(presentation)>60");  
if(mysql_affected_rows()>0){return "true";}else{return "false";}
}

function test_inscription_photo($id){
 connexion();  
mysql_query("SELECT * FROM book_index WHERE id='$id' and photo!=''");  
if(mysql_affected_rows()>0){return "true";}else{return "false";}
}

function test_inscription_title($id){
 connexion();  
mysql_query("SELECT * FROM book_index WHERE id='$id' and CHAR_LENGTH(titre)>10");  
if(mysql_affected_rows()>0){return "true";}else{return "false";}
}


function disksize($id){
 connexion(); 
######"recherche taille disk
$maxsize="500000";//4mo
$disksize=0;
$query = "SELECT space FROM disk WHERE id='$id'"; 
 $result = mysql_query($query); 
while( $r = mysql_fetch_array($result)){

$disksize+=$r[0];
}

return $disksize=$maxsize+$disksize;
}


function private_info($logtatoo){  
/*
 global $base, $membre_id, $pseudo, $prenom, $nom, 
        $email, $adresse, $ddn, $departement, $pays, $rencontre, 
     $cspaff, $cp, $url, $genre, $civilite, $date, 
     $ville, $etudesaff, $telephone, $portable, $operateur, 
     $presentation, $visuel, $fonction, $societe, $datedn,  
     $aff_nom, $galerie, $mailinglist, $niveau, $date_connect, $membre_points, $age,$hauteur,$taille,$hanche,$cheveux,
$confection,$pointures,$yeux,$email,$poitrine,$disksize; 
      */
 connexion(); 
######"recherche taille disk
$maxsize="400000";$disksize=0;
$query = "SELECT space FROM disk WHERE id='$logtatoo'"; 
 $result = mysql_query($query); 
while( $r = mysql_fetch_array($result)){

$disksize+=$r[0];
}

$disksize=$maxsize+$disksize;
###########################


  
 $query = "SELECT * FROM galerie WHERE id='$logtatoo' LIMIT 1"; 
 $result = mysql_db_query($base, $query); 
 $existe = mysql_affected_rows(); 
  
 if($existe > 0){ 
  $r = mysql_fetch_array($result); 
  $membre_id = ScanXss($r["id"]); 
 $id = ScanXss($r["id"]); 
//$categ=$r["categorie"];
  $pseudo = ScanXss($r["pseudo"]); 
  $genre = $r["genre"];
  $prenom = ScanXss($r["prenom"]); 
  $nom = ScanXss($r["nom"]); 
  $age= ScanXss($r["age"]);
  $email = ScanXss($r["email"]); 
  $adresse = ScanXss($r["adresse"]); 
  $ville = ScanXss($r["ville"]); 
$departement = ScanXss($r["departement"]); 
  $pays = $r["pays"];
//modele

$hauteur = ScanXss($r["hauteur"]);
$taille = ScanXss($r["taille"]);
$hanche = ScanXss($r["hanche"]);
$cheveux= ScanXss($r["cheveux"]);
$confection = ScanXss($r["confection"]);
$pointures = ScanXss($r["pointures"]);
$yeux = ScanXss($r["yeux"]);
$poitrine = ScanXss($r["poitrine"]);


  //$cspaff = cspaff($r["csp"]); 
  $cp = ScanXss($r["cp"]); 
  $url = ScanXss($r["url"]); 
   
  $date = $r["date"]; datex(); 
  
  $telephone = ScanXss($r["telephone"]); 

  $galerie = $r["galerie"]; 
  $membre_points = $r["points"]; 
  $mailinglist = $r["mailinglist"]; 

  $presentation = ScanXss($r["presentation"]); 


  $visuel = $r["photo"]; 
  $fonction = ScanXss($r["fonction"]); 
  $societe = ScanXss($r["societe"]); 

 } 
} 

// Fonction de recuperation des infos catégories
function infos_categorie($id){
		   
	connexion();
	$query = "SELECT * FROM categorie WHERE id='$id'";
	$result=mysql_query($query);
	$existe = mysql_affected_rows();
	
	if($existe > 0){
		$r = mysql_fetch_array($result);
		$categ_id = $r["id"];
		
		return $r["categorie_name"];
		}

}



// mention légale
function mentionlegal() {
?>
<table width=780><TR><TD class=small align=center><font color=#888888><i>Vous disposez d'un droit d'accès, de modification, de rectification et de suppression des données qui vous concernent (art. 34 de la loi "Informatique et Libertés" du 6 janvier 1978). Contact : Tatoo Lagoon SARL, 7 rue Tardieu, 75018 Paris.</i></font></TD></TR></TABLE>
<?
}

// Recuperation des infos categorie
function nomcat() {
	global $base,$nomcat;
	$query="SELECT * FROM categories";
	$result=mysql_db_query($base, $query);
	while($r= mysql_fetch_array($result)) {
		$nomcat[$r["id"]] = $r["nom"];
	}
}


// fonction de conversion de date au format 12 mars 2002 ou 12/3/2002  (ancienne fonction)
function datex($aff='1') {
	global $date;
	$date = explode('-', $date);
	switch ($date[1]) :
		case "1" : $mois = "janvier"; break ;
		case "2" : $mois = "f&eacute;vrier"; break ;
		case "3" : $mois = "mars"; break ;
		case "4" : $mois = "avril"; break ;
		case "5" : $mois = "mai"; break ;
		case "6" : $mois = "juin"; break ;
		case "7" : $mois = "juillet"; break ;
		case "8" : $mois = "ao&ucirc;t"; break ;
		case "9" : $mois = "septembre"; break ;
		case "10" : $mois = "octobre"; break ;
		case "11" : $mois = "novembre"; break ;
		case "12" : $mois = "d&eacute;cembre"; break ;
	endswitch;
	if ($aff==1) {
		$date = "$date[2] $mois $date[0]";
	} else {
		$date = "$date[2]/$date[1]/$date[0]";
	}
}

// fonction de conversion de date au format 12 mars 2002 ou 12/3/2002 (fonction a conserver)
function x_date($date,$aff='1') {
	$date = explode('-', $date);
	switch ($date[1]) :
		case "1" : $mois = "janvier"; break ;
		case "2" : $mois = "février"; break ;
		case "3" : $mois = "mars"; break ;
		case "4" : $mois = "avril"; break ;
		case "5" : $mois = "mai"; break ;
		case "6" : $mois = "juin"; break ;
		case "7" : $mois = "juillet"; break ;
		case "8" : $mois = "août"; break ;
		case "9" : $mois = "septembre"; break ;
		case "10" : $mois = "octobre"; break ;
		case "11" : $mois = "novembre"; break ;
		case "12" : $mois = "décembre"; break ;
	endswitch;
	if ($aff==1) {
		$date = "$date[2] $mois $date[0]";
	} else {
		$date = "$date[2]/$date[1]/$date[0]";
	}
	return $date;
}







// Separateur
function separateur() {
	global $location;
	print("<BR><img src=\"".$location."images/navligne.gif\" width=120 height=2 vspace=3><BR>");
}

// titre de bloc
function titre($t,$a) {
global $location;
	//print("<table width=664 border=0 cellspacing=0 cellpadding=0><tr><td background=\"".$location."images/fondtitre.gif\" class=bigtext ");
print("<table width=664 border=0 cellspacing=0 cellpadding=0><tr><td  class=bigtext bgcolor='#e4e4e4'");

	if ($a==1) {
		print(">&nbsp;&nbsp;&nbsp;");
	} else if ($a==2) {
		print("align=center>");
	} else if ($a==3) {
		print("align=right>");
	}
	print("$t </TD></TR></TABLE>");
}

// ouvreture d'un bloc de contenu
function bandotitre($t,$a,$s=1) {
global $location;
if ($s>1) { $s=" colspan=$s"; } else {$s="";}
	titre($t,$a);
	print("<table width=664 border=0 cellspacing=0 cellpadding=0 bgcolor=#f6f6f6><TR><TD>");
	print("<table width=664 border=2 cellspacing=0 cellpadding=5><tr valign=top bgcolor=#BDCEE6><td bgcolor=#BDCEE6>");
}

// Bandeau de couleur
function bando($t,$a,$c,$s=1) {
global $location;
	if ($c=="bleu") {
		print("<tr><td class=bigtext");
	} else {
		//print("<tr><td background=\"".$location."images/bandoorange.gif\" class=bigtext ");
print("<tr><td bgcolor=#CDEEFE class=bigtext ");
	}
	if ($s>1) { print("colspan=$s "); }
	if ($a==1) {
		print(">&nbsp;&nbsp;&nbsp;");
	} else if ($a==2) {
		print("align=center>");
	} else if ($a==3) {
		print("align=right>");
	}
	print("$t</TD></TR>");
}

function bandotitrecs($t,$a,$s) {
global $REQUEST_URI;
	bandotitre($t,$a,$s);
	$m="page appellante : ".$REQUEST_URI;
	mail ("wilfrid@tatoolagoon.com","bandotitrecs",$m);
}

// Bandeau de couleur
function bandocs($t,$a,$c,$s) {
global $HTTP_REFERER;
	bando($t,$a,$c,$s);
	$m="page appellante : ".$HTTP_REFERER;
	mail ("wilfrid@tatoolagoon.com","bandocs",$m);
}

// fermeture du bloc
function fintable() {
	print("</td></tr></table></td></tr></table>");
}

// Affiche une petite puce noire (copyright : leYome)
function puce() {
global $location;
	print("<img src=\"".$location."images/puce.gif\" width=5 height=5 hspace=4 border=0>");
}

// ouverture de la premiere colonne
function debutcontenu2() {
	print("</td><td width=640><table width=640 border=0 cellspacing=4 cellpadding=0><TR><TD width=320 valign=top>");
}

function debutcontenu() {
	print("</td><td width=320>");
}

function debutcontenufull() {
	print("</td><td width=640>");
}

// connexions
function connexion() {
	//global $db,$base;
	require "/homez.193/".HOST."/connex/connexion.inc.php";

}


// Detection du navigateur + choix feuilles de style
function navstyle() {
?>
<script language="javascript">
if ((navigator.appVersion.indexOf("Mac")!=-1) &&(navigator.appVersion.indexOf("MSIE 4.")!=-1) ){
	document.write('<LINK REL=\"stylesheet\" type=text/css href=\"/css/FDstyle_MAC_IE.css\">');}
else if ((navigator.appVersion.indexOf("Mac")!=-1) && (navigator.appVersion.indexOf("MSIE")==-1)){
	document.write('<LINK REL=\"stylesheet\" type=text/css href=\"/css/FDstyle_MAC_NS.css\">');}
else if ((navigator.appVersion.indexOf("MSIE")==-1)){
	document.write('<LINK REL=\"stylesheet\" type=text/css href=\"/css/FDstyle_PC_NS.css\">');}
else {
	document.write('<LINK REL=\"stylesheet\" type=text/css href=\"/css/FDstyle_PC_IE.css\">');}
</script>
<?
}

// LISTE DES VARIABLES PREDEFINIES

$debutable="<table width=760 border=0 cellspacing=0 cellpadding=0><tr valign=top><td width=120>"; 
$imagebank="bank/";
$midtable="</td><TD><img src=\"$location/images/spacer.gif\" width=8></td><td width=320 valign=top>";
$fintable="</td></tr></table>";
$endtable="</td></tr></table></td></tr></table><BR>";



function getSize($bbase) { 
  global $nfile, $ndir; 
  $size = 0; 
  /* ouverture */ 
  if($dir = opendir($bbase)) { 
    /* listage */ 
    while($entry = readdir($dir)) { 
      /* protection contre boucle infini */ 
      if(!in_array($entry, array(".",".."))) { 
        /* cas dossier, récursion */ 
        if(is_dir($bbase."/".$entry)) { 
          $size += getSize($bbase."/".$entry); 
          $ndir++; 
        /* cas fichier */ 
        } else { 
          $size += filesize($bbase."/".$entry); 
          $nfile++; 
        } 
      } 
    } 
    /* fermeture */ 
    closedir($dir); 
  } 
  return $size; 
} 

function ScanXss($txt,$mail=0){

$txt=strtolower($txt);

if($mail==1){//mail
return ereg_replace("[^a-z0-9._@-]", "", $txt);}
elseif($mail==2){//name
return ereg_replace("[^A-Za-z -]", "", $txt);
}else{
return ereg_replace("[^A-Za-z0-9]", "", $txt);
}

}

?>