<?
// Librairie de sécurité
 error_reporting(0);
 define("HOST","webserver");
$dossier="";
$ip=$_SERVER['REMOTE_ADDR'];

if(!$_SERVER['REMOTE_ADDR']){exit;}

 if(substr($_SERVER['REMOTE_ADDR'],0,6)=="88.180"){echo sleep(360);exit;}


$google=is_robot($_SERVER['REMOTE_ADDR']);
if(md5(substr($_SERVER['REMOTE_ADDR'],0,9))!="6f258c23e3e4d4a4832a05aa7d76546e" &&  md5($_SERVER['REMOTE_ADDR'])!="cb3d8ab5304986180159cdecb1483b1a"){
$date=Date('Y-m-d h:i:s');
$fd=fopen("/homez.193/".HOST."/modelinthecity_ip.txt","a+");
if($google){
fwrite($fd,$_SERVER[REMOTE_ADDR].'['.$google.']'.' '.$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"].' '.$date."\n");
}else{
fwrite($fd,$_SERVER[REMOTE_ADDR].'['.$google.']'.' '.$_SERVER["HTTP_REFERER"].' '.$_SERVER['HTTP_USER_AGENT'] .' [' .gethostbyaddr($_SERVER['REMOTE_ADDR']) .'] '.$date."\n");
}
fclose($fd);


connexion();
##already blocked
if(!$_SERVER['REMOTE_ADDR']){sleep(600);exit;}
mysql_query("SELECT * from statistic where IP='" . $_SERVER['REMOTE_ADDR'] . "' and status='BLOCKED'");
if(mysql_affected_rows()>0){sleep(600);exit;}


$q=mysql_query("SELECT pseudo from galerie where IP='" . $_SERVER['REMOTE_ADDR'] . "'");

if($r=mysql_fetch_array($q)){$client_alias=$r['pseudo'];}

@mysql_query("INSERT INTO statistic SET REMOTE_IP='" . $_SERVER['REMOTE_ADDR'] . "', HTTP_REFERER='" . $_SERVER['HTTP_REFERER'] . "', HTTP_REQUEST='" . $_SERVER['REQUEST_URI'] . "', HTTP_USER_AGENT='" . $_SERVER['HTTP_USER_AGENT'] . "', HOST='" . gethostbyaddr($_SERVER['REMOTE_ADDR'])  . "', DATE='" . strtotime("now") . "', HUMAN_DATE='" . date('Y-m-d h:i:s') ."', FRIEND_BOT='" . $google . "', CLIENT='" . $client_alias . "', LANG='" . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "'");
}

  
if(!$google && md5(substr($_SERVER['REMOTE_ADDR'],0,9))!="6f258c23e3e4d4a4832a05aa7d76546e" &&  md5($_SERVER['REMOTE_ADDR'])!="cb3d8ab5304986180159cdecb1483b1a"){
    if($_SERVER['HTTP_USER_AGENT']){
	
$spiders = file('include/spiders_01er44f2d10aold7.txt');
      for ($i=0, $n=sizeof($spiders); $i<$n; $i++) {
        if($spiders[$i]) {
          if( is_integer( strpos(  trim(strtolower($_SERVER[HTTP_USER_AGENT])), trim(strtolower($spiders[$i]))  ) ) ) {
		  

@mysql_query("INSERT INTO statistic SET REMOTE_IP='" . $_SERVER['REMOTE_ADDR'] . "', HTTP_REFERER='" . $_SERVER['HTTP_REFERER'] . "', HTTP_REQUEST='" . $_SERVER['REQUEST_URI'] . "', HTTP_USER_AGENT='" . $_SERVER['HTTP_USER_AGENT'] . "', HOST='" . gethostbyaddr($_SERVER['REMOTE_ADDR'])  . "', DATE='" . strtotime("now") . "', HUMAN_DATE='" . date('Y-m-d h:i:s') ."', FRIEND_BOT='" . $google . "', CLIENT='" . $client_alias . "', LANG='" . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "', STATUS='BLOCKED'");
			
		  sleep(600);exit;
		  
		  }}}
		  }
		  
$hosts_names_2855rtr=gethostbyaddr($_SERVER['REMOTE_ADDR']);
		  
		      if($hosts_names_2855rtr){
	$spiders = file('include/hosts_01er44f2d10aold7.txt');
      for ($i=0, $n=sizeof($hosts); $i<$n; $i++) {
        if($hosts[$i]) {
          if( is_integer( strpos(  trim(strtolower($hosts_names_2855rtr)), trim(strtolower($hosts[$i]))  ) ) ) {
		  
		  @mysql_query("INSERT INTO statistic SET REMOTE_IP='" . $_SERVER['REMOTE_ADDR'] . "', HTTP_REFERER='" . $_SERVER['HTTP_REFERER'] . "', HTTP_REQUEST='" . $_SERVER['REQUEST_URI'] . "', HTTP_USER_AGENT='" . $_SERVER['HTTP_USER_AGENT'] . "', HOST='" . gethostbyaddr($_SERVER['REMOTE_ADDR'])  . "', DATE='" . strtotime("now") . "', HUMAN_DATE='" . date('Y-m-d h:i:s') ."', FRIEND_BOT='" . $google . "', CLIENT='" . $client_alias . "', LANG='" . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "', STATUS='BLOCKED'");
	  sleep(600);exit;
		  
		  }}}}
		  


    if($_SERVER['REMOTE_ADDR']){
	
$spiders = file('include/BAD_IPS.txt');
      for ($i=0, $n=sizeof($spiders); $i<$n; $i++) {
        if($spiders[$i]) {
          if( is_integer( strpos(   trim(strtolower($_SERVER['REMOTE_ADDR'])),trim(strtolower($spiders[$i]))  ) ) ) {
		  
@mysql_query("INSERT INTO statistic SET REMOTE_IP='" . $_SERVER['REMOTE_ADDR'] . "', HTTP_REFERER='" . $_SERVER['HTTP_REFERER'] . "', HTTP_REQUEST='" . $_SERVER['REQUEST_URI'] . "', HTTP_USER_AGENT='" . $_SERVER['HTTP_USER_AGENT'] . "', HOST='" . gethostbyaddr($_SERVER['REMOTE_ADDR'])  . "', DATE='" . strtotime("now") . "', HUMAN_DATE='" . date('Y-m-d h:i:s') ."', FRIEND_BOT='" . $google . "', CLIENT='" . $client_alias . "', LANG='" . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "', STATUS='BLOCKED'");
			
		  sleep(600);exit;
		  
		  }}   }}
		  

		 if(!$_SERVER['HTTP_ACCEPT_LANGUAGE']){
		 	 connexion();
		 @mysql_query("INSERT INTO statistic SET REMOTE_IP='" . $_SERVER['REMOTE_ADDR'] . "', HTTP_REFERER='" . $_SERVER['HTTP_REFERER'] . "', HTTP_REQUEST='" . $_SERVER['REQUEST_URI'] . "', HTTP_USER_AGENT='" . $_SERVER['HTTP_USER_AGENT'] . "', HOST='" . gethostbyaddr($_SERVER['REMOTE_ADDR'])  . "', DATE='" . strtotime("now") . "', HUMAN_DATE='" . date('Y-m-d h:i:s') ."', FRIEND_BOT='" . $google . "', CLIENT='" . $client_alias . "', LANG='" . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "', STATUS='HUMAN VERIF'");
		 
	
		 mysql_query("select * from human where IP='" . $_SERVER['REMOTE_ADDR'] ."' and SESSION='" . session_id() ."'");

		 if(mysql_affected_rows()<1){
		header('location:http://www.modelinthecity.com/human.php');
		}
	}

}

function status_online($id){

mysql_query("select * from whoisonline where customer_id='".$id."'");
if(mysql_affected_rows()>0){return TEXT_ONLINE;}else{return TEXT_OFFLINE;}
}


function getimagenumber($id){
mysql_query("SELECT * FROM photo WHERE galerie='X$id'"); 
return mysql_affected_rows();  
}
function get_level($id){
 $q=mysql_query("select level from account where member_id='".(int)$id."'");
if($r=mysql_fetch_array($q)){ $level=$r['level'];}
return $level;
}

function public_info($mitc,$q){

 connexion();  
   $query = mysql_query("SELECT * FROM galerie WHERE id='$mitc'"); 

if($r = mysql_fetch_array($query)){

$year=$r["age"];
$month=$r["mois"] ;
$day=$r["jour"]; 
$age=$day."-".$month."-".$year;
$age=Date('Y')-$year;
if($month > Date('m')){$age--;}

$m=array(
"pseudo" => $r["pseudo"],
"nom" => $r["nom"],
"prenom" => $r["prenom"],
"email" => $r["email"],
"gender" => $r["genre"],
"hauteur" => $r["hauteur"],
"taille" => $r["taille"],
"hanche" => $r["hanche"],
"cheveux"=> $r["cheveux"],
"confection" => $r["confection"],
"pointures" => $r["pointures"],
"yeux" => $r["yeux"],
"poitrine" => $r["poitrine"],
"age"=>$age,
"zipcode"=>$r["departement"],
"adresse"=>$r["adresse"],
"ville"=>ucfirst(strtolower($r["ville"])),
"pays"=>$r["pays"],
"hair"=>$r["cheveux"],
"eyes"=>$r["yeux"],
"telephone"=>$r["telephone"],
"categorie" => $r["categorie"],
"visit" => $r["compteur"],
"style" => $r["style"],
"hair_style" =>$r["hair_style"]);

}
return $m[$q];
}

function public_book_info($mitc,$q){
 connexion();  
 
if($_SESSION['languages']=="french"){$v="dd.name_fr";}else{$v="dd.name";}


 mysql_query("SELECT * FROM photo WHERE galerie='X".$mitc."'"); 
$nb=mysql_affected_rows();

   $query = mysql_query("SELECT dd.countries_name,dd.countries_iso_code_2 FROM galerie d, countries dd WHERE d.id='$mitc' and dd.countries_iso_code_2=d.pays"); 
if($r = mysql_fetch_array($query)){ 
 $country_name=convertUTF8(substr(ucfirst($r["countries_name"]),0,11))."&nbsp;<img src='images/flags/small/" .strtolower($r[countries_iso_code_2]).".png'>";
 }
   $query = mysql_query("SELECT ".$v." as name FROM galerie d, categorie dd WHERE d.id='$mitc' and d.categorie=dd.id"); 
if($r = mysql_fetch_array($query)){ $category_name=ucfirst($r[name]); }
    $query = mysql_query("SELECT ".$v." as name, d.genre as _gender FROM galerie d, categorie_model_gender dd WHERE d.id='$mitc' and d.genre=dd.id"); 
if($r = mysql_fetch_array($query)){ $gender=ucfirst($r[name]);$_gender=$r[_gender]; }
     $query = mysql_query("SELECT dd.name FROM galerie d, categorie_model_height dd WHERE d.id='$mitc' and d.hauteur=dd.id"); 
if($r = mysql_fetch_array($query)){ $height=$r[name]; }
      $query = mysql_query("SELECT dd.name FROM galerie d, categorie_model_bust dd WHERE d.id='$mitc' and d.poitrine=dd.id"); 
if($r = mysql_fetch_array($query)){ $bust=$r[name]; }
       $query = mysql_query("SELECT dd.name FROM galerie d, categorie_model_waist dd WHERE d.id='$mitc' and d.taille=dd.id"); 
if($r = mysql_fetch_array($query)){ $waist=$r[name]; }
        $query = mysql_query("SELECT dd.name FROM galerie d, categorie_model_hips dd WHERE d.id='$mitc' and d.hanche=dd.id"); 
if($r = mysql_fetch_array($query)){ $hips=$r[name]; }
         $query = mysql_query("SELECT dd.name FROM galerie d, categorie_model_shoes dd WHERE d.id='$mitc' and d.pointures=dd.id"); 
if($r = mysql_fetch_array($query)){ $shoes=$r[name]; }
          $query = mysql_query("SELECT ".$v." as name FROM galerie d, categorie_model_hair dd WHERE d.id='$mitc' and d.cheveux=dd.id"); 
if($r = mysql_fetch_array($query)){ $hair=ucfirst($r[name]); }
          $query = mysql_query("SELECT ".$v." as name FROM galerie d, categorie_model_eyes dd WHERE d.id='$mitc' and d.yeux=dd.id"); 
if($r = mysql_fetch_array($query)){ $eyes=ucfirst($r[name]); }
          $query = mysql_query("SELECT ".$v." as name FROM galerie d, categorie_model_hair_style dd WHERE d.id='$mitc' and d.hair_style=dd.id"); 
if($r = mysql_fetch_array($query)){ $hair_style=ucfirst($r[name]); }

          $query = mysql_query("SELECT datecrea FROM galerie WHERE id='$mitc'"); 
if($r = mysql_fetch_array($query)){ $datecrea=$r[datecrea]; }

 $bust=explode('-',$bust);

 $bust_us=str_replace("US","",$bust[0]);
 $bust_eu=str_replace("EU","",$bust[1]);
 
 $waist=explode('-',$waist);

 $waist_us=str_replace("US","",$waist[0]);
 $waist_eu=str_replace("EU","",$waist[1]);
 
  $hips=explode('-',$hips);

 $hips_us=str_replace("US","",$hips[0]);
 $hips_eu=str_replace("EU","",$hips[1]);
 
 if($_SESSION['languages']=="french"){  $measurement=trim($bust_eu)."-".trim($waist_eu)."-".trim($hips_eu);}  else{ $measurement=trim($bust_us)."-".trim($waist_us)."-".trim($hips_us);}
 
 if($_gender==1){$measurement=preg_replace('/[A-Za-z]+/','',$measurement);}
 
 $_height=explode('(',$height);
  $height_us=str_replace("US","",$_height[0]);
$height_eu=str_replace(")","",$_height[1]);

$height_eu=str_replace("EU","",$height_eu);

$height_us=str_replace("US","",$height_us);

  if($_SESSION['languages']=="french"){ $height=$height_eu;}else{$height=$height_us;}
 
  if($_SESSION['languages']=="french"){$datecrea=strftime('%d %B %Y',$datecrea);}else{$datecrea=strftime('%B %d, %Y',$datecrea);}
  
  $query = mysql_query("SELECT * FROM book_index WHERE id='$mitc'"); 
if($r = mysql_fetch_array($query)){

if($r[vip]==1){$vip="<img src='images/badge_vip.gif' border=0>";}else{$vip="";}

$presentation=str_replace(chr(10),"<br>", $r["presentation"]);
$m=array(
"country" => $country_name,
"titre" => convertUTF8($r["titre"]),
"photo" => $r["photo"],
"presentation" => convertUTF8($presentation),
"credit" => convertUTF8($r["credit"]),
"link" => $r["lien"],
"vip" => $r["vip"],
"nbr"=>$nb,
"datecrea"=>$datecrea,
"category_name"=>$category_name,
"gender"=>$gender,
"height"=>$height,
"bust"=>$bust,
"waist"=>$waist,
"hips"=>$hips,
"shoes"=>$shoes,
"hair"=>$hair,
"hair_style"=>$hair_style,
"eyes"=>$eyes,
"measurement"=> $measurement,
"vip"=>$vip
);
}

return $m[$q];
}


function friends($id){

 connexion();  

  $q=mysql_query("SELECT d.client_id, dd.photo, ddd.pseudo FROM friends d, book_index dd, galerie ddd WHERE d.friend_id='".$id."' and dd.id=d.client_id and d.client_id=ddd.id and d.status='2'  and ddd.valid='1' limit 40"); 

 
 if(mysql_affected_rows()>0){ 
 
 $txt="<table class=modules valign=top border=0><tr>";
 $a=0;
while($r=mysql_fetch_array($q)){$a++;

if($client_test==1){$client=$r[friend_id];}elseif($client_test==2){$client=$r[client_id];}
   
$foto="galerie/".$client."/index/".$r[photo];
$size=getimagesize($foto);
$ratio=$size[1]/$size[0];
$maxW=150;
$maxH=150;
if($ratio>1){$sizeH=$maxH;$sizeW=$sizeH/$ratio;}else
if($ratio==1){$sizeH=$maxH;$sizeW=$maxW;}else
{$sizeW=$maxW;$sizeH=$sizeW*$ratio;}

$txt.="<td align=center valign=top><a href='./".$client."' title='Visit the ".ucfirst($categ)." portfolio of ".ucfirst($r[pseudo])."'>".$categ."<br><img src='".$foto."' width='".$sizeW."' height='".$sizeH."' border=0><br>". ucfirst($r[pseudo])."</a></td>";

if($a==4){$a=0;$txt.="</tr><tr>";}
}
if($a<4){$txt.="</tr>";}
$txt.="</table>";
return $txt;}
}


function conversion_size($base,$val){

if($_SESSION['languages']=="french"){$v="name_fr as ";}else{$v="name as";}

  $query = mysql_query("SELECT ".$v." namer FROM categorie_model_$base WHERE id='$val'"); 

if($r = mysql_fetch_array($query)){

return $r[namer];
}
}

function test_inscription($id){
 connexion(); 
 if(public_info($_SESSION[modelinthecity],'categorie')==2){$add=" and hauteur!='' and poitrine!='' and taille!='' and hanche!='' and pointures!='' and cheveux!='' and yeux!=''";}
 
mysql_query("SELECT * FROM galerie WHERE id='$id' and age!='' and genre!=''  and ville!=''  and departement!=''  and pays!='' and categorie!='' and telephone!=''$add"); 
 
if(mysql_affected_rows()>0){return "true";}else{return "false";}
}

function invalid($id){

mysql_query("SELECT * FROM galerie WHERE id='".$id."' and valid='1'");  
if(mysql_affected_rows()>0){mysql_query("UPDATE galerie set valid='0' WHERE id='".$id."'"); }
}

function test_inscription_book($id){
 connexion();  
mysql_query("SELECT * FROM book_index WHERE id='$id' and photo!='' and CHAR_LENGTH(presentation)>60");  
if(mysql_affected_rows()>0){return true;}else{invalid($id);return false;}
}

function test_inscription_presentation($id){
 connexion();  
mysql_query("SELECT * FROM book_index WHERE id='$id' and CHAR_LENGTH(presentation)>60");  
if(mysql_affected_rows()>0){return true;}else{invalid($id);return false;}
}

function test_inscription_photo($id){
 connexion();  
mysql_query("SELECT * FROM book_index WHERE id='$id' and photo!=''");  
if(mysql_affected_rows()>0){return true;}else{invalid($id);return false;}
}

function test_inscription_title($id){
 connexion();  
mysql_query("SELECT * FROM book_index WHERE id='$id'");  
if(mysql_affected_rows()>0){return true;}else{invalid($id);return false;}
}

function test_inscription_gallery($id){

 
 mysql_query("SELECT * FROM galerie WHERE id='".$id."' and categorie='9'");  //article writer
if(mysql_affected_rows()>0){return true;}

mysql_query("SELECT * FROM photo WHERE galerie='X".$id."' and nom!=''");  
if(mysql_affected_rows()>0){return true;}else{invalid($id);return false;}
}

function test_validation($id){
 connexion();  
mysql_query("SELECT * FROM galerie WHERE id='".$id."' and valid='1'");  
if(mysql_affected_rows()>0){return true;}else{return false;}
}

function test_all($id){
 connexion();  
if( test_inscription($id)==true && test_inscription_book($id)==true && test_inscription_presentation($id)==true && test_inscription_photo($id)==true && test_inscription_title($id)==true && test_inscription_gallery($id)==true){return true;}else{return false;}
}



function disksize($id){
 connexion(); 
######"recherche taille disk
$maxsize="5000000";//4mo
$disksize=0;
$query = "SELECT space FROM disk WHERE id='$id'"; 
 $result = mysql_query($query); 
while( $r = mysql_fetch_array($result)){

$disksize+=$r[0];
}

return $disksize=$maxsize+$disksize;
}


//////////////////////////////////////////////////////////////////////////////////
function show_gal($categorie=0,$colone=1,$max=15){

// $dat='<div id="gal"><table width="98%" border="1" cellspacing="0" cellpadding="0" align="center" bordercolor="#ffffff" style="border:1px solid #ffffff">';

if((int)$categorie){$add="and d.categorie='$categorie'";}else{$add="";}
$a=0;

$query = "SELECT d.id,d.categorie,d.pseudo,d.pays,d.ville,dd.presentation,ddd.countries_name FROM galerie d, book_index dd, countries ddd WHERE d.id=dd.id AND CHAR_LENGTH(dd.presentation)>50  AND d.valid>=1 AND ddd.countries_iso_code_2=d.pays $add ORDER BY rand() LIMIT $max";// 
	$result = mysql_query($query);

	while ($r=mysql_fetch_array($result)) { $a++;
		$idph = $r["id"];
		$pseudo=convertUTF8(substr(ucfirst(strtolower($r[pseudo])),0,12));
		$pseudo1=uconvertUTF8(cfirst(strtolower($r[pseudo])));
		$pays=strtolower($r[pays]).".png";
$country=convertUTF8($r[countries_name]);
		$ville=convertUTF8($r[ville]);
		$catego = $r["categorie"];
		
		$q1=mysql_query("SELECT name from categorie where id='$catego'");
		while ($r1=mysql_fetch_array($q1)) {		
		$categorie_name=convertUTF8($r1[name]);
		}
		
		$query3 = "SELECT photo,presentation FROM book_index WHERE id='$idph' LIMIT 1";
		$result3 = mysql_query($query3);
		$r3 = mysql_fetch_array($result3);
				$nomp = str_replace('.jpg','_small.jpg',$r3["photo"]);

$presentation=strtolower($r3[presentation]);
$presentation=substr($presentation,0,180);
$presentation=str_replace("\\","",$presentation);
$presentation=str_replace(", ",",",$presentation);
$presentation=str_replace(",",", ",$presentation);
$presentation=str_replace("...","",$presentation);
$presentation=substr($presentation,0,250);
$presentation=str_replace("photos","<strong>photos</strong>",$presentation);
$presentation=str_replace("photographie","<strong>photo</strong>",$presentation);
$presentation=str_replace("photo","<strong>photo</strong>",$presentation);
$presentation=str_replace("modèle","<strong>modèle</strong>",$presentation);
$presentation=str_replace("photographer","<strong>photographer</strong>",$presentation);
$presentation=str_replace("book","<strong>book</strong>",$presentation);
$presentation=str_replace("mannequin","<strong>Mannequin</strong>",$presentation);
$presentation=str_replace("mode","<strong>Mode</strong>",$presentation);
$presentation=str_replace("modeling","<strong>Modeling</strong>",$presentation);
$presentation=str_replace("shooting","<strong>shooting</strong>",$presentation);

$presentation=convertUTF8(ucfirst($presentation). " ...");


$dat.="<div id='gal'><table width='98%' border='0' cellspacing='0' cellpadding='0' align='center'><tr >
<td align=center width=100% style='CURSOR:pointer;' onclick='location.href=".$idph.";'>
<table border='0' width='100%' bgcolor='#f2f2f2' onmouseover=\"this.style.backgroundColor='#ffffff';\" onmouseout=\"this.style.background='#f2f2f2';\" cellspacing=0 cellpadding=0><tr><td align=left width=5% valign=top><div align=center>
<img src='./galerie/$idph/index/$nomp' width=80 height=112 border=0 hspace=4 vspace=4><br><b>$pseudo</b><!--br>$categorie_name--></div></td><td valign=top width=95%>$pseudo1 is <strong>$categorie_name</strong> in the city of <strong>$ville</strong><br><br><div class=presentation_top>$presentation</div>
</td><td valign=top rowspan=2><img src='./images/flags/small/$pays' width=20 height=13 border=0 vspace=4 hspace=4 title='$country'></td></tr></table></td></tr><tr bordercolor='#000000' style='border:1px solid #000000;'><td align=center>
<div class=gal><a href='./".$idph."' style='CURSOR:pointer;' title='Visit the $categorie_name portfolio of $pseudo'>Visit $pseudo1's <strong>$categorie_name</strong> portfolio >></a></div></td></tr></table></div>
";
//</td></tr><tr height=20 ><td>&nbsp;</td></tr>";

}
//$dat.='</tr></table></div><br><br>';

return $dat;
}

function browse($browse, $order="rand()", $limit="25"){

$colone=1;
// $dat='<table width="98%" border="1" cellspacing="0" cellpadding="0" align="center" bordercolor="#ffffff" style="border:1px solid #ffffff">';

$a=0;
///AND d.valid>=1
//$query = "SELECT d.id,d.categorie,d.pseudo,d.pays,d.ville,dd.presentation FROM galerie d, book_index dd, categorie ddd WHERE d.id=dd.id AND d.categorie=ddd.id AND dd.photo!='' AND dd.presentation!='' $browse ORDER BY $order LIMIT $limit";// 

$query = "SELECT d.id,d.categorie,d.pseudo,d.pays,d.ville,dd.presentation,ddd.countries_name FROM galerie d, book_index dd, countries ddd WHERE d.id=dd.id AND CHAR_LENGTH(dd.presentation)>50  AND d.valid>=1 AND ddd.countries_iso_code_2=d.pays $browse ORDER BY $order LIMIT $limit";// 


//echo $query."<br>";
	$result = mysql_query($query);
	
		$nb=mysql_affected_rows();
		
// $dat.='<td colspan='.$colone.' align=right><b>We found '.$nb .' result(s)&nbsp;&nbsp;&nbsp;</b><br><br></td></tr><tr>';


	
	if($nb<1){return "<table class=information><tr><td>No match found</td></tr></table>";}elseif($nb>25){return "<table class=information><tr><td>Results exceed limit</td></tr></table>";}


while ($r=mysql_fetch_array($result)) { $a++;
		$idph = $r["id"];
		$pseudo=convertUTF8(substr(ucfirst(strtolower($r[pseudo])),0,15));
		$pseudo1=convertUTF8(ucfirst(strtolower($r[pseudo])));
		$pays=strtolower($r[pays]).".png";
		$country=convertUTF8($r[countries_name]);
		$ville=convertUTF8(ucfirst($r[ville]));
		$catego = $r["categorie"];
		
		$q1=mysql_query("SELECT name from categorie where id='$catego'");
		while ($r1=mysql_fetch_array($q1)) {		
		$categorie_name=convertUTF8($r1[name]);
		}
		
		$query3 = "SELECT photo,presentation FROM book_index WHERE id='$idph' LIMIT 1";
		$result3 = mysql_query($query3);
		$r3 = mysql_fetch_array($result3);
				$nomp = str_replace('.jpg','_small.jpg',$r3["photo"]);
		
		if($catego==2){$more="<hr>".
		TEXT_AGE." ".public_info($idph,'age')." | ".
		TEXT_HAIR ." ".conversion_size('hair',public_info($idph,'hair'))." | ".
		TEXT_EYES ." ".conversion_size('eyes',public_info($idph,'eyes'))." | ".

		TEXT_HEIGHT. " ".public_book_info($idph,'height')." ... ";
				/*
		"Bust: ".conversion_size('bust',public_info($idph,'poitrine'))." | ".
		"Waist ".conversion_size('waist',public_info($idph,'taille'))." | ".
		"Hips: ".conversion_size('hips',public_info($idph,'hanche'))." | ".
		"Shoes ".conversion_size('shoes',public_info($idph,'pointures'));
		*/
		}
		if($catego==1){$more="<hr>".
		TEXT_AGE." ".public_info($idph,'age');
			}

$presentation=strtolower($r3[presentation]);

$presentation=str_replace("\\","",$presentation);
$presentation=str_replace(", ",",",$presentation);
$presentation=str_replace(",",", ",$presentation);
$presentation=substr($presentation,0,230)." ...";
if(strlen($presentation)<115)$presentation.="<br><br>";
/*
$presentation=str_replace("photos","<strong>photos</strong>",$presentation);
$presentation=str_replace("photographie","<strong>photo</strong>",$presentation);
$presentation=str_replace("photo","<strong>photo</strong>",$presentation);
$presentation=str_replace("modèle","<strong>modèle</strong>",$presentation);
$presentation=str_replace("photographer","<strong>photographer</strong>",$presentation);
$presentation=str_replace("book","<strong>book</strong>",$presentation);
$presentation=str_replace("mannequin","<strong>Mannequin</strong>",$presentation);
$presentation=str_replace("mode","<strong>Mode</strong>",$presentation);
$presentation=str_replace("modeling","<strong>Modeling</strong>",$presentation);
$presentation=str_replace("shooting","<strong>shooting</strong>",$presentation);
*/
$presentation=convertUTF8(ucfirst($presentation));

/*
$dat.="<div id='gal1'><table width='98%' border='0' cellspacing='0' cellpadding='0' align='center' ><tr>
<td align=center width=100% style='CURSOR:pointer;' onclick='location.href=".$idph.";'>
<table border='0' width='100%' cellpadding=4 bgcolor='#f2f2f2' onmouseover=\"this.style.backgroundColor='#ffffff';\" onmouseout=\"this.style.background='#f2f2f2';\" cellspacing=0 cellpadding=0 title=\"Visit $pseudo's $categorie_name portfolio\"><tr><td align=left width=10%><div align=center>
<img src='./galerie/$idph/index/$nomp' width=80 height=112 title=\"$pseudo\r\n$categorie_name\" border=0 hspace=2 vspace=2><br><b>$pseudo</b><br>$categorie_name</div></td><td valign=top align=left width=90%><b><br>$pseudo1</b> is <strong>$categorie_name</strong> in the city of <strong>$ville</strong><br><br><div class=presentation_top>$presentation</div><br>". $more."
</td><td valign=top rowspan=2 align=right><img src='./images/flags/small/$pays' width=20 height=13 border=0 hspace=4 vspace=4 title='$country'></td></tr></table></td></tr><tr bordercolor='#000000' style='border:1px solid #000000;'><td align=center><div class=gal1><table width=100%><tr><td align=right ><a href='./".$idph."'  style='CURSOR:pointer;' title=\"Visit $pseudo's $categorie_name portfolio\"><font color=white><b>Visit $pseudo's </b><strong>$categorie_name portfolio</strong> >></font></a></td></tr></table></div></td>
</tr></table></div>
";
*/
$dat.="<div id='gal1'><table width='98%' border='0' cellspacing='0' cellpadding='0' align='center' ><tr>
<td align=center width=100% style='CURSOR:pointer;' onclick='location.href=".$idph.";'>
<table border='0' width='100%' cellpadding=4 bgcolor='#f2f2f2' onmouseover=\"this.style.backgroundColor='#ffffff';\" onmouseout=\"this.style.background='#f2f2f2';\" cellspacing=0 cellpadding=0 title=\"".TEXT_ADMIN_PORTFOLIO__TITLE. " $pseudo ".public_book_info($idph,'category_name')."\"><tr><td align=left width=10%><div align=center>
<img src='./galerie/$idph/index/$nomp' title=\"$pseudo\r\n".public_book_info($idph,'category_name')."\" border=0 hspace=2 vspace=2><br><!--b>$pseudo</b><br-->".public_book_info($idph,'category_name')."</div></td><td valign=top align=left width=90%><br><span class='presentation'>$pseudo1 ". TEXT_BE." <strong>".public_book_info($idph,'category_name')."</strong> ". TEXT_IN_THE_CITY." $ville</span><br><br><div class='presentation_top'>$presentation</div><br>". $more."
</td><td valign=top rowspan=2 align=right><img src='./images/flags/small/$pays' width=20 height=13 border=0 hspace=4 vspace=4 title='$country'></td></tr></table></td></tr><tr bordercolor='#000000' style='border:1px solid #000000;'><td align=center><div class=gal1><table width=100%><tr><td align=right ><a href='./".$idph."'  style='CURSOR:pointer;'><font color=white><b>".TEXT_ADMIN_PORTFOLIO__TITLE. " $pseudo </b> >></font></a></td></tr></table></div></td>
</tr></table></div>
";

// if($a==$colone){$dat.='</tr><tr>';$a=0;}

}
// $dat.='</tr></table>';

return $dat;
}

function show_style($id){
$a=0;
$data_style="| ";
if($_SESSION['languages']=="french"){$v="name_fr";}else{$v="name";}

     $query = mysql_query("SELECT style FROM galerie where id='". (int)$id."'"); 
	 if($r = mysql_fetch_array($query)){$style=$r['style'];}
	 
	 $style=explode('-',$style);
	 for($i=0;$i<count($style);$i++){
 
if($style[$i]=="on"){$a++;
if($a<6){
      $query = mysql_query("SELECT ".$v." as name FROM categorie_photographer_style where id='".($i+1)."'"); 
if($r = mysql_fetch_array($query)){ $data_style.=$r['name'] .", ";}
}

}


}
return $data_style. " ...";

}


function show_gal_test($categorie=0,$colone=1,$max=15, $age=0){

// $dat='<table width="98%" border="1" cellspacing="0" cellpadding="0" align="center" bordercolor="#ffffff" style="border:1px solid #ffffff">';

if((int)$categorie){$add="and d.categorie='$categorie'";}else{$add="";}
$a=0;
//if($age==1){$add.= "and age>= ".(Date('Y')-16);}else{$add.= "and age< ".(Date('Y')-16);}

$query = "SELECT d.id,d.categorie,d.pseudo,d.pays,d.ville,dd.presentation,dd.style,ddd.countries_name FROM galerie d, book_index dd, countries ddd WHERE d.id=dd.id AND d.valid='1' AND ddd.countries_iso_code_2=d.pays $add ORDER BY rand() LIMIT $max";// AND CHAR_LENGTH(dd.presentation)>50  
	$result = mysql_query($query);

if(mysql_affected_rows()>0){
	while ($r=mysql_fetch_array($result)) { $a++;
		$idph = $r["id"];
		$id=$r["id"];
		$pseudo=convertUTF8(substr(ucfirst(strtolower($r[pseudo])),0,15));
		$pseudo1=convertUTF8(ucfirst(strtolower($r[pseudo])));
		$pays=strtolower($r[pays]).".png";
		$country=convertUTF8($r[countries_name]);
		$ville=convertUTF8(ucfirst($r[ville]));
		$catego = $r["categorie"];
	
		
		$q1=mysql_query("SELECT name from categorie where id='$catego'");
		while ($r1=mysql_fetch_array($q1)) {		
		$categorie_name=$r1[name];
		}
		
		$query3 = "SELECT photo,presentation FROM book_index WHERE id='$idph' LIMIT 1";
		$result3 = mysql_query($query3);
		$r3 = mysql_fetch_array($result3);
		$nomp = str_replace('.jpg','_small.jpg',$r3["photo"]);
		
		
		if($categorie==2 || $categorie==6){	
		$more="<hr height=2>". TEXT_AGE ." ".public_info($idph,"age")." | ".
		TEXT_HAIR." ".conversion_size('hair',public_info($idph,'hair'))." | ".
		TEXT_EYES." ".conversion_size('eyes',public_info($idph,'eyes'))." | ".

		TEXT_HEIGHT. " ".public_book_info($idph,'height')." ... ";
				/*
		"Bust: ".conversion_size('bust',public_info($idph,'poitrine'))." | ".
		"Waist ".conversion_size('waist',public_info($idph,'taille'))." | ".
		"Hips: ".conversion_size('hips',public_info($idph,'hanche'))." | ".
		"Shoes ".conversion_size('shoes',public_info($idph,'pointures'));
		*/
		}
		if($categorie==1){	
		
		
		
		$more="<hr height=2>";
		//."Age ".public_info($idph,"age") ." ";
		$more.=show_style($idph);
		
		}

$presentation=$r3[presentation];

$presentation=str_ireplace("\\","",$presentation);
$presentation=str_ireplace(", ",",",$presentation);
$presentation=str_ireplace(",",", ",$presentation);
$presentation=substr($presentation,0,230)." ...";
if(strlen($presentation)<115)$presentation.="<br><br>";

$presentation=str_ireplace("photographie","<strong>photo</strong>",$presentation);

$presentation=str_ireplace("modèle","<strong>modèle</strong>",$presentation);
$presentation=str_ireplace("photographer","<strong>photographer</strong>",$presentation);
$presentation=str_ireplace("photographers","<strong>photographers</strong>",$presentation);
// $presentation=str_ireplace("book","<strong>book</strong>",$presentation);
$presentation=str_ireplace("mannequinat","<strong>Mannequinat</strong>",$presentation);
$presentation=str_ireplace("model","<strong>Model</strong>",$presentation);
// $presentation=str_ireplace("mode","<strong>Mode</strong>",$presentation);
$presentation=str_ireplace("modeling","<strong>Modeling</strong>",$presentation);
$presentation=str_ireplace("shooting","<strong>shooting</strong>",$presentation);
// $presentation=str_ireplace("photo","<strong>photo</strong>",$presentation);
$presentation=str_ireplace("photos","<strong>photos</strong>",$presentation);
$presentation=str_ireplace("pinup","<strong>pinup</strong>",$presentation);
// $presentation=str_ireplace("live","<strong>live</strong>",$presentation);
$presentation=str_ireplace("mannequin","<strong>Mannequin</strong>",$presentation);
$presentation=ucfirst($presentation);
// $presentation=str_ireplace(chr(10),"<br>",$presentation);
$presentation=convertUTF8($presentation);

$dat.="<div id='gal1'><table width='98%' border='0' cellspacing='0' cellpadding='0' align='center' ><tr>
<td align=center width=100% style='CURSOR:pointer;' onclick='location.href=".$idph.";'>
<table border='0' width='100%' cellpadding=4 bgcolor='#f2f2f2' onmouseover=\"this.style.backgroundColor='#ffffff';\" onmouseout=\"this.style.background='#f2f2f2';\" cellspacing=0 cellpadding=0 title=\"".TEXT_ADMIN_PORTFOLIO__TITLE. " $pseudo ".public_book_info($idph,'category_name')."\"><tr><td align=left width=10%><div align=center>
<img src='./galerie/$idph/index/$nomp' title=\"$pseudo\r\n".public_book_info($idph,'category_name')."\" border=0 hspace=2 vspace=2><br><!--b>$pseudo</b><br-->".public_book_info($idph,'category_name')."</div></td><td valign=top align=left width=90%><br><span class='presentation'>$pseudo1 ". TEXT_BE." <strong>".public_book_info($idph,'category_name')."</strong> ". TEXT_IN_THE_CITY." $ville</span><br><br><div class='presentation_top'>$presentation</div><br>". $more."
</td><td valign=top rowspan=2 align=right><img src='./images/flags/small/$pays' width=20 height=13 border=0 hspace=4 vspace=4 title='$country'></td></tr></table></td></tr><tr bordercolor='#000000' style='border:1px solid #000000;'><td align=center><div class=gal1><table width=100%><tr><td align=right ><a href='./".$idph."'  style='CURSOR:pointer;'><font color=white><b>".TEXT_ADMIN_PORTFOLIO__TITLE. " $pseudo </b> >></font></a></td></tr></table></div></td>
</tr></table></div>
";

// if($a==$colone){$dat.='</tr><tr>';$a=0;}

}
// $dat.='</tr></table>';
}else{return "This category will be opened current September !<br><BR> Be one of the first to publish your portoflio : <br><br><a href='index.php?page=signup'><div class=button_blue>SIGN UP</div></a>";}
return $dat;
}

// echo convertUTF8('to the Fashion Social Network !');

/*
function private_info($logtatoo){  

 global $base, $membre_id, $pseudo, $prenom, $nom, 
        $email, $adresse, $ddn, $departement, $pays, $rencontre, 
     $cspaff, $cp, $url, $genre, $civilite, $date, 
     $ville, $etudesaff, $telephone, $portable, $operateur, 
     $presentation, $visuel, $fonction, $societe, $datedn,  
     $aff_nom, $galerie, $mailinglist, $niveau, $date_connect, $membre_points, $age,$hauteur,$taille,$hanche,$cheveux,
$confection,$pointures,$yeux,$email,$poitrine,$disksize; 

 connexion(); 
######"recherche taille disk
$maxsize="400000";$disksize=0;
$query = "SELECT space FROM disk WHERE id='$logtatoo'"; 
 $result = mysql_query($query); 
while( $r = mysql_fetch_array($result)){

$disksize+=$r[0];
}

$disksize=$maxsize+$disksize;
###########################


  
 $query = "SELECT * FROM galerie WHERE id='$logtatoo' LIMIT 1"; 
 $result = mysql_db_query($base, $query); 
 $existe = mysql_affected_rows(); 
  
 if($existe > 0){ 
  $r = mysql_fetch_array($result); 
  $membre_id = ScanXss($r["id"]); 
 $id = ScanXss($r["id"]); 
//$categ=$r["categorie"];
  $pseudo = ScanXss($r["pseudo"]); 
  $genre = $r["genre"];
  $prenom = ScanXss($r["prenom"]); 
  $nom = ScanXss($r["nom"]); 
  $age= ScanXss($r["age"]);
  $email = ScanXss($r["email"]); 
  $adresse = ScanXss($r["adresse"]); 
  $ville = ScanXss($r["ville"]); 
$departement = ScanXss($r["departement"]); 
  $pays = $r["pays"];
//modele

$hauteur = ScanXss($r["hauteur"]);
$taille = ScanXss($r["taille"]);
$hanche = ScanXss($r["hanche"]);
$cheveux= ScanXss($r["cheveux"]);
$confection = ScanXss($r["confection"]);
$pointures = ScanXss($r["pointures"]);
$yeux = ScanXss($r["yeux"]);
$poitrine = ScanXss($r["poitrine"]);


  //$cspaff = cspaff($r["csp"]); 
  $cp = ScanXss($r["cp"]); 
  $url = ScanXss($r["url"]); 
   
  $date = $r["date"]; datex(); 
  
  $telephone = ScanXss($r["telephone"]); 

  $galerie = $r["galerie"]; 
  $membre_points = $r["points"]; 
  $mailinglist = $r["mailinglist"]; 

  $presentation = ScanXss($r["presentation"]); 


  $visuel = $r["photo"]; 
  $fonction = ScanXss($r["fonction"]); 
  $societe = ScanXss($r["societe"]); 

 } 
} 
*/

// Fonction de recuperation des infos catégories
function infos_categorie($id){
		   
	connexion();
	$query = "SELECT * FROM categorie WHERE id='$id'";
	$result=mysql_query($query);
	$existe = mysql_affected_rows();
	
	if($existe > 0){
		$r = mysql_fetch_array($result);
		$categ_id = $r["id"];
		
		return $r["name"];
		}

}




function connexion() {
	//global $db,$base;
	require "/homez.193/".HOST."/connex/connexion.inc.php";

}


// Detection du navigateur + choix feuilles de style
function navstyle() {
?>
<script language="javascript">
if ((navigator.appVersion.indexOf("Mac")!=-1) &&(navigator.appVersion.indexOf("MSIE 4.")!=-1) ){
	document.write('<LINK REL=\"stylesheet\" type=text/css href=\"/css/FDstyle_MAC_IE.css\">');}
else if ((navigator.appVersion.indexOf("Mac")!=-1) && (navigator.appVersion.indexOf("MSIE")==-1)){
	document.write('<LINK REL=\"stylesheet\" type=text/css href=\"/css/FDstyle_MAC_NS.css\">');}
else if ((navigator.appVersion.indexOf("MSIE")==-1)){
	document.write('<LINK REL=\"stylesheet\" type=text/css href=\"/css/FDstyle_PC_NS.css\">');}
else {
	document.write('<LINK REL=\"stylesheet\" type=text/css href=\"/css/FDstyle_PC_IE.css\">');}
</script>
<?
}



function getSize($bbase) { 
  global $nfile, $ndir; 
  $size = 0; 
  /* ouverture */ 
  if($dir = opendir($bbase)) { 
    /* listage */ 
    while($entry = readdir($dir)) { 
      /* protection contre boucle infini */ 
      if(!in_array($entry, array(".",".."))) { 
        /* cas dossier, récursion */ 
        if(is_dir($bbase."/".$entry)) { 
          $size += getSize($bbase."/".$entry); 
          $ndir++; 
        /* cas fichier */ 
        } else { 
          $size += filesize($bbase."/".$entry); 
          $nfile++; 
        } 
      } 
    } 
    /* fermeture */ 
    closedir($dir); 
  } 
  return $size; 
} 

function ScanXss($txt,$mail=0){

if($mail==1){//mail
$txt=strtolower($txt);
return preg_replace("[^a-z0-9._@-]", "", $txt);}
elseif($mail==2){//name
$txt=strtolower($txt);
return preg_replace("[^A-Za-z -]", "", $txt);}
elseif($mail==3){//lengede
return preg_replace("[a-zA-Z© -]", "", $txt);
}
elseif($mail==4){//mess
return preg_replace("/[^A-Za-z0-9-,-?-! -]/", "", $txt);
}
else{
$txt=strtolower($txt);
return ereg_replace("[^A-Za-z0-9]", "", $txt);
}

}



function a_md5($toencode,$times)
{
    $salt = 's+(_a*';
    for($zo=0;$zo<$times;$zo=$zo+1)
    {
        $toencode = hash('sha512',salt.$toencode);
        $toencode = md5($toencode.$salt);
    }
    return $toencode;
}


function mail_attach($to , $subject , $message , $view,$d)
{
$from="no-reply@modelinthecity.com";
$typemime='MIME-Version: 1.0';

  $file_id  = md5( uniqid ( rand() )  . $_SERVER['SERVER_NAME']);
$view_n=md5(uniqid ( rand() ) .$view);
$limite = "_parties_".md5(uniqid (rand()));
$mail_mime .= "Content-Type: multipart/mixed;\n";  
$mail_mime .= " boundary=\"----=$limite\"\n\n";
$texte = "------=$limite\n";
$texte .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
$texte .= "Content-Transfer-Encoding: 32bit\n\n";
$texte .= $d;
if($view){$texte .= "<br><br><center><img src=\"cid:$file_id\" border=0><br><br>";}
$texte .= "\n\n";
$texte .= "\n\n";
$texte .= stripslashes($message)."</center>";
$texte .= "\n\n";
$texte .= "\n\n";
$texte .= "------=$limite\n";

if($view){
  $fp = fopen($view, 'rb');
  $content = fread($fp, filesize($view));
  fclose($fp);

  $content_encode = chunk_split(base64_encode($content));

 // $attachement .= "------=$limite\n";
  // $attachement .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
  // $attachement .= "Content-Transfer-Encoding: 8bit\n\n";
  $attachement .= "------=$limite\n";
  $attachement .= "Content-Type: image/gif; name=\"$view_n\"\n";
  $attachement .= "Content-Transfer-Encoding: base64\n";
  $attachement .= "Content-ID: <$file_id>\n\n";
  $attachement .= $content_encode . "\n";
  $attachement .= "\n\n\n------=$limite\n";
}

$subject = stripslashes($subject);
$from = stripslashes($from);

return mail($to, $subject, $texte.$attachement, "From: $from\n".$mail_mime);

}

 if(! function_exists('str_split')) 
    { 
        function str_split($text, $explode = 1) 
        { 
            $array = array(); 
            
            for ($i = 0; $i < strlen($text); $i += $explode) 
            { 
                $array[] = substr($text, $i, $explode); 
            } 
            
            return $array; 
        } 
    } 
function testPassword($password)
{
    if ( strlen( $password ) == 0 )
    {
        return 1;
    }

    $strength = 0;

    /*** get the length of the password ***/
    $length = strlen($password);

    /*** check if password is not all lower case ***/    
    /*** check if password is not all upper case ***/
if(preg_match("/[a-z]+/",$password)){ 
 $strength += 2;
}
if(preg_match("/[A-Z]+/",$password)){
 $strength += 2;
}
if(preg_match("/[0-9]+/",$password)){
 $strength += 2;
}
    /*** check string length is 8 -15 chars ***/
    if($length >= 8 && $length <= 15)
    {
        $strength += 2;
    }

    /*** check if lenth is 16 - 35 chars ***/
    if($length >= 16 && $length <=35)
    {
        $strength += 2;
    }

    /*** check if length greater than 35 chars ***/
    if($length > 35)
    {
        $strength += 3;
    }
    
    /*** get the numbers in the password ***/
    preg_match_all('/[0-9]/', $password, $numbers);
    $strength += count($numbers[0]);

    /*** check for special chars ***/
    preg_match_all('/[|!@#$%&*\/=?,;.:\-_+~^\\\]/', $password, $specialchars);
    $strength += sizeof($specialchars[0]);

    /*** get the number of unique chars ***/
    $chars = str_split($password);
    $num_unique_chars = sizeof( array_unique($chars) );
    $strength += $num_unique_chars * 2;

    /*** strength is a number 1-10; ***/
    $strength = $strength > 99 ? 99 : $strength;
    $strength = floor($strength / 10);

	echo "<script>document.getElementById('progressbar').style.background='#32cd32';
	document.getElementById('progressbar').innerHTML+='<div></div></div>';<script>";
    return  $strength;
}


function test_text($txt){
$txt=trim($txt);
$v=0;
$err=0;
// $mailer=array('gmail','googlemail','yahoo','msn','hotmail','ymail','orange','sfr','online','free.fr','lycos','live.com','neuf','mac','voo','netcourrier','easy-life','wanadoo','sbcglobal',
// 'skynet','kci1','t-online','laposte','belgacom','mail','bbox','libertysurf','planet.nl','rediffmail','rocketmail','me.com');
/*
 preg_match_all('/@/', $txt, $arobase);
$v= sizeof($arobase[0]);
if($v>0){$s=strpos(strrchr($txt,' '),strpos($txt,'@'));}

$pattern = '/^([a-z0-9])(([-a-z0-9._])*([a-z0-9]))*\@([a-z0-9])' .
 '(([a-z0-9-])*([a-z0-9]))+' . '(\.([a-z0-9])([-a-z0-9_-])?([a-z0-9])+)+$/i';
 
 $pattern ='/^[^@]*@[^@]*\.[^@]*$/';
 
$s=preg_replace($pattern, $txt);
// $s=strpos($txt,'@');
 // $t=strpos( $txt, '[at]');if($t>0){$err="For security reasons email addresses are not allowed in your resume - 2";}return $err;
 */

 $txt_array=explode(" ",$txt);

// for($i=0;$i<count($txt_array);$i++){ echo $txt_array[$i]."<br>";}
 exit;
 //return $s;
}


function test_entry($txt){
$txt=str_replace(' ','',$txt);
$txt=str_replace(chr(10),'',$txt);
$txt=strtolower($txt);
$txt=trim($txt);
$txt=strip_tags($txt);

$bad=array("fuck","fuk","suck","suk","sodom","ash","bitch","bite","penis","sida","cocaine","drug","asshole","boob","dick", "viagra");

$ext=array('www','http','.com','.fr','.be','.xxx','.de','.co.uk','.co.no','.eu','.net','.org','.mobi','.info','.biz','.tel','.pro','.job','.aero','.name','.coop','.at','.cz','.dk','.ee','.gr','.hu','.ie','.im','.it','.lv','.li','.me','.nl','.no','.pl','.pt','.ro','.ru','.sk','.es','.se','.ch','gmail','googlemail','yahoo','ymail','free.fr','online.fr','[at]','@','msn.com','hotmail','orange.fr','sfr.fr','lycos','live.com','live.fr','neuf','mac.com','netcourrier','wanadoo','sbcglobal','aol.com','skynet','kci1','t-online','laposte','belgacom','bbox','libertysurf','planet.nl','rediffmail','rocketmail','me.com');
$v=0;
$regex = '/^(?:1(?:[. -])?)?(?:\((?=\d{3}\)))?([2-9]\d{2})' 
        .'(?:(?<=\(\d{3})\))? ?(?:(?<=\d{3})[.-])?([2-9]\d{2})' 
        .'[. -]?(\d{4})(?: (?i:ext)\.? ?(\d{1,5}))?$/';
		
 if(preg_match($regex, $txt)) {return "personal";}

$regex = "/\d{2}\d{2}\d{2}\d{2}\d{2}\b/i";if(preg_match($regex, $txt)) {return "personal";}
$regex = "/\d{2}[|!@#$%&*\/=?,;.:\-_+ ~^\\\]{0,5}\d{2}[|!@#$%&*\/=?!,;.:\-_+ ~^\\\]{0,5}\d{2}[|!@#$%&*\/=?!,;.:\-_+ ~^\\\]{0,5}\d{2}[|!@#$%&*\/=?!,;.:\-_+ ~^\\\]{0,5}\d{2}\b/i";
if(preg_match($regex, $txt)) {return "personal";}

$regex = "/\d{3}[|!@#$%&*\/=?,;.:\-_+ ~^\\\]{0,5}\d{3}[|!@#$%&*\/=?!,;.:\-_+ ~^\\\]{0,5}\d{4}[|!@#$%&*\/=?!,;.:\-_+ ~^\\\]{0,5}\b/i";if(preg_match($regex, $txt)) {return "personal";}

$regex = "/\d{1}[abcdefghijklmnopqrstuvwxyz|!@#$%&*\/=?,;.:\-_+ ~^\\\]{0,5}\d{1}[abcdefghijklmnopqrstuvwxyz|!@#$%&*\/=?,;.:\-_+ ~^\\\]{0,5}\d{1}[abcdefghijklmnopqrstuvwxyz|!@#$%&*\/=?,;.:\-_+ ~^\\\]{0,5}\d{1}[abcdefghijklmnopqrstuvwxyz|!@#$%&*\/=?,;.:\-_+ ~^\\\]{0,5}\d{1}[abcdefghijklmnopqrstuvwxyz|!@#$%&*\/=?,;.:\-_+ ~^\\\]{0,5}\d{1}[abcdefghijklmnopqrstuvwxyz|!@#$%&*\/=?,;.:\-_+ ~^\\\]{0,5}\d{1}[abcdefghijklmnopqrstuvwxyz|!@#$%&*\/=?,;.:\-_+ ~^\\\]{0,5}\d{1}[abcdefghijklmnopqrstuvwxyz|!@#$%&*\/=?,;.:\-_+ ~^\\\]{0,5}\d{1}[abcdefghijklmnopqrstuvwxyz|!@#$%&*\/=?!,;.:\-_+ ~^\\\]{0,5}\d{1}/i";
if(preg_match($regex, $txt)) {return "personal";}


//for($i=0;$i<sizeof($bad);$i++){	if(is_int(strpos($txt,$bad[$i]))){return "bad";}		}

for($i=0;$i<sizeof($ext);$i++){	if(is_int(strpos($txt,$ext[$i]))){return "personal";}}
		
		//if($v>0){return "personal";}elseif($bader>0){return "bad";}	else{return false;}
		return false;
		}

function tep_draw_hidden_field($name='',$value=''){
return "<input type='hidden' name='".$name."' value='".$value."'>";
}		
		
function paypal_info($mitc){

//$business="paypal-payment@".HOST."int.com";
 connexion();  
  $query = mysql_query("SELECT * FROM galerie WHERE id='$mitc'"); 

  if($plan=="silver"){$amount=6;}
  elseif($plan=="gold"){$amount=11;}
    elseif($plan=="platinium"){$amount=15;}
	
	$nb=mysql_affected_rows();
if($r = mysql_fetch_array($query)){

$m=array(
"nom" => $r["nom"],
"prenom" => $r["prenom"],
"email" => $r["email"],
"zipcode" => $r["departement"],
"adresse" => $r["adresse"],
"ville" => $r["ville"],
"pays" => $r["pays"],
"telephone" => $r["telephone"],
//"countries_iso_code_2" => $r["countries_iso_code_2"],
"state" => $r["etat"]);
}

//tep_draw_hidden_field('lc',$m['countries_iso_code_2']) .
if($nb>0){
$process_button_string = "<form name='upgrade_2_gold' action='https://secure.paypal.com/cgi-bin/webscr' method='post' target='_parent'>" .
tep_draw_hidden_field('cmd', '_xclick') .
tep_draw_hidden_field('business', $business) .
tep_draw_hidden_field('item_name','Gold membership') .
tep_draw_hidden_field('amount', '11') .
tep_draw_hidden_field('shipping', '0') .
tep_draw_hidden_field('first_name',$m['prenom']) .
tep_draw_hidden_field('last_name', $m['nom']) .
tep_draw_hidden_field('address1', $m['adresse']) .
tep_draw_hidden_field('city', $m['ville']) .
tep_draw_hidden_field('country', $m['pays']) .
tep_draw_hidden_field('zip', $m['zipcode']) .
tep_draw_hidden_field('state', $m['state']) .
tep_draw_hidden_field('no_shipping','1').
tep_draw_hidden_field('night_phone_b', $m['telephone']) .
tep_draw_hidden_field('email', $m['email']) .
tep_draw_hidden_field('login',$m['email']) .
tep_draw_hidden_field('note', '') .
tep_draw_hidden_field('currency_code', 'USD') .
tep_draw_hidden_field('return', '') .
tep_draw_hidden_field('cancel_return', '') .
tep_draw_hidden_field('pageState','billing') . "</form>";
		
$process_button_string.= "<form name='upgrade_2_platinium' action='https://secure.paypal.com/cgi-bin/webscr' method='post' target='_parent'>" .
tep_draw_hidden_field('cmd', '_xclick') .
tep_draw_hidden_field('business', $business) .
tep_draw_hidden_field('item_name','Platinium membership') .
tep_draw_hidden_field('amount', '15') .
tep_draw_hidden_field('shipping', '0') .
tep_draw_hidden_field('first_name',$m['prenom']) .
tep_draw_hidden_field('last_name', $m['nom']) .
tep_draw_hidden_field('address1', $m['adresse']) .
tep_draw_hidden_field('city', $m['ville']) .
tep_draw_hidden_field('country', $m['pays']) .
tep_draw_hidden_field('zip', $m['zipcode']) .
tep_draw_hidden_field('state', $m['state']) .
tep_draw_hidden_field('no_shipping','1').
tep_draw_hidden_field('night_phone_b', $m['telephone']) .
tep_draw_hidden_field('email', $m['email']) .
tep_draw_hidden_field('login',$m['email']) .
tep_draw_hidden_field('note', '') .
tep_draw_hidden_field('currency_code', 'USD') .
tep_draw_hidden_field('return', '') .
tep_draw_hidden_field('cancel_return', '') .
tep_draw_hidden_field('pageState','billing') . "</form>";

$process_button_string.= "<form name='upgrade_2_silver' action='https://secure.paypal.com/cgi-bin/webscr' method='post' target='_parent'>" .
tep_draw_hidden_field('cmd', '_xclick') .
tep_draw_hidden_field('business', $business) .
tep_draw_hidden_field('item_name','Silver membership') .
tep_draw_hidden_field('amount', '6') .
tep_draw_hidden_field('shipping', '0') .
tep_draw_hidden_field('first_name',$m['prenom']) .
tep_draw_hidden_field('last_name', $m['nom']) .
tep_draw_hidden_field('address1', $m['adresse']) .
tep_draw_hidden_field('city', $m['ville']) .
tep_draw_hidden_field('country', $m['pays']) .
tep_draw_hidden_field('zip', $m['zipcode']) .
tep_draw_hidden_field('state', $m['state']) .
tep_draw_hidden_field('no_shipping','1').
tep_draw_hidden_field('night_phone_b', $m['telephone']) .
tep_draw_hidden_field('email', $m['email']) .
tep_draw_hidden_field('login',$m['email']) .
tep_draw_hidden_field('note', '') .
tep_draw_hidden_field('currency_code', 'USD') .
tep_draw_hidden_field('return', '') .
tep_draw_hidden_field('cancel_return', '') .
tep_draw_hidden_field('pageState','billing') . "</form>";

      return $process_button_string;
	  }else{return false;}
}

function casting_call_waiting($exp_id){

$data="";$a=0;
$q=mysql_query("select d.id, d.title, d.description, d.city,d.date, d.start_date, d.end_date, d.amount, ddd.type, dd.name, d.adult, d.valid, d.country, d.approb from casting d, categorie dd, casting_type ddd where d.exp_id='".$exp_id."'  and d.category=dd.id and d.type=ddd.id");

// $q=mysql_query("select title, type, adult from casting where exp_id='".$exp_id."'");
$nb=mysql_affected_rows();
while($r=mysql_fetch_array($q)){$a++;


$app=explode('-',$r['approb']);
for($i=0;$i<count($app);$i++){$t="";
if($app[$i]=="on"){$t=($i+1);}else{$t=0;}
$q1=mysql_query("select name from casting_approb where id='".$t."'");
if($r1=mysql_fetch_array($q1)){
$approve.=$r1['name'] .' - ';
}
}

if($r['country']){ $q1=mysql_query("select countries_name from countries where countries_iso_code_2='".$r['country']."'");
if($r1=mysql_fetch_array($q1)){$countries_name=$r1['countries_name'];}}

$valid=$r['valid'];
if(!$valid){$data.="<div style='background:orange;color:white;padding:4px;width:140px;font-weight:bold;'><nobr>PENDING APPROVAL </nobr></div>";}
// if(!$r[countries_name]){$r[countries_name]="Not specified";}


$data.=TEXT_UPDATE." ".Date('d F Y \a\t\ h:i:s', $r[date]) ."<br>";

if($r['adult']==2){$data.="<div style='background:red;color:white;width:50px;font-weight:bold;float:left'>ADULT</div>&nbsp;";}

$data.="<big><strong>".convertUTF8(ucfirst($r['title'])). "</strong></big><br><strong>".$r['type']."</strong> casting call for a <strong>".$r['name']."</strong><br>".convertUTF8($r[description])."<br>";
if($countries_name){$data.="<b>".TEXT_LOCATION." : " .convertUTF8($countries_name).", ". convertUTF8($r[city])."<br>";}

if($r['start_date'] && !$r['end_date']){$data.="".TEXT_DATE." : ". strftime('%d %B %Y', $r[start_date]);}
if($r['start_date'] && $r['end_date']){$data.="".TEXT_FROM.": ". strftime('%d %B %Y', $r[start_date]). " ".TEXT_TO." ".strftime('%d %B %Y', $r[end_date])."</b>" ;}
if(!$r['start_date'] && $r['end_date']){$data.=TEXT_DATE_END." : ". strftime('%d %B %Y', $r[end_date]);}
if($a>1){$data.="<hr><br>";}
}
//</a>&nbsp;&nbsp;<a href='index.php?page=casting&act=update'><span id=button_blue>UPDATE</span></a>
 if($valid==2){$data.="<br><a href='index.php?page=casting&act=close' onclick='return confirm(\"This casting call will be deleted, do you agree ?\");'><br><span id=button_blue>Retry</span></div>";}
if(mysql_error()){return mysql_error();}elseif($data && !$valid){return $data;}elseif($data && $valid==2){return "<span style='background:red;color:white;padding:4px;width:70px;font-weight:bold;'>REFUSED</span>&nbsp;<font color=red><b>CAUSES : ".$approve."</b><br><br>" . $data;}else{return "0";}
}



function casting_call_active($exp_id){

if($_SESSION['languages']=="french"){$add="_fr";}

$data="<div style='float:left; width:50%'>";$a=0;
$q=mysql_query("select d.id, d.title, d.description, d.city,d.date, d.start_date, d.end_date, d.amount, ddd.type".$add." as type, dd.name".$add." as name, d.adult, d.country from casting d, categorie dd, casting_type ddd where d.exp_id='".$exp_id."' and d.valid='1' and d.category=dd.id and d.type=ddd.id");

// $q=mysql_query("select title, type, adult from casting where exp_id='".$exp_id."'");
$nb=mysql_affected_rows();
while($r=mysql_fetch_array($q)){$a++;
if($r['country']){ $q1=mysql_query("select countries_name from countries where countries_iso_code_2='".$r['country']."'");
if($r1=mysql_fetch_array($q1)){$countries_name=$r1['countries_name'];}}

$data.="<div style='background:#ccff00;color:white;padding:4px;width:75px;font-weight:bold;'>APPROVED</div>";
if($r['adult']==2){$data.="<div style='background:#ff0000;color:white;padding:4px;width:50px;font-weight:bold;'>ADULT</div>";}
// if(!$r[countries_name]){$r[countries_name]="Not specified";}
$data.= TEXT_UPDATE." ".strftime('%d %B %Y', $r[date]) ."<br><big><strong>".convertUTF8(ucfirst($r['title'])). "</strong></big><br><strong>".$r['type']."</strong> ".TEXT_FOR_A." <strong>".convertUTF8($r['name'])."</strong><br>".convertUTF8(str_replace('§',chr(10),$r[description]))."<br>";

if($countries_name){$data.="<b>".TEXT_LOCATION." : " .convertUTF8($countries_name).", ". convertUTF8($r[city])."<br>";}

if($r['start_date'] && !$r['end_date']){$data.="<b>".TEXT_DATE." : ". strftime('%d %B %Y', $r[start_date]);}
if($r['start_date'] && $r['end_date']){$data.=TEXT_DATE_RANGE." :  ". strftime('%d %B %Y', $r[start_date]). " / ".strftime('%d %B %Y', $r[end_date]) ;}
if(!$r['start_date'] && $r['end_date']){$data.=TEXT_DATE_END." : ". strftime('%d %B %Y', $r[end_date]);}
if($a>1){$data.="<hr><br>";}
}
$data.="<br><a href='index.php?page=casting&act=close' onclick='return confirm(\"This casting call will be deleted, do you agree ?\");'><span id=button_blue>CLOSE</span></a>&nbsp;&nbsp;<a href='index.php?page=casting&act=update'><span id=button_blue>UPDATE</span></a></div>";
if(mysql_error()){return mysql_error();}elseif($data && $nb>0){return $data;}else{return "0";}
}


function casting_calls($select=1, $exp_id=''){


if($_SESSION['languages']=="french"){$add="_fr";}
$q=mysql_query("select d.id, d.exp_id, d.title, d.description, d.city, d.country, d.date, d.start_date, d.end_date, d.amount, ddd.type".$add." as type, dd.name".$add." as name, ddddddd.name".$add." as categorie_name, d.adult, ddddd.photo, dddddd.pseudo from casting d, categorie dd, casting_type ddd, book_index ddddd, galerie dddddd, categorie ddddddd where d.valid='1' and d.category=dd.id and d.type=ddd.id and d.exp_id=ddddd.id and dddddd.id=d.exp_id and dddddd.categorie=ddddddd.id"); //d.exp_id='".$exp_id."'

// $q=mysql_query("select title, type, adult from casting where exp_id='".$exp_id."'");
$nb=mysql_affected_rows();
$data="";
while($r=mysql_fetch_array($q)){$a++;
if($r['country']){ $q1=mysql_query("select countries_name from countries where countries_iso_code_2='".$r['country']."'");
if($r1=mysql_fetch_array($q1)){$countries_name=$r1['countries_name'];}}


$data.="<div id='casting_calls'><table border=0 height=10%>";$a=0;
$data.="<tr><td id='casting_calls_image' valign=top><img src='./galerie/". $r['exp_id']."/index/".	str_replace('.jpg','_small.jpg',$r["photo"]) ."' border=1><!--br>". convertUTF8(ucfirst($r['pseudo']))."<br--><br><b>". ucfirst($r['categorie_name'])."</b></td><td id='casting_calls_text' valign=top>";
if($r['adult']==2){$data.="<div style='background:#ff0000;color:white;padding:4px;width:50px;font-weight:bold;'>ADULT</div>";}

// $data.="Submitted the ".Date('d F Y \a\t\ h:i:s', strtotime($r[date])) ." by ".convertUTF8(ucfirst($r['pseudo']))."<br>";

$data.="<b>".TEXT_FROM." : <a href='http://www.modelinthecity.com/".$r['exp_id']."' target='_blank' title='Visit ".convertUTF8(ucfirst($r['pseudo']))." portfolio'><u>".convertUTF8(ucfirst($r['pseudo']))."</u></a></b><br><strong>".convertUTF8(ucfirst($r['title'])). " ...</strong><br><span><b>".$r['type']."</b> ".TEXT_FOR_A."<b> ".convertUTF8($r['name'])."</b></span><br>";

$data.="<p>".convertUTF8(substr(str_replace(chr(10),'<br>',stripslashes(str_replace('§',' ',$r[description]))),0,140))." ...</p>";//<small>READ MORE</small></p>";

if($countries_name){$data.="<b>".TEXT_LOCATION." : " .convertUTF8($r[city])." ". convertUTF8($countries_name)."&nbsp;<img src='images/flags/small/".strtolower($r['country']).".png'></b><br>";}

if($r['start_date'] && !$r['end_date']){$data.="<b>".TEXT_DATE." : </b>". strftime('%d %B %Y', $r[start_date]);}
if($r['start_date'] && $r['end_date']){$data.="<b>".TEXT_DATE_RANGE." : </b>". strftime('%d %B %Y', $r[start_date]). " / ".strftime('%d %B %Y', $r[end_date])."</b>" ;}
if(!$r['start_date'] && $r['end_date']){$data.="<b>".TEXT_DATE_END." : ". strftime('%d %B %Y', $r[end_date]);}

$data.="<br><a href='./".LINK_CASTINGS."/".$r[id]."' title='Read the casting call of ".convertUTF8(ucfirst($r['pseudo']))."'><span class=button_blue_small style='float:right;color:#fff;'>".TEXT_READ."</span></a></div>";

$data.="</td></tr></table></div>";
}

if(mysql_error()){return mysql_error();}elseif($data){return $data;}else{return "0 results";}
}


###########


function casting_calls_read($id){

if($_SESSION['languages']=="french"){$add="_fr";}
$q=mysql_query("select d.id, d.exp_id, d.title, d.description, d.city,d.date, d.start_date, d.country, d.end_date, d.amount, ddd.type".$add." as type, dd.name".$add." as name, ddddddd.name".$add." as categorie_name, d.adult,  ddddd.photo, dddddd.pseudo from casting d, categorie dd, casting_type ddd, book_index ddddd, galerie dddddd, categorie ddddddd where d.valid='1' and d.category=dd.id and d.type=ddd.id and d.exp_id=ddddd.id and dddddd.id=d.exp_id and dddddd.categorie=ddddddd.id and d.id='".$id."'"); 

$nb=mysql_affected_rows();
$a=0;
while($r=mysql_fetch_array($q)){$a++;
if($r['country']){ $q1=mysql_query("select countries_name from countries where countries_iso_code_2='".$r['country']."'");
if($r1=mysql_fetch_array($q1)){$countries_name=$r1['countries_name'];}}

$data="<div id='casting_calls_read'><table border=0 height=10%><tr><td><a href='../".LINK_CASTINGS."'>< ".TEXT_BACK_MESSAGE."</a></td><td>&nbsp;</td></tr>";
$data.="<tr><td id='casting_calls_image' valign=top><img src='../galerie/". $r['exp_id']."/index/".	str_replace('.jpg','_small.jpg',$r["photo"]) ."' border=1><!--br>". convertUTF8(ucfirst($r['pseudo']))."<br--><br><b>". ucfirst($r['categorie_name'])."</b></td><td id='casting_calls_text' valign=top>";
if($r['adult']==2){$data.="<div style='background:#ff0000;color:white;padding:4px;width:50px;font-weight:bold;'>ADULT</div>";}

$data.="<b>".TEXT_FROM." <a href='http://www.modelinthecity.com/".$r['exp_id']."' target='_blank' title='Visit ".convertUTF8(ucfirst($r['pseudo']))." portfolio'><u>".convertUTF8(ucfirst($r['pseudo']))."</u></a></b>";

$data.="<span style='float:right'><a href='#' onclick=\"javascript:show_page('contact'," .$r['exp_id'].", ". $r['id'].");\"><div class=button_blue>".TEXT_ANSWER."</div></a></span><br>";


$data.="<br>";

// $data.="Submitted the ".Date('d F Y \a\t\ h:i:s', strtotime($r[date])) ." by ".convertUTF8(ucfirst($r['pseudo']))."<br>";
$data.="<h1>".convertUTF8(ucfirst($r['title'])). " ...</h1><br><span><b>".$r['type']."</b> ".TEXT_FOR_A."<b> ".convertUTF8($r['name'])."</b></span><br>";
$data.="<p>".convertUTF8(str_replace('§','<br>',stripslashes($r[description])))."<br></p>";//<small>READ MORE</small></p>";
if($countries_name){$data.="<b>".TEXT_LOCATION." : " .convertUTF8($r[city])." ". convertUTF8($countries_name)."&nbsp;<img src='../images/flags/small/".strtolower($r['country']).".png'></b><br>";}
if($r['start_date'] && !$r['end_date']){$data.="<b>".TEXT_DATE." : </b>". strftime('%d %B %Y',$r[start_date]);}
if($r['start_date'] && $r['end_date']){$data.="<b>".TEXT_DATE_RANGE." : </b>". strftime('%d %B %Y', $r[start_date]). " / ".strftime('%d %B %Y', $r[end_date])."</b>" ;}

$data.="</td></tr></table></div>";
}
if(mysql_error()){return mysql_error();}elseif($data){return $data;}else{return "0 results";}
}


function casting_calls_id($id){
$q=mysql_query("select exp_id from casting where id='".$id."'"); //d.exp_id='".$exp_id."'
if($r=mysql_fetch_array($q)){$exp_id=$r['exp_id'];}
return $exp_id;
}


function convertUTF8($txt){return $txt;
$txt=trim($txt);
$txt=utf8_decode($txt);
$data="";
for($i=0;$i<strlen($txt);$i++){
$data.= "&#".ord($txt{$i}).";";
}
  $data=str_replace('&#9;','',$data);
  $data=str_replace('&#60;&#72;&#49;&#62;','<H1>',$data);
  $data=str_replace('&#60;&#47;&#72;&#49;&#62;','</H1>',$data);  
  $data=str_replace('&#60;&#72;&#50;&#62;','<H2>',$data);
  $data=str_replace('&#60;&#47;&#72;&#50;&#62;','</H2>',$data);
  $data=str_replace('&#60;&#72;&#51;&#62;','<H3>',$data);
  $data=str_replace('&#60;&#47;&#72;&#51;&#62;','</H3>',$data);
  $data=str_replace('&#60;&#72;&#52;&#62;','<H4>',$data);
  $data=str_replace('&#60;&#47;&#72;&#52;&#62;','</H4>',$data);
  
$data=str_replace('&#60;&#115;&#116;&#114;&#111;&#110;&#103;&#62;','<strong>',$data);
$data=str_replace('&#60;&#47;&#115;&#116;&#114;&#111;&#110;&#103;&#62;','</strong>',$data);
$data=str_replace('&#60;&#112;&#62;','<p>',$data);
$data=str_replace('&#60;&#47;&#112;&#62;','</p>',$data);
$data=str_replace('&#60;&#98;&#114;&#62;','<br>',$data);
$data=str_replace('&#60;&#47;&#115;&#109;&#97;&#108;&#108;&#62;','</small>',$data);
$data=str_replace('&#60;&#115;&#109;&#97;&#108;&#108;&#62;','<small>',$data);
$data=str_replace('&#60;&#101;&#109;&#62;','<em>',$data);
$data=str_replace('&#60;&#47;&#101;&#109;&#62;','</em>',$data);
$data=str_replace('&#60;&#98;&#62;','<b>',$data);
$data=str_replace('&#60;&#47;&#98;&#62;','</b>',$data);		 
$data=str_replace('&#60;&#97;&#32;&#104;&#114;&#101;&#102;&#61;&#34;','<a href="',$data);
$data=str_replace('&#34;&#62;','">',$data);
$data=str_replace('&#60;&#47;&#97;&#62;','</a>',$data);

$data=str_replace('&#60;&#100;&#105;&#118;&#62;', '<div>',$data);
$data=str_replace('&#60;&#47;&#100;&#105;&#118;&#62;', '</div>',$data);

return $data;
}

   function is_robot($__ip_){
#GOOGLE
#64.233.160.0 64.233.191.255 WHOIS 
#66.102.0.0 66.102.15.255 WHOIS 
#66.249.64.0 66.249.95.255 WHOIS 
#72.14.192.0 72.14.255.255 WHOIS 
#74.125.0.0 74.125.255.255 WHOIS 
#209.85.128.0 209.85.255.255 WHOIS 
#216.239.32.0 216.239.63.255 WHOIS 



$robot_google=array('64.233.160', '64.233.161', '64.233.162', '64.233.163', '64.233.164', '64.233.165', '64.233.166', '64.233.167', '64.233.168', '64.233.169', '64.233.170', '64.233.171', '64.233.172', '64.233.173', '64.233.174', '64.233.175', '64.233.176', '64.233.177', '64.233.178', '64.233.179', '64.233.180', '64.233.181', '64.233.182', '64.233.183', '64.233.184', '64.233.185', '64.233.186', '64.233.187', '64.233.188', '64.233.189', '64.233.190', '64.233.191', '64.102.0.', '64.102.2.', '64.102.3.', '64.102.4.', '64.102.5.', '64.102.6.', '64.102.7.', '64.102.8.', '64.102.9.', '64.102.10.', '64.102.11.', '64.102.12.', '64.102.13.', '64.102.14.', '64.102.15.', '66.249.64.', '66.249.65.', '66.249.66.', '66.249.67.', '66.249.68.', '66.249.69.', '66.249.70.', '66.249.71.', '66.249.72.', '66.249.73.', '66.249.74.', '66.249.75.', '66.249.76.', '66.249.77.', '66.249.78.', '66.249.79.', '66.249.80.', '66.249.81.', '66.249.82.', '66.249.83.', '66.249.84.', '66.249.85.', '66.249.86.', '66.249.87.', '66.249.88.', '66.249.89.', '66.249.90.', '66.249.91.', '66.249.92.', '66.249.93.', '66.249.94.', '66.249.95.', '72.14.192.', '72.14.193.', '72.14.194.', '72.14.195.', '72.14.196.', '72.14.197.', '72.14.198.', '72.14.199.', '72.14.201.', '72.14.202.', '72.14.203.', '72.14.204.', '72.14.205.', '72.14.206.', '72.14.207.', '72.14.208.', '72.14.209.', '72.14.210.', '72.14.211.', '72.14.212.', '72.14.213.', '72.14.214.', '72.14.215.', '72.14.216.', '72.14.217.', '72.14.218.', '72.14.219.', '72.14.220.', '72.14.221.', '72.14.222.', '72.14.23.', '72.14.224.', '72.14.225.', '72.14.226.', '72.14.227.', '72.14.228.', '72.14.229.', '72.14.230.', '72.14.231.', '72.14.232.', '72.14.233.', '72.14.234.', '72.14.235.', '72.14.236.', '72.14.237.', '72.14.238.', '72.14.239.', '72.14.240.', '72.14.241.', '72.14.242.', '72.14.243.', '72.14.244.', '72.14.245.', '72.14.246.', '72.14.247.', '72.14.248.', '72.14.249.', '72.14.250.', '72.14.251.', '72.14.252.', '72.14.253.', '72.14.254.', '72.14.255.', '74.125.', '209.85.12', '209.85.13', '209.85.14', '209.85.15', '209.85.16', '209.85.17', '209.85.18', '209.85.19', '209.85.20', '209.85.21', '209.85.22', '209.85.23', '209.85.24', '209.85.25', '216.239.32.', '216.239.33.', '216.239.34.', '216.239.35.', '216.239.36.', '216.239.37.', '216.239.38.', '216.239.39.', '216.239.40.', '216.239.41.', '216.239.42.', '216.239.43.', '216.239.44.', '216.239.45.', '216.239.46.', '216.239.47.', '216.239.48.', '216.239.49.', '216.239.50.', '216.239.51.', '216.239.52.', '216.239.53.', '216.239.54.', '216.239.55.', '216.239.56.', '216.239.57.', '216.239.58.', '216.239.59.', '216.239.60.', '216.239.61.', '216.239.62.', '216.239.63.');

$robot_msn=array('64.4.0.', '64.4.1.', '64.4.2.', '64.4.3.', '64.4.4.', '64.4.5.', '64.4.6.', '64.4.7.', '64.4.8.', '64.4.9.', '64.4.10.', '64.4.11.', '64.4.12.', '64.4.13.', '64.4.14.', '64.4.15.', '64.4.16.', '64.4.17.', '64.4.18.', '64.4.19.', '64.4.20.', '64.4.21.', '64.4.22.', '64.4.23.', '64.4.24', '64.4.25', '64.4.26', '64.4.27', '64.4.28', '64.4.29', '64.4.30', '64.4.31', '64.4.32', '64.4.33', '64.4.34', '64.4.35', '64.4.36', '64.4.37', '64.4.38', '64.4.39', '64.4.40', '64.4.41', '64.4.42', '64.4.43', '64.4.44', '64.4.45', '64.4.46', '64.4.47', '64.4.48', '64.4.49', '64.4.50', '64.4.51', '64.4.52', '64.4.53', '64.4.54', '64.4.55', '64.4.56', '64.4.57', '64.4.58', '64.4.59', '64.4.60', '64.4.61', '64.4.62', '64.4.63', '65.52.', '65.53.', '65.54.', '65.55.', '207.46.', '207.68.128', '207.68.129', '207.68.130', '207.68.131', '207.68.132', '207.68.133', '207.68.134', '207.68.135', '207.68.136', '207.68.137', '207.68.138', '207.68.139', '207.68.140', '207.68.141', '207.68.142', '207.68.143', '207.68.144', '207.68.145', '207.68.146', '207.68.147', '207.68.148', '207.68.149', '207.68.150', '207.68.151', '207.68.152', '207.68.153', '207.68.154', '207.68.155', '207.68.156', '207.68.157', '207.68.158', '207.68.159', '207.68.160', '207.68.161', '207.68.162', '207.68.163', '207.68.164', '207.68.165', '207.68.166', '207.68.167', '207.68.168', '207.68.169', '207.68.170', '207.68.171', '207.68.172', '207.68.173', '207.68.174', '207.68.175', '207.68.176', '207.68.177', '207.68.178', '207.68.179', '207.68.180', '207.68.181', '207.68.182', '207.68.183', '207.68.184', '207.68.185', '207.68.186', '207.68.187', '207.68.188', '207.68.189', '207.68.190', '207.68.191', '207.68.192', '207.68.193', '207.68.194', '207.68.195', '207.68.196', '207.68.197', '207.68.198', '207.68.199', '207.68.200', '207.68.201', '207.68.202', '207.68.203', '207.68.204', '207.68.205', '207.68.206', '207.68.207');

#YAHOO
#From To WHOIS 
#8.12.144.0 8.12.144.255 WHOIS 

#66.196.64.0 66.196.127.255 WHOIS 
#66.228.160.0 66.228.191.255 WHOIS 
#67.195.0.0 67.195.255.255 WHOIS
#68.142.192.0 68.142.255.255 WHOIS 
#72.30.0.0 72.30.255.255 WHOIS 
#74.6.0.0 74.6.255.255 WHOIS 
#202.160.176.0 202.160.191.255 WHOIS 
#209.191.64.0 209.191.127.255 WHOIS 

$robot_yahoo=array('8.12.144.', '66.196.64.', '66.196.65.', '66.196.66.', '66.196.67.', '66.196.68.', '66.196.69.', '66.196.70.', '66.196.71.', '66.196.72.', '66.196.73.', '66.196.74.', '66.196.75.', '66.196.76.', '66.196.77.', '66.196.78.', '66.196.79.', '66.196.80.', '66.196.81.', '66.196.82.', '66.196.83.', '66.196.84.', '66.196.85.', '66.196.86.', '66.196.87.', '66.196.88.', '66.196.89.', '66.196.90.', '66.196.91.', '66.196.92.', '66.196.93.', '66.196.94.', '66.196.95.', '66.196.96.', '66.196.97.', '66.196.98.', '66.196.99.', '66.196.100.', '66.196.101.', '66.196.102.', '66.196.103.', '66.196.104.', '66.196.105.', '66.196.106.', '66.196.107.', '66.196.108.', '66.196.109.', '66.196.110.', '66.196.111.', '66.196.112.', '66.196.113.', '66.196.114.', '66.196.115.', '66.196.116.', '66.196.117.', '66.196.118.', '66.196.119.', '66.196.120.', '66.196.121.', '66.196.122.', '66.196.123.', '66.196.124.', '66.196.125.', '66.196.126.', '66.196.127.', '66.228.160.', '66.228.161.', '66.228.162.', '66.228.163.', '66.228.164.', '66.228.165.', '66.228.166.', '66.228.167.', '66.228.168.', '66.228.169.', '66.228.170.', '66.228.171.', '66.228.172.', '66.228.173.', '66.228.174.', '66.228.175.', '66.228.176.', '66.228.178.', '66.228.179.', '66.228.180.', '66.228.181.', '66.228.182.', '66.228.183.', '66.228.184.', '66.228.185.', '66.228.186.', '66.228.187.', '66.228.188.', '66.228.189.', '66.228.190.', '66.228.191.', '67.195.', '68.142.192.', '68.142.193.', '68.142.194.', '68.142.195.', '68.142.196.', '68.142.197.', '68.142.198.', '68.142.199.', '68.142.200.', '68.142.201.', '68.142.202.', '68.142.203.', '68.142.204.', '68.142.205.', '68.142.206.', '68.142.207.', '68.142.208.', '68.142.209.', '68.142.210.', '68.142.211.', '68.142.212.', '68.142.213.', '68.142.214.', '68.142.215.', '68.142.216.', '68.142.217.', '68.142.218.', '68.142.219.', '68.142.220.', '68.142.221.', '68.142.222.', '68.142.223.', '68.142.224.', '68.142.225.', '68.142.226.', '68.142.227.', '68.142.228.', '68.142.229.', '68.142.230.', '68.142.231.', '68.142.232.', '68.142.233.', '68.142.234.', '68.142.235.', '68.142.236.', '68.142.237.', '68.142.238.', '68.142.239.', '68.142.240.', '68.142.241.', '68.142.242.', '68.142.243.', '68.142.244.', '68.142.245.', '68.142.246.', '68.142.247.', '68.142.248.', '68.142.249.', '68.142.250.', '68.142.251.', '68.142.252.', '68.142.253.', '68.142.254.', '68.142.255.', '72.30.', '74.6.', '202.160.176.', '202.160.178.', '202.160.179.', '202.160.180.', '202.160.181.', '202.160.182.', '202.160.183.', '202.160.184.', '202.160.185.', '202.160.186.', '202.160.187.', '202.160.188.', '202.160.189.', '202.160.190.', '202.160.191.', '209.191.64.', '209.191.65.', '209.191.66.', '209.191.67.', '209.191.68.', '209.191.69.', '209.191.70.', '209.191.71.', '209.191.72.', '209.191.73.', '209.191.74.', '209.191.75.', '209.191.76.', '209.191.77.', '209.191.78.', '209.191.79.', '209.191.80.', '209.191.81.', '209.191.82.', '209.191.83.', '209.191.84.', '209.191.85.', '209.191.86.', '209.191.87.', '209.191.88.', '209.191.89.', '209.191.90.', '209.191.91.', '209.191.92.', '209.191.93.', '209.191.94.', '209.191.95.', '209.191.96.', '209.191.97.', '209.191.98.', '209.191.99.', '209.191.100.', '209.191.101.', '209.191.102.', '209.191.103.', '209.191.104.', '209.191.105.', '209.191.106.', '209.191.107.', '209.191.108.', '209.191.109.', '209.191.110.', '209.191.111.', '209.191.112.', '209.191.113.', '209.191.114.', '209.191.115.', '209.191.116.', '209.191.117.', '209.191.118.', '209.191.119.', '209.191.120.', '209.191.121.', '209.191.122.', '209.191.123.', '209.191.124.', '209.191.125.', '209.191.126.', '209.191.127.');


$rest='';
for($i=0;$i<count($robot_google);$i++){
$L = strlen($robot_google[$i]);
$search= substr($__ip_,0,$L);
if($robot_google[$i]==$search){$rest="google";}
}

for($i=0;$i<count($robot_msn);$i++){
$L = strlen($robot_msn[$i]);
$search= substr($__ip_,0,$L);
if($robot_msn[$i]==$search){$rest="msn";}
}
for($i=0;$i<count($robot_msn);$i++){
$L = strlen($robot_yahoo[$i]);
$search= substr($__ip_,0,$L);
if($robot_yahoo[$i]==$search){$rest="yahoo";}
}
 if(is_integer(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'google'))) {$rest="google";}
 if(is_integer(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'yahoo'))) {$rest="yahoo";}
  if(is_integer(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'msn'))) {$rest="msn";}
   if(is_integer(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'bing'))) {$rest="msn";}
