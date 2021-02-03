<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body background="images/bg-body.jpg">
<font color="#FFFFFF">
<form id="form1" name="form1" method="post" action="">
  <table width="987" height="199" border="1">
    <tr>
      <td height="54" colspan="3"><div align="center">STOCK-View Admin</div></td>
    </tr>
    <tr>
      <td width="281" height="54"><div align="center">Products</div></td>
      <td width="342"><div align="center">StockAmount</div></td>
    
    </tr>
    <?php 
	include("connect.php");
	$str="select stocktable.*,producttable.P_Name from stocktable,producttable where stocktable.P_id=producttable.P_ID";
	$res=mysql_query($str);
	while($res1=mysql_fetch_array($res))
	{
	?>
    <tr>
      <td height="81"><div align="center"><?php echo $res1[3] ?></div></td>
      <td><div align="center"><?php echo $res1[2] ?></div></td>
    </tr>
   <?php } ?>
  </table>
</form>
</body>
</html>