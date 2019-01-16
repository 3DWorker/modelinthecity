<?
$id=$_GET['id'];
$action=$_GET['action'];
$newtag=$_POST['newtag'];
$thecode=$_POST['thecode'];
$act=$_GET['act'];

if(!$id || $idphoto){$id=$_id;$origin=$idphoto;$add_origin="photo";$form_link="photo&idphoto=$idphoto";$close_link="./photo/".$idphoto."#tags";}

else{$origin="profile";$form_link="galerie_aff";$close_link="./".$id."#tags";}

session_start();




$newtag=strip_tags($newtag);
$newtag=ScanXss($newtag,4); $err_message=0;
$thecode=ScanXss($thecode);$err_thecode=0;


echo "<a name=tags></a><table border=0 cellspacing=0 cellpadding=0 class=modules_header width=100% height=8><tr><td align=left width=100%><H4>&nbsp;&nbsp;" .TEXT_PORTFOLIO_TAGS."</H4></td><td align=right valign=bottom></td></tr></table>";

echo "<table border=0 cellspacing=0 cellpadding=10 class=modules_description width=100%><tr><td align=left valign=top>";


if($_SESSION["modelinthecity"]){


 if($action=="addatag"){
 
 $verif=1;  $ermes=""; 
 

if(!$newtag || $newtag=="Add a tag" && !$act){$ermes.="/!\ ".TEXT_TAG." ".ERROR_MISSING."<br>";$verif=0;$err_tag=1;}

//if($_SESSION[modelinthecity]==$id){$ermes.="/!\ You can't be tag with yourself<br>";$verif=0;$err_error=1;}

if($thecode){

$thecode_okay = (isset($_POST['thecode']) && ($_POST['thecode'] == $_SESSION["noautamationcode"]));
if(!$thecode_okay){$verif=0;$ermes.="/!\ Captcha ". ERROR_MATCH."<br>";$err_captcha=1; }
}

if(!$thecode && !$act){$ermes.="/!\ Captcha ".ERROR_MISSING."<br>";$verif=0;$err_captcha=1;}
 

 if($ermes && $first!=1 && !$act){echo "<div class=error>".$ermes."</div>";}
 
 if($verif==1){

   $current_time = time();
    $xx_mins_ago = ($current_time - 60*60);

$query="SELECT * FROM tags WHERE client_id='".$_SESSION["modelinthecity"]."' and date > '". $xx_mins_ago."' and page='".$origin."'";
$result=mysql_query($query);
if(mysql_affected_rows()<1){
$query="INSERT INTO tags SET tag_text='$newtag',client_id='".$_SESSION["modelinthecity"]."', tag_id='$id', date='".strtotime("now")."',IP='". $_SERVER[REMOTE_ADDR]."', page='".$origin."'";
$result=mysql_query( $query);
// echo TEXT_MESSAGE_SENT;
// echo "<script>location.href='./".$id."';<script>";

}else{echo "<div class=information>/!\ ". ERROR_TAG_HOUR."</div>";}

}else{
	unset($_SESSION["noautamationcode"]);	
	include('contact_us_image.php');
	
	//if(!$newtag && $newtag!="Add a tag"){$newtag="Add a tag";$add= "style='color:#cccccc;'";}
	//if($newtag=="Add a tag"){$add= "style='color:#cccccc;'";}
	
		// if(!$thecode || $thecode!="Type this captcha"){$thecode="Type this captcha";$add2= "style='color:#cccccc;'";}
	// if($thecode=="Type this captcha"){$add2= "style='color:#cccccc;'";}
	
		  if($err_tag && !$act){$add1= "style='background:yellow;';";}
	if($first){$err_captcha="";$add1="";}
echo "<form name='form4' action='".$location."index.php?page=".$form_link."&action=addatag&act=0&id=".$id."#tags' method=post>
 <table width=100% cellpadding=4 cellspacing=0 class=information border=0 valign=top><tr>
<td align=left width=90%>".BUTTON_TEXT_TAGS."</td><td align=right><a href='".$close_link."' title='Close'>X</a>&nbsp;</td></tr><tr><td colspan=2 align=center>
<input type='hidden' name='id' value='".$id."'>
<textarea cols=60 rows=4 name=newtag maxlength=150 $add $add1>". stripslashes($newtag) ."</textarea>&nbsp;</td></tr><tr><td valign=top align=right>
			   <table border=0 width=50% border=1 bordercolor=white cellpadding=2 cellspacing=0><tr><td colspan=2 align=right>
			  <img src='".$img_name."'></td></tr><tr><td>
			 <input type='text' size=20 name='thecode' MAXLENGTH='16' onfocus='this.value=\"\";this.style.backgroundColor=\"#ffffff\";this.style.color=\"#000080\";'"; 
				  if($err_captcha){echo "style='background:yellow;';";}
				  echo " ".$add2."></td><td><input name='refresh' value='refresh' type='image' src='images/button_refresh.gif'><br></td></tr></table></td>
<td align=right valign=bottom><input type=hidden value='tag'  name=actiontag><a onclick='document.forms[\"form4\"].submit();'><div class=button_blue>".BUTTON_TEXT_TAGS."</div></a></td></tr></table></form>";
}


}//End.action

if($action!="addatag"){
echo "<div align=right><form name='form5' action='".$location."index.php?page=".$form_link."&action=addatag&act=1&id=".$id."#tags' method=post><input type=hidden name=first value=1><input type='hidden' name='id' value='".$id."'><a href='#tags' onclick='document.forms[\"form5\"].submit();'><div class=button_blue title='".BUTTON_TEXT_TAGS."'>".BUTTON_TEXT_TAGS."</div></a></form></div>";
}
}//Endd
else{
if($action=="addatag"){echo "<table width=100% class=information><tr><td align=left><a><b>tag this member</b></a></td><td align=right><a href='".$close_link."' title='Close'>X</a>&nbsp;</td></tr><tr><td align=left>/!\ You must be logged to ".BUTTON_TEXT_TAGS."</td><td align=right><a href='#1' onclick=\"javascript:parent.show_page('login');\"><div class=button_blue>Login</div></a></td></tr></table>";}else{
echo "<div align=right><form name='form6' action='".$location."index.php?page=".$form_link."&action=addatag&id=".$id."#tags' method=post><input type='hidden' name='id' value='".$id."' method=post><a href='#tags' onclick='document.forms[\"form6\"].submit();'><div class=button_blue>".BUTTON_TEXT_TAGS."</div></a></form></div>";
}
}

