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

$disksize=disksize($_SESSION["modelinthecity"]);

$rr=abs($disksize-$size);
if($size>=$disksize){$verif="STOP";$ermes.="Quota gratuit dépassé.Espace disponible $rr.<br>";}


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
	
}elseif($_act=="UPLOAD") {


$visuele = $_FILES['visuele']['tmp_name'];
$visuele_name = $_FILES['visuele']['name'];
$visuele_size = $_FILES['visuele']['size']; 

	$verif="OK";
	
	$legende=stripslashes($legende);

$size=getSize("./galerie/$id/");
$T_size=$size+$visuele_size;
$rr=abs($disksize-$size)/1000;
		if ($T_size>=$disksize) {
			$ermes.=" Quota disk gratuit dépassé ! Il reste $rr Ko.<br>";
			$verif="STOP";
		}

	// Verification du poids de l'image
if($visuele && $visuele!="none"){
		if ($visuele_size>5000000) {
			$ermes.=" Filesize is too big (max. 5Mo).<br>";
			$verif="STOP";
		}

	if($visuele && $visuele!="none"){
		if ($visuele_size<18000) {
			$ermes.=" Filesize is too small (min. 20 ko).<br>";
			$verif="STOP";
		}

if(test_entry($legende)){$verif="STOP";$ermes.=" URL, Email address, telephone number are not allowed for security reason.<br>";}
if(test_entry($title)){$verif="STOP";$ermes.=" URL, Email address, telephone number are not allowed for security reason.<br>";}
if(test_entry($description)){$verif="STOP";$ermes.=" URL, Email address, telephone number are not allowed for security reason.<br>";}

if(!preg_match("/\.(jpe|jpg|jpeg)$/i",$visuele_name)){
			$ermes.=" Only JPEG files are allowed.";
			$verif="STOP";
}

		if($verif!="STOP") {
		//Enregistrement de l'image
			$dossier= "./galerie/$id/";
$dossier_tmp="./tmp1/";


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
			$query = "INSERT INTO photo SET title='$title', description='$description', style='$style', legende='$legende', galerie='X".$_SESSION[modelinthecity]."', nom='$visuele_name.jpg', date=CURDATE()";
			mysql_query( $query);
			//echo mysql_error();
usleep(200);
		$query = "UPDATE galerie SET dateactivity=CURDATE() WHERE id='".$_SESSION[modelinthecity]."'";
		mysql_query ($query);
}else{
		//	$query = "UPDATE photo SET title='$title', description='$description', style='$style', legende='$legende', nom='$visuele_name.jpg', date=CURDATE() where ";
		//	mysql_query( $query);

 $ermes.='This picture name already exists, you must rename and upload it again ! No twice picture.<br>';
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
mysql_query("UPDATE photo set title='".addslashes(strip_tags($_POST['title']))."', description='".addslashes(strip_tags($_POST['description']))."', style='".addslashes(strip_tags($_POST['style']))."', legende='".addslashes(strip_tags($_POST['legende']))."', date=CURDATE() WHERE galerie='X".$_SESSION[modelinthecity]."' and id='".$_POST['idfoto']."'");
$ermes="This picture has been correctly updated";
}

}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="admin_table">
	    <tr>
			<td <?if($ermes!="")echo "class='error'";?> colspan="4">&nbsp;<?php if($ermes!="")echo "/!\ ".$ermes; ?></td>
		 <!--//end.error display-->
		 </tr>	
    <tr id=admin_table_info><td colspan=4 align=center><font color=white>Upload your images</font></td></tr>
    <TD height="100%" id="admin_table_info_in" width=770 > 
	<?
	if(!$_GET['idfoto']){
	?>
	    <form name="form1" id="form1" action="index.php?page=galerie_portfolio&_act=UPLOAD" method="POST" enctype="multipart/form-data"><?
		}else{
		?>
		 <form name="form1" id="form1" action="index.php?page=galerie_portfolio&_act=UPDATE#02" method="POST" enctype="multipart/form-data"><?
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
		 <td align=right width=20%>Category style :</td><td width=24%>
		 		<?php
		$option="<select name='style'><option value=0>".TEXT_SELECT." ". TEXT_STYLE."</option>";
	$q=mysql_query("select name,id from categorie_gallery_style where 1 order by id ASC");
	while($r=mysql_fetch_array($q)){
	 if($_GET['idfoto']){if($style==$r[id]){$sel=" selected";}else{$sel="";}}
	$option.="<option value=".$r[id]."$sel>".$r[name]."</option>";
		}		$option.="</select>";
	echo $option;
	?>
	</td><td width=38%><small>Style of the artwork</small></td></tr>
		 
		     <tr> 
            <td align=right>Title :</td>
            <td>
              <input type="text" class=input name="title" value="<?php if($_GET['idfoto'])echo $title;?>" size="26" maxlength=25></td><td align=left><small>Title of the artwork (15 chars allowed)</small>
          </tr>
		  	<tr> 
            <td align=right>Description :
            </td>
            <td><textarea class=input name="description" rows=3 cols=23 maxlength=14><?php if($_GET['idfoto'])echo stripslashes($description);?></textarea></td><td align=left><small>A short description of the artwork (64 chars allowed)</small></td>
          </tr>
          <tr> 
            <td align=right>Copyright :</td>
            <td><?php //String.fromCharCode(0169);?>
              <input type="text" class=input name="legende" value="<?php if($_GET['idfoto'])echo $legende;?>" size="22" maxlength=25>&nbsp;<input type=button size=15 onclick="form1.legende.value=form1.legende.value+'&copy;';" value="&copy;" style="font:arial;font-size:15;width:21;height:21" title="Add the &copy; symbol">
             </td><td align=left><small>Protect your image with a copyright</small>
          </tr>
		  		<?
			 if(!$_GET['idfoto']){
					 ?>
          <tr> 
            <td  height="11" align=right>Photo :
            </td>
            <td > 
              <input type="file" name="visuele" size="15"></td><td>
			  <div id=load name=load style="visibility:hidden;"><img src="images/loading.gif"></div>
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
<a onclick='document.forms["form1"].submit();'><div id=button_blue_space>UPDATE</div></td><td><a onclick='location.href="index.php?page=galerie_portfolio";'><div id=button_blue_space>CANCEL</div></td></Tr></table>
			<?	 
			 }else{
			 ?>
<a onclick='document.getElementById("load").style.visibility="visible";document.forms["form1"].submit();'><div id=button_blue_space>SUBMIT</div>
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
  <TR valign=top id=admin_table_info> <td colspan=4 align=center><font color=white>Images gallery</font></td></tr>
    <TD id=admin_table_info_in><a name=02></a>
      <TABLE border=0 width=770 cellpadding=4 cellspacing=10 bordercolor=white><tr>
<?
if($nb) {
	while ($r= mysql_fetch_array($result)) {
		$legende = $r["legende"];//copyright
		$title=$r['title'];
		$description=$r['description'];
		$date=$r['date'];
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
				<a href=\"index.php?page=galerie_portfolio&_act=EDIT&idfoto=$photo#001\"><span id=button_blue_small>EDIT</span></A>&nbsp;
		<a href=\"index.php?page=galerie_portfolio&_act=EF&idfoto=$photo\" onclick=\"return confirm('Do you really want to delete this file?');\"><span id=button_blue_small>DELETE</span></A>
		<div id=small>
				<br><b>Title :</b> ".stripslashes($title)."
				<br><b>Category :</b> ".stripslashes($category_name)."
				<br><b>Description :</b> ".stripslashes($description)."
				<br><b>Copyright :</b> ".stripslashes($legende)."
				<br><b>Date added :</b> $date</div></form>
		</td>");
		
		$compt++;
	}
} else {
	print("<TD>This gallery is empty ...</TD><td align=right></td>");
}	


?>

</table>

    </td>
  </tr></table>    <br><br> 
<?
}
?>