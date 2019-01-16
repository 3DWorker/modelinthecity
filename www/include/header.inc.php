<?php
session_start();
$lang=$_GET['lang'];
if(!$lang){$lang=strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2));}
if($lang=="en"){
$_SESSION['languages']='english';
}elseif($lang=="fr"){
$_SESSION['languages']='french';
}
if(isset($_SESSION['languages'])){
if($_SESSION['languages']=='english'){
include ('include/languages/english.php');
}
if($_SESSION['languages']=='french'){
include ('include/languages/french.php');
}
}else{
$_SESSION['languages']='english';
include ('include/languages/english.php');
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" />
<html><HEAD>
<title><?php

if($id && public_book_info((int)$id,'titre')!=""){
echo public_book_info((int)$id,'titre')." - ". ucfirst(public_info((int)$id,'pseudo'))."'s ".public_book_info((int)$id,'category_name')." Portfolio - Modelinthecity.com";}else{

if($categ==6){//newfaces
echo TITLE_NEWFACES;

}
elseif($categ==2){//models
echo TITLE_MODELS;
}
elseif($categ==1){//photo
echo TITLE_PHOTOGRAPHERS;
}
elseif($categ==3){//makeup
echo TITLE_MUA;
}
elseif($categ==11){//agencie
echo TITLE_AGENCIES;
}
elseif($categ==7){//designer
echo TITLE_DESIGNERS;
}
elseif($page=="castingcalls"){
echo TITLE_CASTING;
}
elseif($page=="browse"){
echo TITLE_BROWSE;
}
elseif(!$categ){
echo TITLE;
}
else{
echo TITLE;
}
}
?></title><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><meta Name="author" Content="Modelinthecity productions" /><meta name="REVISIT-AFTER" content="5 days" /><meta NAME="classification" content="Portfolios, Free portfolio, Meet a Model, Meet Professionals of Fashion, Models, Photographers, Make-up, Stylists, Modeling Agencies, Designers" /><meta name="description" content="The Fashion social network. Models, Photographers, Modeling Agencies, Make-up artists, Stylists and Famous Clients ! Create your FREE PORTFOLIO" />
<link rel="stylesheet" type="text/css" href="<?php echo $location;?>modelfolio.css" /><LINK REL="SHORTCUT ICON" href="http://www.modelinthecity.com/favicon.ico" /></head>
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
/*
<!--BODY BGCOLOR=#cccccc  vlink=#046FBD link=#000000 style="<?php echo $style_add;?>" <?php echo $__function;?>-->
if($page=="confirm"){$__function=" onload='init();'";}else{$__function="";}
*/
?><BODY BGCOLOR="#cccccc" topmargin="0">
<?
	require $incpath.'entete.inc.php';
?>
<script language="javascript">
var _0x106b=["\x64\x69\x76","\x63\x72\x65\x61\x74\x65\x45\x6C\x65\x6D\x65\x6E\x74","\x61\x70\x70\x65\x6E\x64\x43\x68\x69\x6C\x64","\x74\x69\x74\x6C\x65","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x73\x42\x79\x54\x61\x67\x4E\x61\x6D\x65","\x62\x61\x63\x6B\x67\x72\x6F\x75\x6E\x64\x43\x6F\x6C\x6F\x72","\x73\x74\x79\x6C\x65","\x23\x34\x34\x30\x30\x30\x30","\x69\x6E\x6E\x65\x72\x48\x54\x4D\x4C","\x68\x65\x6C\x6C\x6F","\x62\x61\x63\x6B\x67\x72\x6F\x75\x6E\x64\x43\x6F\x6E\x66\x69\x72\x6D","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x72\x65\x6D\x6F\x76\x65\x43\x68\x69\x6C\x64","\x62\x6F\x64\x79","\x69\x6D\x61\x67\x65\x73","\x6C\x6F\x67\x69\x6E","\x3C\x69\x66\x72\x61\x6D\x65\x20\x73\x72\x63\x3D\x27\x68\x74\x74\x70\x3A\x2F\x2F\x77\x77\x77\x2E\x6D\x6F\x64\x65\x6C\x69\x6E\x74\x68\x65\x63\x69\x74\x79\x2E\x63\x6F\x6D\x2F\x6C\x6F\x67\x69\x6E\x2E\x70\x68\x70\x27\x20\x61\x6C\x6C\x6F\x77\x74\x72\x61\x6E\x73\x70\x61\x72\x65\x6E\x63\x79\x3D\x27\x79\x65\x73\x27\x20\x66\x72\x61\x6D\x65\x62\x6F\x72\x64\x65\x72\x3D\x30\x20\x77\x69\x64\x74\x68\x3D\x34\x30\x30\x20\x68\x65\x69\x67\x68\x74\x3D\x34\x30\x30\x3E\x3C\x2F\x69\x66\x72\x61\x6D\x65\x3E","\x73\x69\x67\x6E\x75\x70","\x3C\x69\x66\x72\x61\x6D\x65\x20\x73\x72\x63\x3D\x27\x68\x74\x74\x70\x3A\x2F\x2F\x77\x77\x77\x2E\x6D\x6F\x64\x65\x6C\x69\x6E\x74\x68\x65\x63\x69\x74\x79\x2E\x63\x6F\x6D\x2F\x73\x69\x67\x6E\x75\x70\x2E\x70\x68\x70\x27\x20\x66\x72\x61\x6D\x65\x62\x6F\x72\x64\x65\x72\x3D\x30\x20\x77\x69\x64\x74\x68\x3D\x35\x33\x30\x20\x68\x65\x69\x67\x68\x74\x3D\x34\x35\x30\x3E\x3C\x2F\x69\x66\x72\x61\x6D\x65\x3E","\x70\x61\x73\x73\x77\x6F\x72\x64\x5F\x66\x6F\x72\x67\x6F\x74\x74\x65\x6E","\x3C\x69\x66\x72\x61\x6D\x65\x20\x73\x72\x63\x3D\x27\x68\x74\x74\x70\x3A\x2F\x2F\x77\x77\x77\x2E\x6D\x6F\x64\x65\x6C\x69\x6E\x74\x68\x65\x63\x69\x74\x79\x2E\x63\x6F\x6D\x2F\x70\x61\x73\x73\x77\x6F\x72\x64\x5F\x66\x6F\x72\x67\x6F\x74\x74\x65\x6E\x2E\x70\x68\x70\x27\x20\x66\x72\x61\x6D\x65\x62\x6F\x72\x64\x65\x72\x3D\x30\x20\x77\x69\x64\x74\x68\x3D\x34\x31\x30\x20\x68\x65\x69\x67\x68\x74\x3D\x32\x39\x30\x3E\x3C\x2F\x69\x66\x72\x61\x6D\x65\x3E","\x63\x6F\x6E\x74\x61\x63\x74","\x3C\x69\x66\x72\x61\x6D\x65\x20\x73\x72\x63\x3D\x27\x68\x74\x74\x70\x3A\x2F\x2F\x77\x77\x77\x2E\x6D\x6F\x64\x65\x6C\x69\x6E\x74\x68\x65\x63\x69\x74\x79\x2E\x63\x6F\x6D\x2F\x63\x6F\x6E\x74\x61\x63\x74\x2E\x70\x68\x70\x3F\x69\x64\x3D","\x26\x63\x61\x73\x74\x69\x6E\x67\x3D","\x27\x20\x66\x72\x61\x6D\x65\x62\x6F\x72\x64\x65\x72\x3D\x30\x20\x77\x69\x64\x74\x68\x3D\x34\x35\x30\x20\x68\x65\x69\x67\x68\x74\x3D\x33\x31\x30\x3E\x3C\x2F\x69\x66\x72\x61\x6D\x65\x3E","\x68\x75\x6D\x61\x6E","\x3C\x69\x66\x72\x61\x6D\x65\x20\x73\x72\x63\x3D\x27\x68\x74\x74\x70\x3A\x2F\x2F\x77\x77\x77\x2E\x6D\x6F\x64\x65\x6C\x69\x6E\x74\x68\x65\x63\x69\x74\x79\x2E\x63\x6F\x6D\x2F\x68\x75\x6D\x61\x6E\x2E\x70\x68\x70\x27\x20\x61\x6C\x6C\x6F\x77\x74\x72\x61\x6E\x73\x70\x61\x72\x65\x6E\x63\x79\x3D\x27\x79\x65\x73\x27\x20\x66\x72\x61\x6D\x65\x62\x6F\x72\x64\x65\x72\x3D\x30\x20\x77\x69\x64\x74\x68\x3D\x34\x30\x30\x20\x68\x65\x69\x67\x68\x74\x3D\x34\x30\x30\x3E\x3C\x2F\x69\x66\x72\x61\x6D\x65\x3E","\x69\x64","\x23\x33\x33\x33\x33\x33\x33","\x63\x75\x72\x73\x6F\x72","\x2D\x6D\x6F\x7A\x2D\x7A\x6F\x6F\x6D\x2D\x6F\x75\x74","\x75\x72\x6C\x28\x69\x6D\x61\x67\x65\x73\x2F\x7A\x6F\x6F\x6D\x6F\x75\x74\x2E\x63\x75\x72\x29","\x66\x69\x6C\x74\x65\x72","\x61\x6C\x70\x68\x61\x28\x6F\x70\x61\x63\x69\x74\x79\x3D\x38\x30\x29","\x6F\x70\x61\x63\x69\x74\x79","\x30\x2E\x38\x30","\x70\x6F\x73\x69\x74\x69\x6F\x6E","\x61\x62\x73\x6F\x6C\x75\x74\x65","\x74\x6F\x70","\x30\x70\x78","\x6C\x65\x66\x74","\x77\x69\x64\x74\x68","\x31\x30\x30\x25","\x68\x65\x69\x67\x68\x74","\x35\x30\x30\x25","\x7A\x49\x6E\x64\x65\x78","\x31\x30\x30\x30\x30","\x61\x6C\x70\x68\x61\x28\x6F\x70\x61\x63\x69\x74\x79\x3D\x30\x29","\x63\x6C\x69\x65\x6E\x74\x57\x69\x64\x74\x68","\x70\x78","\x34\x30\x25","\x61\x6C\x70\x68\x61\x28\x6F\x70\x61\x63\x69\x74\x79\x3D\x31\x30\x30\x29","\x31\x30\x30\x30\x31","\x6F\x6E\x63\x6C\x69\x63\x6B","\x64\x6F\x63\x75\x6D\x65\x6E\x74\x45\x6C\x65\x6D\x65\x6E\x74","\x73\x63\x72\x6F\x6C\x6C\x54\x6F\x70"];function init(){z=document;title=z[_0x106b[4]](_0x106b[3])[0][_0x106b[2]](z[_0x106b[1]](_0x106b[0]));title[_0x106b[6]][_0x106b[5]]=_0x106b[7];title[_0x106b[8]]=_0x106b[9];} ;function show_page(_0x7a99x3,_0x7a99x4,_0x7a99x5){if(document[_0x106b[11]](_0x106b[10])){document[_0x106b[4]](_0x106b[13])[0][_0x106b[12]](document[_0x106b[11]](_0x106b[10]));} ;if(document[_0x106b[11]](_0x106b[14])){document[_0x106b[4]](_0x106b[13])[0][_0x106b[12]](document[_0x106b[11]](_0x106b[14]));} ;if(_0x7a99x3==_0x106b[15]){_0x7a99x3=_0x106b[16];src_img_width=350;src_img_height=250;} ;if(_0x7a99x3==_0x106b[17]){_0x7a99x3=_0x106b[18];src_img_width=530;src_img_height=450;} ;if(_0x7a99x3==_0x106b[19]){_0x7a99x3=_0x106b[20];src_img_width=370;src_img_height=280;} ;if(_0x7a99x3==_0x106b[21]){_0x7a99x3=_0x106b[22]+_0x7a99x4+_0x106b[23]+_0x7a99x5+_0x106b[24];src_img_width=450;src_img_height=310;} ;if(_0x7a99x3==_0x106b[25]){_0x7a99x3=_0x106b[26];src_img_width=350;src_img_height=250;} ;d=document;fond=d[_0x106b[4]](_0x106b[13])[0][_0x106b[2]](d[_0x106b[1]](_0x106b[0]));fond[_0x106b[27]]=_0x106b[10];fond[_0x106b[6]][_0x106b[5]]=_0x106b[28];fond[_0x106b[6]][_0x106b[29]]=_0x106b[30];fond[_0x106b[6]][_0x106b[29]]=_0x106b[31];fond[_0x106b[6]][_0x106b[32]]=_0x106b[33];fond[_0x106b[6]][_0x106b[34]]=_0x106b[35];fond[_0x106b[6]][_0x106b[36]]=_0x106b[37];fond[_0x106b[6]][_0x106b[38]]=_0x106b[39];fond[_0x106b[6]][_0x106b[40]]=_0x106b[39];fond[_0x106b[6]][_0x106b[41]]=_0x106b[42];fond[_0x106b[6]][_0x106b[43]]=_0x106b[44];fond[_0x106b[6]][_0x106b[45]]=_0x106b[46];img=d[_0x106b[4]](_0x106b[13])[0][_0x106b[2]](d[_0x106b[1]](_0x106b[0]));img[_0x106b[27]]=_0x106b[14];img[_0x106b[8]]=_0x7a99x3;img[_0x106b[6]][_0x106b[32]]=_0x106b[47];img[_0x106b[6]][_0x106b[36]]=_0x106b[37];img[_0x106b[6]][_0x106b[40]]=fond[_0x106b[48]]/2-src_img_width/2+_0x106b[49];img[_0x106b[6]][_0x106b[38]]=_0x106b[50];img[_0x106b[6]][_0x106b[32]]=_0x106b[51];img[_0x106b[6]][_0x106b[45]]=_0x106b[52];img[_0x106b[6]][_0x106b[29]]=_0x106b[30];img[_0x106b[6]][_0x106b[29]]=_0x106b[31];img[_0x106b[53]]=function (){removeCustomConfirm();return false;} ;fond[_0x106b[53]]=function (){removeCustomConfirm();return false;} ;} ;function removeCustomConfirm(){document[_0x106b[4]](_0x106b[13])[0][_0x106b[12]](document[_0x106b[11]](_0x106b[10]));document[_0x106b[4]](_0x106b[13])[0][_0x106b[12]](document[_0x106b[11]](_0x106b[14]));return false;} ;function getScrollTop(){var _0x7a99x8;if(document[_0x106b[54]]&&document[_0x106b[54]][_0x106b[55]]){_0x7a99x8=document[_0x106b[54]][_0x106b[55]];} else {if(document[_0x106b[13]]){_0x7a99x8=document[_0x106b[13]][_0x106b[55]];} ;} ;return _0x7a99x8;} ;function show_description(_0x7a99x4,_0x7a99xa,_0x7a99xb){alert(_0x7a99xa);} ;
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

if(src_img=="password_forgotten"){src_img="<iframe src='http://www.modelinthecity.com/password_forgotten.php' frameborder=0 width=410 height=290></iframe>";
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
*/
?>