<?
session_start();
$id=$_GET[id];
$act=$_GET['act'];

$action=$_GET['action'];
$newmessage=$_POST['newmessage'];
$thecode=$_POST['thecode'];
$newmessage=strip_tags($newmessage);
$newmessage=ScanXss($newmessage,4); $err_message=0;
$thecode=ScanXss($thecode);$err_thecode=0;


echo "<a name=friends></a><table border=0 cellspacing=0 cellpadding=0 class=modules_header width=100% height=8><tr><td align=left width=100%><H4>&nbsp;&nbsp;" .TEXT_PORTFOLIO_FRIENDS."</H4></td><td align=right valign=bottom></td></tr></table>";

echo "<table border=0 cellspacing=0 cellpadding=10 class=modules_description width=100%><tr><td align=left valign=top>";


if($_SESSION["modelinthecity"]){


 if($action=="addafriend"){	
 
 $verif=1;  $ermes=""; 
 

// if(!$newmessage || $newmessage=="Add a message" && !$act){$ermes.="/!\ ". TEXT_MESSAGE." ". ERROR_MISSING."<br>";$verif=0;$err_message=1;}

if($_SESSION[modelinthecity]==$id && !$act){$ermes.="/!\ You can't be friend with yourself<br>";$verif=0;$err_error=1;}

// if($thecode){

//$thecode_okay = (isset($_POST['thecode']) && ($_POST['thecode'] == $_SESSION["noautamationcode"]));
//if(!$thecode_okay){$verif=0;$ermes.="/!\ Captcha ". ERROR_MATCH."<br>";$err_captcha=1; }
//}

//if(!$thecode && !$act){$ermes.="/!\ Captcha ". ERROR_MISSING."<br>";$verif=0;$err_captcha=1;}
 

 if($ermes && $first!=1 && !$act){echo "<div class=error>".$ermes."</div>";}
 
 if($verif==1){



	$query="SELECT * FROM friends WHERE friend_id='$_SESSION[modelinthecity]' and client_id='$id'";
$result=mysql_query($query);
if(mysql_affected_rows()<1){
$query="INSERT INTO friends SET friend_id='$_SESSION[modelinthecity]', client_id='$id', date='".strtotime("now")."',IP='". $_SERVER[REMOTE_ADDR]."', status='1'";
$result=mysql_query($query);
echo "<table width=100% class=information><tr><td align=left>".BUTTON_TEXT_FRIENDS."</td><td align=right><a href='./".$id."#friends' title='Close'>X</a>&nbsp;</td></tr><tr><td align=left colspan=2><a>".ERROR_FRIEND_INVITATION_SENT."</a><br></td></tr></table><br>";

}else{echo "<div class=information>".ERROR_FRIEND_INVITATION_SENT."</div>";}

}else{

	
	//if(!$newmessage && $newmessage!="Add a message" && !$act){$newmessage="Add a message";$add= "style='color:#cccccc;'";}
	//if($newmessage=="Add a message" && !$act){$add= "style='color:#cccccc;'";}
	
		//if(!$thecode || $thecode!="Type this captcha" && !$act){$thecode="Type this captcha";$add2= "style='color:#cccccc;'";}
	//if($thecode=="Type this captcha" && !$act){$add2= "style='color:#cccccc;'";}
	
		  //if($err_message && !$act){$add1= "style='background:yellow;';";}
	//if($first && !$act){$err_captcha="";$add1="";}
echo "<form name='form1' action='index.php?page=galerie_aff&action=addafriend&act=0&id=".$id."#friends' method=post>
<table width=100% cellpadding=4 cellspacing=0 class=information border=0 valign=top><tr>
<td align=left width=20%>".BUTTON_TEXT_FRIENDS."</td><td align=right colspan=2><a href='./".$id."#friends' title='Close'>X</a>&nbsp;</td></tr><tr><td align=left>
<input type='hidden' name='id' value='".$id."' >
</td>			<tr>
<td align=right valign=bottom><input type=hidden value='friend'  name=actionfriend><a onclick='document.forms[\"form1\"].submit();'><div class=button_blue>".BUTTON_TEXT_FRIENDS."</div></a></td></tr></table></form>";
}


}//End.action

if($action!="addafriend"){
echo "<div align=right><form name='form2' action='index.php?page=galerie_aff&action=addafriend&act=1&id=".$id."#friends' method=post><input type=hidden name=first value=1><input type='hidden' name='id' value='".$id."'><a href='#friends' onclick='document.forms[\"form2\"].submit();'><div class=button_blue title='".BUTTON_TEXT_FRIENDS."'>".BUTTON_TEXT_FRIENDS."</div></a></form></div>";
}
}//Endd
else{
if($action=="addafriend"){echo "<table width=100%><tr><td align=left><a><b>".BUTTON_TEXT_FRIENDS."</b></a></td><td align=right><a href='./".$id."#friends' title='Close'>X</a>&nbsp;</td></tr><tr><td align=left>/!\ You must be logged to ".BUTTON_TEXT_FRIENDS."</td><td align=right><a href='#1' onclick=\"javascript:parent.show_page('login');\"><div class=button_blue>Login</div></a></td></tr></table>";}else{
echo "<div align=right><form name='form3' action='index.php?page=galerie_aff&action=addafriend&id=".$id."#friends' method=post><input type='hidden' name='id' value='".$id."' method=post><a href='#friends' onclick='document.forms[\"form3\"].submit();'><div class=button_blue>".BUTTON_TEXT_FRIENDS."</div></a></form></div>";
}

}

echo friends($id); 

echo "</td></tr></table>";

?>