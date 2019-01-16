<?

$id=$_GET[id];

$txt="<table border=0 cellspacing=0 cellpadding=0 class=modules_header width=100% height=8><tr><td align=left width=100%><H3>&nbsp;&nbsp;" . TEXT_PORTFOLIO_CREDITS. "</H3></td></tr></table>";

$txt.="<table border=0 cellspacing=0 cellpadding=10 class=modules_description width=100%><tr><td>";
$txt.= stripslashes(str_replace(chr(10),'<br>',public_book_info($id,"credit")));
$txt.="</tr></td></table>";
echo $txt;


?>