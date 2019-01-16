<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html>
<HEAD>
<title><?php
if($categ==2 && $age==1){//newfaces
echo "New Faces porfolios - Meet New Faces - Model New Faces Portfolio - The Fashion social Network - Modelinthecity.com";
}
elseif($categ==2){//models
echo "Meet Models - Professional Models -Casting for models - Model Portfolios on Modelinthecity.com";
}
elseif($categ==1){//photo
echo "Meet Photographers - Professional Photographers - Photographers Casting call - Photographers Portfolio - The Fashion social Network - Modelinthecity.com";
}
elseif($categ==3){//makeup
echo "Meet Make-up Artists - Professional Make-up Artists - Make-up Artists Casting call - Make-up Artists Portfolio - The Fashion social Network - Modelinthecity.com";
}
elseif($categ==11){//agencie
echo "Meet Modeling Agencies - Professional Modeling Agencies - Modeling Agency Casting call - Modeling Agencies Portfolio - The Fashion social Network - Modelinthecity.com";
}
elseif($categ==7){//agencie
echo "Meet Fashion Stylists- Professional Stylists -  Stylists Casting call -  Stylists Portfolio - The Fashion social Network - Modelinthecity.com";
}
elseif($page=="castingcalls"){
echo "Casting calls for Model Photographer Modeling Agency Make-up Stylist - Find a Paid work - FREE Model Castings - The Fashion social Network - Modelinthecity.com";
}
elseif($page=="browse"){
echo "Search Model Photographer Modeling Agency Make-up Stylist - Find a Talent - The Fashion social Network - Modelinthecity.com";
}
elseif(!$categ){
echo "Model porfolios - Meet professional models - ModelinTheCity.com ";
}
else{
echo "Model porfolios - Meet professional models - ModelinTheCity.com ";
}

?></title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" /><meta Name="author" Content="Modelinthecity productions"><meta name="REVISIT-AFTER" content="5 days"><meta NAME="classification" content="Portfolios, Free portfolio, Meet a Model, Meet Professionals of Fashion, Models, Photographers, Make-up, Stylists, Modeling Agencies, Designers"><meta name="description" content="The Fashion social network. Models, Photographers, Modeling Agencies, Make-up artists, Stylists and Famous Clients ! Create your FREE PORTFOLIO"><link rel="stylesheet" type="text/css" href="<?php echo $location;?>modelfolio.css"><LINK REL="SHORTCUT ICON" href="http://www.modelinthecity.com/favicon.ico"></head>
<?
$i=(int)Date('s');

 if($i>0 && $i<30)$style_add="background:#000 url(".$location."images/modelinthecity_UK.jpg) repeat;background-attachment: fixed;background-size: cover;";
// if($i>=30 && $i<61)$style_add="background:#000 url(".$location."images/modelinthecity_USA.jpg) repeat;";
if($i>=0 && $i<61)$style_add="background:url(".$location."images/bg_colors.jpg) repeat-x;background-attachment: fixed";
// if($i>=30 && $i<45)$style_add="background:#000 url(".$location."images/modelinthecity_FR.jpg) repeat;";
// if($i>=45 && $i<=60)$style_add="background:#000 url(".$location."images/modelinthecity_SU.jpg) repeat;";
 // if($i>=40 && $i<=60)$style_add="background:#000 url(".$location."images/modelinthecity_IT.jpg) repeat;";

//$style_add="background:#ffffff;";
//$style_add="background:url(".$location."images/modelinthecity_UK.jpg) repeat;";

if($page=="confirm"){$__function=" onload='init();'";}else{$__function="";}
?><BODY BGCOLOR=#cccccc leftmargin=0  topmargin=0 marginwidth=0 marginheight=0 vlink=#046FBD link=#000000 style="<?php echo $style_add;?>" <?php echo $__function;?>>
<?
	require $incpath.'entete.inc.php';
?>
<script>

function init(){
z = document; 

title=z.getElementsByTagName("title")[0].appendChild(z.createElement("div"));
title.style.backgroundColor = "#440000";
title.innerHTML='hello';
}

 function show_page(src_img,id, casting){

 if(document.getElementById("backgroundConfirm")){
 document.getElementsByTagName("body")[0].removeChild( document.getElementById("backgroundConfirm") );  }
 if(document.getElementById("images")){document.getElementsByTagName("body")[0].removeChild( document.getElementById("images") ); }


if(src_img=="login"){src_img="<iframe src='http://www.modelinthecity.com/login.php' allowtransparency='yes' frameborder=0 width=400 height=400></iframe>";
src_img_width=350;
src_img_height=250;}

if(src_img=="signup"){src_img="<iframe src='http://www.modelinthecity.com/signup.php' frameborder=0 width=530 height=450></iframe>";
src_img_width=530;
src_img_height=450;}

if(src_img=="password_forgotten"){src_img="<iframe src='http://www.modelinthecity.com/password_forgotten.php' frameborder=0 width=400 height=280></iframe>";
src_img_width=370;
src_img_height=280;}

if(src_img=="contact"){src_img="<iframe src='http://www.modelinthecity.com/contact.php?id="+id+"&casting="+casting+"' frameborder=0 width=450 height=310></iframe>";
src_img_width=450;
src_img_height=310;}

if(src_img=="human"){src_img="<iframe src='http://www.modelinthecity.com/human.php' allowtransparency='yes' frameborder=0 width=400 height=400></iframe>";
src_img_width=350;
src_img_height=250;}

d = document; 

fond = d.getElementsByTagName("body")[0].appendChild(d.createElement("div")); 
fond.id = "backgroundConfirm"; 
fond.style.backgroundColor = "#333333";

// fond.title="Click here to close";

fond.style.cursor="-moz-zoom-out";
fond.style.cursor="url(images/zoomout.cur)";
fond.style.filter = 'alpha(opacity=80)';
//FF
 fond.style.opacity = "0.80"; 


fond.style.position = "absolute"; 
fond.style.top = "0px"; 
fond.style.left = "0px"; 
fond.style.width = "100%"; 
fond.style.height = "500%"; 
fond.style.zIndex = "10000"; 

img=d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
img.id="images";

img.innerHTML=src_img;
img.style.filter = 'alpha(opacity=0)';
img.style.position = "absolute"; 
img.style.left=fond.clientWidth/2-src_img_width/2+'px';
img.style.top='40%';//-getScrollTop()+(fond.clientHeight/2)-src_img_height/2+'px';
img.style.filter = 'alpha(opacity=100)';
img.style.zIndex = "10001"; 
img.style.cursor="-moz-zoom-out";
img.style.cursor="url(images/zoomout.cur)";

img.onclick = function() { removeCustomConfirm(); return false; } 
fond.onclick = function() { removeCustomConfirm(); return false; } 
} 

