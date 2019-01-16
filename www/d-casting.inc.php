<?


if($_SESSION["modelinthecity"]){}else{exit;}

 if(test_validation($_SESSION["modelinthecity"])){
mysql_query("select * from account_approval where member_id='".$_SESSION['modelinthecity']."' and email='sent'");
if(mysql_affected_rows()<1){

if($_SESSION["visitor"]){echo "<div class=information>Your portfolio status is waiting approval, complete the required points to publish a casting call</div>";}else{


$title=$_POST['title'];
$description=trim($_POST['description']);

$description=str_replace('§','',$description);

$description=str_replace(chr(10),'§',$description);
/*
for($i=0;$i<strlen($description);$i++){
echo ord($description{$i})."<br>";
}
*/
$city=$_POST['city'];

$title=preg_replace('/\s\s+/','', $title);
$description=preg_replace('/\s\s+/', '', $description);
$city=preg_replace('/\s\s+/', '', $city);

$title=preg_replace('/[^A-Za-z ]/', '', $title);
$description=preg_replace('/[^A-Za-z §]/', '', $description);
$city=preg_replace('/[^A-Za-z ]/', '', $city);

$start_date=$_POST['start_date'];
$end_date=$_POST['end_date'];
$amount=$_POST['amount'];
$amount=(int)$amount;

$typer=$_POST['typer'];
$adult=$_POST['adult'];
$act=$_GET['act'];
$country=$_POST['country'];
$category=$_POST['category'];

if($act=="send"){
$err=0;
$error=" style='background:yellow;'";
$errr="<font color=red><small>/!\ Missing field</small></font><br>";



$title=strip_tags($title);
//$description=strip_tags($description);
$start_date=strip_tags($start_date);
$end_date=strip_tags($end_date);
$amount=strip_tags($amount);
$amount=(int)$amount;
$city=strip_tags($city);



if(!$description){$err=1;$err_description[0]=$error;$err_description[1]=$errr; $ermes="Check error in yellow";}
if($description && strlen($description)<50){$err=1;$err_description[0]=$error;$err_description[1]="<font color=red><small>/!\ Too short description (min 50 chars). Left : ". abs(50-strlen($description)); $ermes="Check error in yellow";}
if(!$title){$err=1;$err_title[0]=$error;$err_title[1]=$errr;  $ermes="Check error in yellow";}

if($title && strlen($title)<15){$err=1;$err_title[0]=$error;$err_title[1]="<font color=red><small>/!\ Too short Title (min 15 chars)"; $ermes="Check error in yellow";}

if(!$category){$err=1;$err_category[0]=$error;$err_category[1]=$errr; $ermes="Check error in yellow";}
if($city && !$country){$err=1;$err_country[0]=$error;$err_country[1]=$errr;  $ermes="Check error in yellow";}
if(!$adult){$err=1;$err_adult[0]=$error;$err_adult[1]=$errr;  $ermes="Check error in yellow";}
if(!$typer){$err=1;$err_type[0]=$error;$err_type[1]=$errr;  $ermes="Check error in yellow";}
if($typer==1 && $amount<1){$err=1;$err_amount[0]=$error;$err_amount[1]=$errr; $ermes="Check error in yellow";}

if(test_entry($description)=="personal"){$err=1;$err_description[0]=$error;$err_description[1]="<font color=red><small>/!\ Personal contact informations are not allowed</small></font><br>";}
if(test_entry($title)=="personal"){$err=1;$err_title[0]=$error;$err_title[1]="<font color=red><small>/!\ Personal contact informations are not allowed</small></font><br>";}
if(test_entry($city)=="personal"){$err=1;$err_city[0]=$error;$err_city[1]="<font color=red><small>/!\ Personal contact informations are not allowed</small></font><br>";}

if(test_entry($description)=="bad"){$err=1;$err_description[0]=$error;$err_description[1]="<font color=red><small>/!\ Outragous words are not allowed</small></font><br>";}
if(test_entry($title)=="bad"){$err=1;$err_title[0]=$error;$err_title[1]="<font color=red><small>/!\ Outragous words are not allowed</small></font><br>";}
if(test_entry($city)=="bad"){$err=1;$err_city[0]=$error;$err_city[1]="<font color=red><small>/!\ Outragous words are not allowed</small></font><br>";}

if($start_date && !$end_date){$err=1;$err_date[0]=$error;$err_date[1]="<font color=red><small>/!\ End date missing</small></font><br>";}
##MEMBRE BASIC OR SILVER OR PREMIUM
connexion();
$q=mysql_query("select level from account where member_id='". $_SESSION["modelinthecity"]."'");
if($r=mysql_fetch_array($q)){$level=$r['level'];}
if(($level==0 || !$level) && $typer==1){$err=1;$err_type[0]=$error;$err_type[1]="<font color=red><small>/!\<i>Paid Works</i> are not allowed for Basic members</small></font><br>";$amount=0;}


if($err==0 || !$err){### SAVE


##VERIF NBR PUBLISH CASTING
mysql_query("select * from casting where exp_id='". $_SESSION["modelinthecity"]."'");
$nb_casting=mysql_affected_rows();
if($nb_casting<10){

if($start_date){$_start_date=strtotime($start_date);}
if($end_date){$_end_date=strtotime($end_date);}

mysql_query("insert into casting set title='" . addslashes($title)."', description='" . addslashes($description)."', city='" . addslashes($city)."', start_date='" .$_start_date ."', end_date='" . $_end_date."', amount='" . (int)$amount."', exp_id='". (int)$_SESSION['modelinthecity']."', IP='" .$_SERVER['REMOTE_ADDR']."', type='".$typer."', category='".$category."', adult='". $adult."', country='" .$country."', date='".strtotime("now")."'");


}else{

if($start_date){$_start_date=strtotime($start_date);}
if($end_date){$_end_date=strtotime($end_date);}

mysql_query("update casting set title='" . addslashes($title)."', description='" . addslashes($description)."', city='" . addslashes($city)."', start_date='" . $_start_date."', end_date='" . $_end_date."', amount='" . (int)$amount."', IP='" .$_SERVER['REMOTE_ADDR']."', type='".$typer."', category='".$category."', adult='". $adult."', country='" .$country."', valid=0, date='".strtotime("now")."' where exp_id='". (int)$_SESSION["modelinthecity"]."'");
}

$suBjeCt ="Casting call waiting approval";
$conTenuHtml=$_SERVER['REMOTE_ADDR'] . "<br>Casting call from ". (int)$_SESSION["modelinthecity"] . "<br><a href='http://www.modelinthecity.com/admin/casting_call_approval.php?exp_id=" . (int)$_SESSION["modelinthecity"] ."'>Appouve</a>";

		mail_attach("modelinthecity@gmail.com" , $suBjeCt , $conTenuHtml, '',Date('l jS of F Y h:i:s A'));
		
echo "<script>alert('Your casting call has been correctly submitted !\\r\\n\\r\\nPlease be patient while publishing approval confirmation.\\r\\n\\r\\nThanks.');</script>";

$typer="";
$category="";
$city="";
$country="";
$description="";
$title="";
$start_date="";
$end_date="";
$amount="";
$adult="";

}else{ if($err){$act='update';}}
}

if($act=="close"){


mysql_query("delete from casting where exp_id='".(int)$_SESSION["modelinthecity"]."'");

}elseif($act=="update"){

$q=mysql_query("select category, title, description, city, date, start_date, end_date, amount, type, adult, country, approb from casting where exp_id='".(int)$_SESSION["modelinthecity"]."' and valid='1'");
while($r=mysql_fetch_array($q)){
 $typer=$r['type'];
$category=$r['category'];
$city=stripslashes($r['city']);
$country=$r['country'];
$description=stripslashes($r['description']);
$title=stripslashes($r['title']);
$start_date=stripslashes($r['start_date']);
$end_date=stripslashes($r['end_date']);
$amount=stripslashes((int)$r['amount']);
$adult=$r['adult'];
$approb=$r['approb'];
}
echo mysql_error();
}

?>
<br><br>
<link rel="stylesheet" type="text/css" href="./ext/jquery/ui/redmond/jquery-ui-1.8.6.css">
<script type="text/javascript" src="./ext/jquery/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="./ext/jquery/ui/jquery-ui-1.8.6.min.js"></script>
<script type="text/javascript" src="./ext/flot/jquery.flot.js"></script>

<?php
mysql_query("select * from casting where exp_id='".(int)$_SESSION["modelinthecity"]."' and (valid='2' or valid='') ");
$nb=mysql_affected_rows();

if((casting_call_waiting($_SESSION["modelinthecity"]) || casting_call_active($_SESSION["modelinthecity"])) && ($act!="update" || $nb>0)){
?>
<meta http-equiv="refresh" content="60">
<?
}else
if( $act=="update" || $nb==0 ){
?>

<form name="form1" action="./index.php?page=casting&act=send"  method="post">
<table width="100%" border="0" cellspacing="5" cellpadding=0 class=admin_table  align=center>
  <tr><td>
    <div id=admin_table_info>Submit a Casting call</div>
	<div id=admin_table_info_in><div style="float:right;"><a href="index.php?page=casting" title="Close">X</A></div>
<table width="770" border="0" cellspacing="5" cellpadding=5>
<?php

if($typer==1){$typer1="checked";}else{$typer1="";}
if($typer==2){$typer2="checked";}else{$typer2="";}
if($typer==3){$typer3="checked";}else{$typer3="";}

?>
<tr><td align=right height=8>I am Offering a :</td><td><?php echo $err_type[1];?>Paid work : <input type="radio" name="typer" value="1" onclick="document.getElementById('_amount').style.visibility='visible';" <?php echo $typer1;?> <?php echo $err_type[0];?>>&nbsp;&nbsp;&nbsp;&nbsp;TFP : <input <?php echo $typer2;?> type="radio" name="typer" value="2" onclick="document.getElementById('_amount').style.visibility='hidden';" >&nbsp;&nbsp;&nbsp;&nbsp;Share/Syndication : <input <?php echo $typer3;?> type="radio" name="typer" value="3" onclick="document.getElementById('_amount').style.visibility='hidden';" >&nbsp;<span id="_amount"  style="background:#4095D4;color:#fff;padding:6px;margin-left:8px;visibility:hidden;width:160px;border-radius:4px;" >Amount : <input type="text" name="amount" size="5" maxlength="6" value="<?php echo (int)$amount;?>" <?php echo $err_amount[0];?>> USD (*)</span></td>
<?php if($typer==1){echo "<script>document.getElementById('_amount').style.visibility='visible';</script>";}?>
      <tr>
	  <tr><td align=right>I am looking for a : </td><td align=left><?php echo $err_category[1];?>
	  <?

		$option="<select name='category' $err_category[0]>><option value=0>Select a Category</option>";
	$q=mysql_query("select name,id from categorie where 1 order by ordre ASC");
	while($r=mysql_fetch_array($q)){
	if($category==$r[id]){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$r[id]."'$sel>".$r[name]."</option>";
		}		$option.="</select>";
	echo $option;

?></td></tr>

      <td align=right width=23%>Title : </td>
      <td align=left> <?php echo $err_title[1];?>
        <input name="title" size="75" type="text" maxlength="75" value="<?php echo $title;?>" <?php echo $err_title[0];?>>
      </td>
    </tr>
    <tr> 
      <td align=right>Description :<br><small>(min 50 chars)</small><br></td>
      <td> <?php echo $err_description[1];?>
        <textarea  cols="60" rows="5" name="description" <?php echo $err_description[0];?>><?php echo str_replace('§',chr(10),$description);?></textarea>
      </td>
    </tr>
	<tr align=center>
<?php
if($adult==1){$adult1="checked";}elseif($adult==2){$adult2="checked";}else{$adult1="";$adult2="";}
?>
<td align=right>Adult +18 : </td><td align=left><?php echo $err_adult[1];?>Non-adult : <input type="radio" name="adult" value="1" <?php echo $adult1;?>>&nbsp;&nbsp;&nbsp;&nbsp;Adult : <input type="radio" name="adult" value="2" <?php echo $adult2;?>>
</td>
</tr>

<tr><td align=right>Location : </td><td align=left><? echo $err_country[1];?>
			<?
			connexion();
		$option="<select name='country'  $err_country[0]><option value=0>Select a country</option>";
	$q=mysql_query("select countries_name,countries_iso_code_2 from countries where 1 order by countries_name ASC");
	while($r=mysql_fetch_array($q)){
			if($r[countries_iso_code_2]==$country){$sel=" selected";}else{$sel="";}
	$option.="<option value='".$r[countries_iso_code_2]."'$sel>".$r[countries_name]."</option>";
		}		$option.="</select>";
	echo $option;
			
			?>&nbsp;<small>(Optional)</small>
			</td></tr>
<tr><td align=right>City : </td><td align=left><?php echo $err_city[1];?><input type="text" maxlength="50" size="30" name="city" value="<?php echo $city;?>">&nbsp;<small>(Optional)</small>
</td></tr>

			</td></tr>
<tr><td align=right>Start Date : </td><td align=left><input id="start_date"  size="8" maxlength="10" name="start_date" value="<?php if($start_date)echo date('Y-m-d',$start_date);?>">&nbsp;<small>(Optional)</small></td></tr>
<tr><td align=right><?php echo $err_date[1];?>End Date : </td><td align=left><input  id="end_date" class="date-pick"  size="8" maxlength="10" name="end_date" value="<?php if($end_date)echo date('Y-m-d',$end_date);?>" $err_date[0]>&nbsp;<small>(Optional)</small></td></tr>
    <tr>
      <td align=right colspan=2>
<a onclick='document.forms["form1"].submit();'><div id=button2 style="margin-right:15px;">SEND</div></a></td>

</tr></table></div></td></tr></table></form>

<script type="text/javascript">

$(function() {
		var dates = $( "#start_date, #end_date" ).datepicker({
		dateFormat: 'yy-mm-dd',
		minDate: new Date(<?php echo Date('Y');?>, <?php echo Date('m')-1;?> , <?php echo Date('d');?>),
		maxDate : new Date("+3m"),
			changeMonth: false,
			numberOfMonths: 1,
			onSelect: function( selectedDate ) {
				var option = this.id == "start_date" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});
	});


</script><br><br>
<?
}


if(casting_call_waiting($_SESSION["modelinthecity"])){
?>
<table width="100%" border="0" cellspacing="5" cellpadding=0 class=admin_table  align=center><tr><td><div id=admin_table_info>Casting calls waiting approval</div><div id=admin_table_info_in>
<table width="770" border="0" cellspacing="5" cellpadding=5><tr><td>
<?php
echo casting_call_waiting($_SESSION["modelinthecity"]);
?>

&nbsp;</td></td></tr></table></td></tr></table><br><br>
<?
}
?>

<?
if(casting_call_active($_SESSION["modelinthecity"])){
?>
<table width="100%" border="0" cellspacing="5" cellpadding=0 class=admin_table  align=center>
  <tr><td>
    <div id=admin_table_info>Active Casting calls</div>
	<div id=admin_table_info_in>
<table width="770" border="0" cellspacing="5" cellpadding=5>
<tr><td>
<? echo casting_call_active($_SESSION["modelinthecity"]);?>
</td></td></tr></table></td></tr></table>
<?
}
}//end.visitor
}
}else{echo "<div class=information>You cannot access the casting call because your portfolio is not active</div>";}
?>