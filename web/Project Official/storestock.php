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
  <table width="1066" height="190" border="1">
    <tr>
      <th width="58" height="36" scope="row"><div align="center">Sl.No</div></th>
      <td width="206"><div align="center">Product Name </div></td>
      <td width="128"><div align="center">Quantity     </div></td>
      <td width="110"><div align="center">Usage Time   </div></td>
      <td width="99"><div align="center">Price         </div></td>
      <td width="91"><div align="center">Mfd           </div></td>
      <td width="132"><div align="center">Exp.Date     </div></td>
      <td width="132"><div align="center">Type         </div></td>
      <td width="132"><div align="center">ProductBrand </div></td>
    </tr>
    <?php
	include("connect.php");
	$str="select * from producttable";
	$res=mysql_query($str);
	$i=1;
	while($res1=mysql_fetch_array($res))
	{
	?>
    <tr>
      <th height="88" scope="row"><div align="center"><?php echo $i?></div></th>
	  <td><div align="center"><?php echo $res1[1] ?></div></td>
      <td><div align="center"><?php echo $res1[2] ?></div></td>
      <td><div align="center"><?php echo $res1[3] ?></div></td>
      <td><div align="center"><?php echo $res1[4] ?></div></td>
      <td><div align="center"><?php echo $res1[5] ?></div></td>
      <td><div align="center"><?php echo $res1[6] ?></div></td>
      <td><div align="center"><?php echo $res1[7] ?></div></td>
      <td><div align="center"><?php echo $res1[8] ?></div></td>
      <td width="86"><div align="center">
       <p align="center"><a href="AddStock.php?id=<?php echo $res1[0] ?>">Add Quantity</a></p></div>
          </div>
      </div></td>
    </tr>
    
    <?php $i++;}?>
  </table>
</form>
</body>
</html>
<?php
include("Footer.php");
?>