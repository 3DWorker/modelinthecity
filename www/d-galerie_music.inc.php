<br><?

//error_reporting(0);
if(!function_exists(connexion)){require "./include/global.inc.php";}
//session_start($PHPSESSID);
if(session_is_registered("logtatoo"))
{

infos_membres($logtatoo);

$id=$logtatoo;

connexion();
$size=getSize("./galerie/$id/");

if($size>=$disksize){$verif="STOP";echo "Quota gratuit dépassé.";}




if ($ac=="EF") {

	$query="SELECT nom FROM photo WHERE id='$idmusic'";
	$result=mysql_db_query($base, $query);
while ($r= mysql_fetch_array($result)) {
	$erase=$r[0];
}
	$query = "DELETE FROM photo WHERE id='$idmusic' LIMIT 1";
	mysql_db_query($base, $query);


	$file = $location."galerie/$id/music/$erase";
if(file_exists($file) && $erase){unlink($file);}
	$ermes = "Fichier MP3 supprimé...";
	$verif="OK";
}


if ($submit=="Ajouter" || $submit=="Uploading...") {



	$verif="OK";
	// Verification du poids de l'image
	if ($visuele && $visuele!="none") {

$size=getSize("./galerie/$id/");
$T_size=$size+$visuele_size;
$rr=abs($disksize-$size)/1000;
		if ($T_size>=$disksize) {
			$ermes="Quota disk gratuit dépassé ! Il reste $rr Ko";
			$verif="STOP";
		}

		if ($visuele_size>=5000000) {
			$ermes=" Fichier MP3 tros gros ! (max. 5Mo.)";
			$verif="STOP";
		}

	//	if ($legende=="") {
		//	$ermes=" Vous devez indiquer le nom de l'auteur du titre";
		//	$verif="STOP";
		//}	

if(!preg_match("/\.(mp3|MP3)$/i",$visuele_name)){
			$ermes=" Seules les musiques de type MP3 sont acceptées!!!";
			$verif="STOP";
}

		if($verif!="STOP") {
		//Enregistrement de l'image
			$dossier= "./galerie/$id/";
$dossier_tmp="./tmp_music/";
$visuele_name=md5($visuele);
if(!is_dir("./galerie/$id/music/")){mkdir("./galerie/$id/music");chmod("./galerie/$id/music",0705);}

if(move_uploaded_file($visuele,$dossier_tmp.$visuele_name.".mp3")){
chmod($dossier_tmp.$visuele_name.".mp3",0705);






		
	$file="$dossier_tmp$visuele_name.mp3";
	$file1="./galerie/$id/music/$visuele_name.mp3";

		include ("./include/classAudioFile.php");
		$AF = new AudioFile;
		$AF->loadFile($file);
		$legende=$AF->printSampleInfo();
$legende_=base64_encode($legende);
$leg=split("-",$legende);

if($leg[0]=="" || $leg[1]==""){echo "<table width=668 border=0><tr><td class=info>Vous devez indiquer l'artiste et le titre de ce titre dans les propriétés du MP3.<br>Ces informations seront affichés sur le site!!!Merci.</td></tr></table>";unlink("$dossier_tmp$visuele_name.mp3");$err=true;}


if($err!=true){

/*
$out = '';
$len = 0;

 $fh = fopen($file, 'rb');
 $size = filesize($file);
 $out .= fread($fh, $size);
 $len += $size;
 fclose($fh);

 $fh = fopen($file1, 'a+');
header("Content-Type: audio/mpeg");
header("Content-Disposition: attachment; filename=$file;");
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".$len);

 fwrite($fh, $out);
 fclose($fh);
*/



copy("$dossier_tmp$visuele_name.mp3","./galerie/$id/music/$visuele_name.mp3");
if(file_exists("$dossier_tmp$visuele_name.mp3")){unlink("$dossier_tmp$visuele_name.mp3");}
connexion();
$query="INSERT INTO photo SET galerie='M$id',legende='$legende_',nom='$visuele_name.mp3'";
mysql_db_query($base, $query);
echo mysql_error();




}else{if(file_exists("$dossier_tmp$visuele_name.mp3"))unlink("$dossier_tmp$visuele_name.mp3");}



}

}	else{echo "<table width=668 border=0><tr><td class=info>$ermes</td></tr></table>";}
}
}

?>


<SCRIPT LANGUAGE="JavaScript">
<!--
function openw(dossier,photo,xx,yy){
var linx="photo.php?gal="+dossier+"&id="+photo
toto=window.open(linx,"photo","toolbar=no,scrollbars=no,resizable=no,status=no,width="+xx+",height="+yy)
}
//-->
</SCRIPT>
<script>sponsor=1;ie=document.all;ns4=document.layers;ns7=document.getElementById&&ie;

 function st(str){window.status=str;return true}

el=document.getElementById("popbox1");timer=0;
function showBox(e){
if(timer)clearTimeout(timer);
var a2=el.style;
var x=e.clientX;
var y=e.clientY; 
if(ie){x+=document.documentElement.scrollLeft+document.body.scrollLeft;
y+=document.documentElement.scrollTop+document.body.scrollTop}
else{x+=window.scrollX;y+=window.scrollY}
a2.left=x-600+"px";a2.top=y-300+"px";a2.visibility='visible'}
function chBox(h){el.innerHTML=h}
function hideBox(){timer=setTimeout("el.style.visibility='hidden'",200)}
function writeLinks(link,X,Y,txt){
X=Math.round(X)+20;
Y=Math.round(Y)+20;
el=document.getElementById("popbox1");
var h ='Explication\\074img src='+link+' width='+X+' height='+Y+' border=1 alt=\\042\\042\\076\\074br\\076&nbsp;modelinthecity';
if(link!=0)
document.write('<a onmouseover="chBox (\''+h+'\');showBox(event)" onmouseout="hideBox()"  href="#" onload="chBox (\''+h+'\');showBox(event)" ><font size=5 color=red><b>'+txt+'</b></font></a>');}
</script>
      <div  id="popbox1" style="BACKGROUND:#BDCEE6; BORDER-BOTTOM: #000000 1px solid; BORDER-LEFT: #000000 1px solid; BORDER-RIGHT: #000000 1px solid; BORDER-TOP: #000000 1px solid; PADDING-BOTTOM: 3px; PADDING-LEFT: 3px; PADDING-RIGHT: 3px; PADDING-TOP: 3px; POSITION:absolute;VISIBILITY: hidden; WIDTH: 115px; z-index:2000; left: 85px; top: 90px;COLOR: white; FONT-FAMILY: Arial, 'verdana'; FONT-SIZE: 11pt; FONT-WEIGHT: bold; TEXT-DECORATION: none;">?</div>




<table width=670 border=2 cellspacing=0 cellpadding=0 bgcolor=#e4e4e4 bordercolor=#BDCEE6 height="80">
  <TR> 
    <TD bgcolor="BDCEE6"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="7" bgcolor=e4e4e4>
        <form name=form1 method="post" action="index.php?page=galerie_music" enctype="multipart/form-data" onload=location.href="d-espace_membre.inc.php">
          <tr bgcolor="#BDCEE6"> 
            <td colspan="3"><font face="Arial, Helvetica, sans-serif" size="2"><b><font color="#FFFFFF">Modifier 
              les musiques de mon Minisite Musical</font></b></font></td>
          </tr>
          <!--tr> 
            <td height="20"> 
              <div align="right"><font face="Arial, Helvetica, sans-serif" size="2" color="#000000">Titre 
                :</font><span class=small> </span> </div>
            </td>
            <td height="20"><b> 
              <input type="text" class=input name="legende" value="<? print($legende); ?>" size="15"><input type=button size=15 onclick="form1.legende.value=String.fromCharCode(0169)+form1.legende.value;" value="©" style="font:arial;font-size:15;width:21;height:21">
              </b> </td>
          </tr-->
          <tr> 
            <td width="44%" height="11"> 
              <div align="right"><font face="Arial, Helvetica, sans-serif" size="2" color="628ECA">MP3
                :</font> </div>
            </td>
            <td width="56%" height="11"><b> 
              <input class=input type="file" name="visuele" size="15">
              
              <br>
              </b> </td>
          </tr>
          <tr>
            <td colspan="2" height="3" class=music1 align=center> 
              (Le fichier doit &ecirc;tre en .mp3 et faire moins de 5 Mo)</font>
           
            </td>
          </tr>
          <tr> 
            <td class=blue colspan="2">
              <div align="center"><?
$queryx="SELECT valid FROM galerie WHERE id='$id'";
$resultx=mysql_db_query($base, $queryx);
$rx= mysql_fetch_array($resultx);
$val = $rx["valid"]	
?> 



     <input type=hidden value="<? print($val); ?>" name="val">
                <input  class=but type="submit" name="submit" value="Ajouter"  onclick="this.style.backgroundImage='url(http://www.modelinthecity.com/images/loading.gif)';this.value='Uploading...';">
              </div>
            </td>
          </tr>
<tr><td class=music1 colspan=2 align=center>Avant d'uploader vos MP3, verifiez que vos titres comportent bien <u>l'artiste</u> et <u>le titre</u> dans les propriétés du MP3 pour ce faire depuis windows click droit+propriétés+résumé+avancé<br>Sinon entrez ces informations vitales aux droits d'auteurs avant l'upload.Merci.</td><td><script>writeLinks('./images/explain_mp3.gif','479','502','?');</script></td></tr>

        </form>
      </table>
      
  </td>
</tr>

<?
$query="SELECT * FROM photo WHERE galerie='M$id' ORDER BY affichage DESC";
$result=mysql_db_query($base, $query);
$compt=1;
$nb=mysql_affected_rows();	


?>

  <TR valign=top bgcolor="#BDCEE6"> 
    <TD height="16"> 
      <TABLE border=0 cellspacing=0 cellpadding=2 width=100% ><tr>
<?
if($nb) {
	while ($r= mysql_fetch_array($result)) {
		$legende = base64_decode($r["legende"]);
$leg=split("-",$legende);
		$visuel = $r["nom"];
		$file = "http://www.modelinthecity.com/galerie/$id/music/$visuel";
$tune=base64_encode(base64_encode(base64_encode($file)));
		$affichage = $r["affichage"];
		$_id=$r["id"];
		if ($compt>1) {	
			$compt=1;
			print("</tr><tr>");
		}


if(preg_match("/\.(mp3|MP3)$/i",$file)){


	
		print '<td align=right  bgcolor="f2f2f2" width=40>';

print '<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
 codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
 WIDTH="20" HEIGHT="20" id="music" ALIGN="">
 <PARAM NAME=movie VALUE="music.swf">
<param name="bgcolor" value="f2f2f2">
<param name="FlashVars" value="aRk='.$tune.'">
 <PARAM NAME=quality VALUE=high> <PARAM NAME=bgcolor VALUE=#FFFFFF> <EMBED src="music.swf" quality=high   WIDTH="20" HEIGHT="20" NAME="music" ALIGN=""
 TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED>
</OBJECT></td><td class=music>';
}



	print "Artiste:$leg[0]</td><td class=music>Titre:$leg[1]</td><td class=music>Durée:$leg[5]</td><td class=music>";
		
		print("[<a href=\"index.php?page=galerie_music&ac=EF&idmusic=$_id\">Effacer</A>]</font></td>");	
		$compt++;
	}
} else {
	print("<TD class=blue bordercolor=#cccccc>Cette galerie est vide...</TD><td align=right class=blue><font color=ff9900>$ermes</font></td>");
}	


?>

</table>

    </td>
  </tr></table>
<? 
}


function CheckExt($File)
{
$Ext="494433-0-4";
$sonic="fff382";
$sonic1="fffb70";
    $cExt = explode("-", $Ext);
    $cFile = fopen($File, 'r');
    fseek($cFile, $cExt[1]);
    $cData = fgets($cFile, $cExt[2]);
    fclose($cFile);
    $cData = bin2hex($cData);
    if ($cExt[0] == $cData || $sonic==$cData || $sonic1==$cData)
    {
        return true;
    } else
    {echo $cData."=".$cExt[0];
        return false;
    }
}


?> 