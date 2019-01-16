<?
$id=$_GET[id];
?><div style="float:center;"><table width=97% border=0 align=center cellspacing=0 cellpadding=0 height=80% ><tr>

<td colspan=2><a href="<?php echo $location.$id;?>">> Profile</a></TD><td width=2>&nbsp;</td></TR>

<td width=658 valign=top><?php include "modules/module_book_photo.php"?> </td><td width=10 rowspan=16>&nbsp;</td><td rowspan=16 width=25% height=80 align=right valign=top><?php include "modules/module_book_description.php"?></td></tr>

<tr><td height=10>&nbsp;</td></tr>
<tr><td valign=top>
<table cellpadding=0 cellspacing=3 class="modules_header" width="100%" height=40 border="0"><tr><td align=left width=100%><H2>&nbsp;&nbsp;<?php echo TEXT_PORTFOLIO_GALLERY;?></H2></td></tr></table>
</td></tr>
<tr><td bgcolor=black valign=top><?php include "modules/module_portfolio.php";?></td></tr>

<tr><td>&nbsp;</td></tr>
<tr><td><?php include "modules/module_book_credit.php"?></td></tr>

<tr><td>&nbsp;</td></tr>
<tr><td><?php include "modules/module_book_style.php"?></td></tr>

<tr><td>&nbsp;</td></tr>
<tr><td><?php include "modules/module_book_link.php"?></td></tr>

<tr><td>&nbsp;</td></tr>
<tr><td><?php include "modules/module_book_friend.php"?></td></tr>

<tr><td>&nbsp;</td></tr>
<tr><td><?php include "modules/module_tags.php"?> </td></tr>
</table></div><br><br>

