<?php
################### free site
require "../www/connex/connexionphoto.inc.php";
$IP=$_SERVER['REMOTE_ADDR'];
$test=$_SERVER['HTTP_HOST'];
$test=str_replace("www.","",$test);
$pos=strpos($test,".modelinthecity");
$test=substr($test,0,$pos);

$query="SELECT id,email,compteur,datecrea,categorie,style,ville,pays,hauteur,poitrine,taille,hanche,cheveux,yeux,confection,pointures,age,style FROM galerie WHERE pseudo='$test'";
$result=mysql_db_query($base, $query);
$nb = mysql_affected_rows();
if($nb>1){echo "phil, un autre compte est au meme pseudo $test";exit;}else{

################################COLOR PERSO

$bgcolor="cccccc";
$police="arial";
$text_color="ffffff";
$text_linked="ff9900";
$text_color_link="ff9900";
$text_color_hover="000080";
$sty="1";

#############################

while ($r= mysql_fetch_array($result)) {
$id=$r[0];
$_email=$r[1];
$compteur=$r[2]+1;
$date=x_date($r[3]);
$cat=$r[4];
$style=$r[5];
$ville=$r[6];
$pays=strtolower($r[7]);
$hauteur=$r[8];
$poitrine=$r[9];
$taille=$r[10];
$hanche=$r[11];
$cheveux=$r[12];
$yeux=$r[13];
$confection=$r[14];
$pointures=$r[15];
if(strlen($age)>3){$age=Date(Y)-$r[16];}else{$age=$r[16];}

}
########################
$query="SELECT style,presentation FROM book_index WHERE id='$id'";
$result=mysql_db_query($base, $query);
while ($r= mysql_fetch_array($result)) {
$sty=$r[0];
if(!$sty){$sty="1";}
$presentation=nl2br($r[1]);
}
if($sty==1){$bgcolor="9FD1F2";}
if($sty==2){$bgcolor="cccccc";}
if($sty==3){$bgcolor="FAE4CC";}
if($sty==4){$bgcolor="f6f6f6";}

#########################



//on ajoute au compteur
$query="UPDATE galerie SET compteur='$compteur' WHERE pseudo='$test'";
$result=mysql_db_query($base, $query);
///vignette

$query="SELECT photo FROM book_index WHERE id='$id'";
$result=mysql_db_query($base, $query);
$nb = mysql_affected_rows();
while ($r= mysql_fetch_array($result)) {

$location="../www/";
$visuel = $location."galerie/$id/index/".$r["photo"];
$visuel_="http://www.modelinthecity.com/galerie/$id/index/".$r["photo"];

$loc="http://www.modelinthecity.com/minisite_music/style_$sty/";
		$size=getimagesize("$visuel");

$max=250;

if ($size[0]>$max OR $size[1]>$max) {
	if ($size[0]>$size[1]) {
		$x = $max;
		$y = ($max/$size[0])*$size[1];
	} else {
		$y = $max;
		$x = ($max/$size[1])*$size[0];
	}
} else {


	$x=100;
	$y=150;
}

}
?>


<html>
<head>
<title>modelinthecity - Le minisite musical de <? echo $test;?></title>
<meta http-equiv="Content-Type" content="text/html;">
<style>
.presentation{FONT-FAMILY: Arial, Helvetica, sans-serif;FONT-SIZE: 12px;COLOR: #666666;}
.footer{FONT-FAMILY: Arial, Helvetica, sans-serif;FONT-SIZE:11px;COLOR: #666666;}
TD.music{background-color:f2f2f2;FONT-FAMILY: Arial, Helvetica, sans-serif;FONT-SIZE: 11px;COLOR: #628ECA;}

A { TEXT-DECORATION: none;FONT-SIZE: 10pt; FONT-FAMILY: arial,helvetica;COLOR: "<? echo $text_color;?>";}
A:hover { TEXT-DECORATION: none;FONT-SIZE: 10pt; FONT-FAMILY: arial,helvetica;COLOR:"<? echo $text_color_hover;?>";}


</style>


<script language="JavaScript">
<!--
function MM_findObj(n, d) { //v3.0
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document); return x;
}
function MM_nbGroup(event, grpName) { //v3.0
  var i,img,nbArr,args=MM_nbGroup.arguments;
  if (event == "init" && args.length > 2) {
    if ((img = MM_findObj(args[2])) != null && !img.MM_init) {
      img.MM_init = true; img.MM_up = args[3]; img.MM_dn = img.src;
      if ((nbArr = document[grpName]) == null) nbArr = document[grpName] = new Array();
      nbArr[nbArr.length] = img;
      for (i=4; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
        if (!img.MM_up) img.MM_up = img.src;
        img.src = img.MM_dn = args[i+1];
        nbArr[nbArr.length] = img;
    } }
  } else if (event == "over") {
    document.MM_nbOver = nbArr = new Array();
    for (i=1; i < args.length-1; i+=3) if ((img = MM_findObj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = (img.MM_dn && args[i+2]) ? args[i+2] : args[i+1];
      nbArr[nbArr.length] = img;
    }
  } else if (event == "out" ) {
    for (i=0; i < document.MM_nbOver.length; i++) {
      img = document.MM_nbOver[i]; img.src = (img.MM_dn) ? img.MM_dn : img.MM_up; }
  } else if (event == "down") {
    if ((nbArr = document[grpName]) != null)
      for (i=0; i < nbArr.length; i++) { img=nbArr[i]; img.src = img.MM_up; img.MM_dn = 0; }
    document[grpName] = nbArr = new Array();
    for (i=2; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = img.MM_dn = args[i+1];
      nbArr[nbArr.length] = img;
  } }
}

function MM_preloadImages() { //v3.0
 var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
   var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
   if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

//-->
</script>
</head>
<body bgcolor="<? echo $bgcolor;?>" oncontextmenu="return false;" >
<table width="604" border="0" cellspacing="0" cellpadding="0" height="305" align="center">
  <tr> 
    <td colspan="4" height="274" background="<? echo $loc;?>/up.gif"> 
      <table width="95%" border="0" cellspacing="10" cellpadding="0">
        <tr> 
          <td height="203" width="45%" valign=top><img src="<? echo $visuel_;?>" width="<? echo $x;?>"  height="<? echo $y;?>" vspace="10" hspace="10" border=1></td>
          <td height="203" width="55%" valign=middle><font class=presentation><b><?php print $presentation;?></b></font></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td colspan="3" height="33"> 
      <div align="center"><img src="<? echo $loc;?>slider_left.gif" width="42" height="47"></div>
    </td>
    <td width="562" height="33" background="<? echo $loc;?>/slider.gif">
<a href="index.php" onMouseOut="MM_nbGroup('out');"  onMouseOver="MM_nbGroup('over','but2_r3_c2','<? echo $loc;?>/but-2_r3_c2_f2.gif','<? echo $loc;?>/but-2_r3_c2_f3.gif',1);"  onClick="MM_nbGroup('down','navbar1','but2_r3_c2','<? echo $loc;?>/but-2_r3_c2_f3.gif',1);" ><img name="but2_r3_c2" src="<? echo $loc;?>/but-2_r3_c2.gif" width="55" height="14" border="0" onLoad=""></a> 
      | <a href="http://www.modelinthecity.com/index.php?page=enregistrement" target="_blank" onMouseOut="MM_nbGroup('out');"  onMouseOver="MM_nbGroup('over','but2_r3_c6','<? echo $loc;?>/but-2_r3_c6_f2.gif','<? echo $loc;?>/but-2_r3_c6_f3.gif',1);"  onClick="MM_nbGroup('down','navbar1','but2_r3_c6','<? echo $loc;?>/but-2_r3_c6_f3.gif',1);" ><img name="but2_r3_c6" src="<? echo $loc;?>/but-2_r3_c6.gif" width="77" height="14" border="0" onLoad=""></a> 
      | <a href="index.php?contact=1" onMouseOut="MM_nbGroup('out');"  onMouseOver="MM_nbGroup('over','but2_r2_c4','<? echo $loc;?>/but-2_r2_c4_f2.gif','<? echo $loc;?>/but-2_r2_c4_f3.gif',1);"  onClick="MM_nbGroup('down','navbar1','but2_r2_c4','<? echo $loc;?>/but-2_r2_c4_f3.gif',1);" ><img name="but2_r2_c4" src="<? echo $loc;?>/but-2_r2_c4.gif" width="72" height="15" border="0" onLoad=""></a></td>
  </tr>
  <tr> 
    <td  colspan="4" background="<? echo $loc;?>/bg_down.gif" valign=top> 
      <table width="90%" border="0" cellspacing="10" cellpadding="0"   valign=top align="center" height="30">
        <tr> 
<?php

if(!$contact){
$query="SELECT * FROM photo WHERE galerie='X$id'";
$result=mysql_db_query($base, $query);
$nb = mysql_affected_rows();
$query="SELECT * FROM photo WHERE galerie='M$id'";
$result=mysql_db_query($base, $query);
$nb_M = mysql_affected_rows();
######################################################### MUSIC
if($nb_M) {

$col = $colonne+0;
$colonne=2;
$compt=1;
$query="SELECT * FROM photo WHERE galerie='M$id'";
$result=mysql_db_query($base, $query);
	while ($r= mysql_fetch_array($result)) {
		$legende = base64_decode($r["legende"]);
$leg=split("-",$legende);
		$visuel = $r["nom"];
		$file = "http://www.modelinthecity.com/galerie/$id/music/$visuel";
$tune=base64_encode(base64_encode(base64_encode($file)));
		$affichage = $r["affichage"];
		$_id=$r["id"];
		if ($compt>0) {	
			$compt=1;
			print("</tr><tr>");
		}


if(preg_match("/\.(mp3|MP3)$/i",$file)){


	
		print '<td align=right  bgcolor="f2f2f2" width=20>';

print '<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
 codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
 WIDTH="20" HEIGHT="20" id="music" ALIGN="">
 <PARAM NAME=movie VALUE="http://www.modelinthecity.com/music.swf">
<param name="bgcolor" value="f2f2f2">
<param name="FlashVars" value="aRk='.$tune.'">
 <PARAM NAME="quality" VALUE="high"> <PARAM NAME="bgcolor" VALUE="FFFFFF"> <EMBED src="http://www.modelinthecity.com/music.swf" quality="high"   WIDTH="20" HEIGHT="20" NAME="music" ALIGN=""
 TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED>
</OBJECT></td><td class=music>';




	print "Artiste:$leg[0]</td><td class=music>Titre:$leg[1]</td><td class=music>Duree:$leg[5]</td>";
		
			
		$compt++;
}

}
	}

	$csp=$col-$compt;
	if ($csp>=1) {
	print("</tr><td colspan=$csp>&nbsp;</td>");
	}
}

#############################################################
print "</tr>";

if(!$nb && !$nb_M){echo "Cet album musical est vide";}
}

?> 
<?
if($contact){

if($Submit=="Envoyer"){
if($name && $subject && $message && $email){
$contenuhtml="<body bgcolor=e4e4e4><font face=arial size=2>Nouveau message reçu de : $name<br><br>Sujet : $subject<br><br>Email : $email<br><br>Message : $message</body>";
$ff="<font size=3 face=arial color=orange><b>";
if(ValidateEmail($email)){$mess= "$ff Cette adresse email est fausse!!</font>";}else{
mail($_email,"modelinthecity.com - Nouveau message",$contenuhtml,"From: $email\nContent-Type: text/html; charset=\"iso-8859-1\"\n");
$name="";$subject="";$email="";
}
$mess= "$ff message envoyé!!</font>";}else{$mess= "$ff Champs manquants!!</font>";
}}

?>
<form action=index.php method=post>
<tr> 
      <td width="21%" class=music><font size=2>Nom et pr&eacute;nom :</td>
      <td width="79%"> 
        <input type="text" name="name">
      </td>
    </tr>
    <tr> 
      <td width="21%" class=music><font size=2>Sujet :</td>
      <td width="79%"> 
        <input type="text" name="subject">
      </td>
    </tr>
    <tr> 
      <td width="21%" class=music><font size=2>IP :</td>
      <td width="79%"> 
        <input type="text" disabled name="ip" value="<?echo $IP;?>">
      </td>
    </tr>
    <tr> 
      <td width="21%" class=music><font size=2>Email :</td>
      <td width="79%"> 
        <input type="text" name="email">
      </td>
    </tr>
    <tr> 
      <td width="21%"  class=music><font size=2>Message :</td>
      <td width="79%"> 
        <textarea name="message" cols="40" rows="3"></textarea>
      </td>
    </tr>
    <tr> 
      
      <td width="100%" colspan=2> 
        <div align="center"><?echo $mess;?><br>
<input type=hidden name=contact value=1>
          <input type="submit" name="Submit" value="Envoyer">
        </div>
      </td>
    </tr></form>
<?
}
?>
        <tr> 
          <td height="38" align=center colspan=4>&nbsp; </td>
        </tr>
      </table>
  </tr>
  <tr> 
    <td height="56" colspan="4"  background="<? echo $loc;?>/footer.gif"> 
      <div align="center"><font class=footer>©2005 modelinthecity.com<br>
        <? echo $compteur;?>&nbsp;visites depuis le <?echo $date;?></font> 
      </div>
    
  </tr>
</table>
<div align=center>
<a href="#" onClick="window.external.AddFavorite(location.href, document.title);">Ajouter a vos favoris</a>&nbsp;<font color=white>|</font>&nbsp;<a href="mailto:?subject=Je te recommande Le Book de <? echo $test;?>&body=Voici Le Book de <? echo $test;?>! Clique sur le lien : http://<? echo $_SERVER['HTTP_HOST'];?>">Recommander ce site</a></div>
</body>
</html>
<?php
function x_date($date,$aff='1') {
	$date = explode('-', $date);
	switch ($date[1]) :
		case "1" : $mois = "janvier"; break ;
		case "2" : $mois = "fevrier"; break ;
		case "3" : $mois = "mars"; break ;
		case "4" : $mois = "avril"; break ;
		case "5" : $mois = "mai"; break ;
		case "6" : $mois = "juin"; break ;
		case "7" : $mois = "juillet"; break ;
		case "8" : $mois = "aout"; break ;
		case "9" : $mois = "septembre"; break ;
		case "10" : $mois = "octobre"; break ;
		case "11" : $mois = "novembre"; break ;
		case "12" : $mois = "decembre"; break ;
	endswitch;
	if ($aff==1) {
		$date = "$date[2] $mois $date[0]";
	} else {
		$date = "$date[2]/$date[1]/$date[0]";
	}
	return $date;
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
