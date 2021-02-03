<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body background="images/bg-body.jpg">
<font color="#FFFFFF">
<form id="form1" name="form1" method="post" action="">
  <table width="1700" height="127" border="1">
    <tr>
      <th width="47" height="38" scope="row">Sl.No</th>
      <td width="104">Product Name</td>
      <td width="92">Quantity</td>
      <td width="94">Usage Period </td>
      <td width="42">Price</td>
      <td width="40">Brand</td>
      <td width="59">Mfd.Date</td>
      <td width="58">Exp.Date</td>
      <td width="50">Type</td>
      <td width="40">QR-Codes</td>
    </tr>
    
    <?php
	include("connect.php");
	$str="select * from producttable";
	$res=mysql_query($str);
	if(mysql_num_rows($res)>0)
	{
	$i=0;
	while($res1=mysql_fetch_array($res))
	{
		$i++;
	
			
 ?>
    
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><div align="center"><?php echo $res1[1];?></div></td>
      <td><div align="center"><?php echo $res1[2] ?></div></td>
      <td><div align="center"><?php echo $res1[3] ?></div></td>
      <td><div align="center"><?php echo $res1[4] ?></div></td>
      <td><div align="center"><?php echo $res1[8] ?></div></td>
      <td><div align="center"><?php echo $res1[5] ?></div></td>
      <td><div align="center"><?php echo $res1[6] ?></div></td>
      <td><div align="center"><?php echo $res1[7] ?></div></td>
      <td><input name="" type="image" src="qrCode/<?php echo $res1[0];?>.png"/></td>
   </tr>
      <?php   }  }?>
    
  </table>

</form>
</body>
</html>
