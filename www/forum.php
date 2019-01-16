<?php
require('include/admin_header.php');

$action=$_GET['action'];
$parent_id=$_POST['parent_id'];
$forum_name=$_POST['forum_name'];
$forum_desc=$_POST['forum_desc'];
$forum_id=$_POST['forum_id'];
$_forum_id=$_POST['_forum_id'];
switch($action){
case 'add_forum':

mysql_query("select * from mitc_forums where forum_id='" .$forum_id."'");
if(mysql_affected_rows()<1){ echo insert;
mysql_query("insert into mitc_forums value('','".$parent_id."', '".$forum_name."','".$forum_desc."')");
}else{ echo "upadate";
mysql_query("update mitc_forums set parent_id='".$parent_id."', forum_name='".$forum_name."', forum_desc='".$forum_desc."' where forum_id='" .$forum_id."'");
}
echo mysql_error();echo "add";
break;

case 'see_forum':

$q=mysql_query("select forum_name, forum_desc, parent_id from mitc_forums where forum_id='".$_forum_id."'");
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
<tr><td><hr>

<b>FORUMS</b>
</td></tr>
<tr><td><b>Select a forum :</b>
<form name="f2" action="forum.php?action=see_forum" method=post>
Parent forum: <select name="_forum_id" onchange='document.forms["f2"].submit();'><option value=0>Select :<?php 
$q=mysql_query("select forum_id, forum_name from mitc_forums order by forum_id");
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
$q=mysql_query("select forum_id, forum_name from mitc_forums order by forum_id");
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