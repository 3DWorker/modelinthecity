<?php

require('include/admin_header.php');
?>

<tr><td>
<?

if( $_GET['action']=="new" && $_GET['cat']){
mysql_query("insert into categories_articles set articles_title='New article'");
sleep(1);
$q=mysql_query("select articles_id from categories_articles order by articles_id DESC");
if($r=mysql_fetch_array($q)){
$art=$r['articles_id'];
}
if($art && $_GET['cat']){mysql_query("insert into categories_to_articles set categories_id='".$_GET['cat']."', articles_id='".$art."'"); echo "Article créé";}
else{echo "echec";}
}

if( $_GET['action']=="del" && $_GET['article']){
$q=mysql_query("select articles_image from categories_articles where articles_id='".$_GET['article']."'");
if($r=mysql_fetch_array($q)){
unlink('../images/cat/'.$r['articles_image']);
mysql_query("update categories_articles set articles_image='' where articles_id='".$_GET['article']."'");
}
}

if( $_GET['action']=="resize" && $_GET['article']){
$q=mysql_query("select articles_image from categories_articles where articles_id='".$_GET['article']."'");
if($r=mysql_fetch_array($q)){
$rep= '../images/cat/'.$r['articles_image'];

}
$size=getimagesize($rep);
$ratio=$size[1]/$size[0];
$src = imagecreatefromjpeg($rep);
$maxW=$w;
$maxH=$h;

if($ratio>1){$sizeH=$maxH;$sizeW=$sizeH/$ratio;}else
if($ratio==1){$sizeH=$maxH;$sizeW=$maxW;}else
{$sizeW=$maxW;$sizeH=$sizeW*$ratio;}
			$dest = imagecreatetruecolor($sizeW,$sizeH);
			ImageCopyResampled($dest,$src,0,0,0,0,$sizeW,$sizeH,$size[0],$size[1]);			
			imagejpeg($dest,$rep,100);
}

if($action=="save"){


if($_FILES['photo']['name'] && $article2save){

$photoFileName1 = $_FILES['photo']['name'];
$tempFileName1 = $_FILES['photo']['tmp_name'];
$photoSize = $_FILES['photo']['size']; 
 
$fileNameParts = explode(".", $photoFileName1);
if((!preg_match("/\.(jpe|jpg|jpeg|png|tiff|bmp)$/i",$photoFileName1))&&($photoFileName1)){
print "<script>alert('Seules les images de type JPEG PNG TIFF peuvent être uploader !!!');</script>";exit;}
 
if ($photoSize > 2000000){print "<script>alert('$photoFileName1 dépasse les 20 Mo Désolé.');top.location.href='index.php?action=sel&id=$id';</script>";exit;}
  
$rep1="/homez.193/".HOST."/modelinthecity/images/cat/"; 

if(copy($tempFileName1, $rep1."cat_".$article2save.".".$fileNameParts[1])){

mysql_query("update categories_articles set articles_image='"."cat_".$article2save.".".$fileNameParts[1]."' where articles_id='". $article2save. "'");

if(mysql_error()){echo mysql_error();}
else{echo "Image copiée";}

}
}


if($article_title){// &&  $article_description && $article2save


mysql_query("update categories_articles  set articles_title='". addslashes($article_title)."', articles_subtitle='". addslashes($article_subtitle)."',articles_description='".addslashes($article_description)."', articles_link='". addslashes($article_link)."', valid='".$radio."', sort='".$sort."', tags='".$tags."' WHERE articles_id='". $article2save. "'");
// echo "<script>alert('Article updated');</script>";
echo " Article updated";
}
}

$t="<form action=article.php?action=go method=post>Select the categorie to create an article : <select name='cat' onchange='document.forms[0].submit();'>";

$q=mysql_query("select categories_id, categories_name from categories_description where 1 order by categories_id");

$t.="<option>Select a category :";
while($r=mysql_fetch_array($q)){

if($cat==$r['categories_id']){$add="selected";}else{$add="";}
$t.= "<option value='".$r['categories_id']."' $add>" .$r['categories_name'];

}
$t.="<select>";
echo  $t;

if($cat){

$q=mysql_query("select d.articles_id, dd.articles_title,dd.articles_description, articles_link from categories_to_articles d, categories_articles dd where categories_id='" . $cat. "' and d.articles_id=dd.articles_id");

$t1=" - <select name='article' onchange='document.forms[0].submit();'>";
$t1.="<option>Select an article : ";

while($r=mysql_fetch_array($q)){
if($article==$r['articles_id']){$add="selected";}else{$add="";}
$t1.= "<option value='".$r['articles_id']."' $add>" .$r['articles_title'];
}
$t1.= "</select>";

$t1.= " - <a href='article.php?action=new&cat=".$cat."'>Create a new article</a></form>";

echo $t1;

if($article){
echo "<form action='article.php?action=save' method='POST' ENCTYPE='multipart/form-data'>";
$q=mysql_query("select articles_title, articles_subtitle,articles_description, articles_image, articles_link, valid, sort, tags from categories_articles  where articles_id='". $article. "'");
while($r=mysql_fetch_array($q)){
if($r['valid']==1){$add1="checked";}else{$add1="";}
if($r['valid']==0){$add2="checked";}else{$add2="";}
if($r['tags']==1){$add3="checked";}else{$add3="";}
if($r['tags']==0){$add4="checked";}else{$add4="";}

echo "<hr><nobr><small>Online :Yes <input type=radio name=radio value=1 $add1> - No <input type=radio name=radio value=0 $add2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Position : <input type=text  name=sort value=".$r[sort]." style='border:1px solid black;height:20px;width:20px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Allow tags? Yes <input type=radio name=tags value=1 $add3> - No <input type=radio name=tags value=0 $add4></small></nobr><br><br><small>Article Title :</small><br><input type=text name='article_title' size=60 value='".stripslashes($r['articles_title'])."'><br><br><small>Article Subtitle :</small><br><input type=text name='article_subtitle' size=60 value='".stripslashes($r['articles_subtitle'])."'><br><br><small>Article image :</small><br>";
if($r['articles_image']){echo "<img src='../images/cat/" .$r['articles_image'] ."'><br><a href='article.php?action=del&cat=".$cat."&article=".$article."'>Delete</a> | <a href='article.php?action=resize&cat=".$cat."&article=".$article."&w=150&h=210'>Resize</a><br><br>";}
echo "<input type='file' name='photo' size='15'>";
echo "<br><br><small>Article content :</small><br><textarea cols=60 rows=10 name='article_description'>".stripslashes($r['articles_description'])."</textarea><br>
<br><small>Article Link :</small><br><input type=text name='article_link' size=60 value='".stripslashes($r['articles_link'])."'>
<input type=hidden name=article2save value='$article'>
<input type=hidden name=cat value='$cat'>
<input type=hidden name=article value='$article'><br><input type=submit value='::: Update :::'></form>";
}
}
}

?>

</td></tr><tr><td>

<?
echo "</form></td></tr>";
?>