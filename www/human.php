<?


session_start();

if($_POST['action']=="send"){
if($_POST['thecode']){

$thecode_okay = (isset($_POST['thecode']) && (strtolower($_POST['thecode']) == strtolower($_SESSION["noautamationcode"])));

if(!$thecode_okay || !session_id()){header('location:http://www.modelinthecity.com/human.php');die('The robots are killing the web'); }

	require "/homez.193/".HOST."/connex/connexion.inc.php";

	mysql_query("select * from human where IP='" . $_SERVER['REMOTE_ADDR'] ."'");
		 if(mysql_affected_rows()<1){
 mysql_query("insert into human set IP='" . $_SERVER['REMOTE_ADDR'] ."', SESSION='" . session_id() . "', DATE='" . strtotime("now") ."', STATUS='1'");
 }else{
  mysql_query("UPDATE human set SESSION='" . session_id() . "', DATE='" . strtotime("now") ."', STATUS='1' where IP='" . $_SERVER['REMOTE_ADDR'] ."'");
 }
echo "<script>location.href='http://www.modelinthecity.com';</script>";exit;
}
}

	unset($_SESSION["noautamationcode"]);
	
	include('contact_us_image.php');
	?>
	
	
	<html><head>
<link rel="stylesheet" type="text/css" href="http://www.modelinthecity.com/modelfolio.css">
</head>
<body topmargin=0 rightmargin=0 bottommargin=0 class=loginbox><br><br><br><br><br>
  <form method="post" action="human.php">
  <input type="hidden" name="action" value="send">

  <table width="400" border="0" cellspacing="0" cellpadding="0" bordercolor=black align=center class=loginbox>
    <TR> 
      <TD height="12" align=left colspan=2><b><big>Are you a human ?</big></b><br><hr></td>
  </TR>
    <TR> 
      <TD  align=center>
        <table cellpadding="0" cellspacing="0" border="0" width=100% class=loginbox>
          <tr> 
            <td> <img src="<?php echo $img_name;?>"><input name="refresh" value="refresh" type="image" src="images/button_refresh.gif"><br>
			</td></tr><tr><td>Type this captcha : <input type=text name="thecode" MAXLENGTH=16 size=8>
              </td>
			  </tr>
			  <tr><td>
			  <a href="#" onclick="document.forms[0].submit();"><div class=button_blue>Submit</div></a>
			  </td></tr>
        </table>
      </TD>
    </TR>
</TABLE>
  </form>
