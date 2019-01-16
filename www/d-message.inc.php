<?
error_reporting(0);
if($_SESSION["modelinthecity"]){}else{exit;}
// if(test_validation($_SESSION["modelinthecity"])){
//mysql_query("select * from account_approval where member_id='".$_SESSION['modelinthecity']."' and email='sent'");
//if(mysql_affected_rows()<1){
$ermes="";
$act=$_GET['act'];
$id=$_GET['id'];
$id2=$_GET['id2'];
$id1=$_POST['id1'];
$expnom=$_POST['expnom'];
$subject=$_POST['subject'];
$expemail=$_POST['expemail'];
$expemail1=$_POST['expemail1'];
$expnom1=$_POST['expnom1'];
$subject1=$_POST['subject1'];
$id_dest=$_POST['id_dest'];
$readonly=$_GET['readonly'];
$report_msg_id=$_POST['report_msg_id'];
$thecode=$_POST['thecode'];
$blacklist1=$_POST['blacklist1'];
$blacklist2=$_POST['blacklist2'];
$blacklist3=$_POST['blacklist3'];

$msg=scanXSS($msg,4);
if($act=="read"){
?>
<table width="100%" border="0" cellspacing="0" cellpadding=5 class=admin_table  align=center>
  <!--tr > 
  <td valign=top class=admin_table_header align=center>My message box</td></tr-->
<?
}

if($act=="del_incoming" && $id2){
connexion();

	$query="UPDATE message set del_dest='1' WHERE id='$id2'";
mysql_query($query);
echo "<script>location.href='index.php?page=message&act=read';</script>";
}
if($act=="del_outgoing" && $id2){
connexion();

	$query="UPDATE message set del_exp='1' WHERE id='$id2'";
mysql_query($query);
echo "<script>location.href='index.php?page=message&act=read';</script>";
}

