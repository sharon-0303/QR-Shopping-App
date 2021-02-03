
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body background="images/bg-body.jpg">
<font color="#FFFFFF">
<form id="form1" name="form1" method="post" action="">
  <table width="1010" height="189" border="1">
    <tr>
      <th width="61" height="57" scope="row">Sl.No</th>
      <td width="119">ProductName</td>
      <td width="60">Price(Rs)</td>
      <td width="96">Quantity</td>
      <td width="131">ProductOffer</td>
      <td width="118">Shop Offer </td>
      <td width="102">FromDate</td>
      <td width="85">EndDate</td>
      <td width="96">Total Price(Rs)</td>
      <td width="78">&nbsp;</td>
    </tr>
    <tr>
   <?php
	include("connect.php");
	$str="select offertable.*,producttable.P_Name,Price,P_Quantity from offertable,producttable where producttable.P_ID=offertable.pro_id";
	$res=mysql_query($str);
	$i=1;
	while($res1=mysql_fetch_array($res))
	{
	?>
    <tr>
      <th height="88" scope="row"><div align="center"><?php echo $i?></div></th>
	  <td><div align="center"><?php echo $res1[8] ?></div></td>
      <td><div align="center"><?php echo $res1[9] ?></div></td>
      <td><div align="center"><?php echo $res1[10] ?></div></td>
      <td><div align="center"><?php echo $res1[2] ?></div></td>
      <td><div align="center"><?php echo $res1[3] ?></div></td>
      <td><div align="center"><?php echo $res1[5] ?></div></td>
      <td><div align="center"><?php echo $res1[6] ?></div></td>
      <td><div align="center"><?php echo $res1[7] ?></div></td>
      <td><div align="center">
        
  <a href="Deleteoffersview.php?id=<?php echo $res1[0] ?>"> Delete</a></div>
      </td>
    </tr>
    <?php $i++;}?>
   
    </tr>
  </table>
</form>
</body>
</html>

