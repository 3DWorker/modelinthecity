<table width="100%" border="0" cellspacing="0" cellpadding="4"><tr>
<td colspan=4 align=left>&nbsp;<a href="<?php echo $location;?>FORUM"><h1>FORUMS</h1></A></td></tr></table>
<?

 
 //if($_SESSION["modelinthecity"]){}else{exit;}


 mysql_query("select * from account_approval where member_id='".$_SESSION['modelinthecity']."' and email='sent'");
if(mysql_affected_rows()<1){
 
// if($_SESSION["visitor"]){echo "<div class=information>Your portfolio status is waiting approval, you cannot access to the forums,  come back later ...</div>";}else

{

$f=$_GET['f'];
$t=$_GET['t'];
$mode=$_GET['mode'];
$action=$_GET['action'];
$thecode=$_POST['thecode'];
$topic_subject=addslashes(stripslashes(strip_tags($_POST['topic_subject'])));
$topic_message=addslashes(stripslashes(strip_tags($_POST['topic_message'])));
$reply_subject=addslashes(stripslashes(strip_tags($_POST['reply_subject'])));
$reply_message=addslashes(stripslashes(strip_tags($_POST['reply_message'])));




	################################# INDEX FORUM
	if(!$f){
	$txt="<table id=row width=98% cellpadding=1 cellspacing=1 border=0 align=center style='background-color:#f6f6f6;'><tr style='border:1px solid #f6f6f6;background:#f6f6f6;'><td colspan=2 width=400 class=white>&nbsp;</td><td class=grayf align=center width=60><b>". TEXT_TOPICS."</b></td><td align=center width=60 class=grayf><b>". TEXT_POSTS ."</b></td></tr>";
	
$q1=mysql_query("select forum_name, parent_id, forum_id from mitc_forums where parent_id=0 and lang='".$_SESSION['languages']."'");
while($r1=mysql_fetch_array($q1)){ 
$forum_category=$r1['forum_name'];
$forum_id=$r1['forum_id'];
$txt.="<tr><td colspan=4 class=cat><H2>".$forum_category ."</h2></td></tr>";
$q=mysql_query("select forum_name, forum_id, forum_desc from mitc_forums where parent_id='". $r1['forum_id']."'  and lang='".$_SESSION['languages']."'");
$a=0;
while($r=mysql_fetch_array($q)){$a++;
$forum_name=$r['forum_name'];
$forum_id=$r['forum_id'];
$forum_desc=$r['forum_desc'];

mysql_query("select * from mitc_topics where forum_id='".$forum_id."' and lang='".$_SESSION['languages']."'");
$nbr_topic=mysql_affected_rows();
mysql_query("select * from mitc_posts where forum_id='".$forum_id."' and lang='".$_SESSION['languages']."'");
$nbr_post=mysql_affected_rows();

// if($a>1){$add="rowspan=$a";}else{$add="";}

// if($forum_name){$txt.="<a href='".$location."FORUM/".$forum_id."'><tr class=gray><td  height=40 width=50 align=center><img src='".$location."images/forum_bubble.png' border=0></td><td><br>&nbsp;&nbsp;<strong>".$forum_name."</strong><p>&nbsp;&nbsp;".$forum_desc."</p></td><td align=center >".(int)$nbr_topic."</td><td align=center>".(int)$nbr_post."</td></tr></A>";}

if($forum_name){$txt.="<a href='".$location."FORUM/".$forum_id."'><tr class=gray><td  height=40 width=50 align=center><a href='".$location."FORUM/".$forum_id."'><img src='".$location."images/forum_bubble.png' border=0></a></td><td><a href='".$location."FORUM/".$forum_id."'><br>&nbsp;&nbsp;<strong>".$forum_name."</strong></a><a href='".$location."FORUM/".$forum_id."'><p>&nbsp;&nbsp;".$forum_desc."</p></a></td><td align=center >".(int)$nbr_topic."</td><td align=center>".(int)$nbr_post."</td></tr></a>";}

}}

$txt.="</table>";
echo $txt;
}

###################################################################### POST

elseif($f && $mode=="post"){
		
if(!$_SESSION['modelinthecity']){exit;}
$q=mysql_query("select forum_name, forum_desc from mitc_forums where forum_id='".$f."' and lang='".$_SESSION['languages']."'");
if($r=mysql_fetch_array($q)){ $forum_name=$r['forum_name'];}

if($action=="newtopic" && $_SESSION['topic']){
$errmes="";
$verif=1;
if(!$topic_subject){$verif=0;$errmes.=" Subject missing";}
if(!$topic_message){$verif=0;$errmes.=" Message missing";}
/*
$test_subject=test_entry($topic_subject);
$test_message=test_entry($topic_message);

if($test_subject){$verif=0;$errmes.="/!\ Subject contains bad characters or bad words - Err $test_subject";}
if($test_message){$verif=0;$errmes.="/!\ Message contains bad characters or bad words - Err $test_message";}

if(strlen($topic_subject)<10){$verif=0;$errmes.="/!\ Subject too short (min 10 chars)";}
if(strlen($topic_message)<10){$verif=0;$errmes.="/!\ Message too short (min 10 chars)";}
if(strlen($topic_subject)>255){$verif=0;$errmes.="/!\ Subject too long (max 255 chars)";}
if(strlen($topic_message)>500){$verif=0;$errmes.="/!\ Message too long (max 500 chars)";}
*/

if(!$thecode){$errmes.=" Captcha ". ERROR_MISSING ."<br>";$verif=0;$err_captcha=1;}

// echo $_POST['thecode'] ."=>".$_SESSION["noautamationcode"];
if($thecode){
$thecode_okay = (isset($_POST['thecode']) && (strtolower($_POST['thecode']) == strtolower($_SESSION["noautamationcode"])));
if(!$thecode_okay){$verif=0;$errmes.=" Captcha ".ERROR_MATCH."<br>";$err_captcha=1; unset($_SESSION["noautamationcode"]);}
}


if($verif==1 && $_SESSION['topic']){

mysql_query("insert into mitc_topics set forum_id='".$_SESSION['topic']."', topic_time='". strtotime("now") ."', topic_poster_id='" . $_SESSION['modelinthecity'] ."', topic_title='" .$topic_subject."', lang='".$_SESSION['languages']."'");
$q=mysql_query("select topic_id from mitc_topics where lang='".$_SESSION['languages']."' order by topic_id DESC");
if($r=mysql_fetch_array($q)){$topic_id=$r['topic_id'];}
echo $topic_id;
mysql_query("insert into mitc_posts set forum_id='".$_SESSION['topic']."', topic_id='".(int)$topic_id."', post_time='". strtotime("now") ."', post_poster_id='" . $_SESSION['modelinthecity'] ."', post_subject='" .$topic_subject."', post_ip='" . $_SERVER['REMOTE_ADDR']."', post_checksum='" . session_id() ."', post_text='" .$topic_message. "' , lang='".$_SESSION['languages']."'");
echo mysql_error();

echo "<script>location.href='index.php?page=forum&f=".$f."';</script>";
}

if($errmes){echo "<div class=error>".$errmes."</div>";}


}//End.Action.newtopic

	
	  include('contact_us_image.php'); //	unset($_SESSION["noautamationcode"]);
	
echo "<form action='".$location."index.php?page=forum&f=".$f."&mode=post&action=newtopic' method=post><table id=row width=98% cellpadding=1 cellspacing=1 border=0 align=center style='background-color:#f6f6f6;'><tr><td colspan=2><a href='#' onclick='javascript:history.go(-1);'><h3>".$forum_name ."</h3></a></td></tr><tr><td colspan=2 class=cat align=center><h2>". TEXT_POST_NEW_TOPIC."</h2></td></tr><tr class=grayf><td width=33% align=center><br>". TEXT_SUBJECT." :<br></td><td align=left><br><input type=text size=70 name='topic_subject' value=\"".trim(stripslashes($topic_subject))."\"><br></td></tr><tr class=grayf><td width=33% align=center><br>" .TEXT_MESSAGE ."<br></td><td align=left><br><textarea name='topic_message' style='width: 650px; height: 240px; min-width: 98%; max-width: 98%;'>".trim(stripslashes($topic_message))."</textarea><br></td></tr>

<tr class=grayf><td width=33% align=center><br>".TEXT_CAPTCHA_ENTRY."<br></td><td align=left><br>  <img src='".$img_name."'><input name=\"refresh\" value=\"refresh\" type=\"image\" src=\"images/button_refresh.gif\"><br><img src=\"images/blank.gif\" width=100% height=5><input type='text' name='thecode' MAXLENGTH='16' size='8'<br></td></tr>
				  
<tr><td align=center colspan=2 class=gray><a onclick='javascript:document.forms[0].submit();'><span id=button_blue>".BUTTON_TEXT_SUBMIT."</span></a>&nbsp;&nbsp;<a onclick=\"javascript:location.href='index.php?page=forum&f=".$f."';\"><span id=button_blue>". BUTTON_TEXT_CANCEL."</span></a></td></tr>
</table></form>";
if($f){session_start();$_SESSION['topic']=$f;}

			

}
######################################################################### REPLY

elseif($f && $t && $mode=="reply"){
if(!$_SESSION['modelinthecity']){exit;}
$q=mysql_query("select topic_title from mitc_topics where topic_id='".(int)$t."' and lang='".$_SESSION['languages']."'");
if($r=mysql_fetch_array($q)){ $topic_name=stripslashes($r['topic_title']);}

if($action=="newreply" && $_SESSION['topic']){
$errmes="";
$verif=1;
if(!$reply_subject){$verif=0;$errmes.= TEXT_SUBJECT. " " . ERROR_MISSING ." ";}
if(!$reply_message){$verif=0;$errmes.= TEXT_MESSAGE. " " . ERROR_MISSING;}
/*
if(test_entry($reply_subject)){$verif=0;$errmes.="/!\ Subject contains bad characters or bad words";}
if(test_entry($reply_message)){$verif=0;$errmes.="/!\ Message contains bad characters or bad words";}

if(strlen($reply_subject)<10){$verif=0;$errmes.="/!\ Subject too short (min 10 chars)";}
if(strlen($reply_message)<10){$verif=0;$errmes.="/!\ Message too short (min 10 chars)";}
if(strlen($reply_subject)>255){$verif=0;$errmes.="/!\ Subject too long (max 255 chars)";}
if(strlen($reply_message)>500){$verif=0;$errmes.="/!\ Message too long (max 500 chars)";}
*/
if(!$thecode){$errmes.=" Captcha ". ERROR_MISSING ."<br>";$verif=0;$err_captcha=1;}

// echo $_POST['thecode'] ."=>".$_SESSION["noautamationcode"];
if($thecode){
$thecode_okay = (isset($_POST['thecode']) && (strtolower($_POST['thecode']) == strtolower($_SESSION["noautamationcode"])));
if(!$thecode_okay){$verif=0;$errmes.=" Captcha ".ERROR_MATCH."<br>";$err_captcha=1; unset($_SESSION["noautamationcode"]);}
}


	
if($verif==1 && $_SESSION['topic']){

/*
    $current_time = time();
    echo $xx_mins_ago = ($current_time-30);
	
mysql_query("select * from mitc_posts where post_text='".$reply_message."' and post_checksum='". session_id()."' and  post_time <'" . $xx_mins_ago . "'");
echo "[".mysql_affected_rows()."]";
if(mysql_affected_rows()>0){echo "Please wait 5 min for a similar post";}
*/

mysql_query("insert into mitc_posts set forum_id='".$f."', topic_id='". (int)$t ."', post_time='". strtotime("now") ."', post_poster_id='" . $_SESSION['modelinthecity'] ."', post_subject='" .$reply_subject."', post_ip='". $_SERVER['REMOTE_ADDR']."', post_checksum='". session_id()."', post_text='".$reply_message."',  lang='".$_SESSION['languages']."'");
echo "<div class=error>Your reply have been correctly posted. THANKS</div>";

echo "<script>location.href='index.php?page=forum&f=".$f."&t=".$t."&mode=viewtopic';</script>";
}

if($errmes){echo "<div class=error>/!\\".$errmes."</div>";}

}//End.Action.newtopic

include('contact_us_image.php'); //unset($_SESSION["noautamationcode"]);

echo "<form action='".$location."index.php?page=forum&f=".$f."&t=".$t."&mode=reply&action=newreply' method=post><table id=row width=98% cellpadding=1 cellspacing=1 border=0 align=center style='background-color:#f6f6f6;'><tr><td colspan=2><a href='#' onclick='javascript:history.go(-1);'><h3>".$topic_name ."</h3></a></td></tr><tr><td colspan=2 class=cat align=center><h2>".TEXT_POST_NEW_REPLY."</h2></td></tr><tr class=grayf><td width=33% align=center><br>".TEXT_SUBJECT." :<br></td><td align=left><br><input type=text size=70 name='reply_subject' value=\"Re: ".trim(stripslashes($topic_name))."\"><br></td></tr><tr class=grayf><td width=33% align=center><br>". TEXT_MESSAGE." : <br></td><td align=left><br><textarea name='reply_message' style='width: 650px; height: 240px; min-width: 98%; max-width: 98%;'>".trim(stripslashes($reply_message))."</textarea><br></td></tr>
<tr class=grayf><td width=33% align=center><br>".TEXT_CAPTCHA_ENTRY."<br></td><td align=left><br>  <img src='".$img_name."'><input name=\"refresh\" value=\"refresh\" type=\"image\" src=\"images/button_refresh.gif\"><br><img src=\"images/blank.gif\" width=100% height=5><input type='text' name='thecode' MAXLENGTH='16' size='8'<br></td></tr>
<tr><td align=center colspan=2 class=gray><a onclick='javascript:document.forms[0].submit();'><span id=button_blue>".BUTTON_TEXT_SUBMIT."</span></a>&nbsp;&nbsp;<a onclick=\"javascript:location.href='index.php?page=forum&f=".$f."&t=".$t."&mode=viewtopic';\"><span id=button_blue>".BUTTON_TEXT_CANCEL."</span></a></td></tr>
</table>";
if($f){session_start();$_SESSION['topic']=$f;}

}
###################################################### END REPLY



################################################ VIEW TOPICS
elseif($f && $mode=="viewtopic" && $t){

echo "<table id=row width=98% cellpadding=1 cellspacing=0 border=0 align=center style='background-color:#f6f6f6;'><tr><td valign=top>";

echo "<table  style='background-color:#f6f6f6;'><tr><td><img src='".$location."images/forum_bubble.png'></td><td><a href='#' ";
if(!$_SESSION['modelinthecity']){session_start();$_SESSION['REFERER']=$_SERVER['REQUEST_URI'];echo "onclick=\"show_page('login');\">";}else{
echo "onclick='location.href=\"".$location."index.php?page=forum&f=".$f."&mode=post\";'>";
}
echo "<u>".TEXT_NEW_TOPIC."<u></a></td></tr></Table></td><td colspan=2>";

echo "<table style='background-color:#f6f6f6;'><tr><td><img src='".$location."images/forum_bubble.png'></td><td><a href='#' ";
if(!$_SESSION['modelinthecity']){session_start();$_SESSION['REFERER']=$_SERVER['REQUEST_URI'];echo "onclick=\"show_page('login');\"><u>".TEXT_NEW_REPLY."<u></a></td></tr></Table>";}else{
echo "onclick='location.href=\"".$location."index.php?page=forum&f=".$f."&t=".$t."&mode=reply\";'><u>".TEXT_NEW_REPLY."<u></a></td></tr></Table>";
}

$q=mysql_query("select d.topic_title, dd.forum_name from mitc_topics d, mitc_forums dd where d.forum_id='".$f."' and d.topic_id='".$t."' and d.forum_id = dd.forum_id and d.lang=dd.lang and d.lang='".$_SESSION['languages']."'");
if($r=mysql_fetch_array($q)){ $forum_title=$r['forum_name'];$topic_title=$r['topic_title'];}//echo mysql_error();

echo "</td></tr><tr><td colspan=3 class=cat><table cellpadding=0 cellspacing=0><tr><td><a href='index.php?page=forum&f=".$f."' Title='Back to $forum_title'><h2><u>".$forum_title."</u></h2></a></td><td><font color=white>&nbsp;&#187;&nbsp;</font></td><td><h2>" .stripslashes($topic_title) ."</h2></td></tr></table></td></tr><tr class=graye><td width=150 align=center><small><b>". TEXT_AUTHOR."</b></small></td><td align=center><small><b>". TEXT_MESSAGE."</b></small></td><td width=80>&nbsp;</td></tr>";
echo "<tr class=grayf><td colspan=3>&nbsp;</td></tr>";

$q=mysql_query("select d.topic_title, d.topic_poster_id, dd.post_time, dd.post_subject, dd.post_text from mitc_topics d, mitc_posts dd where d.forum_id='".$f."' and d.topic_id='".$t."' and dd.topic_id=d.topic_id  and d.lang=dd.lang and d.lang='".$_SESSION['languages']."' order by dd.post_time ASC");
 while($r=mysql_fetch_array($q)){ 


echo "
<tr class=grayf><td align=center valign=top><a href='".$location.$r['topic_poster_id']."' target='_blank' title='Visit " . ucfirst(public_info($r['topic_poster_id'],'pseudo')) ." Portfolio'><b>" . ucfirst(public_info($r['topic_poster_id'],'pseudo')) ."</b><br><img src='".$location."galerie/".$r['topic_poster_id']."/index/" . str_replace('.jpg','_small.jpg',public_book_info($r['topic_poster_id'],'photo') )."' height=140 style='border-radius:8px;-moz-border-radius:8px;-webkit-border-radius:8px;'><br><b>". public_book_info($r['topic_poster_id'], 'category_name'). "</b><br><small><b>" .TEXT_SINCE.": </b>". public_book_info($r['topic_poster_id'], 'datecrea'). "<br><b>".TEXT_STATUS." : ". status_online($r['topic_poster_id']). "</b></small></a></td><td valign=top><br><b>" .TEXT_SUBJECT." : </b>".stripslashes($r['post_subject']) ."<br><br><p>".stripslashes(str_replace(chr(10),'<br>',$r['post_text'])) ."</p></td><td align=right valign=top><br><nobr><small><b>".TEXT_POSTED." : </b>" . strftime('%c', $r['post_time'])  . "</Small></nobr>&nbsp;<br><br><br><br><br><br><br><br><br><br><button title=\"".TEXT_REPORT."\"><font color=red><b>!</b></font></button> <button title='". TEXT_DELETE_POST."'><font color=black><b>x</b></font></button></td></tr>";

// echo "<tr class=grayf><td colspan=3><hr></td></tr>";
// echo "<tr class=grayf><td colspan=2>&nbsp;</td><td align=right><button title='Report this post'><font color=red><b>!</b></font></button> <button title='Delete this post'><font color=black><b>x</b></font></button></td></tr>";

}echo mysql_error();

echo "<tr><td colspan=3 class=cat>&nbsp;</td></tr><tr><td>";
echo "<table  style='background-color:#f6f6f6;'><tr><td><img src='".$location."images/forum_bubble.png'></td><td><a href='#' ";
if(!$_SESSION['modelinthecity']){session_start();$_SESSION['REFERER']=$_SERVER['REQUEST_URI'];echo "onclick=\"show_page('login');\">";}else{
echo "onclick='location.href=\"".$location."index.php?page=forum&f=".$f."&mode=post\";'>";
}
echo "<u>". TEXT_NEW_TOPIC."<u></a></td></tr></Table></td><td colspan=2>

<table style='background-color:#f6f6f6;'><tr>
<td><img src='".$location."images/forum_bubble.png'></td><td><a href='#' ";
if(!$_SESSION['modelinthecity']){session_start();$_SESSION['REFERER']=$_SERVER['REQUEST_URI'];echo "onclick=\"show_page('login');\"><u>".TEXT_NEW_REPLY."<u></a></td></tr></Table>";}else{
echo "onclick='location.href=\"".$location."index.php?page=forum&f=".$f."&t=".$t."&mode=reply\";'><u>".TEXT_NEW_REPLY."<u></a></td></tr></Table>";
}
echo "</td></tr></table>";

}
################################################ //END VIEW TOPICS
elseif($f && !$mode){

$q=mysql_query("select forum_name, forum_desc from mitc_forums where forum_id='".(int)$f."' and lang='".$_SESSION['languages']."'");
if($r=mysql_fetch_array($q)){


echo "<table id=row width=98% cellpadding=1 cellspacing=1 border=0 align=center style='background-color:#f6f6f6;'><tr><td colspan=5><table  style='background-color:#f6f6f6;'><tr><td><img src='".$location."images/forum_bubble.png'></td><td><a href='#' ";
if(!$_SESSION['modelinthecity']){session_start();$_SESSION['REFERER']=$_SERVER['REQUEST_URI'];echo "onclick=\"show_page('login');\">";}else{
echo "onclick='location.href=\"".$location."index.php?page=forum&f=".$f."&mode=post\";'>";
}
echo "<u>". TEXT_NEW_TOPIC."<u></a></td></tr></Table></td></tr><tr><td colspan=6 class=cat><h2>".$r['forum_name'] ."</h2></td></tr>";
}
echo mysql_error();

echo "<tr class=gray><td align=center><b>&nbsp;</td><td width=60% align=center><b><small>". TEXT_TOPICS."</small></b></td><td align=center><b><small>". TEXT_AUTHOR."</small></b></td><td align=center><b><small>".TEXT_POSTS."</small></b></td><td align=center><b><small>".TEXT_VIEW."</small></b></td><td align=center><b><small>".TEXT_POSTED."</small></b></b></td></tr>";//</table>";

$q=mysql_query("select topic_id, topic_title, topic_poster_id, topic_time from mitc_topics where forum_id='".(int)$f."' and lang='".$_SESSION['languages']."' order by topic_time DESC");
while($r=mysql_fetch_array($q)){ 

// mysql_query("select * from mitc_topics where forum_id='".(int)$f."' and ");
// $nbr_topic=mysql_affected_rows();
mysql_query("select * from mitc_posts where forum_id='".(int)$f."' and topic_id='" . $r['topic_id']. "' and lang='".$_SESSION['languages']."'");
$nbr_post=mysql_affected_rows();

echo "<a href='".$location."index.php?page=forum&f=".$f."&t=".$r['topic_id']."&mode=viewtopic'><div><tr class=grayt><td align=center><a href='".$location."index.php?page=forum&f=".$f."&t=".$r['topic_id']."&mode=viewtopic'><img src='".$location."images/forum_bubble.png' border=0></a></td><td width=60% align=left><a href='".$location."index.php?page=forum&f=".$f."&t=".$r['topic_id']."&mode=viewtopic'>&nbsp;&nbsp;<strong>".stripslashes($r['topic_title'])."</strong></a></td><td align=center><small>". ucfirst(public_info($r['topic_poster_id'],'pseudo'))."</small></td><td align=center>$nbr_post</td><td></td><td><small>" . strftime('%c', $r['topic_time']) . "</Small></td></tr></div></a>";
}
echo "<tr><td colspan=6 class=cat>&nbsp;</td></tr>";
echo "<tr><td colspan=5><table  style='background-color:#f6f6f6;'><tr><td><img src='".$location."images/forum_bubble.png'></td><td><a href='#' ";
if(!$_SESSION['modelinthecity']){session_start();$_SESSION['REFERER']=$_SERVER['REQUEST_URI'];echo "onclick=\"show_page('login');\">";}else{
echo "onclick='location.href=\"".$location."index.php?page=forum&f=".$f."&mode=post\";'>";
}
echo "<u>". TEXT_NEW_TOPIC."<u></a></td></tr></Table></td></tr>";

echo "</table>";
}else{
unset($_SESSION["noautamationcode"]);
}


// for($i=0;$i<255;$i++){

// echo $i ." => &#".$i.";<br>";
// }
}
}
	


?>
<br><br><br>