function removeCustomConfirm( ) { 
document.getElementsByTagName("body")[0].removeChild( document.getElementById("backgroundConfirm") ); 
document.getElementsByTagName("body")[0].removeChild( document.getElementById("images") ); 
return false; 
} 

function getScrollTop(){
var t;
if(document.documentElement && document.documentElement.scrollTop){
t=document.documentElement.scrollTop;
}else{
if(document.body){
t=document.body.scrollTop;
}
}
return t;
}

function show_description(id,x,y){
alert(x);
}
</script>
<?php
/*

function init(){
z = document; 

title=z.getElementsByTagName("title")[0].appendChild(z.createElement("div"));
title.style.backgroundColor = "#440000";
title.innerHTML='hello';
}

 function show_page(src_img,id, casting){

 if(document.getElementById("backgroundConfirm")){
 document.getElementsByTagName("body")[0].removeChild( document.getElementById("backgroundConfirm") );  }
 if(document.getElementById("images")){document.getElementsByTagName("body")[0].removeChild( document.getElementById("images") ); }


if(src_img=="login"){src_img="<iframe src='http://www.modelinthecity.com/login.php' allowtransparency='yes' frameborder=0 width=400 height=400></iframe>";
src_img_width=350;
src_img_height=250;}

if(src_img=="signup"){src_img="<iframe src='http://www.modelinthecity.com/signup.php' frameborder=0 width=530 height=450></iframe>";
src_img_width=530;
src_img_height=450;}

if(src_img=="password_forgotten"){src_img="<iframe src='http://www.modelinthecity.com/password_forgotten.php' frameborder=0 width=400 height=280></iframe>";
src_img_width=370;
src_img_height=280;}

if(src_img=="contact"){src_img="<iframe src='http://www.modelinthecity.com/contact.php?id="+id+"&casting="+casting+"' frameborder=0 width=450 height=310></iframe>";
src_img_width=450;
src_img_height=310;}

if(src_img=="human"){src_img="<iframe src='http://www.modelinthecity.com/human.php' allowtransparency='yes' frameborder=0 width=400 height=400></iframe>";
src_img_width=350;
src_img_height=250;}

d = document; 

fond = d.getElementsByTagName("body")[0].appendChild(d.createElement("div")); 
fond.id = "backgroundConfirm"; 
fond.style.backgroundColor = "#333333";

// fond.title="Click here to close";

fond.style.cursor="-moz-zoom-out";
fond.style.cursor="url(images/zoomout.cur)";
fond.style.filter = 'alpha(opacity=80)';
//FF
 fond.style.opacity = "0.80"; 


fond.style.position = "absolute"; 
fond.style.top = "0px"; 
fond.style.left = "0px"; 
fond.style.width = "100%"; 
fond.style.height = "500%"; 
fond.style.zIndex = "10000"; 

img=d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
img.id="images";

img.innerHTML=src_img;
img.style.filter = 'alpha(opacity=0)';
img.style.position = "absolute"; 
img.style.left=fond.clientWidth/2-src_img_width/2+'px';
img.style.top='40%';//-getScrollTop()+(fond.clientHeight/2)-src_img_height/2+'px';
img.style.filter = 'alpha(opacity=100)';
img.style.zIndex = "10001"; 
img.style.cursor="-moz-zoom-out";
img.style.cursor="url(images/zoomout.cur)";

img.onclick = function() { removeCustomConfirm(); return false; } 
fond.onclick = function() { removeCustomConfirm(); return false; } 
} 

function removeCustomConfirm( ) { 
document.getElementsByTagName("body")[0].removeChild( document.getElementById("backgroundConfirm") ); 
document.getElementsByTagName("body")[0].removeChild( document.getElementById("images") ); 
return false; 
} 

function getScrollTop(){
var t;
if(document.documentElement && document.documentElement.scrollTop){
t=document.documentElement.scrollTop;
}else{
if(document.body){
t=document.body.scrollTop;
}
}
return t;
}
*/
?>