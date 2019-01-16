<?php
include('/home/".HOST."/connex/connexion.inc.php');
include('/home/".HOST."/modelinthecity/admin/include/global.inc.php');
mysql_query("select * from galerie where valid=1");
$nb_book=mysql_affected_rows();
mysql_query("select * from photo where 1");
$nb_photo=mysql_affected_rows();
mysql_query("select * from galerie where valid=0");
$nb_book_0=mysql_affected_rows();
mysql_query("select * from message where id_dest='7' and lu=0");
$nb_msg=mysql_affected_rows();
// if($nb_msg>0){ncurses_beep();}
?>
<html>
<HEAD>
<title>ADMIN - MODELINTHECITY</title>
<link rel="stylesheet" type="text/css" href="../modelfolio.css">
</head>

<BODY  leftmargin=0 bgcolor='#f6f6f6' topmargin=0 marginwidth=0 marginheight=0 vlink=#046FBD link=#000000 text=2>

<table width=900 border=0 align=center cellspacing=2 cellpadding=0 style="background-color:#333333;-moz-opacity:0.9;opacity: 0.9;filter:alpha(opacity=98);"><tr><td colspan=3><div style="transparent:no;"><br><table border=0 width=900 align=center cellpadding=4 style="color:#ffffff;background:#000000 url(../images/background-city.png) no-repeat;border-top:1px solid #000;border-right:1px solid #000;border-left:1px solid #000;"><tr><td align=left width=60%>&nbsp;</td>
<td height=2 align=right width=40%>&nbsp;
</td></tr><tr><td valign=middle align=left colspan=2><a href="http://www.modelinthecity.com/"><img src="http://www.modelinthecity.com/images/modelinthecity_small_logo.png" border=0></a></td></tr>
</table></div></td></tr><tr><td style="color:#ffffff;background-color:#999999;" align=left  valign=bottom><table  width=900 cellspacing=0 cellpadding=4 align=center border=0  valign=bottom ><tr><td height=0 class=entete align=center valign=absmiddle><a href="clients.php">clients</a> | <a href="members.php">List of Members</a> | <a href="article.php">Articles</a> | <a href="forum.php">Forums</a> | <a href="message.php">Messages(<?php echo $nb_msg;?>)</a> | <a href="stat.php">Stats</a></td></tr></table></td></tr>

<tr><td bgcolor=white width=900>ADMIN
<br><br>
Membres actifs : <?php echo $nb_book;?> | Inactifs : <?php echo $nb_book_0;?> | Photos : <?php echo $nb_photo;?><br><br>
</td></tr>


