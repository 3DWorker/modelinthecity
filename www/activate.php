<?php


require('./include/global.inc.php');
connexion();
error_reporting(0);
$key=$_GET['key']; 

if($key){

$result=mysql_query("SELECT * FROM membre_tmp WHERE id='$key' LIMIT 1");

	$nb=mysql_affected_rows();

if($nb<1){
mysql_close();
header('location:http://www.modelinthecity.com/index.php?page=login&err=invalidKey');
die("This ID key is not valid, Please login or signup again !");
}else{

$r=mysql_fetch_array($result);
//$_key=$r[id];
$pseudo=$r[pseudo];
$email=$r[email];
$password=$r[password];
$nom=$r[nom];
$prenom=$r[prenom];
$datecrea=$r[datecrea];

#verif date copyright ©philip angel

$d=explode("-",$datecrea,-1);
$d2=$d[0].$d[1].$d[2];

$days = ($year % 4 == 0 && ($year % 100 > 0 || $year % 400 == 0)) ? 366 : 365;
$timestamp += $days *.2;
$t2= strftime("%Y%m%d",mktime($timestamp));
$tt=getdate(strtotime($t2)-strtotime($datecrea));
if($tt["yday"]>5){

#clé expirée
mysql_query("DELETE FROM membre_tmp WHERE id='$key'");
mysql_close();

header('location:http://www.modelinthecity.com/index.php?page=login&err=timeout');
die("This ID key is outdated, Please login or signup again !");}
else{
#la clé est valide
#verif ultime base si membre inscrit

mysql_query("SELECT * FROM galerie WHERE pseudo='$pseudo' OR email='$email'");
$nb=mysql_affected_rows();

if($nb>=1){
#le membre existe 
#on detruit cette clé
mysql_query("DELETE FROM membre_tmp WHERE id='$key'");
mysql_close();

header('location:http://www.modelinthecity.com/index.php?page=login&err=signupvalidated');
}
else{

//mysql_query("DELETE FROM membre_tmp WHERE id='$key'");
/*
# le membre n'existe pas on cree son compte
$query=mysql_query("INSERT INTO `galerie` SET nom='$nom', prenom='$prenom', pseudo='$pseudo',email='$email', password='$password',valid=0,datecrea=NOW()");
if(!mysql_error()){
#on detruit la clé
mysql_query("DELETE FROM membre_tmp WHERE id='$key'");

#et on cherche son id
$result3=mysql_query("SELECT id FROM galerie WHERE pseudo='$pseudo' AND email='$email' LIMIT 1");
$r=mysql_fetch_array($result3);
$_id=$r[0];
#on cree son dossier et le tour est joué
if(!is_dir("./galerie/$_id")){mkdir("./galerie/$_id");chmod("./galerie/$_id",0705);}
#et on le fait s'identifier
header('location:http://www.modelinthecity.com/index.php?page=login&pseudo='.$pseudo.'');
exit;
*/
session_start();
$_SESSION['KeY']=$key;
$_SESSION['CoNfIrMKeY']=md5(md5($key.Date('Y-m:d')));

sleep(2);

header('location:http://www.modelinthecity.com/index.php?page=confirm');


}

}

}

}else{
header('location:http://www.modelinthecity.com/');
die("This ID key is not valid, Please login or signup again !");
}

?>