<?

$id=$_GET[id];

$txt="<table border=0 cellspacing=0 cellpadding=0 class=modules_header width=100% height=8><tr><td align=left width=100%><H4>&nbsp;&nbsp;" . TEXT_PORTFOLIO_LINKS."</H4></td></tr></table>";

$txt.="<table border=0 cellspacing=0 cellpadding=10 class=modules_description width=100%><tr><td>";
//$txt.= str_replace(chr(10),'<br>',public_book_info($id,"link"));

/*
$link=split(chr(10),public_book_info($id,"link"));

//echo count($link);
for($i=0;$i<count($link);$i++){

if(preg_match("/^[a-zA-Z]+[:\/\/]+[A-Za-z0-9\-_]+\\.+[A-Za-z0-9\.\/%&=\?\-_]+$/i",trim($link[$i])))
 {
$link[$i]=str_replace("http://",'',$link[$i]);
$txt.="<a href=\"http://".$link[$i]."\" target='_blank' title='Visit this link'>".$link[$i]."</a><br>";

}
else {


for($i=0;$i<count($link);$i++){
if(preg_match("/^[A-Za-z0-9\-_]+\\.+[A-Za-z0-9\.\/%&=\?\-_]+$/i",trim($link[$i])))
 {

$txt.="<a href=\"http://".$link[$i]."\" target='_blank' title='Visit this link'>".$link[$i]."</a><br>";

}else{
$txt.= $link[$i];
}

}
}
}
*/

			$query = "SELECT link_title1, link1, link_title2, link2, link_title3, link3, link_title4, link4, link_title5, link5 FROM book_link WHERE id='".(int)$id."'";
			$result=mysql_query($query);
	
			while($r=mysql_fetch_array($result)){
			
			$link1=$r['link1'];
			$link2=$r['link2'];
			$link3=$r['link3'];
			$link4=$r['link4'];
			$link5=$r['link5'];
									
			$link_title1= $r['link_title1']; 
			$link_title2= $r['link_title2']; 
			$link_title3= $r['link_title3']; 
			$link_title4= $r['link_title4']; 
			$link_title5= $r['link_title5']; 									
			
				if(is_int(strpos($link1,'facebook'))){$link_title1="<img src='images/logo_facebook.png' border=0>";}
				if(is_int(strpos($link2,'facebook'))){$link_title2="<img src='images/logo_facebook.png' border=0>";}
				if(is_int(strpos($link3,'facebook'))){$link_title3="<img src='images/logo_facebook.png' border=0>";}
				if(is_int(strpos($link4,'facebook'))){$link_title4="<img src='images/logo_facebook.png' border=0>";}
				if(is_int(strpos($link5,'facebook'))){$link_title5="<img src='images/logo_facebook.png' border=0>";}
				
		
						}
						
					
						
						$txt.="<a href='http://www.modelinthecity.com/$id'><img src='http://www.modelinthecity.com/images/icon_modelinthecity.png' border=0></a> ".TEXT_SEND_FRIEND."<br><br>";
			if($link_title1 && $link1){$txt.="<a href='http://".$link1."' target='_blank'><u>".$link_title1."</u></a><br><br>";}
			if($link_title2 && $link1){$txt.="<a href='http://".$link2."' target='_blank'><u>".$link_title2."</u></a><br><br>";}
			if($link_title3 && $link1){$txt.="<a href='http://".$link3."' target='_blank'><u>".$link_title3."</u></a><br><br>";}
			if($link_title4 && $link1){$txt.="<a href='http://".$link4."' target='_blank'><u>".$link_title4."</u></a><br><br>";}
			if($link_title5 && $link1){$txt.="<a href='http://".$link5."' target='_blank'><u>".$link_title5."</u></a><br><br>";}


$txt.="</tr></td></table>";
echo $txt;



?>