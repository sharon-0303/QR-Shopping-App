
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body background="images/bg-body.jpg">
<font color="#FFFFFF">
<form id="form1" name="form1" method="post" action="">
  <table width="1060" height="214" border="1">
    <tr>
      <th width="52" height="33" scope="row"><div align="center">SL.No</div></th>
      <td width="110"><label> </label>
          <div align="center">Name</div></td>
      <td width="82"><div align="center">Gender</div></td>
      <td width="102"><div align="center">DOB</div></td>
      <td width="114"><div align="center">Place</div></td>
      <td width="118"><div align="center">Qualification</div></td>
      <td width="137"><div align="center">Email</div></td>
      <td width="136"><div align="center">Designation</div></td>
      <td><div align="center"></div>        <div align="center"></div></td>
    </tr>
	<?php
	include("connect.php");
	$str="select * from stafftable";
	$res=mysql_query($str);
	$i=1;
	while($res1=mysql_fetch_array($res))
	{
	?>
    <tr>
      <th scope="row"><div align="center"><?php echo $i?></div></th>
      <td><div align="center"><?php echo $res1[1] ?></div></td>
      <td><div align="center"><?php echo $res1[6] ?></div></td>
      <td><div align="center"><?php echo $res1[3] ?></div></td>
      <td><div align="center"><?php echo $res1[2] ?></div></td>
      <td><div align="center"><?php echo $res1[4] ?></div></td>
      <td><div align="center"><?php echo $res1[5] ?></div></td>
      <td><div align="center"><?php echo $res1[7] ?></div></td>
      <td><div align="center"><a href="editstaff.php?id=<?php echo $res1[0] ?>">Edit</a></div>        <div align="center"><a href="deletestaff.php?id=<?php echo $res1[0] ?>">Delete</a></div></td>
    </tr>
	<?php $i++; }?>
      </table>
</form>
</body>
</html>