return $rest;
}


function human(){

//echo "<script>confirm('Are you a human?');</script>";

}

  function whoisonline() {

connexion();
	$q=mysql_query("SELECT id, pseudo from galerie where IP='" . $_SERVER['REMOTE_ADDR'] . "'");
##log
if(mysql_affected_rows()>0){
while($r=mysql_fetch_array($q)){
$customer_id=$r['id'];
$alias=$r['pseudo'];
}
}

      $wo_customer_id = $customer_id;
      $wo_full_name = $alias;

    $wo_session_id = session_id();
    $wo_ip_address = $_SERVER['REMOTE_ADDR'];
    $wo_last_page_url = $_SERVER['REQUEST_URI'];
    $current_time = time();
    $xx_mins_ago = ($current_time - 90);


// remove entries that have expired
    mysql_query("delete from whoisonline where time_last_click < '" . $xx_mins_ago . "'");

    $stored_customer_query = mysql_query("select count(*) as count from whoisonline where session_id = '" . $wo_session_id . "'");
    $stored_customer = mysql_fetch_array($stored_customer_query);

    if ($stored_customer['count'] > 0) {
      mysql_query("update whoisonline set customer_id = '" . (int)$wo_customer_id . "', full_name = '" . $wo_full_name . "', ip_address = '" . $wo_ip_address . "', time_last_click = '" . $current_time . "', last_page_url = '" . $wo_last_page_url . "' where session_id = '" . $wo_session_id . "'");
    } else {
     mysql_query("insert into whoisonline (customer_id, full_name, session_id, ip_address, time_entry, time_last_click, last_page_url) values ('" . (int)$wo_customer_id . "', '" . $wo_full_name . "', '" . $wo_session_id . "', '" . $wo_ip_address . "', '" . $current_time . "', '" . $current_time . "', '" . $wo_last_page_url . "')");
    }
  }
  whoisonline();
  

  function statistic_member($id){
  
  // @mysql_query("INSERT INTO statistic SET REMOTE_IP='" . $_SERVER['REMOTE_ADDR'] . "', HTTP_REFERER='" . $_SERVER['HTTP_REFERER'] . "', HTTP_REQUEST='" . $_SERVER['REQUEST_URI'] . "', HTTP_USER_AGENT='" . $_SERVER['HTTP_USER_AGENT'] . "', HOST='" . gethostbyaddr($_SERVER['REMOTE_ADDR'])  . "', DATE='" . strtotime("now") . "', HUMAN_DATE='" . date('Y-m-d h:i:s') ."', FRIEND_BOT='" . $google . "', CLIENT='" . $client_alias . "', LANG='" . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "'");
  
  mysql_query("select REMOTE_IP from statistic where HTTP_REQUEST ='/".(int)$id."' and CLIENT!='". public_info($id,"pseudo")."' and FRIEND_BOT='' and STATUS!='BLOCKED' group by REMOTE_IP");
  return mysql_affected_rows();
  
  }
  
  
