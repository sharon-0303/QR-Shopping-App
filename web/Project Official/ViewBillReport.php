<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body background="images/bg-body.jpg">
<font color="#FFFFFF">
<form id="form1" name="form1" method="post" action="">
  <table width="961" height="183" border="1">
    <tr>
      <th width="54" height="37" scope="row"><div align="center">Sl.No</div></th>
      <td width="138"><div align="center">Product Name </div></td>
      <td width="77"><div align="center">Price</div></td>
      <td width="75"><div align="center">Date</div></td>
      <td width="121"><div align="center">ProductQuantity</div></td>
      <td width="123"><div align="center">Brand</div></td>
      <td width="131"><div align="center">Status</div></td>
      <td width="92"><div align="center">Generated Code</div></td>
      <td width="92"><div align="center">Total Price</div></td>
    </tr>
   <?php
	include("connect.php");
	$str="select billmain.*,billsub.*,producttable.*,customertable.FirstName from billmain,billsub,producttable,customertable where billsub.B_ID=billmain.B_ID and billsub.P_ID=producttable.P_ID and billmain.uid=customertable.Cus_ID";
	$res=mysql_query($str);
	$i=1;
	while($res1=mysql_fetch_array($res))
	{
	?>
    <tr>
      <th scope="row"><div align="center"><?php echo $i?></div></th>
      <td><div align="center"><?php echo $res1[10] ?></div></td>
      <td><div align="center"><?php echo $res1[13] ?></div></td>
      <td><div align="center"><?php echo $res1[4] ?></div></td>
      <td><div align="center"><?php echo $res1[11] ?></div></td>
      <td><div align="center"><?php echo $res1[17] ?></div></td>
      <td><div align="center"><?php echo $res1[5] ?></div></td>
      <td><div align="center"><?php echo $res1[3] ?></div></td>
      <td><div align="center"><?php echo $res1[8] ?></div></td>
    </tr>
	<?php $i++; }?>
   
  </table>
  </table>
</form>
</body>
</html>
