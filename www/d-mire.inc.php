<?php
//mire.inc.php
include 'include/header.php';
session_start();

?>
<body topmargin=0 leftmargin=0>
<script src="include/global.inc.js"></script>
<table width=100% height=100% align=center valign=top border=0 cellpadding=0 cellspacing=0><tr><td width=50% bgcolor=black height="90"><a href="./"><img src="images/modelinthecity_logo.png" border=0></a></td><td width=50% bgcolor=black><iframe src='loginin.php' frameborder=0 width=100% height=90></iframe></td></tr>

</tr><td height=100% align=right valign=top><br><img src="images/TheModelSocialNetwork-ModelinTheCity.com.jpg"></td><td valign=top align=left height=100%><iframe name="mire" src='<?php

 if($_SESSION['CoNfIrMKeY']==md5(md5($_SESSION['KeY'].Date('Y-m:d')))){echo "d-confirm.inc.php";}else{echo "signin.php";}
 
 ?>' frameborder=0 width=100% height=100%></iframe></tr></table>

