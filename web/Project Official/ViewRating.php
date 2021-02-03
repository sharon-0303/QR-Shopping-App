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
  <table width="456" height="119" border="1">
    <tr>
      <th width="60" height="37" scope="row"><div align="center">Sl.No</div></th>
      <td width="108"><div align="center">User Name </div></td>
      <td width="84"><div align="center">Feedback</div></td>
      <td width="84"><div align="center">Date</div></td>
      <td width="86"><div align="center">Rating</div></td>
    </tr>
    <?php
	include("connect.php");
	$str="select ratingtable.*,customertable.FirstName from ratingtable,customertable where ratingtable.uid=customertable.Cus_ID";
	$res=mysql_query($str);
	$i=1;
	while($res1=mysql_fetch_array($res))
	{
		
	?>
    <tr>
      <th scope="row"><div align="center"><?php echo $i ?></div></th>
      <td><div align="center"><?php echo$res1[5] ?></div></td>
      <td><div align="center"><?php echo$res1[4] ?></div></td>
      <td><div align="center"><?php echo$res1[3] ?></div></td>
      <td><div align="center"><?php echo$res1[1] ?></div></td>
    </tr>
    <?php $i++; }?>
  </table>
</form>
</body>
</html>
<?php
include("Footer.php");
?>

