<?php

if($_SESSION["modelinthecity"]){
connexion();


if($_GET['action']=="approval"){
mysql_query("select * from account_approval where member_id='".(int)$_SESSION["modelinthecity"]."' and status=0");
if(mysql_affected_rows()<1){
mysql_query("INSERT into account_approval set member_id='".(int)$_SESSION["modelinthecity"]."', email='sent'");
@mail_attach("support@modelinthecity.com", "MEMBER APPROVAL" , "<a href='http://www.modelinthecity.com/admin/clients.php?action=view&id=". $_SESSION['modelinthecity'] ."'>APPROBATION</a>", '',Date('l jS \of F Y h:i:s A'));
 echo "<script>location.href='http://www.modelinthecity.com/index.php?page=admin_portfolio_index';</script>";exit;
}
}

##

mysql_query("select * from galerie where id='".$_SESSION['modelinthecity']."' and valid=1");
if(mysql_affected_rows()<1){
mysql_query("select * from account_approval where member_id='".$_SESSION['modelinthecity']."' and email='sent'");
if(mysql_affected_rows()>0){echo('<div class=information_green><center>' .TEXT_APPROVAL_WAIT .'</center></div>');
echo '<meta http-equiv="refresh" content="30">';$stop=1;}
}

$_msg=array();
$i=0;
$query="SELECT id_dest FROM message WHERE id_dest='".$_SESSION["modelinthecity"]."' AND lu='0' or status='1'";
	mysql_query($query);
	$nbm=mysql_affected_rows();
	

//valid
if(test_all($_SESSION["modelinthecity"])==false){$ermes= "<tr><td colspan=6><div class=information>". TEXT_ADMIN_START ."</div></td></tr>";}elseif(test_validation($_SESSION["modelinthecity"])==false){
$ermes= "<tr><td colspan=6><div class=information_green>". TEXT_ADMIN_APPROVAL1." <button onclick=\"location.href='http://www.modelinthecity.com/?page=admin_portfolio_index&action=approval';\">".YES."</button><br><small>". TEXT_ADMIN_APPROVAL2."</small></div></td></tr>";
}

else{$ermes="";}


}else{exit;}

