<?
//header( 'refresh: 3; url=/' ); 
// IP du visiteur
$IP = $_SERVER['REMOTE_ADDR'];
// Date/heure courante en minutes
$date0 = time()/60;
// Dur�e de vie max
$vie = 5;

connexion();

$dater=Date('Y-M-d h:i:s');

$query = "SELECT * FROM count WHERE IP='$IP'";
$result=mysql_query($query);
$nb = mysql_affected_rows();
if(!$nb){
   $query = "INSERT INTO count SET IP='$IP',DATE=CURDATE()";
   mysql_db_query($base,$query);
}

// Suppression des anciens
$query = "DELETE FROM whoisonline";
$query.= " WHERE start<".($date0-$vie);
$result = mysql_db_query($base,$query);


//$temp = 0; if($logtatoo) $temp = 1;}// Logu� ?

$temp = 0; if(session_is_registered("logtatoo")) {$temp = 1;} // Logu� ?
// Stockage du hit courant

$query = "SELECT * FROM whoisonline WHERE IP='$IP'";
$result=mysql_query($query);
$nb = mysql_affected_rows();
if($nb){
   // Si d�j� l�, on modifie
   $query = "UPDATE whoisonline SET start=$date0";
   $query.= ",logue=$temp,id='$logtatoo' WHERE IP='$IP'";
   $result = mysql_db_query($base,$query);
} else { // sinon on ajoute

   $query = "INSERT INTO whoisonline(IP,start,logue,id)";
   $query.= " VALUES('$IP',$date0,$temp,$logtatoo)";
   $result = mysql_db_query($base,$query);
}

// Nombre de visiteurs en ligne
$query = "SELECT count(IP) FROM whoisonline";
$val= mysql_fetch_array(mysql_db_query($base,$query));
$online = $val[0];

// Nombre de visiteurs logu�s
$query = "SELECT count(IP) FROM whoisonline WHERE logue='1'";
$val= mysql_fetch_array(mysql_db_query($base,$query));
$nblog = $val[0];

######## membre

if(session_is_registered("logtatoo")){

$query = "SELECT pseudo,genre FROM galerie WHERE id='$logtatoo'";

$r= mysql_fetch_array(mysql_db_query($base,$query));
$mm.=$r[0];

}





$marquee="<marquee behavior=scroll direction=down width=80 height=40 scrollamount=1 scrolldelay=220 onmouseover='this.stop()' onmouseout='this.start()'>$mm</marquee>";

// Affichage
echo "<tr><td class=bleu>&nbsp;<b><font size=1>$online visiteurs</b>";
echo "&nbsp;<b>$nblog membres</b></td></tr>"; 
if($mmm){
echo "<tr><td height=40 bgcolor=f4f4f4 class=music>$marquee</td></tr>";
}
?> 