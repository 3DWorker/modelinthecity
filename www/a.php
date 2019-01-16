<?

$a=array('ee','oo','aa','yo','yu','sexy','girl','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','bee','fem','wom','fox','xi','luxe','so','too','femme','feminine');



for($u=0;$u<11;$u++){
  $words="";
  $t=rand(3,6); 
for($i=0;$i<$t;$i++){ 

  srand ((double) microtime() * 300000); 
  $random_number_fr = rand(0,count($a)-1); 
 
$words.= $a[$random_number_fr];
} 

echo $words."<br>";
}

echo "<hr>";
$a=array('a','b','c','d','e','ee','f','g','h','i','l','m','n','o','p','r','s','t','u','v','bb','gg','se','xy','bee');



for($u=0;$u<20;$u++){
  $words="";
  $t=rand(3,4); 
for($i=0;$i<$t;$i++){ 

  srand ((double) microtime() * 100000); 
  $random_number_fr = rand(0,count($a)-1); 
 
$words.= $a[$random_number_fr];
} 

echo $words."<br>";
}


echo "<hr>";
$a=array('a','b','c','d','e','g','l','m','o','i','mode','fem');



for($u=0;$u<10;$u++){
  $words="";
  $t=rand(3,6); 
for($i=0;$i<$t;$i++){ 

  srand ((double) microtime() * 100000); 
  $random_number_fr = rand(0,count($a)-1); 
 
$words.= $a[$random_number_fr];
} 

echo $words."<br>";
}

echo phpinfo();
?>