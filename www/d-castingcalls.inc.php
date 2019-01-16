<table width="100%" border="0" cellspacing="0" cellpadding="4"><tr>
<td align=left colspan=2>&nbsp;<h1><?php echo CASTING_CALLS;?></h1></td></tr><tr><td colspan=2>
<?php
$casting_id=$_GET['casting_id'];
if(!(int)$casting_id){
echo casting_calls();
}else{
echo casting_calls_read((int)$casting_id);

}
?>
</td></tr></table>