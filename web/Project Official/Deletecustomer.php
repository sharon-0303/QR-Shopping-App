<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include("connect.php");
$idd=$_GET['id'];
	$str="delete from customertable where Cus_ID='$idd' ";
	$i=mysql_query($str);
	if($i>0)
	{
		
	
?>
<script>
alert("Succesfully Deleted");
window.location="Customerview.php";
</script>
<?php
	}
?>


</body>
</html>