if($act=="send"){

	//verfication du message
	if (trim($_POST['id1'])=="") {$verif="STOP"; $ermes="No source message"; }
	if (trim($_POST['subject'])=="") {$verif="STOP"; $ermes.=" " .TEXT_SUBJECT. " ". ERROR_MISSING; }
	if (trim($_POST['msg'])=="") {$verif="STOP"; $ermes.=" ".TEXT_MESSAGE. " ". ERROR_MISSING;}
	if(!$thecode){$ermes.=" Captcha ". ERROR_MISSING ."<br>";$verif=0;$err_captcha=1;}

// echo $_POST['thecode'] ."=>".$_SESSION["noautamationcode"];
if($thecode){
$thecode_okay = (isset($_POST['thecode']) && ($_POST['thecode'] == $_SESSION["noautamationcode"]));
if(!$thecode_okay){$verif="STOP";$ermes.=" Captcha ".ERROR_MATCH."<br>";$err_captcha=1; unset($_SESSION["noautamationcode"]);}
}

	//verification du destinataire
	connexion();
	$query="SELECT * FROM message WHERE id='".$_POST['id1']."' LIMIT 1";
	$res = mysql_query($query);
	$r = mysql_fetch_array($res);
	$id_dest=$r["id_exp"];
        $expemail=$r["expemail"];
	$id_exp=$r["id_dest"];
$query="SELECT * FROM galerie WHERE id='$_SESSION[modelinthecity]' LIMIT 1";
	$res = mysql_query($query);
	$r = mysql_fetch_array($res);
	$expname=$r["pseudo"];


if($expemail){
$typemime='MIME-Version: 1.0';
$name="phil";

//if(mail_attach($expemail, $subject , $msg, $rechnung , $typemime ,$name , $from)){echo "Votre message a été envoyé avec succés à $expemail!!!";exit;}
}
	
	//print $id_dest."<br>".$msg."<br>".$subject.$id_exp;

	if(!$id_dest){$verif="STOP"; $ermes="Invalid receipt box";}
	
	if ($verif!="STOP") {
	
	//verif lapse de temps avant envoi
	// $current_time = time(); $xx_mins_ago = ($current_time - 600);
	
	// mysql_query("select * from message where id_exp='".$id_exp."' and id_dest='".$id_dest."' and lu='0'");
	// if(mysql_affected_rows()>0){echo "<div class=information><center>You must wait a reply before sending a new message<br><br><a href='index.php?page=message&act=read'><div class=button_blue>CONTINUE</div></a></center></div>";}else
	
	
	{
	
		$query_insert="INSERT INTO message SET id_exp='".$id_exp."', id_dest='".$id_dest."', subject='".$_POST['subject']."', message='".$_POST['msg']."', datecrea='" .strtotime("now") ."',lu='0', IP='". $_SERVER['REMOTE_ADDR'] ."'";
		mysql_query($query_insert);
				print("<div class=information><center>".TEXT_MESSAGE_SENT."</strong></em></font><br><br><a href='index.php?page=message&act=read'><div class=button_blue>".BUTTON_TEXT_CONTINUE."</div></a></center></div>");
		}
		

}else{echo "<table cellspacing=0 cellpadding=0 border=0 width=98%><tr><td align=center><div class=error> /!\ $ermes</div></td></tr></table>";$act="write";}

// echo "<script>location.href='index.php?page=message&act=read';</script>";
}
?>
<? if($act=="read" ){
$table='
  <tr>
    <td><br><div id=admin_table_info>' . TEXT_INCOMING_BOX .'</div>
	<div id=admin_table_info_in>
<table width="100%" border="0" cellspacing="0" cellpadding=2 >
      <tr align=center>
        <td width="10%" class=titler><img src="../images/iread0.gif" width="10" height="10"></td>
        <td width="20%" class=titler><strong>' . TEXT_FROM .'</strong></td>
        <td width="20%" class=titler><strong>' . TEXT_SUBJECT .'</strong></td>
        <td width="35%" class=titler><strong>' . TEXT_POSTED .'</strong></td>
<td width=15% class=titler><strong>'. TEXT_ACTION .'</strong></td>';



connexion();

$query="SELECT d.id, d.id_exp,d.lu,d.subject,d.message, d.datecrea,dd.pseudo, d.title, d.status FROM message d, galerie dd WHERE d.id_dest='$_SESSION[modelinthecity]' and d.id_exp=dd.id and del_dest!=1 order by d.datecrea DESC";
$result = mysql_query($query);
$nb = mysql_affected_rows();
if($nb==0){$table.="</tr><tr><td colspan=5 width=770 align=left><b>&nbsp;No Messages</b></td></tr>";}
if($nb>0) {
	while($r=mysql_fetch_array($result)){
		$id = $r["id"];

$expnom=ucfirst($r[pseudo]);
		$status = $r["lu"];
		$sujet = $r["subject"];
		//$datetime =  Date('Y-m-d h:i:s' ,$r["datecrea"]);
		
		$datetime = str_replace('CEST','',strftime("%c",$r["datecrea"]));
				$status = $r["status"];
$lu=$r[lu];
$title=$r[title];
		if($title=="friend" && $status=="1"){$_action="<font color=red><b>Action required</b></font>";}else{
		$_action="<a href='./index.php?page=message&act=del_incoming&id2=$id' onclick='return confirm(\"".TEXT_QUESTION_DELETE."\");'><span id=button_blue_small>" .BUTTON_TEXT_DELETE ."</span></a>";
		}


$table.='
      <tr bgcolor=#e4e4e4 onMouseOver="this.style.backgroundColor=(\'#CDEEFE\');" onMouseOut="style.backgroundColor=(\'#e4e4e4\');"  align="center" valign="top">
        <td width="19">';

       if($lu==0){ 
		$table.="<img src='./images/iread0.gif' width=10 height=10>";}else if($lu=='1'){$table.="<img src='./images/iread1.gif' width=10 height=10>";}
$table.=" 
         </td>
        <td  width=192 ><a href=./?page=message&act=view&id=$id><font size=2>$expnom
</font></a></td>
        <td width=223 ><a href=./?page=message&act=view&id=$id><font size=2>$sujet
</font></a></td>
        <td width=163><a href=./?page=message&act=view&id=$id><font size=2>$datetime
</font></a></td>
     <td width=163>".$_action."</td>
      </tr>";


}


}
echo $table;
echo "</table></div></td></tr>";

################sent message
$table='
  <tr>
    <td><br><div id=admin_table_info>' . TEXT_OUTGOING . '</div>
	<div id=admin_table_info_in>
	<table width="100%" border="0" cellspacing="0" cellpadding=2 >
      <tr align=center>
        <td width="10%" class=titler><img src="../images/iread0.gif" width="10" height="10"></td>
        <td width="20%" class=titler><strong>'. TEXT_TO.'</strong></td>
        <td width="20%" class=titler><strong>'.TEXT_SUBJECT.'</strong></td>
        <td width="35%" class=titler><strong>'.TEXT_POSTED.'</strong></td>
<td width=15% class=titler><strong>'. TEXT_ACTION .'</strong></td>';



connexion();

$query="SELECT d.id, d.id_exp,d.lu,d.subject,d.message, d.datecrea,dd.pseudo, d.title, d.status FROM message d, galerie dd WHERE d.id_exp='$_SESSION[modelinthecity]' and d.id_dest=dd.id and del_exp!=1 order by d.datecrea DESC";
$result = mysql_query($query);
$nb = mysql_affected_rows();
if($nb==0){$table.="</tr><tr><td colspan=5 width=770 align=left><b>&nbsp;No messages</b></td></tr>";}
if($nb>0) {
	while($r=mysql_fetch_array($result)){
		$id = $r["id"];

$expnom=ucfirst($r[pseudo]);
		$status = $r["lu"];
		$sujet = $r["subject"];
				$datetime = str_replace('CEST','',strftime("%c",$r["datecrea"]));
				$status = $r["status"];
$lu=$r[lu];
$title=$r[title];
		if($title=="friend" && $status=="1"){$_action="<font color=red><b>Action required</b></font>";}else{
		$_action="<a href='./index.php?page=message&act=del_outgoing&id2=$id' onclick='return confirm(\"".TEXT_QUESTION_DELETE."\");'><span id=button_blue_small>" .BUTTON_TEXT_DELETE."</a>";
		}


$table.='
      <tr bgcolor=#e4e4e4 onMouseOver="this.style.backgroundColor=(\'#CDEEFE\');" onMouseOut="style.backgroundColor=(\'#e4e4e4\');"  align="center" valign="top">
        <td width="19">';

       if($lu==0){ 
		$table.="<img src='./images/iread0.gif' width=10 height=10>";}else if($lu=='1'){$table.="<img src='./images/iread1.gif' width=10 height=10>";}
$table.=" 
         </td>
        <td  width=192 ><a href=./index.php?page=message&act=view&id=$id&readonly=1><font size=2>$expnom
</font></a></td>
        <td width=223 ><a href=./index.php?page=message&act=view&id=$id&readonly=1><font size=2>$sujet
</font></a></td>
        <td width=163><a href=./index.php?page=message&act=view&id=$id&readonly=1><font size=2>$datetime
</font></a></td>
     <td width=163>".$_action."</td>
      </tr>";

}


}

echo $table;
echo "</table></div></td></tr>";

}else if($act=="write"){ 

?><br>      <div id=admin_table_info><? //echo $expnom1;?> <?php echo TEXT_ANSWER;?></div>
<table width=91% align=center border="0" cellspacing="0" cellpadding=5  id=admin_table_info_in>
   
  <form name="form1" action="./index.php?page=message&act=send"  method="post">
    <input type=hidden name=id1 value="<?echo $id1;?>">
    <input type=hidden name=expnom value="<?echo $expnom1;?>">
    <input type=hidden name=subject value="<?echo $subject1;?>">
    <input type=hidden name=expemail value="<? echo $expemail;?>">
	
    <tr>
      <td align=right width=20%>
        Subject : </td>
      <td colspan=2> 
        <input name="subject" size=45 type="text" maxlength=45 value="<? if($subject1){echo "Re: ".$subject1;}else{echo $subject;}?>">
      </td>
    </tr>
    <tr> 
      <td align=right><?php echo TEXT_MESSAGE;?> :<br></td>
      <td colspan=2> 
        <textarea name="msg" cols="70" rows="10" id="msg"><? echo stripslashes($_POST['msg']);?></textarea>
      </td>
    </tr>
	 <?php include('contact_us_image.php');// unset($_SESSION["noautamationcode"]);
	 echo "	 <tr class=grayf><td width=33% align=right><br>".TEXT_CAPTCHA_ENTRY." :<br></td><td align=left><br>  <img src='".$img_name."'><input name=\"refresh\" value=\"refresh\" type=\"image\" src=\"images/button_refresh.gif\"><br><img src=\"images/blank.gif\" width=100% height=5><input type='text' name='thecode' MAXLENGTH='16' size='8'<br></td></tr>";?>
    <tr>
      <td colspan=2> 
       <a onclick="location.href='index.php?page=message&act=view&id=<?php echo $id1;?>';"><div id=button><< <?php echo TEXT_BACK_MESSAGE;?></div></a>
      </td>	
      <td  align=right>
<a onclick='document.forms["form1"].submit();'><div id=button2><?php echo TEXT_SEND;?></div></a>
      </td>
    </tr>
  </form>
</table>
<?



 }else if($act=="view" && $id){

connexion();
if(!$readonly){
$query3="UPDATE message SET lu='1' WHERE id='$id' LIMIT 1 ";
}
$result3 = mysql_query($query3);
//$query="SELECT * FROM message WHERE id='$id'";
$query="SELECT d.id, d.id_exp,d.lu,d.subject,d.message, d.datecrea,dd.pseudo, d.title, d.id_dest, d.status FROM message d, galerie dd WHERE d.id='$id' and d.id_exp=dd.id";
$result = mysql_query($query);
if($r=mysql_fetch_array($result)){
		$id = $r["id"];
		$id_exp = $r["id_exp"];
		$id_dest=$r["id_dest"];
		$expnom = ucfirst($r["pseudo"]);

		if($readonly==1){
				$q1=mysql_query("select pseudo from galerie where id='".$id_dest."'");
				if($r1=mysql_fetch_array($q1)){$destnom=$r1['pseudo'];}
		
		
		$expurl="http://www.modelinthecity.com/".$id_dest;
		}else{
		$expurl="http://www.modelinthecity.com/".$id_exp;
		}
		$status = $r["status"];
		$subject = ucfirst($r["subject"]);
		$msg = $r["message"];
				$datetime = str_replace('CEST','',strftime("%c",$r["datecrea"]));
		$title=$r[title];
		$pseudo=ucfirst($r[pseudo]);
}
$ermes="";
if($submit){
switch ($submit){
case 'Yes':
echo $id_dest;
mysql_query("SELECT * FROM friends where client_id='$id_dest' and friend_id='$id_exp'");
if(mysql_affected_rows()>0){$ermes=$pseudo." is already a friend !";}else{

mysql_query("SELECT * FROM friends where client_id='$id_dest' and friend_id='$id_exp' and blacklist!='1'");
if(mysql_affected_rows()<1){
mysql_query("INSERT INTO friends set client_id='$id_dest', friend_id='$id_exp', IP='".$_SERVER[REMOTE_ADDR]."', date='" .strtotime("now") ."'");

mysql_query("UPDATE message set status='0' where id='$id' and id_dest='$id_dest' and id_exp='$id_exp'");
$ermes="Congratulations ! <br>".$pseudo." is now a friend !";
"<script>location.href='./index.php?page=message&act=read';</script>";
}
}
break;
case 'No' :
mysql_query("UPDATE message set status='2' where id='$id' and id_dest='$id_dest' and id_exp='$id_exp' ");
$ermes= $pseudo ." is NOT a friend";
echo "<script>location.href='./index.php?page=message&act=view&id=".$id."';</script>";
Break;
case 'YES' :
mysql_query("UPDATE message set status='1' where id='$id' and id_dest='$id_dest' and id_exp='$id_exp' ");
$ermes= $pseudo ." is NOT a friend";
echo "<script>location.href='./index.php?page=message&act=view&id=".$id."';</script>";
Break;
}
}
?><br>

 <div id=admin_table_info><?php echo TEXT_MESSAGE;?> <?php if($readonly!=1){echo strtolower(TEXT_FROM);}else{echo strtolower(TEXT_TO);}?> <a href="<?php echo $expurl;?>" target="_blank"><?php if($readonly!=1){echo ucfirst($expnom);}else{echo ucfirst($destnom);}?></a></div>
<table width="91%" align="center" border="0" cellspacing="0" cellpadding="5"  id="admin_table_info_in">
  <tr> 
    <td width="100" align="right">Subject : </td>
    <td width="470" align="left"><?echo stripslashes($subject);?></td>
    <td width="140" align="right"><nobr><small><b><?php echo TEXT_POSTED;?> : <? echo $datetime; ?></b></small></nobr></td>
  </tr>

  <tr><td align=right><?php echo TEXT_MESSAGE;?> :</td>
    <td  align="left" colspan=2><table border=0 width=100%><tr><td><textarea cols=70 rows=10 onfocus="return false;" onclick="return false;" onkeypress="return false;" ><? print stripslashes($msg); ?></textarea></td>
<td align=right valign=top>

<?php if($readonly!=1){?>
<form name="_report" action='index.php?page=message&act=report' method='post'><input type=hidden name="report_msg_id" value="<?echo $id;?>"><button title="<?php echo TEXT_REPORT;?>" onclick='document.forms["_report"].submit();'><big><b><font color=red>!</font></i></b></big></button></form>
<?
}
?>

</td></tr></table>
  </tr> 
  <tr> 
    <td><a onclick="location.href='index.php?page=message&act=read';"><div id=button><< <?php echo TEXT_INCOMING_BOX;?></div></a>
    </td>
	<td align=center></td>
    <td align=right><?
	if( ($title=="friend" || $act=="view") && $status==0 && $readonly!=1){
	?>
	      <form method="post" name="supp" action="index.php?page=message&act=write">
        <input type=hidden name=id1 value="<?echo $id;?>">
        <input type=hidden name=expnom1 value="<?echo $expnom;?>">
        <input type=hidden name=subject1 value="<?echo $subject;?>">
        <input type=hidden name=expemail value="<? echo $expemail;?>">
      <a onclick='document.forms["supp"].submit();'><div id=button2><?php echo TEXT_ANSWER;?></div></a></form>
	  <?
	  }
	  ?>
    </td>
  </tr>
</table>

<? }elseif($act=="report" && $report_msg_id){

?>
<div class=information_green><form name="_report_" action='index.php?page=message&act=report_end' method='post'><input type=hidden name="report_msg_id" value="<?echo $report_msg_id;?>">
<?php echo TEXT_TITLE_REPORT_MESSAGE;?><br><br><table cellspacing=10 cellpadding=10 border=0><tr><td colspan=2>
<?php echo REPORT_MESSAGE_CHECK;?></td></tr><tr><td valign=bottom>
<a href="#" onclick='history.go(-1);'><div class=button_blue><?php echo BUTTON_TEXT_CANCEL;?></div></a></td><td>
<a href="#" onclick='document.forms["_report_"].submit();'><div class=button_blue><?php echo BUTTON_TEXT_SUBMIT;?></div></a></td></tr></table>
</form></div>
<?

 }elseif($act=="report_end" && $report_msg_id){
 
 $report="yes";
if($blacklist1){$report.=' spam';}
if($blacklist2){$report.=' injurious';}
if($blacklist3){$report.=' not wanted';}
 
 mysql_query("update message set report='" . $report ."' where id='" . $report_msg_id ."'");
 
 echo "<div class=information_green><center>".REPORT_MESSAGE_END."<br><br><a href='index.php?page=message&act=read'><div class=button_blue>". BUTTON_TEXT_CONTINUE. "</div></a></center></div>";
 
 }

//}
//}else{echo "<div class=information>You cannot access the messages box because your portfolio is not active</div>";}
 ?>