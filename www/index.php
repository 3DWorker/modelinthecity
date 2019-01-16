<?

error_reporting(0);
session_start();


 $page=$_GET['page'];

 $categ=$_GET['categ'];
 $subject=$_GET['subject'];
 $id=$_GET['id'];
 $idphoto=$_GET['idphoto'];
$action=$_GET['action'];

 //echo $page;
 //echo $_POST['page'];


// Variable de base
$location="http://www.modelinthecity.com/";
$incpath="/homez.193/".HOST."/modelinthecity/include/";
$syspath="/homez.193/".HOST."/modelinthecity/";

require $incpath."global.inc.php";
connexion();


    if($_SERVER['REQUEST_URI'] == "/index.php")
{
header("HTTP/1.1 301 Moved Permanently");
header("Location: http://".$_SERVER['HTTP_HOST']."/");
 exit;
 die("Redirection");
}

if($_GET['id'] && $page!="message"){
if(test_validation($_GET['id'])==false){
// $_GET['id']="";
header("HTTP/1.1 404 Not Found");
header("Location: http://www.modelinthecity.com/");
exit;
}}

/*
if($id){
$query="SELECT * FROM photo WHERE galerie='X$id'";
$result=mysql_query($query);
$nb = mysql_affected_rows();

if(!$nb){
// header("HTTP/1.0 404 Not Found");
header("location:http://www.modelinthecity.com/");
die('redirection');} 
}
*/


// Variables d'affichage
$bgcolor="#f9f9f9"; // couleur de fond de la page
$bgcolortitle="#BDC4CA";
$colonne = 5; // Nombre d'images par colonne
$twidth = 670; // Largeure maximum de la table
$tabcolor = "cccccc"; // couleur de la bordure des cadres
$subtcolor = "999999"; // couleur de fond des titres
$max_size = 120; // Taille max des vignettes

if($page=="confirm"){
if(!$_SESSION["CoNfIrMKeY"]){
header("HTTP/1.0 404 Not Found");
header("location:http://www.modelinthecity.com/");
die('redirection');
 }
}
/*
 if(!$_SESSION['modelinthecity']){
 // if($_SESSION['CoNfIrMKeY']!=md5(md5($_SESSION['KeY'].Date('Y-m:d')))){die('fuck');}
 header("location:http://www.modelinthecity.com/WELCOME");}
*/

require $incpath."header.inc.php";


// Variable de contenu
if($page=="login"){echo "<script>show_page('login');</script>";}
if($page=="portfolio"){$page="portfolio.inc.php";}
elseif($page=="photo"){$page="photo.inc.php";}
elseif($page=="espace_membre"){$page="d-espace_membre.inc.php";}

else{
$page="d-$page.inc.php";
if (!file_exists($page)) { 	

$page="d-galerie.inc.php";
//if($_SESSION["modelinthecity"]){$page="d-galerie.inc.php";}else{$page="d-mire.inc.php";}

}
}


//if($_SESSION["modelinthecity"]){
	// Affichage de la page
		print("<TABLE cellpadding='0' cellspacing='0' border='0' width='900' bgcolor='#f6f6f6' align='center' height='600' border='1' valign='top' class='general'><tr><TD width='100%' valign='top' height=600>");
		//}

if($_SESSION["modelinthecity"] && ($page=="d-admin_portfolio_style.inc.php" || $page=="d-galerie_creation.inc.php" || $page=="d-admin_portfolio.inc.php" || $page=="d-message.inc.php" || $page=="d-admin_portfolio_index.inc.php" || $page=="d-admin_portfolio_new.inc.php" || $page=="d-galerie_music.inc.php" || $page=="d-site_style.inc.php" || $page=="site_style_music.inc.php" || $page=="d-payment_module.inc.php" || $page=="d-payment_confirm.inc.php" || $page=="d-espace_membre.inc.php" || $page=="d-upgrade.inc.php" || $page=="d-casting.inc.php" || $page=="d-admin_articles.inc.php")){


require "d-espace_membre.inc.php";

//require $page;

if(test_inscription($_SESSION["modelinthecity"])=="false"){require "d-admin_portfolio_style.inc.php";}elseif($page!="d-espace_membre.inc.php"){require $page;}

	print("</TD></TR></TABLE>");
	// pied de page

} elseif( ($page=="d-admin_portfolio_style.inc.php" || $page=="d-galerie_creation.inc.php" || $page=="d-admin_portfolio.inc.php" || $page=="d-message.inc.php" || $page=="d-admin_portfolio_index.inc.php" || $page=="d-admin_portfolio_new.inc.php" || $page=="d-galerie_music.inc.php" || $page=="d-site_style.inc.php" || $page=="site_style_music.inc.php" || $page=="d-payment_module.inc.php" || $page=="d-payment_confirm.inc.php" || $page=="d-espace_membre.inc.php" || $page=="d-upgrade.inc.php" || $page=="d-casting.inc.php" || $page=="d-admin_articles.inc.php") && !$_SESSION["modelinthecity"]){
$page="d-galerie.inc.php";require $page;
}else {

	require $page;

}
	print("</TD></TR></TABLE>");
	require $incpath."footer.inc.php";



?>