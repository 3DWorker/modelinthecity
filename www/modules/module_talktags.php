<?
/*
if($id || $idphoto__){$origin=$idphoto;$add_origin="talkabout";$form_link="talkabout";$close_link="./photo/".$idphoto."#tags";}

else{$origin="profile";$form_link="talkabout";$close_link="./".$id."#tags";}
*/
echo $form_link;

session_start();
$newtag=strip_tags($newtag);
$newtag=ScanXss($newtag,4); $err_message=0;
$thecode=ScanXss($thecode);$err_thecode=0;


echo "<a name=tags></a><table border=0 cellspacing=0 cellpadding=0 class=modules_header width=100% height=8><tr><td align=left width=100%>&nbsp;</td><td align=right valign=bottom></td></tr></table>";

echo "<table border=0 cellspacing=0 cellpadding=10 class=modules_description width=100%><tr><td align=left valign=top>";


if($_SESSION["modelinthecity"]){


 if($action=="addatag"){	
 
 $verif=1;  $ermes=""; 
 

if(!$newtag || $newtag=="Add a talk"){$ermes.="/!\ tag missing<br>";$verif=0;$err_tag=1;}

//if($_SESSION[modelinthecity]==$id){$ermes.="/!\ You can't be tag with yourself<br>";$verif=0;$err_error=1;}

if($thecode){

$thecode_okay = (isset($_POST['thecode']) && ($_POST['thecode'] == $_SESSION["noautamationcode"]));
if(!$thecode_okay){$verif=0;$ermes.="/!\ Captcha not match<br>";$err_captcha=1; }
}

if(!$thecode){$ermes.="/!\ Captcha missing<br>";$verif=0;$err_captcha=1;}
 

 if($ermes && $first!=1){echo "<div class=error>".$ermes."</div>";}
 
 if($verif==1){



$date=Date('Y-m-d');

$query="SELECT * FROM tags WHERE client_id='".$_SESSION["modelinthecity"]."' and date like '$date%' and page='".$origin."'";
$result=mysql_query($query);
if(mysql_affected_rows()<1){
$query="INSERT INTO tags SET tag_text='$newtag',client_id='".$_SESSION["modelinthecity"]."', tag_id='$id', date='".Date('Y-m-d H:i:s')."',IP='". $_SERVER[REMOTE_ADDR]."', page='".$origin."'";
$result=mysql_query( $query);
echo "Your tag is sent!";

}else{echo "<table width=100% class=information><tr><td align=left>Add a talk</td><td align=right><a href='".$close_link."' title='Close'>X</a>&nbsp;</td></tr><tr><td align=left><td align=left colspan=2><a>/!\ Only 1 tag by day<a/></td></tr></table>";}

}else{
	unset($_SESSION["noautamationcode"]);	
	include('contact_us_image.php');
	
	if(!$newtag && $newtag!="Add a talk"){$newtag="Add a talk";$add= "style='color:#cccccc;'";}
	if($newtag=="Add a talk"){$add= "style='color:#cccccc;'";}
	
		if(!$thecode || $thecode!="Type this captcha"){$thecode="Type this captcha";$add2= "style='color:#cccccc;'";}
	if($thecode=="Type this captcha"){$add2= "style='color:#cccccc;'";}
	
		  if($err_tag){$add1= "style='background:yellow;';";}
	if($first){$err_captcha="";$add1="";}
echo "<form name='form4' action='./?action=addatag&id=".$id."#tags' method=post>
<table width=100% cellpadding=4 cellspacing=0 class=information border=0 valign=top><tr>
<td align=left width=20%>Add a talk</td><td align=right colspan=2><a href='".$close_link."' title='Close'>X</a>&nbsp;</td></tr><tr><td align=left>
<input type='hidden' name='id' value='".$id."' >
<textarea cols=30 rows=3 name=newtag maxlength=150 onfocus='if(this.value==\"Add a talk\"){this.value=\"\";}this.style.backgroundColor=\"#ffffff\";this.style.color=\"#000080\";' $add $add1>". $newtag ."</textarea>&nbsp;</td><td valign=top align=center>
			   <table border=0 width=50% border=1 bordercolor=white cellpadding=2 cellspacing=0 ><tr><td colspan=2>
			  <img src='".$img_name."'></td></tr><tr><td>
			 <input type='text' size=20 name='thecode' MAXLENGTH='16' onfocus='this.value=\"\";this.style.backgroundColor=\"#ffffff\";this.style.color=\"#000080\";' value='".$thecode."' "; 
				  if($err_captcha){echo "style='background:yellow;';";}
				  echo " ".$add2."></td><td><input name='refresh' value='refresh' type='image' src='images/button_refresh.gif'><br></td></tr></table></td>
<td align=right valign=bottom><input type=hidden value='tag'  name=actiontag><a onclick='document.forms[\"form4\"].submit();'><div class=button_blue>Add a talk</div></a></td></tr></table></form>";
}


}//End.action

if($action!="addatag"){
echo "<div align=right><form name='form5' action='".$location."index.php?page=".$form_link."&action=addatag&id=".$id."#tags' method=post><input type=hidden name=first value=1><input type='hidden' name='id' value='".$id."'><a href='#tags' onclick='document.forms[\"form5\"].submit();'><div class=button_blue title='Add a talk'>Add a talk</div></a></form></div>";
}
}//Endd
else{
if($action=="addatag"){echo "<table width=100% class=information><tr><td align=left><a><b>tag this member</b></a></td><td align=right><a href='".$close_link."' title='Close'>X</a>&nbsp;</td></tr><tr><td align=left>/!\ You must be logged to Add a talk</td><td align=right><a href=\"javascript:parent.show_page('login');\"><div class=button_blue>Login</div></a></td></tr></table>";}else{
echo "<div align=right><form name='form6' action='".$location."index.php?page=".$form_link."&action=addatag&id=".$id."#tags' method=post><input type='hidden' name='id' value='".$id."' method=post><a href='#tags' onclick='document.forms[\"form6\"].submit();'><div class=button_blue>Add a talk</div></a></form></div>";
}

}



