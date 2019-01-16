<?php
require('include/admin_header.php'); 

$q=mysql_query("select HTTP_REFERER,REMOTE_IP,DATE from statistic where HTTP_REFERER like '%q=%'");
while($r=mysql_fetch_array($q)){

$l=$r[HTTP_REFERER];
$s=strrpos($l,'q=')+2;
$ss=strpos($l,'aq=')+3;
if($s==$ss){$s=strpos($l,'q=')+2;}

$e=strpos($l,'&',$s);
// if(!is_int($e)) {$e=strpos($l,' ',$s);}
if(!is_int($e)) {$e=strlen($l);}
// $t.="[".$l."]";
$t.=$r[REMOTE_IP] ." [GOOGLE] <b title='".urldecode($l)."'>". urldecode(substr($l,$s,$e-$s)). "</b>  ". strftime('%c',$r[DATE])."<br>";

$s=strpos($l,'p=')+2;
$e=strpos($l,'&',$s);
if(!is_int($e)) {$e=strpos($l,' ',$s);}

if(is_int($e) && is_int($t)){
$t.=$r[REMOTE_IP] ." [YAHOO] ". substr($l,$s,$e-$s) . " ". $r[DATE]."<br>";
}
}
?>

<table cellpadding=2 cellspacing=2 width=900 align=center bgcolor=white><tr><td><?php echo $t;?></td></tr></table>