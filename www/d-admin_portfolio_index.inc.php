<?


if($_SESSION["modelinthecity"])
{


mysql_query("select * from account_approval where member_id='".$_SESSION['modelinthecity']."' and email='sent'");
if(mysql_affected_rows()<1){


$go=$_GET['go'];
$ac=$_GET['ac'];
$idfoto=$_GET['idfoto'];
$_presentation=$_POST['_presentation'];
$_presentation_en=$_POST['_presentation_en'];
$_credit=$_POST['_credit'];
$link_title1=$_POST['link_title1'];
$link_title2=$_POST['link_title2'];
$link_title3=$_POST['link_title2'];
$link1=$_POST['link1'];
$link2=$_POST['link2'];
$link3=$_POST['link3'];
$_titre=$_POST['_titre'];


if ($go!="Update" && !$_titre) {

//if(!$_titre){$_titre=TEXT_ADMIN_PORTFOLIO__TITLE  ." ". ucfirst(public_info($_SESSION["modelinthecity"],'pseudo')) ;}

}

$rub="galerie";
$date=Date('Y-m-d');
$_presentation=strip_tags($_presentation);
$_presentation_en=strip_tags($_presentation_en);
$_credit=strip_tags($_credit);
$_link=strip_tags($_link);
$_titre=strip_tags($_titre);
//$_presentation=str_replace(chr(10),"&break;",$_presentation);
connexion();
$ermes="";


//on cree le rep du minisite et on copie le fichier necessaire

/*
$pseudo=strtolower($pseudo);
if(!is_dir("/homez.193/".HOST."/$pseudo")){mkdir("/homez.193/".HOST."/$pseudo");chmod("/homez.193/".HOST."/$pseudo",0705);
$data="? require '../www/dispatch/index.php';?";
$fd=fopen("/homez.193/".HOST."//$pseudo/index.php","w+");
fwrite($fd,"<".$data.">");
fclose($fd);
}
*/

if(!$go && !$ac){
			$query = "SELECT presentation, presentation_en, photo,credit, titre FROM book_index WHERE id='$_SESSION[modelinthecity]'";
			$result=mysql_query($query);
			$r=mysql_fetch_array($result);
$_presentation=stripslashes($r['presentation']);
$_presentation_en=stripslashes($r['presentation_en']);
$photo=$r['photo'];
$_credit=stripslashes($r['credit']);
$_titre=$r['titre'];


			$query = "SELECT link_title1, link1, link_title2, link2, link_title3, link3, link_title4, link4, link_title5, link5 FROM book_link WHERE id='$_SESSION[modelinthecity]'";
			$result=mysql_query($query);
			$_lien="";
			while($r=mysql_fetch_array($result)){
			$link_title1= $r['link_title1']; $link1=$r['link1'];
			$link_title2= $r['link_title2']; $link2=$r['link2'];
			$link_title3= $r['link_title3']; $link3=$r['link3'];
			$link_title4= $r['link_title4']; $link4=$r['link4'];
			$link_title5= $r['link_title5']; $link5=$r['link5'];
			}			
}

// Validation du formulaire
////////////////////////////////RECUP VARS


if($go){		$query = "SELECT photo FROM book_index WHERE id='$_SESSION[modelinthecity]'";
			$result=mysql_query($query);
			$r=mysql_fetch_array($result);
$effphoto=$r[0];
}

if ($ac=="EF" && $idfoto) {

// $query=mysql_query("SELECT photo FROM book_index WHERE idfoto='".$idfoto."'");	if($r= mysql_fetch_array($result)) {$idfoto=$r['photo'];}

	$file = "galerie/".$_SESSION[modelinthecity]."/index/$idfoto";
if(file_exists($file) && $idfoto){
	$query = "UPDATE book_index SET photo='' WHERE id='$_SESSION[modelinthecity]'";
	mysql_query($query);
	unlink($file);
	$file=str_replace('.jpg','_small.jpg',$file);
	if(file_exists($file)){	unlink($file);}
	
	}
	$ermes = "Image deleted ...";
	$verif="OK";


###### VALID
			$query = "SELECT presentation,photo FROM book_index WHERE id='$_SESSION[modelinthecity]'";
			$result=mysql_query($query);
			$r=mysql_fetch_array($result);
$test_pres=stripslashes($r[presentation]);
$test_photo=$r[photo];
			$query = "SELECT valid FROM galerie WHERE id='$_SESSION[modelinthecity]' LIMIT 1";
			$result=mysql_query($query);
			$r=mysql_fetch_array($result);
$valid=$r[0];
if($test_pres && $test_photo && $valid==0 && !$valid){//$query="UPDATE galerie SET valid='1' WHERE id='$_SESSION[modelinthecity]' LIMIT 1";mysql_query($query);

echo "<script>location.href='index.php?page=admin_portfolio_index';</script>";}
else{//$query="UPDATE galerie SET valid='0' WHERE id='$_SESSION[modelinthecity]' LIMIT 1";mysql_query($query);

echo "<script>location.href='index.php?page=admin_portfolio_index';</script>";}

}


if ($go=="Update") {

$visuele = $_FILES['visuele']['tmp_name'];
$visuele_name = $_FILES['visuele']['name'];
$visuele_size = $_FILES['visuele']['size']; 
	$verif="OK";
	// Verification du poids de l'image
	if ($visuele && $visuele!="none") {
		if ($visuele_size>5500000) {
			$ermes=ERROR_FILESIZE;
			$verif="STOP";
		}	

if(!preg_match("/\.(jpe|jpg|jpeg)$/i",$visuele_name)){
			$ermes=ERROR_FILETYPE;
			$verif="STOP";
}

		if($verif!="STOP") {
		//Enregistrement de l'image

if(!is_dir("./galerie/".$_SESSION[modelinthecity]."/index/")){mkdir("./galerie/".$_SESSION[modelinthecity]."/index/");
chmod("./galerie/".$_SESSION[modelinthecity]."/index/",0705);}
sleep(1);
			$dossier= "./galerie/".$_SESSION[modelinthecity]."/index/";

 if(file_exists("./galerie/".$_SESSION[modelinthecity]."/index/$effphoto") && $effphoto){unlink("./galerie/".$_SESSION[modelinthecity]."/index/$effphoto");}
$dossier_tmp="./TMP/";
$z=Date('m:s');
$visuele_name=md5($visuele.$z);
if (move_uploaded_file($visuele,$dossier_tmp.$visuele_name.".img")) {
			
			$size=getimagesize($dossier_tmp.$visuele_name.".img");
			$src = imagecreatefromjpeg($dossier_tmp.$visuele_name.".img");
	
			
 $ratio=$size[1]/$size[0];
			

$maxW=350;
$maxH=350;

if($ratio>1){$sizeH=$maxH;$sizeW=$sizeH/$ratio;}else
if($ratio==1){$sizeH=$maxH;$sizeW=$maxW;}else
{$sizeW=$maxW;$sizeH=$sizeW*$ratio;}


			$dest = imagecreatetruecolor($sizeW,$sizeH);

			ImageCopyResampled($dest,$src,0,0,0,0,$sizeW,$sizeH,$size[0],$size[1]);
						
			imagejpeg($dest,$dossier.$visuele_name.".jpg",100);
			imagedestroy($dest);
			
			##creation de la miniature
			A4($dossier.$visuele_name.".jpg");		
			
if(file_exists($dossier_tmp.$visuele_name.".img")){unlink($dossier_tmp.$visuele_name.".img");}
			$query = mysql_query("SELECT * FROM book_index WHERE id='$_SESSION[modelinthecity]'");
			$nb = mysql_affected_rows();
if(!$nb){
			$query = "INSERT INTO book_index SET photo='$visuele_name.jpg',id='$_SESSION[modelinthecity]'";
			mysql_query($query);
	
}else{
		$query = "UPDATE book_index SET photo='$visuele_name.jpg' WHERE id='$_SESSION[modelinthecity]'";
		mysql_query ($query);	
}
}


		
}//fin verif
	}//fin move file

///save info
$_presentation=strip_tags($_presentation);
$_presentation=substr($_presentation,0,10000);
$_titre=strip_tags($_titre);
$_presentation_en=strip_tags($_presentation_en);
$_presentation_en=substr($_presentation_en,0,10000);

$_credit=strip_tags($_credit);
$_credit=substr($_credit,0,10000);

$error=" style='background:yellow;'";

if(test_entry($_presentation)=="personal"){$verif="STOP";$err_presentation[0]=$error;$err_presentation[1]="<font color=red><small>/!\ ".ERROR_PERSONAL_INFORMATION."</small></font><br>";}
if(test_entry($_presentation_en)=="personal"){$verif="STOP";$err_presentation_en[0]=$error;$err_presentation_en[1]="<font color=red><small>/!\ ".ERROR_PERSONAL_INFORMATION."</small></font><br>";}

if(test_entry($_titre)=="personal"){echo $verif="STOP";$err_titre[0]=$error;$err_titre[1]="<font color=red><small>/!\ ".ERROR_PERSONAL_INFORMATION."/small></font><br>";}
if(test_entry($_credit)=="personal"){$verif="STOP";$err_credit[0]=$error;$err_credit[1]="<font color=red><small>/!\ ".ERROR_PERSONAL_INFORMATION."</small></font><br>";}

if(test_entry($_presentation)=="bad"){$verif="STOP";$err_presentation[0]=$error;$err_presentation[1]="<font color=red><small>/!\ ".ERROR_OUTRAGOUS_WORDS."</small></font><br>";}
if(test_entry($_titre)=="bad"){$verif="STOP";$err_titre[0]=$error;$err_titre[1]="<font color=red><small>/!\ ".ERROR_OUTRAGOUS_WORDS."</small></font><br>";}
if(test_entry($_credit)=="bad"){$verif="STOP";$err_credit[0]=$error;$err_credit[1]="<font color=red><small>/!\ ".ERROR_OUTRAGOUS_WORDS."</small></font><br>";}


if($verif!="STOP"){

		$query = "UPDATE galerie SET dateactivity='" . strtotime("now")."' WHERE id='".$_SESSION[modelinthecity]."'";
		mysql_query ($query);
		
		
$query = mysql_query("SELECT * FROM book_index WHERE id='$_SESSION[modelinthecity]'");
		$nb = mysql_affected_rows();
if(!$nb){
			$query = "INSERT INTO book_index SET id='$_SESSION[modelinthecity]',titre='".addslashes($_titre)."',presentation='".addslashes($_presentation)."',presentation_en='".addslashes($_presentation_en)."',credit='".addslashes($_credit)."',lien='$_lien'";
			mysql_query($query);
	
}else{
		$query = "UPDATE book_index SET titre='".addslashes($_titre)."',presentation='".addslashes($_presentation)."',presentation_en='".addslashes($_presentation_en)."',credit='".addslashes($_credit)."',lien='$_lien' WHERE id='$_SESSION[modelinthecity]'";
		mysql_query ($query);
}

###LINK
			$query = mysql_query("SELECT * FROM book_link WHERE id='$_SESSION[modelinthecity]'");
			$nb = mysql_affected_rows();
if(!$nb){
			$query = "INSERT INTO book_link SET 
			link_title1='".addslashes(strip_tags($link_title1))."', link1='".addslashes(strip_tags($link1))."',
			link_title2='".addslashes(strip_tags($link_title2))."', link2='".addslashes(strip_tags($link2))."',
			link_title3='".addslashes(strip_tags($link_title3))."', link3='".addslashes(strip_tags($link3))."',
			link_title4='".addslashes(strip_tags($link_title4))."', link4='".addslashes(strip_tags($link4))."',
			link_title5='".addslashes(strip_tags($link_title5))."', link5='".addslashes(strip_tags($link5))."',
			id='$_SESSION[modelinthecity]'";
			mysql_query($query);
	
}else{
		$query = "UPDATE book_link SET 
			link_title1='".addslashes(strip_tags($link_title1))."', link1='".addslashes(strip_tags($link1))."',
			link_title2='".addslashes(strip_tags($link_title2))."', link2='".addslashes(strip_tags($link2))."',
			link_title3='".addslashes(strip_tags($link_title3))."', link3='".addslashes(strip_tags($link3))."',
			link_title4='".addslashes(strip_tags($link_title4))."', link4='".addslashes(strip_tags($link4))."',
			link_title5='".addslashes(strip_tags($link_title5))."', link5='".addslashes(strip_tags($link5))."' WHERE id='$_SESSION[modelinthecity]'";
		mysql_query ($query);	
}
// echo mysql_error();exit;
############


if(!mysql_error){echo "Your home page has been saved !";	echo "<script>location.href='http://www.modelinthecity.com/index.php?page=espace_membre';</script>";}else{echo mysql_error();}

###### VALID
			$query = "SELECT presentation,photo, titre FROM book_index WHERE id='$_SESSION[modelinthecity]'";
			$result=mysql_query($query);
			$r=mysql_fetch_array($result);
$test_pres=stripslashes($r[presentation]);
$test_photo=$r[photo];
$test_titre=$r[titre];
			$query = "SELECT valid FROM galerie WHERE id='$_SESSION[modelinthecity]' LIMIT 1";
			$result=mysql_query($query);
			$r=mysql_fetch_array($result);
$valid=$r[0];
if($test_pres && $test_photo && $test_titre){

////////////////////$query="UPDATE galerie SET valid='1' WHERE id='$_SESSION[modelinthecity]' LIMIT 1";mysql_query($query);

echo "<script>location.href='index.php?page=admin_portfolio_index';</script>";}
else{
////////////////////$query="UPDATE galerie SET valid='0' WHERE id='$_SESSION[modelinthecity]' LIMIT 1";mysql_query($query);
// echo "<script>location.href='index.php?page=admin_portfolio_index';</script>";

}


}else{echo '<div class=error>'.$ermes.'</div>';}

}

//wrap="PHYSICAL"
?>
 <form method="post" action="index.php?page=admin_portfolio_index&go=Update" enctype="multipart/form-data" name="form1">
  <table width=100% border=0 cellspacing=0 cellpadding=0 class=admin_table align=center>
    <TR> 
      <TD> 
        <table width="100%" border="0" cellspacing="0" cellpadding="7" >
          <tr> 
            <td colspan=4 align=center><!--div id=message>To get the best visibility and increase your visitors - Resume and credits or C.V are very important - Type your descriptive keywords like 'Make-up artist' or 'Live Model' 3 to 5 times max !</div--></td>
          </tr>
          <tr> 
		  <td align=right colspan=3></td></tr><tr>
            <td rowspan=5 valign=top width=150>
			        <TABLE border=0 width=150 bgcolor="#f6f6f6">
<?

$query="SELECT photo FROM book_index WHERE id='$_SESSION[modelinthecity]'";
$result=mysql_query($query);
$compt=1;
$nb=mysql_affected_rows();	

if($nb) {
	while ($r= mysql_fetch_array($result)) {
$photo = $r[photo];
		
		if ($compt>5) {	
			$compt=1;
			print("<tr align=center><td>");
		}
		$file ="galerie/".$_SESSION[modelinthecity]."/index/".str_replace('.jpg','_small.jpg',$photo);
		if(file_exists($file) && $photo){
		$size = getimagesize($file);
		$xx = $size[0];
		$yy = $size[1];
//if($yy<400){echo "<tr><td class=info>Cette image est trop petite!</td></tr>";}
		print("<td valign=top align=center><img src=\"$file\"");
		print(" border=1><br>");

		print("<br><a href=\"index.php?page=admin_portfolio_index&ac=EF&idfoto=".$photo."\"><span id=button_blue_small><small>".BUTTON_TEXT_DELETE."</small></span></A></span></td></td>");	
		$compt++;
	}}
} else {
	print("<TD class=blue >&nbsp;</TD><td align=right class=blue><font color=ff9900>$ermes</font></td>");
}	


?>

</table> 
			
			</td><td width="25%"> 
              <div align="right"><?
			  if(test_inscription_title($_SESSION["modelinthecity"])=="true"){echo "<img src='images/verif_ok.gif' width=10>";}else{echo "<img src='images/missing.gif' width=10>";}?>&nbsp;<?php echo TEXT_ADMIN_PORTFOLIO_TITLE;?> :</div>
            </td>
            <td width="75%"><?php echo $err_titre[1];?>
              <input <?php echo $err_titre[0];?> type="text" size=30 name="_titre" value="<? echo stripslashes($_titre);?>">
            </td>
          </tr>
          <tr> 
            <td> 
              <div align="right"><?
			  if(test_inscription_photo($_SESSION["modelinthecity"])=="true"){echo "<img src='images/verif_ok.gif' width=10>";}else{echo "<img src='images/missing.gif' width=10>";}?>&nbsp;<?php echo TEXT_PORTRAIT_IMAGE;?> : </div>
            </td>
            <td valign=top>
			<?
			mysql_query("SELECT * FROM book_index WHERE id='".$_SESSION['modelinthecity']."' and photo!=''");  
if(mysql_affected_rows()>0){$add="disabled";}else{$add="";}
			?><table><tr><td>
<input type="file" name="visuele" size="15" onchange="document.getElementById('load').style.visibility='visible';form1.submit();" <?php echo $add;?>></td><td>
			  &nbsp;&nbsp;<span id="load" style="visibility:hidden;"><img src="images/loading.gif"></span></td></tr></table>
              <input type="hidden" name="id2" value="<? print($_SESSION[modelinthecity]); ?>">
              </td>
          </tr>
          <tr>
            <td> 
              <div align="right"><?
			  if(test_inscription_presentation($_SESSION["modelinthecity"])=="true"){echo "<img src='images/verif_ok.gif' width=10>";}else{echo "<img src='images/missing.gif' width=10>";}?>&nbsp;<?php echo TEXT_ADMIN_PORTFOLIO_RESUME;?></div>
            </td>
            <td><b> 
			<?php echo $err_presentation[1];?>
			<?php if(public_info($_SESSION['modelinthecity'],'pays')!="GB" && public_info($_SESSION['modelinthecity'],'pays')!="AU" && public_info($_SESSION['modelinthecity'],'pays')!="AS" && public_info($_SESSION['modelinthecity'],'pays')!="AU" && public_info($_SESSION['modelinthecity'],'pays')!="IO" && public_info($_SESSION['modelinthecity'],'pays')!="KY" && public_info($_SESSION['modelinthecity'],'pays')!="NF" && public_info($_SESSION['modelinthecity'],'pays')!="US" && public_info($_SESSION['modelinthecity'],'pays')!="UM" && public_info($_SESSION['modelinthecity'],'pays')!="VG" && public_info($_SESSION['modelinthecity'],'pays')!="VI" && public_info($_SESSION['modelinthecity'],'pays')!="WF"){
			
			echo "&nbsp;<img src='images/flags/small/".strtolower(public_info($_SESSION['modelinthecity'],'pays')).".png'><br>";
			?>
              <textarea <?php echo $err_presentation[0];?> name="_presentation" cols="60" rows="10"><? print stripslashes($_presentation); ?></textarea></td></tr><tr>
			  <td align=right><?php echo TEXT_ADMIN_PORTFOLIO_RESUME_EN;?>
			  </td><td>
			  <?php echo $err_presentation_en[1];?><?php echo "&nbsp;<img src='images/flags/small/uk.png'><br>";?>
			  <textarea name="_presentation_en" cols="60" rows="10"><? print stripslashes($_presentation_en); ?></textarea>
			  <?}else{
			  ?>
			   <textarea <?php echo $err_presentation[0];?> name="_presentation" cols="60" rows="10"><? print stripslashes($_presentation); ?></textarea>
			   <?
			  }
			  
			  ?>
              </b></td>
          </tr>
          <tr>
            <td> 
              <div align="right"><?php echo TEXT_ADMIN_PORTFOLIO_CREDITS;?></div>
            </td>
            <td><b> <?php echo $err_credit[1];?>
              <textarea <?php echo $err_credit[0];?> name="_credit" cols="60" rows="10"><? print stripslashes($_credit); ?></textarea>
              </b></td>
          </tr>          <tr>
            <td></td> <td> 
			<?php if( get_level($_SESSION['modelinthecity'],'level')==0){$add="disabled";$adds="style='color:#cccccc;'";}else{$add="";}?>
              <div align="right"><font <?php echo $adds;?>><?php echo TEXT_ADMIN_PORTFOLIO_LINKS;?> : <br><br><br></font></div>
            </td>
           <td> <table ><tr><td <?php echo $adds;?>>
			1)&nbsp;&nbsp;<?php echo TEXT_ADMIN_PORTFOLIO_LINK_TITLE;?> : <input <?php echo $add;?> type="text" name="link_title1" maxlength="25" size="13" value="<?php echo $link_title1;?>"></td><td <?php echo $adds;?>>http:// : <input <?php echo $add;?> type="text" name="link1" maxlength="64" size="25" value="<?php echo $link1;?>"></td></tr><tr><td <?php echo $adds;?>>
			2)&nbsp;&nbsp;<?php echo TEXT_ADMIN_PORTFOLIO_LINK_TITLE;?> : <input <input <?php echo $add;?> type="text" name="link_title2" maxlength="25" size="13" value="<?php echo $link_title2;?>"></td><td <?php echo $adds;?>>http:// : <input <?php echo $add;?> type="text" name="link2" maxlength="64" size="25" value="<?php echo $link2;?>"></td></tr><tr><td <?php echo $adds;?>>
			3)&nbsp;&nbsp;<?php echo TEXT_ADMIN_PORTFOLIO_LINK_TITLE;?> : <input <input <?php echo $add;?> type="text" name="link_title3" maxlength="25" size="13" value="<?php echo $link_title3;?>"></td><td <?php echo $adds;?>>http:// : <input <?php echo $add;?> type="text" name="link3" maxlength="64" size="25" value="<?php echo $link3;?>"></td></tr><!--tr><td>
			4)&nbsp;&nbsp;<?php echo TEXT_ADMIN_PORTFOLIO_LINK_TITLE;?> : <input <input <?php echo $add;?> type="text" name="link_title4" maxlength="25" size="13" value="<?php echo $link_title4;?>"></td><td>http:// : <input type="text" name="link4" maxlength="64" size="25" value="<?php echo $link4;?>"></td></tr><tr><td>
			5)&nbsp;&nbsp;<?php echo TEXT_ADMIN_PORTFOLIO_LINK_TITLE;?> : <input <input <?php echo $add;?> type="text" name="link_title5" maxlength="25" size="13" value="<?php echo $link_title5;?>"></td><td>http:// : <input type="text" name="link5" maxlength="64" size="25" value="<?php echo $link5;?>"></td></tr--></table>
              </b>   <input type="hidden" name="az" value="update" width=100 height=30></td>
 
          </tr>     <tr><td align=center colspan=3><table width=100% border=0><td width=40%><hr></td><td align=center><a href="#" onclick="document.forms[0].submit();"><div class=button_blue><?php echo TEXT_UPDATE;?></div></a></td><td width=40%><hr></td></tr></table></td></tr>
      </table>
        
  </td>
</tr>
</table></form><br><br>
<? 
}}



?> 