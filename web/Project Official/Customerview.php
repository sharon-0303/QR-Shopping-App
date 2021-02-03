<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body background="images/bg-body.jpg">
<font color="#FFFFFF">
<form id="form1" name="form1" method="post" action="">
  <table width="911" height="179" border="1">
    <tr>
      <td width="63" height="74"><div align="center">Sl.No</div></td>
      <td width="108"><div align="center">FirstName</div></td>
      <td width="122"><div align="center">SecondName</div></td>
      <td width="90"><div align="center">Place</div></td>
      <td width="90"><div align="center">PhoneNo</div></td>
      <td width="174"><div align="center">Email</div></td>
      <td width="118"><div align="center">Username</div></td>
      <td width="94"><div align="center"></div></td>
      
    </tr>
    <tr>
    <?php
	include("connect.php");
	$str="select * from Customertable";
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
      <td><div align="center"><?php echo $res1[5] ?></div></td>
      <td><div align="center"><?php echo $res1[4] ?></div></td>
      <td><div align="center"><?php echo $res1[6] ?></div></td>
      <td><a href="Deletecustomer.php?id=<?php echo $res1[0] ?>"> Delete</a></div>
       </td>
    </tr>
    <?php $i++;}?>
  </table>
</form>
</body>
</html>
