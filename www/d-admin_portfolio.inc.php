<?

$ermes="";
if($_SESSION["modelinthecity"]){}else{exit;}

mysql_query("select * from account_approval where member_id='".$_SESSION['modelinthecity']."' and email='sent'");
if(mysql_affected_rows()<1){


$id=$_SESSION["modelinthecity"];
$rub="galerie";
connexion();
$_act=$_GET['_act'];
$style=$_POST['style'];
$title=$_POST['title'];
$description=$_POST['description'];
$legende=$_POST['legende'];

	
$size=getSize("./galerie/$id/");

// $disksize=disksize($_SESSION["modelinthecity"]);$rr=abs($disksize-$size);if($size>=$disksize){$verif="STOP";$ermes.="Quota gratuit dépassé.Espace disponible $rr.<br>";}


// Validation du formulaire

if ($_act=="EF" && $_GET['idfoto']) {

$q=mysql_query("SELECT nom from photo WHERE id='".$_GET['idfoto']."' and  galerie='X".$_SESSION[modelinthecity]."'");
if($r=mysql_fetch_array($q)){$photo=$r['nom'];}
	$query = "DELETE FROM photo WHERE id='".$_GET['idfoto']."' LIMIT 1";
	mysql_query($query);
	$file = "./galerie/$id/$photo";
if(file_exists($file)){
	unlink($file);}
	$ermes = "Image deleted...";
	$verif="OK";
	echo "<script>location.href='index.php?page=admin_portfolio';</script>";
	
}elseif($_act=="UPLOAD") {


$visuele = $_FILES['visuele']['tmp_name'];
$visuele_name = $_FILES['visuele']['name'];
$visuele_size = $_FILES['visuele']['size']; 

	$verif="OK";
	
	$legende=stripslashes($legende);
/*
$size=getSize("./galerie/$id/");
$T_size=$size+$visuele_size;
$rr=abs($disksize-$size)/1000;
		if ($T_size>=$disksize) {
			$ermes.=" Quota disk gratuit dépassé ! Il reste $rr Ko.<br>";
			$verif="STOP";
		}
		*/

	// Verification du poids de l'image
if($visuele && $visuele!="none"){
		if ($visuele_size>5000000) {
			$ermes.=" ".ERROR_FILESIZE."<br>";
			$verif="STOP";
		}

	if($visuele && $visuele!="none"){
		if ($visuele_size<18000) {
			$ermes.=" ".ERROR_FILESIZE_SMALL."<br>";
			$verif="STOP";
		}

if(test_entry($legende)){$verif="STOP";$ermes.=" ".ERROR_PERSONAL_INFORMATION."<br>";}
if(test_entry($title)){$verif="STOP";$ermes.=" ".ERROR_PERSONAL_INFORMATION."<br>";}
if(test_entry($description)){$verif="STOP";$ermes.=" ".ERROR_PERSONAL_INFORMATION."<br>";}

if(!preg_match("/\.(jpe|jpg|jpeg)$/i",$visuele_name)){
			$ermes.=" ".ERROR_FILETYPE;
			$verif="STOP";
}

		if($verif!="STOP") {
		//Enregistrement de l'image
			$dossier= "./galerie/$id/";
$dossier_tmp="./TMP/";


$code=Date('Ymd').'ModeliNtHecityofloVe';
$visuele_name=md5($visuele_name.$code);
if (move_uploaded_file($visuele,$dossier_tmp.$visuele_name.".img")) {
			
			$size=getimagesize($dossier_tmp.$visuele_name.".img");
			$src = imagecreatefromjpeg($dossier_tmp.$visuele_name.".img");
			
	$ratio=$size[1]/$size[0];
			

$maxW=700;
$maxH=700;

if($ratio>1){
// if($size[1]>$maxH)
$sizeH=$maxH;$sizeW=$sizeH/$ratio;

}elseif($ratio==1){$sizeH=$maxH;$sizeW=$maxW;}
elseif($ratio<1){

// if($size[0]>$maxW)
$sizeW=$maxW;$sizeH=$sizeW*$ratio;}

			
			
			$dest = imagecreatetruecolor($sizeW,$sizeH);

		ImageCopyResampled($dest,$src,0,0,0,0,$sizeW,$sizeH,$size[0],$size[1]);
		
			imagejpeg($dest,$dossier.$visuele_name.".jpg",80);
if(file_exists($dossier_tmp.$visuele_name.".img")){unlink($dossier_tmp.$visuele_name.".img");}

//verif si image existe
connexion();

			$query = "SELECT id FROM photo WHERE nom='$visuele_name.jpg' and galerie='X".$_SESSION[modelinthecity]."'";
			$result=mysql_query($query);
			$nb = mysql_affected_rows();


			if($nb<1){
$legende=ScanXss($legende,3);
			$query = "INSERT INTO photo SET title='$title', description='$description', style='$style', legende='$legende', galerie='X".$_SESSION[modelinthecity]."', nom='$visuele_name.jpg', date='" . strtotime("now")."'";
			mysql_query( $query);
			//echo mysql_error();
usleep(200);
		$query = "UPDATE galerie SET dateactivity='" . strtotime("now")."' WHERE id='".$_SESSION[modelinthecity]."'";
		mysql_query ($query);
}else{
		//	$query = "UPDATE photo SET title='$title', description='$description', style='$style', legende='$legende', nom='$visuele_name.jpg', date=CURDATE() where ";
		//	mysql_query( $query);

 $ermes.=" ".ERROR_TWICE_IMAGE ."<br>";
}

		}else{$ermes.="Uploading error !<br>";}

}
		
}}
}
elseif($_act=="EDIT" && $_GET['idfoto']){
$query = mysql_query("SELECT title, description, style, legende, date, nom FROM photo WHERE galerie='X".$_SESSION[modelinthecity]."' and id='".$_GET['idfoto']."'");
if($r=mysql_fetch_array($query)){
$title=$r['title'];
$description=$r['description'];
$style=$r['style'];
$date=$r['date'];
$legende=$r['legende'];
$nom=$r['nom'];
}
echo mysql_error();
}

elseif($_act=="UPDATE"){

if(test_entry($legende)){$verif="STOP";$ermes.=" URL, Email address, telephone number are not allowed for security reason.<br>";}
if(test_entry($title)){$verif="STOP";$ermes.=" URL, Email address, telephone number are not allowed for security reason.<br>";}
if(test_entry($description)){$verif="STOP";$ermes.=" URL, Email address, telephone number are not allowed for security reason.<br>";}
if(!$verif && $_POST['idfoto'] && $_SESSION[modelinthecity]){
mysql_query("UPDATE photo set title='".addslashes(strip_tags($_POST['title']))."', description='".addslashes(strip_tags($_POST['description']))."', style='".addslashes(strip_tags($_POST['style']))."', legende='".addslashes(strip_tags($_POST['legende']))."', date='" . strtotime("now")."' WHERE galerie='X".$_SESSION[modelinthecity]."' and id='".$_POST['idfoto']."'");
$ermes="This picture has been correctly updated";
}

}
?>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="admin_table">
	   <?php if($ermes!="") {?><tr><td colspan="4">&nbsp;<div class='error_admin'><?php echo "/!\ ".$ermes; ?></div><br></td></tr>	<?}?>		
    <tr id=admin_table_info><td colspan=4 align=center><font color=white><?php echo TEXT_UPLOAD;?></font></td></tr>
    <TD height="100%" id="admin_table_info_in" width=770 > 
	<?
	if(!$_GET['idfoto']){
	?>
	    <form name="form1" id="form1" action="index.php?page=admin_portfolio&_act=UPLOAD" method="POST" enctype="multipart/form-data"><?
		}else{
		?>
		 <form name="form1" id="form1" action="index.php?page=admin_portfolio&_act=UPDATE#02" method="POST" enctype="multipart/form-data"><?
	}
	?><a name=01></a>
      <table width="100%" border="0" cellspacing="0" cellpadding="7">
		 
		 <tr>
		 <td width=18% <?if($_GET['idfoto']){ echo "rowspan=4";}else{echo "rowspan=5";}?> align=center>&nbsp;
		 <?

		 if($_GET['idfoto']){
		 		$file ="galerie/".$_SESSION["modelinthecity"]."/$nom";
if(file_exists($file)){
		 echo "<img src='".$file."' border=1 height=100>";
		 }
		 }
		 ?></td>
		 <td align=right width=20%>&nbsp;</td><td width=24%>
		 		<?php
		$option="<select name='style'><option value=0>".TEXT_SELECT." ". TEXT_STYLE."</option>";
		if($_SESSION['languages']=="french"){$v="name_fr";}else{$v="name";}
		
	$q=mysql_query("select ".$v." as name ,id from categorie_gallery_style where 1 order by id ASC");
	while($r=mysql_fetch_array($q)){
	//$Swimsuit='Maillot de bain';
	//echo $n=${$r['name']};
	 if($_GET['idfoto']){if($style==$r[id]){$sel=" selected";}else{$sel="";}}
	$option.="<option value=".$r[id]."$sel>".$r['name']."</option>";
		}		$option.="</select>";
	print_r($option);
	?>
	</td><td width=38%><!--small>Style of the artwork</small--></td></tr>
		 
		     <tr> 
            <td align=right><?php echo TEXT_TITLE;?> : </td>
            <td>
              <input type="text" class=input name="title" value="<?php if($_GET['idfoto'])echo $title;?>" size="30" maxlength=25></td><td align=left><small><?php echo TEXT_ARTWORK_TITLE;?></small>
          </tr>
		  	<tr> 
            <td align=right><?php echo TEXT_DESCRIPTION;?> :
            </td>
            <td><textarea class=input name="description" rows=3 cols=27 maxlength=14><?php if($_GET['idfoto'])echo stripslashes($description);?></textarea></td><td align=left><small><?php echo TEXT_ARTWORK;?></small></td>
          </tr>
          <tr> 
            <td align=right><?php echo TEXT_COPYRIGHT;?> :</td>
            <td>
              <input type="text" class=input name="legende" value="<?php if($_GET['idfoto'])echo $legende;?>" size="24" maxlength=25>&nbsp;<input type=button size=15 onclick="form1.legende.value=form1.legende.value+'&copy;';" value="&copy;" style="font:arial;font-size:15;width:21;height:21" title="Add the &copy; symbol"></nobr>
             </td><td align=left><small><?php echo TEXT_PROTECT;?></small></td>
          </tr>
		  		<?
			 if(!$_GET['idfoto']){
					 ?>
          <tr> 
            <td  height="11" align=right><?php echo ucfirst(strtolower(TEXT_PHOTOGRAPHY));?> :
            </td>
            <td > 
              <input type="file" name="visuele" size="15" ></td><td>
			 <!--small><?php echo TEXT_IMAGE_FILESIZE;?></small--> <div id=load name=load style="visibility:hidden;"><img src="images/loading.gif"></div>
              <input type="hidden" name="id2" value="<? print($id); ?>"><input type="hidden" name="nom" value="<?php if($_GET['idfoto'])echo $nom;?>">
             </td>
          </tr>
		  <?
		  }
		  ?>
          <tr> 
            <td colspan=4 align=center>
			<?
			 if($_GET['idfoto']){
					 ?>
							<table><tr><td> <input type="hidden" name="idfoto" value="<?php if($_GET['idfoto'])echo $_GET['idfoto'];?>">
<a onclick='document.forms["form1"].submit();'><div id=button_blue_space><?php echo TEXT_UPDATE;?></div></a></td><td><a onclick='location.href="index.php?page=admin_portfolio";'><div id=button_blue_space><?php echo BUTTON_TEXT_CANCEL;?></div></td></Tr></table>
			<?	 
			 }else{
			 ?>
<a onclick='document.getElementById("load").style.visibility="visible";document.forms["form1"].submit();'><div id=button_blue_space><?php echo BUTTON_TEXT_SUBMIT;?></div>
			<?
			}
			?>
			
			</td>
          </tr>
      </table>
	  </form>
  </td>
</tr>

<?
$query="SELECT nom, id, legende, title, description, date, affichage, style FROM photo WHERE galerie='X".$_SESSION[modelinthecity]."' ORDER BY id";
$result=mysql_query($query);
$compt=1;
$nb=mysql_affected_rows();	

?>
<tr><td height=15></td></tr>
  <TR valign=top id=admin_table_info> <td colspan=4 align=center><font color=white><?php echo TEXT_GALLERY;?></font></td></tr>
    <TD id=admin_table_info_in><a name=02></a>
      <TABLE border=0 width=770 cellpadding=4 cellspacing=10 bordercolor=white><tr>
<?
if($nb) {
	while ($r= mysql_fetch_array($result)) {
		$legende = $r["legende"];//copyright
		$title=$r['title'];
		$description=$r['description'];
	//	$date=strftime('%d %B %Y',$r['date']);//" . strtotime("now")." strftime('%d %B %Y',
		
		  if($_SESSION['languages']=="french"){$date=strftime('%d %B %Y',$r['date']);}else{$date=strftime('%B %d, %Y',$r['date']);}
		  
		$visuel = $r["nom"];
		$photo = $r["id"];
		$affichage = $r["affichage"];
		$style=$r['style'];if($style>0){	$q1=mysql_query("select name from categorie_gallery_style where id='".$style."'");
	if($r1=mysql_fetch_array($q1)){$category_name=$r1['name'];}}else{$category_name="";}
		
		if ($compt>4) {	
			$compt=1;
			print("</tr><tr>");
		}
		$file ="galerie/".$_SESSION["modelinthecity"]."/$visuel";
		$size = getimagesize($file);
		$xx = $size[0];
		$yy = $size[1];
	
				print("<td valign=top align=center width=150><img src=\"$file\" height=100 border=1><br><br>
				<a href=\"index.php?page=admin_portfolio&_act=EDIT&idfoto=$photo#001\"><span id=button_blue_small>" . BUTTON_TEXT_EDIT."</span></A>&nbsp;
		<a href=\"index.php?page=admin_portfolio&_act=EF&idfoto=$photo\" onclick=\"return confirm('Do you really want to delete this file?');\"><span id=button_blue_small>" . BUTTON_TEXT_DELETE."</span></A>
		<div id=small>
				<br><b>". TEXT_TITLE." :</b> ".stripslashes($title)."
				<br><b>".TEXT_CATEGORY." :</b> ".stripslashes($category_name)."
				<br><b>".TEXT_DESCRIPTION." :</b> ".stripslashes($description)."
				<br><b>". TEXT_COPYRIGHT." :</b> ".stripslashes($legende)."
				<br><b>". TEXT_DATE." :</b> ".$date."</div></form>
		</td>");
		
		$compt++;
	}
} else {
	print("<TD>". TEXT_GALLERY_EMPTY."</TD><td align=right></td>");
}	


?>

</table>

    </td>
  </tr></table>    <br><br> 
<?
}
?>