<?
// exit;
if($_SESSION["modelinthecity"]){

$action=$_GET['action'];
$article_title=addslashes($_POST['article_title']);
$article_text=addslashes($_POST['article_text']);
$tpl=$_GET['tpl'];
$ermes="";

if($action=="select" && $tpl){
}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="admin_table">
	    <tr>
			<?php
			if($ermes!=""){echo "<tr><td class='error' colspan='1'>&nbsp;/!\\".$ermes."</td></tr>";}
			?>

    <tr id=admin_table_info><td align=center><font color=white>Create a new Article</font></td></tr><tr>
    <TD height="100%" id="admin_table_info_in" width=770 align=left> 
<div align=center>Select a template
<img name="templates_article" src="images/templates_article.jpg" width="765" height="178" border="0" id="templates_article" usemap="#m_templates_article" alt="" /><map name="m_templates_article" id="m_templates_article">
<area shape="rect" coords="618,4,763,170" href="index.php?page=admin_articles&action=select&tpl=5#01" />
<area shape="rect" coords="461,4,606,170" href="index.php?page=admin_articles&action=select&tpl=4#01" />
<area shape="rect" coords="311,5,456,171" href="index.php?page=admin_articles&action=select&tpl=3#01" />
<area shape="rect" coords="154,4,299,170" href="index.php?page=admin_articles&action=select&tpl=2#01" />
<area shape="rect" coords="0,4,145,170"   href="index.php?page=admin_articles&action=select&tpl=1#01" />
</map>
		</div><br><a name=01></a>
<?
if($tpl==1){
?> 			<div align=center>Edition
			<table border=1 cellpadding=2 cellspacing=10 width=730 style="border:1px solid black;background:url(images/bg_admin_article.jpg);" id="admin_article_header">
	
	<tr style="border:1px solid white;"><td style="border:1px solid white;"> <div style="border:2px dotted black; width=100%;height:250px;border-radius:8px;-moz-border-radius:8px;-webkit-border-radius:8px;text-align:center;background:white;"><br><br><br><br><br><input type=file name=encart size=15></div> </td><td rowspan=3 valign=top style="border:1px solid white;"> <textarea cols=48 rows=38  class="admin_article_colone2">2</textarea> </td></tr>
	<tr ><td style="border:1px solid white;"><input type="text" name="article_title" class="admin_article_title" value="TITLE OF THE ARTICLE" style="width:98%;height:30px;font-size:18px;"></td></tr>
	<tr><td valign=top style="border:1px solid white;"><textarea cols=48 rows=20 class="admin_article_colone">1</textarea></td></tr></table>
</div>
	<?
	}

if($tpl==2){
?> 			<div align=center>Edition
			<table border=1 cellpadding=4 cellspacing=5 width=730 style="border:1px solid black;background:url(images/bg_admin_article.jpg);" id="admin_article_header">
	<tr style="border:1px solid white;"><td style="border:1px solid white;" colspan=2><input type="text" name="article_title" class="admin_article_title" value="TITLE OF THE ARTICLE" style="width:98%;height:30px;font-size:18px;text-align:center;"></td></tr>
	<tr style="border:1px solid white;"><td style="border:1px solid white;"> <div style="border:2px dotted black; width=100%;height:306px;border-radius:8px;-moz-border-radius:8px;-webkit-border-radius:8px;text-align:center;background:white;"><br><br><br><br><br><br><br><br><br><input type=file name=encart size=15></div> </td><td valign=top style="border:1px solid white;"> <textarea cols=48 rows=16  class="admin_article_colone">1</textarea> </td></tr>
<tr><td colspan=2 style="border:1px solid white;"><textarea cols=105 rows=2 class="admin_article_colone2">2</textarea></td></tr>
	<tr><td valign=top style="border:1px solid white;"><textarea cols=48 rows=16 class="admin_article_colone2">3</textarea></td><td style="border:1px solid white;"> <div style="border:2px dotted black; width=100%;height:306px;border-radius:8px;-moz-border-radius:8px;-webkit-border-radius:8px;text-align:center;background:white;"><br><br><br><br><br><br><br><br><br><input type=file name=encart size=15></div> </td></tr>
	<tr><td colspan=2 style="border:1px solid white;"><textarea cols=105 rows=2 class="admin_article_colone2">4</textarea></td></tr></table>
</div>
	<?
	}
	?>
	
	
	
	</td></tr>
      </table>

	
	
	<?
	
	}
	?>