function A4($sourcefile,$maxW=120,$maxH=170) {
  
$fileType = strtolower(substr($sourcefile, strlen($sourcefile)-3));

   switch($fileType) {
       case('gif'):
           $sourcefile_id = imagecreatefromgif($sourcefile);
           break;
           
       case('png'):
           $sourcefile_id = imagecreatefrompng($sourcefile);
           break;
           
       default:
           $sourcefile_id = imagecreatefromjpeg($sourcefile);
   }

$const=(297/210);//$const=3/2;
$const1=210/297;//$const=2/3;
$max=2000;
$sourcefile_width=imageSX($sourcefile_id);
$sourcefile_height=imageSY($sourcefile_id);



if($sourcefile_width<$sourcefile_height){$portrait=true;}else{$portrait="";}
$verif_A3_portrait=$sourcefile_height/$sourcefile_width;//1.41
$verif_A3_paysage=$sourcefile_width/$sourcefile_height;


if($portrait==true){
$new_height=$sourcefile_width*$const;
$new_width=$sourcefile_width;
$deb1=$new_width-$sourcefile_width;
$deb2=$new_height-$sourcefile_height;
if($deb1>$deb2){$deb=$deb1;}else{$deb=$deb2;}
}else{// paysage
$new_width=$sourcefile_height;
$new_height=$sourcefile_height*$const1;
$deb1=$new_width-$sourcefile_width;
$deb2=$new_height-$sourcefile_height;
if($deb1>$deb2){$deb=$deb1;}else{$deb=$deb2;}
}
$tempimage = imagecreatetruecolor($new_width-$deb, $new_height-$deb);
$vvv=substr($new_width/$new_height,0,4);
if($new_width>$new_height){//paysage
imagecopy($tempimage, $sourcefile_id,($new_width-$sourcefile_width-$deb)/2,0,0,0, $sourcefile_width, $sourcefile_height);
}else{ imagecopy($tempimage, $sourcefile_id,0,0,0,0, $sourcefile_width, $sourcefile_height);}

        

           ImageJpeg($tempimage,str_replace('.'.$fileType,'_small.'.$fileType,$sourcefile),100);
sleep(2);
		   $size=getimagesize(str_replace('.'.$fileType,'_small.'.$fileType,$sourcefile));
			$src = imagecreatefromjpeg(str_replace('.'.$fileType,'_small.'.$fileType,$sourcefile));
			$ratio=$size[1]/$size[0];
		

if($ratio>1){$sizeH=$maxH;$sizeW=$sizeH/$ratio;}else
if($ratio==1){$sizeH=$maxH;$sizeW=$maxW;}else
{$sizeW=$maxW;$sizeH=$sizeW*$ratio;}
			$dest = imagecreatetruecolor($sizeW,$sizeH);
			ImageCopyResampled($dest,$src,0,0,0,0,$sizeW,$sizeH,$size[0],$size[1]);
				
			imagejpeg($dest,str_replace('.'.$fileType,'_small.'.$fileType,$sourcefile),90);
			imagedestroy($dest);


//imagedestroy($sourcefile_id);
}
?>