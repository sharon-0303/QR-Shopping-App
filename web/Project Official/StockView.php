<?php
include("Header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<font color="#FFFFFF">
<form id="form1" name="form1" method="post" action="">
  <table width="1063" height="221" border="1">
    <tr>
      <th width="69" height="33" scope="row"><div align="center">Sl.No</div></th>
      <td width="198"><div align="center">Product Name </div></td>
      <td width="86"><div align="center">Pro.Quantity</div></td>
      <td width="86"><div align="center">Price</div></td>
      <td width="162"><div align="center">Brand</div></td>
      <td width="208"><div align="center">Stock Amount </div></td>
    
    </tr>
    <?php
	include("connect.php");
	$str="select producttable. P_Name,producttable.P_Quantity,producttable.Price,producttable.ProductBrand,stocktable.Stk_qty from producttable,stocktable where producttable.P_ID=stocktable.P_ID";
	$res=mysql_query($str);
	$i=1;
	while($res1=mysql_fetch_array($res))
	{
	?>
    <tr>
      <th scope="row"><div align="center"><?php echo $i?></div></th>
      <td><div align="center"><?php echo $res1[0] ?></div></td>
      <td><div align="center"><?php echo $res1[1] ?></div></td>
      <td><div align="center"><?php echo $res1[2] ?></div></td>
      <td><div align="center"><?php echo $res1[3] ?></div></td>
      <td><div align="center"><?php echo $res1[4] ?></div></td>
      
    </tr>
	<?php $i++; }?>
   
  </table>
</form>
</body>
</html>

    </tr>
  </table>
</form>
</body>
</html>
<?php
include("Footer.php");
?>