if(!$stop){
?>
<a name=001></a>
<table cellspacing="0" cellpadding="0" border=0 width="100%" class=admin_table align=center>
  <tr> 
    <td align=left colspan="4" class=admin_table_header><br>&nbsp;&nbsp; <?php 
printf(TEXT_WELCOME_ADMIN, ucfirst(public_info($_SESSION["modelinthecity"],"pseudo")) );?><br><br></td><td colspan=3 align=center class=admin_table_header><!--a href="index.php?page=upgrade" ><div id='<?php if($_GET['page']=="upgrade"){echo "button_green_space_top_active";}else{echo "button_green_space_top";}?>'><?php echo TEXT_UPGRADE;?></div></a--></td>
  </tr>
  <tr> 
    <!--td width="100%"  align=left> 
       
        <a href="./index.php?page=espace_membre"><div class=button_blue_1>Home</div></a></td-->
		<td class=admin_table_header>       
        <a href="index.php?page=admin_portfolio_index"><div id='<?php if($_GET['page']=="admin_portfolio_index"){echo "button_blue_space_top_active";}else{echo "button_blue_space_top";}?>'><?php echo TEXT_ADMIN_HOMEPAGE;?>		 
		  <?php
		  if(test_inscription_book($_SESSION["modelinthecity"])=="true"){echo "&nbsp;&nbsp;<img src='images/verif_ok.gif' width=10 border=0>";}else{echo "&nbsp;&nbsp;<img src='images/missing.gif' width=10 border=0>";}
		   ?></div></a></td><td class=admin_table_header>
		   
 <!--div align="left"> <a href="index.php?page=galerie_portfolio_new">Ajouter 
une page</a> </div--> 
<?
// echo $_POST['categorie'];
 if($_POST['categorie']==17){
?>       
        <a href="index.php?page=galerie_music">Modifier les  musiques de mon minisite Musical</a> 
<?
}elseif(public_info($_SESSION["modelinthecity"],"categorie")!=9 && $_POST['categorie']!=9 && $categorie!=9){
		###redacteur{
?>
        
        <a href="index.php?page=admin_portfolio" ><div id='<?php if($_GET['page']=="admin_portfolio"){echo "button_blue_space_top_active";}else{echo "button_blue_space_top";}?>'><?php echo TEXT_ADMIN_IMAGES;?><?php
		  if(test_inscription_gallery($_SESSION["modelinthecity"])=="true"){echo "&nbsp;&nbsp;<img src='images/verif_ok.gif' width=10 border=0>";}else{echo "&nbsp;&nbsp;<img src='images/missing.gif' width=10 border=0>";}
		   ?></div></a></td>
<?
}
?> 
        <td class=admin_table_header><a href="index.php?action=modif_inscript&page=admin_portfolio_style"><div id='<?php if($_GET['page']=="admin_portfolio_style"){echo "button_blue_space_top_active";}else{echo "button_blue_space_top";}?>'><?php echo TEXT_ADMIN_STYLE;?><?php
		  if(test_inscription($_SESSION["modelinthecity"])=="true"){echo "&nbsp;&nbsp;<img src='images/verif_ok.gif' width=10 border=0>";}else{echo "<img src='images/missing.gif' width=10 border=0>";}
		   ?></div></a>	  </td>

		  	
		<td class=admin_table_header>
		<?php
		
		if(public_info($_SESSION["modelinthecity"],"categorie")==9 || $_POST['categorie']==9){
		###redacteur
		//index.php?page=admin_articles
		?>
		<a href="index.php?page=wall&action=articles"><div id='<?php if($_GET['page']=="admin_articles"){echo "button_blue_space_top_active";}else{echo "button_blue_space_top";}?>'><?php echo ADMIN_PRESS_WRITER;?></div></a>
		<?
		
		}elseif($_POST['categorie']!=9){
		 if(test_validation($_SESSION["modelinthecity"])=="true"){
		 ?>
		 <a href="index.php?page=casting"><?}?><div id='<?php if($_GET['page']=="casting"){echo "button_blue_space_top_active";}else{echo "button_blue_space_top";}?>'><?php echo CASTING_CALLS;?> <?php
		  if(test_validation($_SESSION["modelinthecity"])=="true"){echo "&nbsp;<img src='images/verif_ok.gif' width=10 border=0>";}else{echo "<img src='images/verif_notok.gif' width=10 border=0>";}
		   ?></div></a><?}?></td>
		   
		   		   <td class=admin_table_header>		
		<?php
		// if(test_validation($_SESSION["modelinthecity"])=="true"){
		 ?>
        <a href="./index.php?page=message&act=read">
		<?
		//}
		?><div id='<?php if($_GET['page']=="message"){echo "button_blue_space_top_active";}else{echo "button_blue_space_top";}?>'><?php echo TEXT_ADMIN_MESSAGE;?> (<?echo $nbm;?>) <?php
		//  if(test_validation($_SESSION["modelinthecity"])=="true"){echo "&nbsp;<img src='images/verif_ok.gif' width=10 border=0>";}else{echo "<img src='images/verif_notok.gif' width=10 border=0>";}
		   ?></div></a> </td>
		
		<td class=admin_table_header>
<?php 

if(test_inscription_book($_SESSION["modelinthecity"])=="true" && test_inscription($_SESSION["modelinthecity"])=="true" && test_inscription_gallery($_SESSION["modelinthecity"])=="true" && test_validation($_SESSION["modelinthecity"])=="true"){
?>
 <a href="http://www.modelinthecity.com/<?echo $_SESSION["modelinthecity"];?>" target="_blank"><div id=button_blue_space_top><?php echo TEXT_ADMIN_MY_PORTFOLIO;?>&nbsp;<img src='images/verif_ok.gif' width=10 border=0>
 </div></a> </td><td class=admin_table_header>
<?
}else{
?>
 <div id=button_blue_space_top>MY PORTFOLIO <img src='images/verif_notok.gif' width=10 border=0></div> </td>
<?
}
?>

  </tr>  <?php if($ermes){echo $ermes;}?>
</table>

<?
}
?>