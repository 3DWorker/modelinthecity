<?php if(!$_SESSION['modelinthecity']){ $top=-50;?><div style="position:fixed;top:0px;padding-top:6px;z-index:1000;width:100%;background:#00ccff url(images/anim_footer.gif);"><?php include'/homez.193/".HOST."/modelinthecity/include/languages.php';?>&nbsp;&nbsp;<strong><font color='#ffffff'><?php echo TEXT_SIGN_UP;?></font>&nbsp;&nbsp;<a style="color:#fff" href="#" onclick="location.href='<?php echo $location;?>index.php?page=signup';"><span id="button_blue"><?php echo TEXT_SIGNUP;?></span></a></strong></div><br><br><?}else{$top=-37;}?><br><br><br><table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#333333;-moz-opacity:0.9;opacity:0.9;filter:alpha(opacity=90);margin-top:<?php echo $top;?>px;">
<tr><td valign=top><div style="transparent:no;"><br>
<?php
$user_agent=$_SERVER['HTTP_USER_AGENT'];
  // $_browser = array ("OPERA","MSIE","NETSCAPE","FIREFOX","SAFARI","KONQUEROR","MOZILLA");
    $_browser = array ("MSIE");
for($a=0;$a<count($_browser);$a++){
if(strpos(  strtoupper($user_agent), $_browser[$a])==true){$browser=$_browser[$a];}
}
if($browser=="MSIE"){echo "<br>";}
?>
<table border="0" width="900" align="center" cellpadding="4" style="color:#ffffff;background:#000000 url(http://www.modelinthecity.com/images/background-city.png) no-repeat;border-top:1px solid #000;border-right:1px solid #000;border-left:1px solid #000;"><tr><td align="left" width="60%"><font color="white">&nbsp;<?php printf( TEXT_WELCOME, ucfirst(public_info($_SESSION["modelinthecity"],"pseudo")));?></font></td><td height="2" align="right" width="40%"><?
if(!$_SESSION["modelinthecity"]){
?><nobr><a style="color:#fff;" href="#" onclick="javascript:show_page('login');"><span id="button_blue"><?php echo TEXT_LOGIN;?></span></a> | <a style="color:#fff" href="#" onclick="location.href='<?php echo $location;?>index.php?page=signup';"><span id="button_blue"><?php echo TEXT_SIGNUP;?></span></a>&nbsp;&nbsp;</nobr>
<?
}else{
?>
<nobr><a  style="color:#fff" href='<?php echo $location;?>?page=admin_portfolio_index'><span id=button_blue><?php echo TEXT_MYSPACE;?></span></a>&nbsp;|&nbsp;<a href="<?php echo $location;?>logout.php" style="color:#fff"><span id=button_blue><?php echo TEXT_LOGOUT;?></span></a>&nbsp;&nbsp;</nobr>
<?
}
?></td></tr><tr><td  align="left"><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td width="360"><a href="<?php echo $location;?>"><img src="<?php echo $location;?>images/modelinthecity_small_logo.png" border=0></a></td><td valign="bottom"><div style="position:absolute;top:65px;font-family:times;font-size:50px;color:#ccc;z-index:0;-moz-opacity:0.4;opacity: 0.4;filter:alpha(opacity=40);line-height:120px;z-index:0;"><MARQUEE direction="up" height="100" scrollamount="1" style="z-index:0;">NEW YORK<br>PARIS<br>Москва<br>MILANO<br>LONDON<br>東京<br>LOS ANGELES<br>ΑΘΗΝΑ<br>AMSTERDAM<br>BERLIN<br>BRATISLAVA<br>香港<br>BRUXELLES<br>MADRID<br>KØBENHAVN<br>PRAHA</marquee></div></td></tr></table>
</td><td valign="bottom" align="right"></td></tr>
</table></div></td></tr><tr><td style="color:#ffffff;background-color:#999999;" align="left" valign="bottom">

<table  width="900" cellspacing="0" cellpadding="4" align="center" border="0"  valign="bottom"><tr><td height="0" class="entete" align="center" valign="absmiddle"><a href="<?php echo $location;?>"><!--img src="<?php echo $location;?>images/icon_home.png" border=0--><?php echo HOME;?></a>&nbsp;<a href="<?php echo $location;?><?php echo TEXT_PORTFOLIO;?>"><?php echo TEXT_PORTFOLIO;?></a>&nbsp;<nobr><a href="<?php echo $location;?><?php echo LINK_WALL;?>"><?php echo TEXT_WALL;?></a>&nbsp;<a href="<?php echo $location;?><?php echo LINK_LOOK;?>"><?php echo TEXT_LOOK;?></a>&nbsp;<a href="<?php echo $location;?><?php echo LINK_WHATS_UP_IN_MY_CITY;?>"><?php echo TEXT_WHATS_UP_IN_MY_CITY;?></a>&nbsp;<a href="<?php echo $location;?><?php echo LINK_FASHIONTV;?>"><?php echo TEXT_FASHIONTV;?></a>&nbsp;<a href="<?php echo $location;?><?php echo LINK_SEARCH;?>"><?php echo SEARCH;?></a>&nbsp;<a href="<?php echo $location;?><?php echo LINK_CASTINGS;?>"><nobr><?php echo CASTING_CALLS;?></nobr></a>&nbsp;<a href="<?php echo $location;?><?php echo LINK_FORUM;?>"><?php echo FORUM;?></a>&nbsp;<a href="<?php echo $location;?><?php echo LINK_SHOP;?>"><?php echo SHOP;?></a></nobr></td></tr>
</table></td></tr></table>