<?php

function ScanXss($txt,$mail=0){

$txt=strtolower($txt);

if($mail==1){//mail
return ereg_replace("[^a-z0-9._@-]", "", $txt);}
elseif($mail==2){//name
return ereg_replace("[^A-Za-z -]", "", $txt);
}else{
return ereg_replace("[^A-Za-z0-9]", "", $txt);
}

}
?>