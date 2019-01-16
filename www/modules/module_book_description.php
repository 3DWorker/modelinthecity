<?

$id=$_GET[id];

$txt="<table border='0' cellspacing='2' cellpadding='4' class='modules_book_description' width='200' height='10'>";
$txt.= "<tr><td align=center>" .public_book_info($id,"vip")."</td></tr>";
$txt.= "<tr><td align=center><img src='./galerie/". $id."/index/".	str_replace('.jpg','_small.jpg',public_book_info($id,"photo")) ."' border=1></td></tr>";
$txt.=  "<tr><td bgcolor='#EFF1F3'><b>&nbsp;".TEXT_ALIAS.": </b>". ucfirst(public_info($id,"pseudo"));
$txt.=  "</td></tr><tr><td>"; 
$txt.=  "&nbsp;<b>".TEXT_CATEGORY.": </b>". public_book_info($id,"category_name");
$txt.=  "</td></tr><tr><td bgcolor='#EFF1F3'>"; 
 $txt.=  "&nbsp;<b>".TEXT_GENDER.": </b>". public_book_info($id,"gender");
 $txt.=  "</td></tr><tr><td>"; 

$txt.=  "&nbsp;<b>".TEXT_AGE.": </b>".public_info($id,"age") ; 
$txt.=  "</td></tr><tr><td bgcolor='#EFF1F3'>"; 
$txt.=  "&nbsp;<b>".TEXT_MEMBER_ID.": </b>". $id;
$txt.=  "</td></tr><tr><td>"; 
$txt.=  "&nbsp;<b>".TEXT_SINCE.": </b>". public_book_info($id,"datecrea");
$txt.=  "</td></tr><tr><td bgcolor='#EFF1F3'>"; 
$txt.=  "&nbsp;<b>".TEXT_CITY.": </b>" .ucfirst(public_info($id,"ville"));
$txt.=  "</td></tr><tr><td>"; 
$txt.=  "&nbsp;<nobr><b>".TEXT_COUNTRY.": </b>". ucfirst(public_book_info($id,"country"));


if(public_info($id,"categorie")==2 || public_info($id,"categorie")==6){
$txt.=  "</td></tr><tr><td bgcolor='#EFF1F3'>"; 
$txt.=  "&nbsp;<nobr><b>".TEXT_HEIGHT.": </b>". public_book_info($id,'height');
$txt.=  "</td></tr><tr><td>"; 
$txt.=  "&nbsp;<nobr><b>".TEXT_MEASURMENT.": </b>". public_book_info($id,"measurement");
$txt.=  "</td></tr><tr><td bgcolor='#EFF1F3'>"; 
/*
$txt.=  "</td></tr><tr><td>";
$txt.=  "&nbsp;Waist: ". public_book_info($id,"waist");
$txt.=  "</td></tr><tr><td>";
$txt.=  "&nbsp;Hips: ". public_book_info($id,"hips");
$txt.=  "</td></tr><tr><td>";
$txt.=  "&nbsp;Shoes: ". public_book_info($id,"shoes");
$txt.=  "</td></tr><tr><td>";
*/
$txt.=  "&nbsp;<b>".TEXT_HAIR.": </b>". public_book_info($id,"hair");
$txt.=  "</td></tr><tr><td>"; 

$txt.=  "&nbsp;<b>".TEXT_HAIR_STYLE.": </b>". public_book_info($id,"hair_style");
$txt.=  "</td></tr><tr><td bgcolor='#EFF1F3'>"; 
$txt.=  "&nbsp;<b>".TEXT_EYES.": </b>".public_book_info($id,"eyes");
}
if(public_info($id,"categorie")==2 || public_info($id,"categorie")==6){
$txt.=  "</td></tr><tr><td>"; }else{
$txt.=  "</td></tr><tr><td bgcolor='#EFF1F3'>";
}
$txt.=  "&nbsp;<nobr><b>".TEXT_STAT_VISIT.": </b>".statistic_member($id);

$txt.=  "</td></tr><tr><td><br><center><a href=\"javascript:show_page('contact',$id);\"><div class=button_blue>CONTACT</div></center>";


$txt.= "</td></tr></table>";

echo $txt;
?>
