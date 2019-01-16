<H1><?php echo stripslashes($subject);?></H1><br>


<?
$cat=$_GET['cat'];
$q=mysql_query("select categories_title,categories_description from categories where categories_id='" . $cat. "'");
if(mysql_affected_rows()>0){
while($r=mysql_fetch_array($q)){
echo "<div id='talk'><h2>". stripslashes($r['categories_title']). "</h2>".
"<p>". str_replace(chr(10),"<br>",stripslashes($r['categories_description'])) ."</p></div>";

}
}

//echo $cat;
$q=mysql_query("select d.articles_id, dd.articles_title,dd.articles_subtitle, dd.articles_description, dd.articles_image, dd.articles_link,dd.tags from categories_to_articles d, categories_articles dd where categories_id='" . $cat. "' and d.articles_id=dd.articles_id and valid=1 order by sort");
if(mysql_affected_rows()>0){

while($r=mysql_fetch_array($q)){



if($r['articles_link']){echo "<a href='".$_SERVER['HTTP_REFERER']."#".$r['articles_link']."' title=\"".stripslashes($r['articles_subtitle']) ."\">";}
echo "<div id='talk'>";
echo "<table cellspacing=0 cellpadding=1 border=0 width=100%><tr><td width=35%><h2>". stripslashes($r['articles_title']) . "</h2></td><td align=right><H3>". stripslashes($r['articles_subtitle']) . "</H3></td></tr>
<tr><td>";
if($r['articles_image']){echo "<img src='./images/cat/".$r['articles_image']."' border=2>";}
echo "</td><td valign=top><p>" . str_replace(chr(10),"<br>",stripslashes($r['articles_description'])) . "&nbsp;</p></td></tr>";

if($r['articles_link']){echo "<tr><td colspan=2 align=right><a href='".$_SERVER['HTTP_REFERER']."#".$r['articles_link']."' title=\"".stripslashes($r['articles_subtitle']) ."\"><div class='button_blue_long'>Read & Talk more !</div></a></td></tr>";}

// if($r['tags']){ echo "<tr><td colspan=2>"; require "modules/module_talktags.php";echo "</td></tr>";}
echo  "</table></div>";

if($r['articles_link']){echo "</a>";}
}


}

/*
///old
if($r['articles_link']){echo "<a href='".$_SERVER['HTTP_REFERER']."#".$r['articles_link']."' title='".stripslashes($r['articles_subtitle']) ."'>";}

echo "<div id='talk'><table cellspacing=0 cellpadding=1 border=0><tr><td width=40%><h2>". stripslashes($r['articles_title']) . "</h2></td><td align=right><H3>". stripslashes($r['articles_subtitle']) . "</H3></td></tr>
<tr><td>";
if($r['articles_image']){echo "<img src='./images/cat/".$r['articles_image']."'>";}
echo "</td><td valign=top><p>" . str_replace(chr(10),"<br>",stripslashes($r['articles_description'])) . "&nbsp;</p></td></tr>";

if($r['articles_link']){echo "<tr><td colspan=2 align=right><a href='".$_SERVER['HTTP_REFERER']."#".$r['articles_link']."' title='".stripslashes($r['articles_subtitle']) ."'><div class='button_blue_long'>Read & Talk more !</div></a></td></tr>";}

// if($r['tags']){ echo "<tr><td colspan=2>"; require "modules/module_talktags.php";echo "</td></tr>";}
echo  "</table></div>";

if($r['articles_link']){echo "</a>";}
}
*/
?>
