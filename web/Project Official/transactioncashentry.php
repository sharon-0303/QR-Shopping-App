<?php
include("Header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body background="images/bg-body.jpg">
<font color="#FFFFFF">
<script type="text/javascript">

function printSelection(node){

  var content=node.innerHTML
  var pwin=window.open('','print_content','width=800,height=800');

  pwin.document.open();
  pwin.document.write('<html><body onload="window.print()">'+content+'</body></html>');
  pwin.document.close();
  
   setTimeout(function(){pwin.close();},1000);
}
</script>
<div id="test">
<form id="form1" name="form1" method="post" action=""><label></label>
<label></label>


<?php 
$id=$_GET['textfield'];
$totamt=0;
$po=0;
$so=0;
?>

<table width="1047" height="214" border="1">
  <tr>
    <th colspan="9" scope="row">User Bill </th>
    </tr>
  <tr>
    <th width="42" scope="row">Sl.No</th>
    <td width="124">ProductName</td>
    <td width="73">Quantity</td>
    <td width="66">Price</td>
    <td width="82">Mfd.Date</td>
    <td width="105">Exp.Date</td>
    <td width="96">Product Offer </td>
    <td width="107">Shop Offer </td>
    <td width="294">Total Price</td>
  </tr>
  
  
  
  
 <?php
	include("connect.php");
	$str="select * from billmain,billsub,producttable where billmain.gen_code='$id' and billmain.B_ID=billsub.B_ID and billsub.P_ID=producttable.P_ID and billmain.status='not paid'";
	$res=mysql_query($str);
	$i=1;
	while($res1=mysql_fetch_array($res))
	{
		$totamt=$res1[2];
		
		$of=mysql_query("select * from offertable where pro_id='$res1[7]'");
		if(mysql_num_rows($of)>0){
			$row1=mysql_fetch_array($of);
			$po=$row1[2];
			$so=$row1[3];
			}else{
				$po=0;
				$so=0;
				}
	?>
    <tr>
      <th scope="row"><div align="center"><?php echo $i?></div></th>
      <td><div align="center"><?php echo $res1[10] ?></div></td>
      <td><div align="center"><?php echo $res1[11] ?></div></td>
      <td><div align="center"><?php echo $res1[8] ?></div></td>
      <td><div align="center"><?php echo $res1[14] ?></div></td>
      <td><div align="center"><?php echo $res1[15] ?></div></td>
      <td><div align="center"><?php echo $po ?></div></td>
      <td><div align="center"><?php echo $so ?></div></td>
      <td><div align="center"><?php echo $res1[8] ?></div></td>
    </tr>
	<?php $i++; }?>
  </table>
  &nbsp;
  <div align="center"></div> 
  <p>&nbsp;</p>
  <table border="0" align="center">
    <tr>
      <th colspan="6" scope="row">Total Amount </th>
      <th colspan="3" scope="row"><label>
        <input type="text" name="textfield" value="<?php echo $totamt ?>" />
      </label></th>
    </tr>
    <tr>
      <th colspan="9" scope="row"><label>
        <div align="center">ByCard    
          <input type="submit" name="a" value="  Online  " />
        </div>
      </label>
        <div align="left"></div></th>
    </tr>
    <tr>
      <th colspan="9" scope="row"><label>
        <div align="center">ByCash    
          <input type="submit" name="b" value="Pay Cash" />
        </div>
      </label>
        <div align="left"></div></th>
    </tr>
    <tr>
     
    </tr>
  </table>
  </div>
  
  <p>&nbsp;</p>
</form>

</body>
</html>
<?php

if(isset($_POST['a']))
{
	
$str2="update billmain set status='pending' where gen_code='$id'";

$i=mysql_query($str2);
header("location:print_bill.php?gen=$id");
}
if(isset($_POST['b']))
{
	
$str2="update billmain set status='paid' where gen_code='$id'";

$i=mysql_query($str2);
header("location:print_bill.php?gen=$id");
}
?>
<?php
include("Footer.php");
?>