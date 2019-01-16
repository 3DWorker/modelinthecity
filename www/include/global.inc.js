function show_page(src_img,src_img_width,src_img_height){

 if(document.getElementById("backgroundConfirm")){
 document.getElementsByTagName("body")[0].removeChild( document.getElementById("backgroundConfirm") );  }
 if(document.getElementById("images")){document.getElementsByTagName("body")[0].removeChild( document.getElementById("images") ); }


if(src_img=="login"){src_img="<iframe src='http://www.modelinthecity.com/login.php' frameborder=0 width=300 height=200></iframe>";
src_img_width=300;
src_img_height=200;}

if(src_img=="signup"){src_img="<iframe src='http://www.modelinthecity.com/signup.php' frameborder=0 width=520 height=370></iframe>";
src_img_width=520;
src_img_height=370;}

if(src_img=="password_forgotten"){src_img="<iframe src='http://www.modelinthecity.com/password_forgotten.php' frameborder=0 width=335 height=240></iframe>";
src_img_width=335;
src_img_height=240;}

if(src_img=="addafriend"){src_img="<iframe src='http://www.modelinthecity.com/addafriend.php?id=<?php echo $id;?>' frameborder=0 width=310 height=270></iframe>";
src_img_width=310;
src_img_height=270;}


d = document; 

// create the background div as a child of the BODY element 
fond = d.getElementsByTagName("body")[0].appendChild(d.createElement("div")); 
fond.id = "backgroundConfirm"; 
fond.style.backgroundColor = "#000000";

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
fond.style.zIndex = "1"; 

img=d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
img.id="images";

img.innerHTML=src_img;
img.style.filter = 'alpha(opacity=0)';
img.style.position = "absolute"; 
img.style.left=fond.clientWidth/2-src_img_width/2;
img.style.top=getScrollTop()+document.body.clientHeight/2-src_img_height/2;
img.style.filter = 'alpha(opacity=100)';
img.style.zIndex = "200"; 
img.style.filter = 'alpha(opacity=100)';
img.style.cursor="-moz-zoom-out";
img.style.cursor="url(images/zoomout.cur)";
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


function CheckPassword(password,name){  

for(var i=0;i<password.length;i++){
password=password.replace(" ","",i);
password=password.replace("'","",i);
password=password.replace("\"","",i);
password=password.replace("\\","",i);
password=password.replace("/","",i);
}
document.getElementById('new_password').value=password;

     var strength = new Array(); 
	 var color= new Array();
	 strength[0] = "Very Weak";  color[0]="#ff0000";
     strength[1] = "Very Weak";  color[1]="#ff3300";
     strength[2] = "Weak";  color[2]="#ff9900";
     strength[3] = "Medium";  color[3]="#ffff00";
     strength[4] = "Strong";  color[4]="#99cc00";
     strength[5] = "Very Strong";  color[5]="#32cd32";
    
     var score = 0;  

      if (password.length > 6)  score+=1;  
      if (password.length > 7)  score+=1;  
	  
     if (password.length > 12)  score+=1;  

     if (password.match(/\d+/)) { score+=1;} 

     if (password.match(/[a-z]/)) score+=1;  
	 if( password.match(/[A-Z]/)) score+=1;
	 
	 if( (password.match(/w{2}/) || password.match(/w{3}/) || password.match(/w{4}/) || password.match(/w{5}/) || password.match(/w{6}/) )&& score>0) {
	 
	 if(score<2){ score-=1;}else{score-=2;}
	 
	 }

   if (password.match(/.[!,@,#,$,%,é,è,ç,â,à,^,&,*,?,_,~,-,£,(,)]/)) score+=1;  
   
   if(score>5)score=5;
   document.getElementById('progressbar').style.height='3px';
   document.getElementById('progressbar').style.backgroundColor=color[score];
   document.getElementById('progressbar').style.width=parseInt(24*score)+'px';
document.getElementById('progressbar').style.padding="0px;"
	document.getElementById('bart').innerHTML=strength[score];

 }  