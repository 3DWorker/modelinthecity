<?php

$autorized_chars = array('a','b','c','d','e','f','g','h','i','j','k','l','m',
						 'n','o','p','q','r','s','t','u','v','w','x','y','z',
						 'A','B','C','D','E','F','G','H','I','J','K','L','M',
						 'N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
						 '1','2','3','4','5','6','7','8','9','0','-','_');



function verif_name($name){

$mess = 'OK';
$name = trim($name);	

	for($i=0;$i<strlen($name);$i++){
		for($j=0;$j<strlen(autorized_chars);$j++){
		    if($name[$i] != $autorized_chars[$j])
				$mess = 'Erreur';
		}
	}

return $mess ;
}
			
?>
