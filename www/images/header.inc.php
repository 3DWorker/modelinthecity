<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html>
<HEAD>
<title>The Model porfolio place - Meet professional modeling photographers & models - modelinthecity.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta Name="author" Content="Modelinthecity productions">
<meta name="REVISIT-AFTER" content="5 days">
<meta NAME="classification" content="Model, photographer, makeup artist, hairdresser, Modeling portfolio site">
<meta name="description" content="The Fashion social network. Models, Photographers, Modeling Agencies, Make-up Artists, Hairdressers, Stylists and Famous Clients ! Create your portfolio">
<link rel="stylesheet" type="text/css" href="<?php echo $location;?>modelfolio.css">
<LINK REL="SHORTCUT ICON" href="http://www.modelinthecity.com/favicon.ico">
</head>

<?
$i=(int)Date('s');

if($i>0 && $i<15)$style_add="background:#000 url(".$location."images/modelinthecity_UK.jpg) repeat;";
if($i>=15 && $i<30)$style_add="background:#000 url(".$location."images/modelinthecity_USA.jpg) repeat;";
if($i>=30 && $i<45)$style_add="background:#000 url(".$location."images/modelinthecity_FR.jpg) repeat;";
if($i>=45 && $i<=60)$style_add="background:#000 url(".$location."images/modelinthecity_SU.jpg) repeat;";
 if($i>=40 && $i<=60)$style_add="background:#000 url(".$location."images/modelinthecity_IT.jpg) repeat;";

//$style_add="background:#ffffff;";
//$style_add="background:url(".$location."images/modelinthecity_UK.jpg) repeat;";

if($page=="confirm"){$__function=" onload='init();'";}else{$__function="";}
?>

<BODY BGCOLOR=#cccccc leftmargin=0  topmargin=0 marginwidth=0 marginheight=0 vlink=#046FBD link=#000000 style="<?php echo $style_add;?>background-attachment: fixed;background-size: cover;"<?php echo $__function;?>>
<?
	require $incpath.'entete.inc.php';
?>
<script>
function init(){
z = document; 

title=z.getElementsByTagName("title")[0].appendChild(z.createElement("div"));
title.id="title";
title.style.backgroundColor = "#440000";
//title.text=title;
title.innerHTML='hello';
}

function show_page(src_img,src_img_width,src_img_height){

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

if(src_img=="addafriend"){src_img="<iframe src='http://www.modelinthecity.com/addafriend.php?id=<?php echo $id;?>' frameborder=0 width=310 height=270></iframe>";
src_img_width=310;
src_img_height=270;}


d = document; 

// create the background div as a child of the BODY element 
fond = d.getElementsByTagName("body")[0].appendChild(d.createElement("div")); 
fond.id = "backgroundConfirm"; 
fond.style.backgroundColor = "#333333";

fond.title="Click here to close";

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

// img.style.border= "1px solid #ffffff";
//img.style.padding="10";
// img.style.borderRadius = '8px'; // w3c
// img.style.MozBorderRadius = '8px'; // mozilla

img.title="Cliquer pour fermer";

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
</script>