## reading tags


$query="SELECT d.tag_text,d.client_id,d.date FROM tags d, book_index dd WHERE d.tag_id='$id' and dd.id='$id' and d.page='".$origin."'";
$result=mysql_query($query);
while($r=mysql_fetch_array($result)){

$client_id=$r[client_id];
$tag_text=$r[tag_text];
$datec=str_replace('CEST','',strftime('%c',$r[date]));

$q="SELECT d.pseudo, dd.photo from galerie d,book_index dd where d.id='$client_id' and dd.id=d.id";

$q1=mysql_query($q);

if($r1=mysql_fetch_array($q1)){

$pseudo=$r1[pseudo];
$photo=$r1[photo];
}
$_tag[]=array('client_id'=>$client_id, 'pseudo'=>ucfirst($pseudo), 'categ'=>$categ, 'photo' =>$photo, 'text'=>ucfirst(stripslashes($tag_text)), 'date'=>$datec);

}

for($i=0;$i<count($_tag);$i++){
echo '<table width=100% height=10% cellspacing=5 border=0 style="background:#ececec;border-radius:8px;-moz-border-radius:8px;;-webkit-border-radius:8px;padding:8px;">';
echo '<tr><td width="10%" align=center rowspan=2><a href="./'.$_tag[$i][client_id].'"><br><img src="'.$location.'galerie/' . $_tag[$i][client_id] . '/index/' . str_replace('.jpg','_small.jpg',$_tag[$i][photo]) . '" width="60" border=0><br>'.public_book_info($_tag[$i][client_id],'category_name').'</a></td>
<td width="60%" valign=top height=10%>&nbsp;<b><small>'. TEXT_FROM.' : '.$_tag[$i][pseudo].'</small></b></td><td align=right width=40% valign=top><font size=1>'.TEXT_POSTED.' : ' .$_tag[$i][date].'&nbsp;</font></td></tr><tr><td valign=top colspan=2 height=90%>&nbsp;<img src="'.$location.'images/bubble.png" border=0 width=20 vspace=1>&nbsp;'.$_tag[$i][text].'<br><br></td></tr>';
echo '</table><br>';
}

echo "</td></tr></table>";

?>