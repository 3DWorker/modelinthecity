<?php
require('include/admin_header.php');
session_start();
if(!$_SESSION['lang']){$_SESSION['lang']="french";}
$action=$_GET['action'];
$parent_id=$_POST['parent_id'];
$forum_name=$_POST['forum_name'];
$forum_desc=$_POST['forum_desc'];
$forum_id=$_POST['forum_id'];
$_forum_id=$_POST['_forum_id'];
$lang=$_POST['lang'];

switch($action){

case 'select_lang':
if($lang){$_SESSION['lang']=$lang;}
break;

case 'add_forum':
session_start();
if($_SESSION['lang']){

mysql_query("select * from mitc_forums where forum_id='" .$forum_id."' and lang='". $_SESSION['lang'] ."'");
if(mysql_affected_rows()<1){ 
mysql_query("insert into mitc_forums value('','".$parent_id."', '".$forum_name."','".$forum_desc."', '".$_SESSION['lang']."')");
}else{ 
mysql_query("update mitc_forums set parent_id='".$parent_id."', forum_name='".$forum_name."', forum_desc='".$forum_desc."' where forum_id='" .$forum_id."' and lang='".$_SESSION['lang']."'");
}
echo mysql_error();echo "updated";
}else{echo "session lang !!";echo $_SESSION['lang'];}
break;

case 'see_forum':

$q=mysql_query("select forum_name, forum_desc, parent_id from mitc_forums where forum_id='".$_forum_id."' and lang='".$_SESSION['lang']."'");
while($r=mysql_fetch_array($q)){ 
$_forum_name=$r['forum_name'];
$_forum_desc=$r['forum_desc'];
$parent_id=$r['parent_id'];
}
break;


}

/*
CREATE TABLE IF NOT EXISTS `mitc_forums` (
  `forum_id` mediumint(8) unsigned NOT NULL auto_increment,
  `parent_id` mediumint(8) unsigned NOT NULL default '0',
  `forum_name` varchar(255) collate utf8_bin NOT NULL default '',
  `forum_desc` text collate utf8_bin NOT NULL,
  PRIMARY KEY  (`forum_id`));


CREATE TABLE IF NOT EXISTS `mitc_topics` (
  `topic_id` mediumint(8) unsigned NOT NULL auto_increment,
  `forum_id` mediumint(8) unsigned NOT NULL default '0',
  `topic_time` int(11) unsigned NOT NULL default '0',
  `topic_poster_id` mediumint(8) unsigned NOT NULL default '0',
  `topic_title` varchar(255) collate utf8_bin NOT NULL default '',
    PRIMARY KEY  (`topic_id`));
  
  CREATE TABLE IF NOT EXISTS `mitc_posts` (
  `post_id` mediumint(8) unsigned NOT NULL auto_increment,
  `topic_id` mediumint(8) unsigned NOT NULL default '0',
  `forum_id` mediumint(8) unsigned NOT NULL default '0',
  `post_time` int(11) unsigned NOT NULL default '0',
  `post_poster_id` mediumint(8) unsigned NOT NULL default '0',
  `post_subject` varchar(255) collate utf8_bin NOT NULL default '',
  `post_ip` varchar(40) collate utf8_bin NOT NULL default '',
  `post_text` varchar(500) collate utf8_bin NOT NULL default '',
    PRIMARY KEY  (`post_id`));
	*/
?>
<tr><td><hr> <table cellpadding=2 cellspacing=2 width=900 align=center bgcolor=white><tr><td>

<b>FORUMS</b>
</td></tr>
<tr><td><b>Select a forum :</b>
<form name="f3" action="forum.php?action=select_lang" method=post>
	<?php
		$option='<select name="lang" onchange=\'document.forms["f3"].submit();\'><option value=0>Select a language</option>';
					
	$q=mysql_query("select name,languages_id from languages where 1 order by languages_id DESC");
	while($r=mysql_fetch_array($q)){
	if($_SESSION['lang']==$r[name]){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$r[name]."'$sel>".$r[name]."</option>";
		}		$option.="</select>";
	echo $option;
	?></form>

<form name="f2" action="forum.php?action=see_forum" method=post>
Parent forum: <select name="_forum_id" onchange='document.forms["f2"].submit();'><option value=0>Select :<?php 
$q=mysql_query("select forum_id, forum_name from mitc_forums where lang='".$_SESSION['lang']."' order by forum_id");
while($r=mysql_fetch_array($q)){ 
echo "<option value='".$r['forum_id']."' $add>". $r['forum_name'];
}
?>
</select>

</form>
</td></tr>
<tr><td><b>Add A forum :</b>
<form action="forum.php?action=add_forum" method=post>
Parent forum: <select name=parent_id ><option value=0>Select :<?php 
$q=mysql_query("select forum_id, forum_name from mitc_forums where lang='".$_SESSION['lang']."' order by forum_id");
while($r=mysql_fetch_array($q)){ 
if($parent_id==$r['forum_id']){$add="selected";}else{$add="";}
echo "<option value='".$r['forum_id']."' $add>". $r['forum_name'];}
?>
</select><br>
<input type=hidden name=forum_id value="<?php echo $_forum_id;?>">
Forum name : <input type=text name="forum_name" value="<?php echo $_forum_name;?>"><br>
Forum Description : <input type=text name="forum_desc" value="<?php echo $_forum_desc;?>" size=60><br>
<input type=submit>
</form>


</td></tr>
</table>