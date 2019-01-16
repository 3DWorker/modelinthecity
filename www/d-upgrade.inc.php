<?php

 if($_SESSION["modelinthecity"]){

echo paypal_info($_SESSION['modelinthecity'],'gold');

?>
 <form method="post" action="index.php?page=upgrade&go=Upgrade" enctype="multipart/form-data" name="form1">
  <table width=100% border=0 cellspacing=0 cellpadding=0 class=admin_table align=center>
    <TR> 
      <TD> 
        <table width="100%" border="0" cellspacing="0" cellpadding="7">
          <tr> 
            <td valign=top width=90% colspan=3 align=center>
			<h1>WHY UPGRADING MY ACCOUNT ?</H1><br><br>
			<div id=message>Upgrade your account to get more visibility, increase your visitors and clients, be the first to get the casting calls.<br>Upgrade your account to win more money.</div>
			<br><H1>UPGRADE OPTIONS :</h1>			
			<div id=upgrade3 width=100%>
		<img src="images/platinium_member.png" title="PLATINIUM MEMBER"><p>
		<table cellpadding=1 cellspacing=0 border=0 width=100%>
			<tr><td><img src="images/li.png"></td><td>&nbsp;Appear higher than all other members type in your category</td><td rowspan=9 align=center valign=top><br><br><span>$15</span><br><small>By month</small><br><br><a href="#Platinium" onclick='document.forms["upgrade_2_platinium"].submit();'><div id=button_blue_space>PROCEED</div></a></td></tr>
			<tr><td><img src="images/li.png"></td><td>&nbsp;Have up to 100 images on your profile</td></tr>
			<tr><td><img src="images/li.png"></td><td>&nbsp;Send illimited e-mails a day</td></tr>
			<tr><td><img src="images/li.png"></td><td>&nbsp;Personnal website link in your profile</td></tr>
			<tr><td><img src="images/li.png"></td><td>&nbsp;Facebook, Myspace, Twitter link in your profile</td></tr>
			<tr><td><img src="images/li.png"></td><td>&nbsp;Receive Premium casting calls in your personal E-mail address</td></tr>
			<tr><td><img src="images/li.png"></td><td>&nbsp;Add your own images category</td></tr>
			<tr><td><img src="images/li.png"></td><td>&nbsp;Use advanced search option</td></tr>
			<tr><td><img src="images/li.png"></td><td>&nbsp;Increase your visibility</td></tr></table></p></div><br><br>
			
        	<div id=upgrade2>
		<img src="images/gold_member.png" title="GOLD MEMBER"><p>
		<table cellpadding=1 cellspacing=0 width=100%>
			<tr><td><img src="images/li.png"></td><td>&nbsp;Appear higher than the Silver members in your category</td><td rowspan=8 align=center valign=top><span>$11</span><br><small>By month</small><br><br><a href="#Gold" onclick='document.forms["upgrade_2_gold"].submit();'><div id=button_blue_space>PROCEED</div></a></td></tr>
			<tr><td><img src="images/li.png"></td><td>&nbsp;Have up to 50 images on your profile</td></tr>
			<tr><td><img src="images/li.png"></td><td>&nbsp;Send 30 e-mails a day</td></tr>
			<tr><td><img src="images/li.png"></td><td>&nbsp;Personnal website link in your profile</td></tr>
			<tr><td><img src="images/li.png"></td><td>&nbsp;Receive Gold casting calls in your personal E-mail address</td></tr>
			<tr><td><img src="images/li.png"></td><td>&nbsp;Add your own images category</td></tr>
			<tr><td><img src="images/li.png"></td><td>&nbsp;Use advanced search option</td></tr>
			<tr><td><img src="images/li.png"></td><td>&nbsp;Increase your visibility</td></tr></table></p></div><br><br>
			
			<div id=upgrade1>
		<img src="images/silver_member.png" title="SILVER MEMBER"><p>
		<table cellpadding=1 cellspacing=0 width=100%>
			<tr><td><img src="images/li.png"></td><td>&nbsp;Appear higher than the basic members in your category</td><td rowspan=7 align=center valign=top><span>$6</span><br><small>By month</small><br><br><a href="#silver" onclick='document.forms["upgrade_2_silver"].submit();'><div id=button_blue_space>PROCEED</div></a></td></tr>
			<tr><td><img src="images/li.png"></td><td>&nbsp;Have up to 25 images on your profile</td></tr>
			<tr><td><img src="images/li.png"></td><td>&nbsp;Send 15 e-mails a day</td></tr>
			<tr><td><img src="images/li.png"></td><td>&nbsp;Receive Silver casting calls in your personal E-mail address</td></tr>
			<tr><td><img src="images/li.png"></td><td>&nbsp;Add your own images category</td></tr>
			<tr><td><img src="images/li.png"></td><td>&nbsp;Use advanced search option</td></tr>
			<tr><td><img src="images/li.png"></td><td>&nbsp;Increase your visibility</td></tr></table></p></div>
<br><br>			
  </td>
</tr>
</table></td></tr></table></form>
 <?
 }
 ?>