## reading tags


$query="SELECT d.tag_text,d.client_id,d.date FROM tags d, book_index dd WHERE d.tag_id='$id' and dd.id='$id' and d.page='".$origin."'";
$result=mysql_query($query);
while($r=mysql_fetch_array($result)){

$client_id=$r[client_id];
$tag_text=$r[tag_text];
$datec=$r[date];

$q="SELECT d.pseudo, dd.photo from galerie d,book_index dd where d.id='$client_id' and dd.id=d.id";

$q1=mysql_query($q);

if($r1=mysql_fetch_array($q1)){

$pseudo=$r1[pseudo];
$photo=$r1[photo];
}

$q2="SELECT d.name from categorie d, galerie dd where dd.id='$client_id' and dd.categorie=d.id";

$q3=mysql_query($q2);

if($r3=mysql_fetch_array($q3)){

$categ=ucfirst($r3[name]);

}




$_tag[]=array('client_id'=>$client_id, 'pseudo'=>ucfirst($pseudo), 'categ'=>$categ, 'photo' =>$photo, 'text'=>ucfirst($tag_text), 'date'=>$datec);


}





for($i=0;$i<count($_tag);$i++){
echo '<table border=0 width=100% cellspacing=5 class=tags>';
echo '<tr><td width="10%" align=center rowspan=2><a href="./'.$_tag[$i][client_id].'">'.$_tag[$i][categ].'<br><img src="'.$location.'galerie/' . $_tag[$i][client_id] . '/index/' . $_tag[$i][photo] . '" width="45" height="63" border=0 title="Visit the '.$_tag[$i][categ].' portfolio of ' . $_tag[$i][pseudo] . '"><br>' . $_tag[$i][pseudo] . '</a></td>
<td width="60%" valign=top height=1%>&nbsp;<b>From: '.$_tag[$i][pseudo].'</b></td><td align=right width=40% valign=top height=1%><font size=1>Posted: ' .$_tag[$i][date].'&nbsp;</font></td></tr><tr><td valign=top colspan=2 height=99%>&nbsp;<img src="'.$location.'images/bubble.png" border=0 width=20 vspace=1>&nbsp;'.$_tag[$i][text].'<br></td></tr>';
echo '</table><br>';
}

echo "</td></tr></table>";




?>